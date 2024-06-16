@foreach ($users as $user)
    <x-modal id="modal-show-users{{ $user->id }}">
        <x-slot name="title">{{$user->name}} {{$user->lastname}}</x-slot>
        <x-slot name="size">modal-lg</x-slot>
        <x-slot name="body">
            <table class="table">
                <thead> </thead>
                <tbody>
                    <tr>
                        <th class="bg-success text-light">Civilité</th>
                        <td></td>
                        <td> {{ $user->civility }} </td>
                    </tr>
                    <tr>
                        <th class="bg-success text-light">Type</th>
                        <td></td>
                        <td> {{ $user->type }} </td>
                    </tr>
                    <tr>
                        <th class="bg-success text-light">Fonction</th>
                        <td></td>
                        <td> {{ $user->function }} </td>
                    </tr>
                    <tr>
                        <th class="bg-success text-light">Nom</th>
                        <td></td>
                        <td> {{ $user->name }} </td>
                    </tr>
                    <tr>
                        <th class="bg-success text-light">Prénom</th>
                        <td></td>
                        <td> {{ $user->lastname }} </td>
                    </tr>
                    <tr>
                        <th class="bg-success text-light">Email</th>
                        <td></td>
                        <td> {{ $user->email }} </td>
                    </tr>
                    <tr>
                        <th class="bg-success text-light">Téléphone</th>
                        <td></td>
                        <td> {{ $user->phone }} </td>
                    </tr>
                    <tr>
                        <th class="bg-success text-light">Adresse</th>
                        <td></td>
                        <td> {{ $user->full_address }} </td>
                    </tr>
                    @if ($user->children->count() > 0)
                        <tr>
                            <th class="bg-success text-light">Enfants</th>
                            <td></td>
                            <td>
                                <a href="{{ route('parent.children', $user->id) }}">{{ $user->children->count() }}
                                    Enfants</a>
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </x-slot>
        <x-slot name="footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ _('Fermer') }}</button>
        </x-slot>
    </x-modal>
@endforeach
