@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="w3-center">Mon enfant</h1>
                <div class="w3-card-4 centered-element" style="width:60%;">
                    <header class="w3-container w3-green w3-padding"><h3>{{ $child->getFullNameAttribute()}}</h3></header>
                    <div class="w3-container w3-padding">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="https://www.w3schools.com/w3css/img_snowtops.jpg"
                                    alt="{{ $child->firstname }}" class="img-thumbnail"
                                    style="width: 200px; height: 200px;">
                            </div>
                            <div class="col-md-8">
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
                        </div>
                    </div>
                </div>

                <h1 class="w3-center">Frais et scolarité</h1>
                <div class="w3-card-4 centered-element" style="width:60%;">
                    <header class="w3-container w3-indigo w3-padding"><h3>{{ $level->label }} - {{ $course->label}}</h3></header>
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
                                        <td class="display-1">{{ $level->registration_fees + $level->tarif }}€</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('step3.register.payment.post') }}" method="post">
                    @csrf
                    @php $total_amount = $level->registration_fees + $level->tarif; @endphp
                    <input type="hidden" name="payment" value="{{ $total_amount }}">
                    
                    <div class="mt-4 w3-center">
                        <button class="previous">&laquo; Précedent</button>
                        <button class="next" type="submit">Suivant &raquo;</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
