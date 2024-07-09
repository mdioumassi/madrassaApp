@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="w3-row mb-2">
                <div class="w3-col m2 tablink w3-bottombar w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">1</span> Mon enfant </div>
                <div class="w3-col m2 tablink w3-bottombar  w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">2</span> Choix d'une classe</div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">3</span> Frais & Scolarité
                </div>
                <div
                    class="w3-col m2 tablink w3-bottombar w3-border-red  w3-green w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">4</span> Paiement</div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">5</span> Recapitulatif</div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">6</span> Fiche d'inscription</div>
            </div>
            <div class="col-12">

                <div class="w3-card-4 centered-element" style="width:80%;">

                    {{-- <div class="w3-container w3-padding">
                        <div class="row">
                            <div class="col"> --}}
                                <h1 class="w3-center">Paiement</h1>
                                <div class="w3-card-4 w3-padding">
                                    <div class="w3-container w3-padding">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group w3-center">
                                                    <label for="payment_method">Moyen de paiement</label>
                                                    <select class="form-control" id="payment_method" name="payment_method">
                                                        <option value="1">Espèce</option>
                                                        <option value="2">Chèque</option>
                                                        <option value="3">Virement</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="amount">Montant à payer</label>
                                                    <input type="text" class="form-control" id="amount" name="amount"
                                                        value="{{ $payment }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group w3-center">
                                                    <label for="payment_date">Date de paiement</label>
                                                    <input type="date" class="form-control" id="payment_date"
                                                        name="payment_date" value="{{ date('Y-m-d') }}">
                                                </div>
                                                <div class="form-group w3-center">
                                                    <label for="payment_receipt">Reçu de paiement</label>
                                                    <input type="file" class="form-control" id="payment_receipt"
                                                        name="payment_receipt">
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <span class="w3-center mt-4 mb-4">Paiement par carte bancaire</span>
                                            
                                            <div class="col">

                                            </div>
                                            <div class="col">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group w3-center">
                                                    <label for="payment_note">Note</label>
                                                    <textarea class="form-control" id="payment_note" name="payment_note"
                                                        rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- </div>
                        </div>
                    </div> --}}
                </div>
                <form action="{{ route('step3.register.schooling.post') }}" method="post">
                    @csrf

                    <div class="mt-4 w3-center">
                        <button class="previous">&laquo; Précedent</button>
                        <button class="next" type="submit">Suivant &raquo;</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
