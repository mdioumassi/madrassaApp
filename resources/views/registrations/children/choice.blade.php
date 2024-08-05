@extends('layouts.app')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('registrations.children') }}">{{ _('Inscriptions') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ _('Choisir un enfant') }}</li>
            </ol>
        </nav>
        <div class="w3-row mb-3">
            <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding">
                <span class="w3-badge w3-indigo">1</span> Choix d'un parent
            </div>
            <div
                class="w3-col m2 tablink w3-bottombar  w3-border-indigo  w3-green w3-hover-border-green w3-hover-light-grey w3-padding">
                <span class="w3-badge w3-indigo">2</span> Choix d'un enfant
            </div>
            <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green  w3-hover-light-grey w3-padding"><span
                    class="w3-badge w3-indigo">3</span> Choix d'une classe</div>
            <div class="w3-col m2 tablink w3-bottombar  w3-hover-border-green w3-hover-light-grey w3-padding">
                <span class="w3-badge w3-indigo">4</span> Frais & Scolarité
            </div>
            <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span
                    class="w3-badge w3-indigo">4</span> Paiement</div>
            <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span
                    class="w3-badge w3-indigo">5</span> Recapitulatif</div>
        </div>
        <a href="{{route("step1.register.child.create", $parent->id)}}">
            <button class="w3-button w3-xlarge w3-circle w3-green w3-card-4 mb-3">+</button>
            <span><b>Enfant</b></span>
        </a>
        <div class="row">
            @foreach ($children as $child)
                <div class="col-md-4 mb-4">
                    <div class="w3-card-4">
                        <header class="w3-container w3-indigo">
                            <h3>{{ $child->getFullNameAttribute() }}</h3>
                        </header>
                        <div class="w3-container">
                            <table class="w3-table w3-bordered">
                                <tr>
                                    <td rowspan="4">
                                        <img src="{{ $child->getPhotoUrlAttribute() }}"
                                            class="w3-image img-thumbnail w3-circle" style="width:135px">
                                    </td>
                                    <td><b>Genre</b>:</td>
                                    <td>{!! $child->getGenre() !!}</td>
                                </tr>

                                <tr>
                                    <td><b>Age</b>:</td>
                                    <td>{{ $child->getAgeAttribute() }}ans</td>
                                </tr>
                                <tr>
                                    <td><b>Classe française</b>:</td>
                                    <td>{{ $child->french_class }}</td>
                                </tr>
                                @if (!$child->is_registered($child->id))
                                    <tr>
                                        <td><strong>Statut:</strong></td>
                                        <td><span class="w3-text-red">Non inscrit</span></td>
                                    </tr>
                                @else
                                    <tr>
                                        <td><strong>Statut:</strong></td>
                                        <td><span class="w3-text-green">Inscrit</span></td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                        <footer class="w3-container w3-light-grey w3-padding">
                            <div class="w3-bar">
                                @if (!$child->is_registered($child->id))
                                    <a href="{{ route('step2.register.level.child', $child->id) }}"
                                        class="w3-button w3-ripple w3-green w3-small w3-left">{{ _('Incription') }}</a>
                                    <a href="#"
                                        class="w3-button w3-ripple w3-green w3-small w3-right  w3-disabled">{{ _('Fiche d\'inscription') }}</a>
                                @else
                                    <a href="{{ route('step2.register.level.child', $child->id) }}"
                                        class="w3-button w3-ripple w3-green w3-small w3-left w3-disabled">{{ _('Incription') }}</a>
                                    <button class="w3-button w3-ripple w3-green w3-small w3-right" data-bs-toggle="modal"
                                        data-bs-target="#modal-fiche-registration{{ $child->registration->id }}">{{ _('Fiche d\'inscription') }}</button>
                                @endif
                            </div>
                        </footer>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @foreach ($children as $child)
        @if ($child->registration)
            @include('registrations._modals.fiche-registration', ['registration' => $child->registration])
        @endif
    @endforeach
@endsection
