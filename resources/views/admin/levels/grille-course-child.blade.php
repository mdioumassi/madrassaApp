@extends('layouts.app')

@section('content')
    <div class="container">
        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('registrations.children') }}">{{ _('Inscriptions') }}</a></li>
                <li class="breadcrumb-item">{{ $parent->getFullNameAttribute() }}</li>
                <li class="breadcrumb-item">{{ $child->getFullNameAttribute() }}</li>
                <li class="breadcrumb-item active" aria-current="page">{{ _('Choisir un niveau') }}</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="w3-row mb-3">
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">1</span> Ajouter un parent
                </div>
                <div class="w3-col m2 tablink w3-bottombar  w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">2</span> Ajouter un enfant
                </div>
                <div class="w3-col m2 tablink w3-bottombar w3-border-indigo w3-hover-light-grey w3-padding w3-green"><span
                        class="w3-badge w3-indigo">3</span> Choix d'une classe</div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">4</span> Frais & Scolarité</div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">5</span> Paiement</div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">6</span> Recapitulatif</div>
            </div>
            <div class="col-md-12">
                <form method="POST" action="{{ route('step2.register.level.post') }}">
                    @csrf
                    <input type="hidden" name="childId" value="{{ $childId }}">
                    <div class="w3-card-4">
                        <header class="w3-container w3-indigo">
                            <h2 class="w3-center">COURS ARABE POUR ENFANT</h2>
                        </header>
                        <div class="w3-container mt-3">
                            {{-- Cours d\'arabe pour enfant  --}}
                            <div class="row">
                                @foreach ($levels as $level)
                                    @if ($level->course->keywords == 'arabe-enfant')
                                        <div class="col-md-4 mb-4">
                                            <div class="w3-card-2">
                                                <header class="w3-container w3-green">
                                                    <h3 class="w3-center"> {{ $level->label }}</h3>
                                                </header>
                                                <div class="w3-container w3-padding">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <img src="https://www.w3schools.com/w3css/img_snowtops.jpg"
                                                                alt="{{ $level->name }}" class="img-thumbnail"
                                                                style="width: 200px; height: 200px;">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p><strong>Tarif:</strong><span
                                                                    class="display-1">{{ $level->tarif }}</span>€/an</p>
                                                            <p><strong>Frais d'inscription:</strong>
                                                                {{ $level->registration_fees }}€</p>
                                                            <p><strong>Horaires:</strong> {{ $level->hours }}/semaine
                                                            </p>
                                                            <p><strong>Nombre de matières:
                                                                    {{ $level->subjects->count() }}</strong> </p>

                                                        </div>
                                                        <div class="col-md-1">
                                                            <input class="w3-radio" type="radio" name="levelId"
                                                                value="{{ $level->id }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="w3-card-4 mt-5">
                        <header class="w3-container w3-indigo">
                            <h2 class="w3-center">COURS CORAN POUR ENFANT</h2>
                        </header>
                        <div class="w3-container mt-3">
                            {{-- Cours de coran pour enfant  --}}
                            <div class="row">
                                @foreach ($levels as $level)
                                    @if ($level->course->keywords == 'coran-enfant')
                                        <div class="col-md-4 mb-4">
                                            <div class="w3-card-2">
                                                <header class="w3-container w3-green">
                                                    <h2 class="w3-center"> {{ $level->label }}</h2>
                                                </header>
                                                <div class="w3-container w3-padding">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <img src="https://www.w3schools.com/w3css/img_snowtops.jpg"
                                                                alt="{{ $level->name }}" class="img-thumbnail"
                                                                style="width: 200px; height: 200px;">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p><strong>Tarif:</strong><span
                                                                    class="display-1">{{ $level->tarif }}</span>€/an</p>
                                                            <p><strong>Frais d'inscription:</strong>
                                                                {{ $level->registration_fees }}€</p>
                                                            <p><strong>Horaires:</strong> {{ $level->hours }}/semaine
                                                            </p>
                                                            <p><strong>Nombre de matières:
                                                                    {{ $level->subjects->count() }}</strong> </p>

                                                        </div>
                                                        <div class="col-md-1">
                                                            <input class="w3-radio" type="radio" name="levelId"
                                                                value="{{ $level->id }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
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
@endsection
