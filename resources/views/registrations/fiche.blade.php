@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="w3-row mb-5">
                <div class="w3-col m2 tablink w3-bottombar w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">1</span> Mon enfant </div>
                <div class="w3-col m2 tablink w3-bottombar  w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">2</span> Choix d'une classe</div>
                <div
                    class="w3-col m2 tablink w3-bottombar   w3-hover-border-green w3-hover-light-grey w3-padding">
                    <span class="w3-badge w3-indigo">3</span> Frais & Scolarité</div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">4</span> Paiement</div>
                <div class="w3-col m2 tablink w3-bottombar w3-hover-border-green w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">5</span> Recapitulatif</div>
                <div class="w3-col m2 tablink w3-bottombar  w3-border-indigo w3-green w3-hover-border-green w3-hover-light-grey w3-padding"><span
                        class="w3-badge w3-indigo">6</span> Fiche d'inscription</div>
            </div>
            <div class="col-12">
                <form action="{{route('step4.register.recap.post')}}" method="POST">
                    @csrf
                {{-- Bloc Enfant --}}
                <div class="w3-card centered-element mb-5" style="width:80%;">
                    <header class="w3-container w3-light-grey w3-padding"><h3>{{ $child->getFullNameAttribute()}}</h3></header>
                    <div class="w3-container w3-padding">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="https://www.w3schools.com/w3css/img_snowtops.jpg"
                                    alt="{{ $child->firstname }}" class="img-thumbnail"
                                    style="width: 200px; height: 200px;">
                            </div>
                            <div class="col-md-6">
                                <table class="w3-table w3-bordered">
                                    <tr>
                                        <td><strong>Sexe:</strong></td>
                                        <td>{{ $child->genre }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Age:</strong></td>
                                        <td>{{$child->getAgeAttribute()}} ans</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Classe Française:</strong></td>
                                        <td>{{ $child->french_class }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Niveau:</strong></td>
                                        <td>{{ $level->label }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Cours:</strong></td>
                                        <td>{{ $course->label }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <strong class="mb-3">Professeur:</strong> {{ $level->teacher->getFullNameAttribute() }}
                                <ul class="w3-ul w3-card">
                                    <li><strong>Email:</strong> {{ $level->teacher->email }}</li>
                                    <li> <strong>Téléphone:</strong> {{ $level->teacher->phone }}</li>
                                    <li> <strong>Fonction:</strong> {{ $level->teacher->function }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Bloc Classe --}}
                <div class="w3-card centered-element mb-5" style="width:80%;">
                    <header class="w3-container w3-light-grey w3-padding">
                        <h3>{{ $level->label }} - {{ $course->label }}</h3>
                    </header>
                    <div class="w3-container w3-padding">
                        <div class="row">
                            <div class="col">
                                <table class="w3-table w3-bordered">
                                    <tr>
                                        <td class="w3-blue-grey"><strong>Libellé</strong></td>
                                        <td class="w3-blue-grey"><strong>Montant</strong></td>
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
                                        <td><span>{{ $level->registration_fees + $level->tarif }}€</span>/an
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                  {{-- Bloc Paiement --}}
                  <div class="w3-card centered-element mb-5" style="width:80%;">
                    <header class="w3-container w3-light-grey w3-padding">
                        <h3>Moyen de paiement</h3>
                    </header>
                    <div class="w3-container w3-padding">
                        <div class="row">
                            <div class="col">
                                <table class="w3-table w3-bordered">
                                    <tr>
                                        <td class="w3-blue-grey"><strong>Libellé</strong></td>
                                        <td class="w3-blue-grey"><strong>Montant</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Montant total:</strong></td>
                                        <td>{{ $total_amount }}€</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Moyen de paiement:</strong></td>
                                        <td>{{ ucfirst($payment_method) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Date de paiement:</strong></td>
                                        <td>{{date('d-m-Y', strtotime($payment_date)) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Paiement status:</strong></td>
                                        <td><span class="badge w3-green">{{ ucfirst($payment_status) }}</span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
          
            </div>
            {{-- <div class="mt-3 w3-center">
                <button class="previous">&laquo; Précedent</button>
                <button class="next">Suivant &raquo;</button>
            </div> --}}
            <div class="w3-bar w3-center">
                <button class="w3-button w3-border w3-large">&laquo; Précedent</button>
                <a class="w3-button w3-green w3-large" href="{{route('parent.children.grille', $child->parent->id)}}">Inscrire un nouveau enfant</a>
                <button class="w3-button w3-red w3-large">Télécharger la fiche</button>
              </div>
        </form>
        </div>
    </div>
@endsection
