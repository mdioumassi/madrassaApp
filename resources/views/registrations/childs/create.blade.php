@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="w3-row mb-5">
                <div
                    class="w3-col m2 tablink w3-bottombar w3-border-indigo  w3-green w3-hover-border-green w3-hover-light-grey w3-padding">
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
                <form method="POST" action="{{ route('step1.register.child.store', $user->id) }}"
                    enctype="multipart/form-data" id="photo-upload">
                    @csrf
                    <div class="w3-card-2 centered-element" style="width:80%;" class="w3-light-grey">
                        <header class="w3-container w3-indigo w3-padding w3-center">
                            <h3>{{ _('Ajouter un enfant') }}</h3>
                        </header>
                        <div class="w3-container w3-padding-24">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-2">
                                    <img id="preview-photo" width="200px" class="w3-center">
                                    <div class="">
                                        <label class="form-label" for="inputPhoto">Choisir une photo:</label>
                                        <input type="file" name="photo" id="inputPhoto"
                                            class="form-control @error('photo') is-invalid @enderror">

                                        @error('photo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row mb-3">
                                        <label for="genre"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Genre') }}</label>
                                        <div class="col-md-6 ">
                                            <select id="genre" class="form-select @error('genre') is-invalid @enderror"
                                                name="genre">
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
                                        <label for="firstname"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Prénom') }}</label>

                                        <div class="col-md-6">
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
                                        <label for="lastname"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                                        <div class="col-md-6">
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
                                        <label for="birthdate"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Date de naissance') }}</label>

                                        <div class="col-md-6">
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
                                        <label for="french_class"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Classe Française') }}</label>

                                        <div class="col-md-6">
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
