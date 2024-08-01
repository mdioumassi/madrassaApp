@extends('layouts.app')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('registrations.children') }}">{{ _('Inscriptions') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ _('Inscrire un enfant') }}</li>
        </ol>
    </nav>
        <div class="row">
            <div class="w3-row mb-5">
                <div class="w3-col m2 tablink w3-bottombar w3-border-indigo  w3-green  w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">1</span> Ajouter un parent
                </div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">2</span> Mon enfant
                </div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green  w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">3</span> Choix d'une classe</div>
                <div class="w3-col m2 tablink w3-bottombar  w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">4</span> Frais & Scolarité
                </div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">5</span> Paiement</div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">6</span> Recapitulatif</div>
            </div>
            <div class="col-12">
                <form action="{{ route('step0.register.parent.store') }}" method="post">
                    @csrf
                    <div class="w3-card-4 centered-element" style="width: 80%">
                        <header class="w3-container w3-indigo">
                            <h1 class="w3-center">Ajouter un parent</h1>
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
