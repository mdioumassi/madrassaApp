@extends('layouts.app')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('registrations.children') }}">{{ _('Inscriptions') }}</a></li>
                <li class="breadcrumb-item">{{ $parent->getFullNameAttribute() }}</li>
                <li class="breadcrumb-item">{{ $child->getFullNameAttribute() }}</li>
                <li class="breadcrumb-item">{{ $level->label }}</li>
                <li class="breadcrumb-item active" aria-current="page">{{ _('Moyen de paiement') }}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="w3-row mb-5">
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">1</span> Ajouter un parent
                </div>
                <div class="w3-col m2 tablink w3-bottombar  w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">2</span> Ajouter un enfant
                </div>
                <div class="w3-col m2 tablink w3-bottombar  w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">3</span> Choix d'une classe</div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">4</span> Frais & Scolarité
                </div>
                <div
                    class="w3-col m2 tablink w3-bottombar w3-border-indigo  w3-green w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">5</span> Paiement
                </div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">6</span> Recapitulatif</div>
            </div>
            <div class="col-12">
                <form action="{{ route('step4.register.means.payment') }}" method="POST" id="meansPayment">
                    @csrf
                    <div class="w3-card-2 centered-element" style="width:80%;">
                        <h1 class="w3-center w3-green w3-padding">Moyen de paiement</h1>
                        <div class="w3-card-4 w3-padding">
                            <div class="w3-container w3-padding mb-5">
                                <div class="row mt-5">
                                    <div class="col-md-6">
                                        <div class="form-group w3-center w3-blue-grey">
                                            <label for="payment_method"><b>Moyen de paiement</b></label>
                                            <select class="form-control" id="payment_method" name="payment_method">
                                                <option value="">------ Selectionner un moyen de paiement ------
                                                </option>
                                                <option value="espece">Espèce</option>
                                                <option value="cheque">Chèque</option>
                                                <option value="virement">Virement</option>
                                                <option value="carte">Carte bancaire</option>
                                                <option value="paypal">Paypal</option>
                                            </select>
                                        </div>
                                        <div class="form-group mt-3 w3-center w3-blue-grey">
                                            <label for="amount"><b>Montant à payer</b></label>
                                            <div class="input-group input-group-lg">
                                                <input style="font-size: 3.5rem" type="text"
                                                    class="form-control display-1 w3-center" id="amount" name="amount"
                                                    value="{{ $payment_amount }}" readonly>
                                                <span class="input-group-text w3-light-grey">€/an</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group w3-center w3-blue-grey mb-3">
                                            <label for="payment_date"><b>Date de paiement</b></label>
                                            <input type="date" class="form-control" id="payment_date" name="payment_date"
                                                value="{{ date('Y-m-d') }}">
                                        </div>
                                        <div class="form-group w3-center w3-blue-grey">
                                            <div class="form-group w3-center w3-blue-grey mt-3">
                                                <label for="payment_note"><b>Note</b></label>
                                                <textarea class="form-control" id="payment_note" name="payment_note" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="payment_by_bank_transfert">
                                    <span class="w3-center mt-4 mb-4 w3-blue-grey"><b>Paiement par virement
                                            bancaire</b></span>
                                    <div class="col">
                                        <table class="w3-table w3-bordered">
                                            <tr>
                                                <td><strong>Titulaire du compte:</strong></td>
                                                <td>ASSOCIATION MADRASSA</td>
                                            </tr>
                                            <tr>
                                                <td><strong>IBAN:</strong></td>
                                                <td>FR76 3000 3032 0000 0200 0000 007</td>
                                            </tr>
                                            <tr>
                                                <td><strong>BIC:</strong></td>
                                                <td>SOCIETE GENERALE</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col">
                                        <div class="form-group w3-center">
                                            <label for="payment_receipt"><b>Reçu de paiement</b></label>
                                            <input type="file" class="form-control" id="payment_receipt"
                                                name="payment_receipt">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5" id="payment_by_check">
                                    <span class="w3-center mt-4 mb-4 w3-blue-grey"><b>Paiement par chèque</b></span>
                                    <div class="col">
                                        <table class="w3-table w3-bordered">
                                            <tr>
                                                <td><strong>Ordre du chèque:</strong></td>
                                                <td>ASSOCIATION MADRASSA</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Adresse:</strong></td>
                                                <td>12 rue de la paix, 75000 Paris</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 w3-center">
                            <button class="previous">&laquo; Précedent</button>
                            <button class="next" type="submit">Suivant &raquo;</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    @include('registrations._modals.carte-payment', ["amount" => $payment_amount])
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
    <script>
        $(document).ready(function() {
            $('.next').click(function() {
                var payment_method = $('#payment_method').val();
                var amount = $('#amount').val();
                var payment_date = $('#payment_date').val();
                var payment_receipt = $('#payment_receipt').val();
                var payment_note = $('#payment_note').val();

                if (payment_method == '') {
                    alert('Veuillez selectionner un moyen de paiement');
                    return false;
                } else if (payment_date == '') {
                    alert('Veuillez renseigner la date de paiement');
                    return false;
                } else {
                    return true;
                }
            });
            var payment_method = $('#payment_method').val();
            if (payment_method == 0 || payment_method == '') {
                $('#payment_by_credit_card').hide();
                $('#payment_by_bank_transfert').hide();
                $('#payment_by_check').hide();
            }
            $('#payment_method').change(function() {
                var payment_method = $('#payment_method').val();
                if (payment_method == 'carte') {
                    // $('#payment_by_credit_card').show();
                    $('#modal-carte-payment').modal('show');
                    $('#payment_by_bank_transfert').hide();
                    $('#payment_by_check').hide();
                } else if (payment_method == 'virement') {
                    $('#payment_by_bank_transfert').show();
                    $('#payment_by_credit_card').hide();
                    $('#payment_by_check').hide();
                } else if (payment_method == 'cheque') {
                    $('#payment_by_check').show();
                    $('#payment_by_credit_card').hide();
                    $('#payment_by_bank_transfert').hide();
                } else {
                    $('#payment_by_credit_card').hide();
                    $('#payment_by_bank_transfert').hide();
                    $('#payment_by_check').hide();
                }
            });
        });
    </script>
@endsection
