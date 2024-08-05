<?php
      
namespace App\Http\Controllers;

use App\Services\StripeService;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Stripe;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
       
class StripePaymentController extends Controller
{

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public static function stripe()
    {
        $stripeService = new StripeService();
        $intent = $stripeService->getPaymentIntent(15);
        $client_secret = $intent->client_secret;
        $public_key = $stripeService->getPublicKey();

        return view('stripe', compact('client_secret', 'public_key'));
    }

    public static function stripePayment()
    {
        dump('Payment successful');
    }
}