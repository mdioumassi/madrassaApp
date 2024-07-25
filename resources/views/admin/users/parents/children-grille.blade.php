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
                                            <div class="row">
                                                <div class="col-11">
                                                    <h1>{{ $child->getFullNameAttribute() }}</h1>
                                                </div>
                                                <div class="col">
                                                    @can('child-edit')
                                                        <a href="" data-bs-toggle="modal"
                                                            data-bs-target="#modal-view-edit-child{{ $child->id }}">
                                                            <i class='fas fa-edit' style='font-size:24px; margin-top:17px'></i>
                                                        </a>
                                                    @endcan
                                                </div>
                                            </div>
                                        </header>
                                        <div class="w3-container">
                                            <div class="row">
                                                <div class="col-3 w3-padding">
                                                    <img src="/photos/{{ $child->photo }}" alt="{{ $child->firstname }}"
                                                        class="img-thumbnail img-fluid"
                                                        style="width: 200px;">
                                                </div>
                                                <div class="col-5">
                                                    <table class="w3-table w3-bordered">
                                                        <tr>
                                                            <td><strong>Genre:</strong></td>
                                                            <td>{!! $child->getGenre() !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Age:</strong></td>
                                                            <td>{{ $child->getAgeAttribute() }}ans</td>
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
                                                        @if ($child->registration)
                                                            <div class="accordion accordion-flush"
                                                                id="accordion{{ $child->registration->id }}">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header"
                                                                        id="flush-headingOne{{ $child->registration->id }}">
                                                                        @if ($child->registration->payment_status == 'paid')
                                                                            <button
                                                                                class="accordion-button w3-panel w3-light-green w3-leftbar w3-padding"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#flush-collapseOne{{ $child->registration->id }}"
                                                                                aria-expanded="false"
                                                                                aria-controls="flush-collapseOne{{ $child->registration->id }}">
                                                                                <b class="w3-center">PAIEMENT & INSCRIPTION</b>
                                                                            </button>
                                                                        @else
                                                                            <button
                                                                                class="accordion-button collapsed w3-panel w3-red w3-leftbar w3-padding"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#flush-collapseOne{{ $child->registration->id }}"
                                                                                aria-expanded="false"
                                                                                aria-controls="flush-collapseOne{{ $child->registration->id }}">
                                                                                <b class="w3-center">PAIEMENT & INSCRIPTION</b>
                                                                            </button>
                                                                        @endif
                                                                    </h2>
                                                                    <div id="flush-collapseOne{{ $child->registration->id }}"
                                                                        class="accordion-collapse collapse"
                                                                        aria-labelledby="flush-headingOne{{ $child->registration->id }}"
                                                                        data-bs-parent="#accordion{{ $child->registration->id }}">
                                                                        <div class="accordion-body">
                                                                            <table class="w3-table w3-bordered">
                                                                                <tr>
                                                                                    <td><strong>Date d'inscription:</strong></td>
                                                                                    <td>{{ date('d-m-Y', strtotime($child->registration->registration_date)) }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><strong>Paiement:</strong></td>
                                                                                    <td>{{ $child->registration->payment_amount }}€</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><strong>Paiement status:</strong></td>
                                                                                    <td>{!! $child->registration->getPaymentStatus() !!}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><strong>Paiement methode:</strong></td>
                                                                                    <td>{!! $child->registration->getPaymentMethod() !!}</td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </table>
                                                </div>
                                                <div class="col-4">
                                                    @if ($child->registration)
                                                        <b>{{ strtoupper($child->registration->course->label) }}</b>
                                                        <ul>
                                                            <li>{{ $child->registration->level->label }}</li>
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <footer class="w3-container w3-padding w3-light-grey">
                                            <div class="w3-bar">
                                                @if (!$child->is_registered($child->id))
                                                    <a href="{{ route('step1.register.child', $child->id) }}"
                                                        class="w3-button w3-ripple w3-green w3-small w3-left">{{ _('Incription') }}</a>
                                                    <a href="#"
                                                        class="w3-button w3-ripple w3-indigo w3-small w3-right  w3-disabled">{{ _('Fiche d\'inscription') }}</a>
                                                @else
                                                    <a href="{{ route('step1.register.child', $child->id) }}"
                                                        class="w3-button w3-ripple w3-green w3-small w3-left w3-disabled">{{ _('Incription') }}</a>
                                                    <button class="w3-button w3-ripple w3-indigo w3-small w3-right"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-fiche-registration{{ $child->registration->id }}">{{ _('Fiche d\'inscription') }}</button>
                                                @endif
                                            </div>
                                        </footer>
                                    </div>
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
        @include('admin.children._modal.child-edit', ['child' => $child])
        @if ($child->registration)
            @include('registrations._modals.fiche-registration', ['registration' => $child->registration])
        @endif
    @endforeach
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