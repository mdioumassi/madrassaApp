<!DOCTYPE html>
<html>
<head>
    <title>Laravel 11 Stripe Payment Gateway Integration Example - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        #card-element{
            height: 50px;
            padding-top: 16px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mt-5">
                <h3 class="card-header p-3">Laravel 11 Stripe Payment Gateway Integration Example - ItSolutionStuff.com</h3>
                <div class="card-body">
                    <form id="payment-form">
                        <label for="payment-element">Payment details</label>
                        <div id="payment-element">
                            <!-- Elements will create input elements here -->
                        </div>

                        <!-- We'll put the error messages in this element -->
                        <div id="payment-errors" role="alert"></div>


                        <button id="submit">Payer</button>
                    </form>
                    <div id="messages" role="alert" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div> 
</div>
      
</body>
<script src="https://js.stripe.com/v3/"></script>
<script>
    const clientSecret = {{ Illuminate\Support\Js::from($client_secret) }};
    const stripePublicKey = {{ Illuminate\Support\Js::from($public_key) }};
    document.addEventListener('DOMContentLoaded', async () => {
        const stripe = Stripe(stripePublicKey, {
            apiVersion: '2020-08-27',

        });

        const elements = stripe.elements({
            clientSecret: clientSecret
        });

        const paymentElement = elements.create('payment');
        paymentElement.mount('#payment-element');

        const paymentForm = document.querySelector('#payment-form');
        paymentForm.addEventListener('submit', async (e) => {
            // Avoid a full page POST request.
            e.preventDefault();

            // Disable the form from submitting twice.
            paymentForm.querySelector('button').disabled = true;
            // Confirm the card payment that was created server side:
            const {
                error
            } = await stripe.confirmPayment({
                elements,
                confirmParams: {
                    return_url: `${window.location.origin}/register/payment/confimation`
                }
            });
            if (error) {
                addMessage(error.message);

                // Re-enable the form so the customer can resubmit.
                paymentForm.querySelector('button').disabled = false;
                return;
            }
        });
    });
</script>
{{-- <script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
  
    var stripe = Stripe('{{ env('STRIPE_KEY') }}')
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');
  
    /*------------------------------------------
    --------------------------------------------
    Create Token Code
    --------------------------------------------
    --------------------------------------------*/
    function createToken() {
        document.getElementById("pay-btn").disabled = true;
        stripe.createToken(cardElement).then(function(result) {
   
            if(typeof result.error != 'undefined') {
                document.getElementById("pay-btn").disabled = false;
                alert(result.error.message);
            }
  
            /* creating token success */
            if(typeof result.token != 'undefined') {
                document.getElementById("stripe-token-id").value = result.token.id;
                document.getElementById('checkout-form').submit();
            }
        });
    }
</script> --}}
 
</html>