@extends('layouts.app')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('registrations.children') }}">{{ _('Inscriptions') }}</a></li>
                <li class="breadcrumb-item">{{ $parent->getFullNameAttribute() }}</li>
                <li class="breadcrumb-item">{{ $child->getFullNameAttribute() }}</li>
                <li class="breadcrumb-item">{{ $level->label }}</li>
                <li class="breadcrumb-item active" aria-current="page">{{ _('Frais & Scolarité') }}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="w3-row mb-5">
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">1</span> Ajouter un parent
                </div>
                <div class="w3-col m2 tablink w3-bottombar  w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">2</span> Ajouter un enfant
                </div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green  w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">3</span> Choix d'une classe</div>
                <div
                    class="w3-col m2 tablink w3-bottombar w3-border-indigo  w3-green w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">4</span> Frais & Scolarité
                </div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">5</span> Paiement</div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">6</span> Recapitulatif</div>
            </div>
            <div class="col-12">
                <div class="w3-card-2 centered-element" style="width:80%;">
                    <header class="w3-container w3-indigo w3-padding w3-center">
                        <h3>{{ $level->label }} - {{ $course->label }}</h3>
                    </header>
                    <div class="w3-container w3-padding">
                        <div class="row">
                            <div class="col">
                                <table class="w3-table w3-bordered">
                                    <tr>
                                        <td class="w3-light-grey"><strong>Libellé</strong></td>
                                        <td class="w3-light-grey"><strong>Montant</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Frais d'inscription:</strong></td>
                                        <td>{{ $level->registration_fees }}€</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Frais de scolarité:</strong></td>
                                        <td>{{ $level->tarif }}€</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Montant total:</strong></td>
                                        <td><span
                                                class="display-1">{{ $level->registration_fees + $level->tarif }}€</span>/an
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('step3.register.schooling.post') }}" method="post">
                    @csrf
                    @php $total_amount = $level->registration_fees + $level->tarif; @endphp
                    <input type="hidden" name="payment_amount" value="{{ $total_amount }}">
                    <input type="hidden" name="childId" value="{{ $child->id }}">

                    <div class="mt-4 w3-center">
                        <button class="previous">&laquo; Précedent</button>
                        <button class="next" type="submit">Suivant &raquo;</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
