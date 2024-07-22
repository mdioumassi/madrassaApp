@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="w3-row mb-5">
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">1</span> Mon enfant
                </div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green  w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">2</span> Choix d'une classe</div>
                <div class="w3-col m2 tablink w3-bottombar  w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">3</span> Frais & Scolarité
                </div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">4</span> Paiement</div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">5</span> Recapitulatif</div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">6</span> Fiche d'inscription</div>
            </div>
            <div class="col-12">
                <form action="{{route('step0.register.parent.store')}}" method="post">
                    @csrf
                    <div class="w3-card-4 centered-element" style="width: 80%">
                        <header class="w3-container w3-grey">
                            <h1>Ajouter un parent</h1>
                        </header>
                        <div class="w3-container mt-3 w3-padding-24">

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="civility">{{ __('Civilité') }}:</label>
                                    <select id="civility" class="form-select @error('civility') is-invalid @enderror"
                                        name="civility">
                                        <option value='' selected="selected">--Selectionner--</option>
                                        <option value="Mr">Monsieur</option>
                                        <option value="Mme">Madame</option>
                                        <option value="Mlle">Mademoiselle</option>
                                    </select>

                                    @error('civility')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="type">{{ __('Type') }}:</label>
                                    <select id="type" class="form-select @error('type') is-invalid @enderror"
                                        name="type">
                                        <option value="parent" selected="selected">Parent</option>
                                    </select>

                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="function">{{ __('Fonction') }}</label>
                                    <input id="function" type="text"
                                        class="form-control @error('function') is-invalid @enderror" name="function"
                                        value="{{ old('function') }}" autocomplete="function" autofocus>

                                    @error('function')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <label for="name">{{ __('Prénom') }}:</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="lastname">{{ __('Nom') }}:</label>
                                    <input id="lastname" type="text"
                                        class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                        value="{{ old('lastname') }}" autocomplete="lastname" autofocus>

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <label for="email">{{ __('Adresse E-Mail') }}:</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="phone">{{ __('Téléphone') }}:</label>
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <label for="full_address">{{ __('Adresse complète') }}:</label>
                                    <input id="full_address" type="text"
                                        class="form-control @error('full_address') is-invalid @enderror"
                                        name="full_address" value="{{ old('full_address') }}" autocomplete="address">

                                    @error('full_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <label for="password">{{ __('Mot de passe') }}:</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="password-confirm">{{ __('Confirmation de mot de passe') }}:</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="confirm-password" autocomplete="new-password">
                                </div>
                                <div class="col">
                                    <label for="roles">{{ __('Roles') }}</label>
                                    <select id="roles" class="form-select @error('roles') is-invalid @enderror"
                                        name="roles[]">
                                        <option value="Parent" selected="selected">Parent</option>
                                    </select>

                                    @error('roles')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 w3-center">
                        <button class="next" type="submit">Suivant &raquo;</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
