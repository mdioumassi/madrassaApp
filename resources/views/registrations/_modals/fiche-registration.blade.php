    <x-modal id="modal-fiche-registration{{ $registration->id }}">
        <x-slot name="title">{{ _('Fiche d\'inscription') }}</x-slot>
        <x-slot name="size">modal-xl</x-slot>
        <x-slot name="body">
            <div class="container">
                <div class="row">
                    <div class="col">
                        {{-- Bloc Parent --}}
                        <div class="w3-card centered-element mb-5">
                            <header class="w3-container w3-light-grey">
                                <h3><span class="badge w3-green">Parent</span>  {{ $registration->child->parent->getFullNameAttribute() }}</h3>
                            </header>
                            <div class="w3-container w3-padding">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="/avatars/{{ $registration->child->parent->avatar }}" alt="{{ $registration->child->parent->firstname }}"
                                        class="img-thumbnail img-fluid"
                                        style="width: 200px;">
                                    </div>
                                    <div class="col">
                                        <table class="w3-table w3-bordered">
                                            <tr>
                                                <td class="w3-blue-grey"><strong>Civilité:</strong></td>
                                                <td>{{ $registration->child->parent->civility }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w3-blue-grey"><strong>Type:</strong></td>
                                                <td>{{ $registration->child->parent->type }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w3-blue-grey"><strong>Profession:</strong></td>
                                                <td>{{ $registration->child->parent->function }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w3-blue-grey"><strong>Email:</strong></td>
                                                <td>{{ $registration->child->parent->email }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w3-blue-grey"><strong>Téléphone:</strong></td>
                                                <td>{{ $registration->child->parent->phone}}</td>
                                            </tr>
                                            <tr>
                                                <td class="w3-blue-grey"><strong>Adresse:</strong></td>
                                                <td>{{ $registration->child->parent->full_address }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Bloc Enfant --}}
                        <div class="w3-card centered-element mb-5">
                            <header class="w3-container w3-light-grey">
                                <h3><span class="badge w3-green">Enfant</span>  {{ $registration->child->getFullNameAttribute() }}</h3>
                            </header>
                            <div class="w3-container w3-padding">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="/photos/{{ $registration->child->photo }}" alt="{{ $registration->child->firstname }}"
                                        class="img-thumbnail img-fluid"
                                        style="width: 200px;">
                                    </div>
                                    <div class="col">
                                        <table class="w3-table w3-bordered">
                                            <tr>
                                                <td class="w3-blue-grey"><strong>Sexe:</strong></td>
                                                <td>{{ $registration->child->genre }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w3-blue-grey"><strong>Age:</strong></td>
                                                <td>{{ $registration->child->getAgeAttribute() }} ans</td>
                                            </tr>
                                            <tr>
                                                <td class="w3-blue-grey"><strong>Classe Française:</strong></td>
                                                <td>{{ $registration->child->french_class }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w3-blue-grey"><strong>Niveau:</strong></td>
                                                <td>{{ $registration->level->label }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w3-blue-grey"><strong>Cours:</strong></td>
                                                <td>{{ $registration->course->label }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Bloc Classe --}}
                        <div class="w3-card centered-element mb-5">
                            <header class="w3-container w3-light-grey">
                                <h3>{{ $registration->level->label }} - {{ $registration->course->label }}</h3>
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
                                                <td>{{ $registration->level->registration_fees }}€</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Frais de scolarité:</strong></td>
                                                <td>{{ $registration->level->tarif }}€</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Montant total:</strong></td>
                                                <td><span>{{ $registration->level->registration_fees + $registration->level->tarif }}€</span>/an
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <strong class="mb-3">Professeur:</strong>
                                        {{ $registration->level->teacher->getFullNameAttribute() }}
                                        <ul class="w3-ul w3-card">
                                            <li><strong>Email:</strong> {{ $registration->level->teacher->email }}</li>
                                            <li> <strong>Téléphone:</strong> {{ $registration->level->teacher->phone }}
                                            </li>
                                            <li> <strong>Fonction:</strong>
                                                {{ $registration->level->teacher->function }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Bloc Paiement --}}
                        <div class="w3-card centered-element mb-5">
                            <header class="w3-container w3-light-grey">
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
                                                <td>{{$registration->payment_amount}}€</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Moyen de paiement:</strong></td>
                                                <td>{{ ucfirst($registration->payment_method) }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Date de paiement:</strong></td>
                                                <td>{{ date('d-m-Y', strtotime($registration->payment_date)) }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Paiement status:</strong></td>
                                                <td>{!! $registration->getPaymentStatus() !!}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ _('Fermer') }}</button>
        </x-slot>
    </x-modal>
