@extends('layouts.app')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('registrations.children') }}">{{ _('Inscriptions') }}</a></li>
                <li class="breadcrumb-item">{{$user->getFullNameAttribute()}}</li>
                <li class="breadcrumb-item active" aria-current="page">{{ _('Ajouter un enfant') }}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="w3-row mb-5">
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">1</span> Ajouter un parent
                </div>
                <div
                    class="w3-col m2 tablink w3-bottombar w3-border-indigo  w3-green w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">2</span> Ajouter un enfant
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
                <form method="POST" action="{{ route('step1.register.child.store', $user->id) }}"
                    enctype="multipart/form-data" id="photo-upload">
                    @csrf
                    <div class="w3-card-2 centered-element" style="width:80%;" class="w3-light-grey">
                        <header class="w3-container w3-indigo w3-padding w3-center">
                            <h3>{{ _('Ajouter un enfant') }}</h3>
                        </header>
                        <div class="w3-container w3-padding-24">
                            <div class="row">
                                <div class="col-4">
                                    <img id="preview-photo" width="200px" class="w3-center">
                                    <div class="w3-border">
                                        <label class="form-label" for="inputPhoto">Choisir une photo:</label>
                                        <input type="file" name="photo" id="inputPhoto"
                                            class="form-control @error('photo') is-invalid @enderror">

                                        @error('photo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="genre">{{ __('Genre') }}</label>
                                            <select id="genre" class="form-select @error('genre') is-invalid @enderror"
                                                name="genre">
                                                <option value="">Choisir le genre</option>
                                                <option value="garçon">Garçon</option>
                                                <option value="fille">Fille</option>
                                            </select>

                                            @error('genre')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="hidden" name="affichage-grille" value="grille">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="firstname">{{ __('Prénom') }}</label>
                                            <input id="firstname" type="text"
                                                class="form-control @error('firstname') is-invalid @enderror"
                                                name="firstname" autocomplete="firstname" autofocus>

                                            @error('firstname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="lastname">{{ __('Nom') }}</label>
                                            <input id="lastname" type="text"
                                                class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                                autocomplete="lastname" autofocus>

                                            @error('lastname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="birthdate">{{ __('Date de naissance') }}</label>

                                            <input id="birthdate" type="date"
                                                class="form-control @error('birthdate') is-invalid @enderror"
                                                name="birthdate" autocomplete="birthdate" autofocus>

                                            @error('birthdate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="french_class">{{ __('Classe Française') }}</label>

                                            <input id="french_class" type="text"
                                                class="form-control @error('french_class') is-invalid @enderror"
                                                name="french_class" autocomplete="french_class" autofocus>

                                            @error('french_class')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
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
@section('footer-scripts')
    <script type="text/javascript">
        $('#inputPhoto').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-photo').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endsection
