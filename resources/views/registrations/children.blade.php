@extends('layouts.app')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ _('Inscriptions') }}</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-light"><b><i class="fa fa-group"></i>
                            {{ __('Les inscriptions') }}</b></div>
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="{{ route('registrations.children') }}" aria-current="page"
                                    class="nav-link active">{{ _('Inscriptions enfants') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('registrations.adults') }}">{{ _('Inscriptions adultes') }}</a>
                            </li>
                        </ul>
                        {{-- <a href="{{route('step0.register.parent.create')}}" class="w3-button w3-green mt-3 mb-2">Inscrire un enfant </a> --}}
                        <a class="w3-button w3-green mt-3 mb-2" href="" data-bs-target="#modal-register-child"
                            data-bs-toggle="modal">Inscrire un enfant</a>
                        <table class="table table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th class="w3-green text-light">Genre</th>
                                    <th class="w3-green text-light">Enfant</th>
                                    <th class="w3-green text-light">Parent</th>
                                    <th class="w3-green text-light">Cours</th>
                                    <th class="w3-green text-light">Date d'inscription</th>
                                    <th class="w3-green text-light">Paiement méthode</th>
                                    <th class="w3-green text-light">Paiement status</th>
                                    <th class="w3-green text-light">Inscription status</th>
                                    <th class="w3-green text-light">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($registrations->count() == 0)
                                    <tr>
                                        <td colspan="7" class="text-center">Aucune inscription trouvée</td>
                                    </tr>
                                @endif
                                @foreach ($registrations as $registration)
                                    <tr>
                                        <td class="w3-center">{!! $registration->child->getGenre() !!}</td>
                                        <td>{{ $registration->child->getFullNameAttribute() }}</td>
                                        <td>{{ $registration->child->parent->getFullNameAttribute() }}</td>
                                        <td>{{ $registration->course->label }}</td>
                                        <td>{{ date('d-m-Y', strtotime($registration->registration_date)) }}</td>
                                        <td>{!! $registration->getPaymentMethod() !!}</td>
                                        <td>{!! $registration->getPaymentStatus() !!}</td>
                                        <td>{!! $registration->getRegistrationStatus() !!}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modal-show-users"><i class="fa-solid fa-list"></i>
                                                {{ _('Voir') }}</button>
                                            <a class="btn btn-warning btn-sm"
                                                href="{{ route('registrations.edit', $registration->id) }}"><i
                                                    class="fa-solid fa-pen-to-square"></i> Edit</a>
                                            @if ($registration->child->is_registered($registration->child->id))
                                                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modal-fiche-registration{{ $registration->id }}">
                                                    <i class="fa fa-drivers-license-o"></i> {{ _('Fiche') }}</button>
                                            @else
                                                <a class="w3-button w3-black"
                                                    href="{{ route('step1.register.child.create', $registration->parent->id) }}">{{ _('Inscrire') }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('registrations._modals.register-child-modal')
    @foreach ($registrations as $registration)
        @include('registrations._modals.fiche-registration', ['registration' => $registration])
        @include('admin.users.parents._modals.child-edit', [
            'child' => $registration->child,
            'user' => $registration->child->parent,
        ])
    @endforeach
@endsection
