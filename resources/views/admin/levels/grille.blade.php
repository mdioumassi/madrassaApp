@extends('layouts.app')

@section('content')
    @php
        // $child = true;
        $adult = false;
    @endphp
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
                <li class="breadcrumb-item active" aria-current="page">{{ _('Mes classes') }}</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="w3-row mb-2">
                <div class="w3-col m2 tablink w3-bottombar w3-hover-light-grey w3-padding"><span class="w3-badge w3-indigo">1</span> Mon enfant </div>
                <div class="w3-col m2 tablink w3-bottombar w3-border-red w3-hover-light-grey w3-padding w3-green"><span class="w3-badge w3-indigo">2</span> Choix d'une classe</div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span class="w3-badge w3-indigo">3</span> Frais & Scolarité</div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span class="w3-badge w3-indigo">4</span> Paiement</div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span class="w3-badge w3-indigo">5</span> Recapitulatif</div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span class="w3-badge w3-indigo">6</span> Fiche d'inscription</div>
              </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form  method="POST" action="{{route('step2.register.level.post')}}">
                            @csrf
                            @if ($child)
                                <div class="row">
                                    <div class="col">
                                        <div class="card-header w3-indigo mb-2"><b>{{ _('Cours d\'arabe pour enfant') }}</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach ($levels as $level)
                                        @if ($level->course->keywords == 'arabe-enfant')
                                            <div class="col-md-4 mb-4">
                                                <div class="card">
                                                    <div class="card-header w3-green">{{ $level->label }}
                                                    </div>
                                                    <div class="card-body">
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
                                                                <input class="w3-radio" type="radio" name="levelId" value="{{ $level->id }}">
                                                                {{-- <input type="hidden" name="arabe-enfant_id" value="{{ $level->course->id }}"> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                            @if ($adult)
                                <div class="row">
                                    <div class="col">
                                        <div class="card-header w3-blue mb-2">
                                            <strong>{{ _('Cours d\'arabe pour adulte') }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach ($levels as $level)
                                        @if ($level->course->keywords == 'arabe-adulte')
                                            <div class="col-md-4 mb-4">
                                                <div class="card">
                                                    <div class="card-header w3-green">{{ $level->label }}</div>
                                                    <div class="card-body">
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
                                                                <input class="w3-radio" type="radio" name="levelId" value="{{ $level->id }}">
                                                                <input type="hidden" name="arabe-adulte_id" value="{{ $level->course->id }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                            @if ($child)
                                <div class="row">
                                    <div class="col">
                                        <div class="card-header w3-cyan mb-2">
                                            <strong>{{ _('Cours de coran pour enfant') }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach ($levels as $level)
                                        @if ($level->course->keywords == 'coran-enfant')
                                            <div class="col-md-4 mb-4">
                                                <div class="card">
                                                    <div class="card-header w3-green">{{ $level->label }}</div>
                                                    <div class="card-body">
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
                                                                <input class="w3-radio" type="radio" name="levelId" value="{{ $level->id }}">
                                                                {{-- <input type="hidden" name="coran-enfant_id" value="{{$level->course->id}}"> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                            @if ($adult)
                                <div class="row">
                                    <div class="col">
                                        <div class="card-header w3-light-blue mb-2">
                                            <strong>{{ _('Cours de coran pour adulte') }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach ($levels as $level)
                                        @if ($level->course->keywords == 'coran-adulte')
                                            <div class="col-md-4 mb-4">
                                                <div class="card">
                                                    <div class="card-header w3-green">{{ $level->label }}</div>
                                                    <div class="card-body">
                                                        <div class="row">
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
                                                                    <input class="w3-radio" type="radio" name="levelId" value="{{ $level->id }}">
                                                                    <input type="hidden" name="coran-adulte" value="{{ $level->course->id }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                            <div class="mt-4">
                                <button class="previous">&laquo; Précedent</button>
                                <button class="next" type="submit">Suivant &raquo;</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
