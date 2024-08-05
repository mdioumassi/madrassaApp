@extends('layouts.app')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('registrations.children') }}">{{ _('Inscriptions') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ _('Choisir un parent') }}</li>
            </ol>
        </nav>
        <div class="w3-row mb-5">
            <div
                class="w3-col m2 tablink w3-bottombar w3-border-indigo  w3-green w3-hover-border-green w3-hover-light-grey w3-padding">
                <span class="w3-badge w3-indigo">1</span> Choix d'un parent
            </div>
            <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding">
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
        <a href="{{route("step0.register.parent.create")}}">
            <button class="w3-button w3-xlarge w3-circle w3-green w3-card-4 mb-3">+</button>
            <span><b>Parent</b></span>
        </a>
        <div class="row">
            @foreach ($parents as $parent)
                <div class="col-md-4 mb-4">
                    <div class="w3-card-4">
                        <header class="w3-container w3-indigo">
                            <h3>{{ $parent->getFullNameAttribute() }}</h3>
                        </header>
                        <div class="w3-container">
                            <table class="w3-table w3-bordered">
                                <tr>
                                    <td rowspan="3">
                                        <img src="{{ $parent->getAvatarUrlAttribute() }}"
                                        class="w3-image w3-circle" style="width: 100px">
                                    </td>
                                    <td>Civilité</td>
                                    <td>{{ $parent->civility }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $parent->email }}</td>
                                </tr>
                                <tr>
                                    <td>Téléphone</td>
                                    <td>{{ $parent->phone }}</td>
                                </tr>
                            </table>
                        </div>
                        <footer class="w3-container w3-light-grey w3-padding">
                            <a href="{{route('step1.register.child.choice', $parent->id)}}" class="w3-button w3-green">Les enfants</a>
                        </footer>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
