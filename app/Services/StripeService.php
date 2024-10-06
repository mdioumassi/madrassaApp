<?php

namespace App\Services;

class StripeService
{
    /**
     * Create a new class instance.
     */
    protected string $client_secret;
    protected string $public_key;

    public function __construct()
    {
        $this->client_secret = env('STRIPE_SECRET');
        $this->public_key = env('STRIPE_PUBLIC');
    }

    public function getPublicKey()
    {
        return $this->public_key;
    }

    public function getPaymentIntent($amount, $token = null)
    {
        \Stripe\Stripe::setApiKey($this->client_secret);

        return \Stripe\PaymentIntent::create([
            'amount' => $amount*100,
            'currency' => 'eur',
            "source" => $token,
            "description" => "Test payment madrassa" 
        ]);
    }
}
