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
                <li class="breadcrumb-item">{{ $parent->getFullNameAttribute() }}</li>
                <li class="breadcrumb-item active" aria-current="page">Mes enfants</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-light">
                        <strong>{{ $parent->getFullNameAttribute() }}:</strong> Mes enfants
                    </div>
                    <div class="card-body">
                        <div class="mb-3 mt-3">
                            @can('child-create')
                                <a class="w3-button w3-green" href="{{ route('step1.register.child.create', $parent->id) }}"><i
                                        class='fas fa-child'></i> Inscrire un nouveau enfant</a>
                            @endcan
                        </div>
                        <div class="row">
                            @foreach ($children as $child)
                                <div class="col-md-6 mb-4">
                                    <div class="w3-card-4">
                                        <header class="w3-container w3-blue">
                                            <h1>{{ $child->getFullNameAttribute() }}</h1>
                                        </header>
                                        <div class="w3-container w3-padding">
                                            <div class="row">
                                                <div class="col-3">
                                                    <img src="https://www.w3schools.com/w3css/img_snowtops.jpg"
                                                        alt="{{ $child->firstname }}" class="img-thumbnail img-fluid"
                                                        style="width: 200px; height: 200px;">
                                                </div>
                                                <div class="col-4">
                                                    <table class="w3-table w3-bordered">
                                                        <tr>
                                                            <td><strong>Genre:</strong></td>
                                                            <td>{{ $child->genre }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Age:</strong></td>
                                                            <td>{{ $child->getAgeAttribute() }} ans</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Classe Française:</strong></td>
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
                                                <div class="col-5">
                                                    @foreach ($child->registrations as $registration)
                                                        <b>{{ strtoupper($registration->course->label) }}</b>
                                                        <ul>
                                                            <li>{{ $registration->level->label }}</li>
                                                        </ul>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <footer class="w3-container w3-padding w3-light-grey">
                                            <div class="w3-bar">
                                                @can('child-edit')
                                                    <button class="w3-button w3-ripple w3-yellow w3-small w3-left me-3"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-view-edit-child{{ $child->id }}">
                                                        <i class="fa-solid fa-pen-to-square"></i> {{ _('Modifier') }}
                                                    </button>
                                                @endcan
                                                @if (!$child->is_registered($child->id))
                                                    <a href="{{ route('step1.register.child', $child->id) }}"
                                                        class="w3-button w3-ripple w3-green w3-small w3-left">{{ _('Incription') }}</a>
                                                    <a href="#"
                                                        class="w3-button w3-ripple w3-indigo w3-small w3-right  w3-disabled">{{ _('Fiche d\'inscription') }}</a>
                                                @else
                                                    <a href="{{ route('step1.register.child', $child->id) }}"
                                                        class="w3-button w3-ripple w3-green w3-small w3-left w3-disabled">{{ _('Incription') }}</a>
                                                    {{-- <a href="#"
                                                        class="w3-button w3-ripple w3-indigo w3-small w3-right">{{ _('Fiche d\'inscription') }}</a> --}}
                                                    @foreach ($child->registrations as $registration)
                                                        <button class="w3-button w3-ripple w3-indigo w3-small w3-right"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modal-fiche-registration{{ $registration->id }}">{{ _('Fiche d\'inscription') }}</button>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </footer>
                                    </div>

                                    {{-- <div class="card">
                                        <div class="card-body">
                                            <div class="card-header w3-green">
                                                <strong>{{ $child->getFullNameAttribute() }}</strong></div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <img src="https://www.w3schools.com/w3css/img_snowtops.jpg"
                                                        alt="{{ $child->firstname }}" class="img-thumbnail img-fluid"
                                                        style="width: 200px; height: 200px;">
                                                </div>
                                                <div class="col-md-9">
                                                    <table class="w3-table w3-bordered">
                                                        <tr>
                                                            <td><strong>Genre:</strong></td>
                                                            <td>{{ $child->genre }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Age:</strong></td>
                                                            <td>{{ $child->getAgeAttribute() }} ans</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Classe Française:</strong></td>
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
                                                            
                                                                <tr>
                                                                    @foreach ($child->registrations as $registration)
                                                                    <td>
                                                                    {{ $registration->course->label }}
                                                                    <ul>
                                                                        <li>{{ $registration->level->label }}</li>
                                                                    </ul>
                                                                    </td>
                                                                    @endforeach
                                                                </tr>
                                                           
                                                        @endif
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="w3-bar">
                                                @can('child-edit')
                                                    <button class="w3-button w3-ripple w3-yellow w3-small w3-left me-3"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-view-edit-child{{ $child->id }}">
                                                        <i class="fa-solid fa-pen-to-square"></i> {{ _('Modifier') }}
                                                    </button>
                                                @endcan
                                                @if (!$child->is_registered($child->id))
                                                    <a href="{{ route('step1.register.child', $child->id) }}"
                                                        class="w3-button w3-ripple w3-green w3-small w3-left">{{ _('Incription') }}</a>
                                                    <a href="#"
                                                        class="w3-button w3-ripple w3-indigo w3-small w3-right  w3-disabled">{{ _('Fiche d\'inscription') }}</a>
                                                @else
                                                    <a href="{{ route('step1.register.child', $child->id) }}"
                                                        class="w3-button w3-ripple w3-green w3-small w3-left w3-disabled">{{ _('Incription') }}</a>
                                                    <a href="#"
                                                        class="w3-button w3-ripple w3-indigo w3-small w3-right">{{ _('Fiche d\'inscription') }}</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.users.parents._modals.child-add-in-parent', ['user' => $parent])

    @foreach ($children as $child)
        @include('registrations._modals.fiche-registration', [
            'registrations' => $child->registrations,
            // 'level' => $child->registrations[0]->level,
            // 'course' => $child->registrations[0]->course,
            // 'total_amount' =>
            //     $child->registrations[0]->level->registration_fees + $child->registrations[0]->level->tarif,
        ])
        @include('admin.users.parents._modals.child-edit', ['child' => $child, 'user' => $child->parent])
        {{-- @include('admin.users.parents._modals.child-add-in-parent', ['user' => $child->parent]) --}}
    @endforeach
@endsection
