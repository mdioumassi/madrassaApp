<x-modal id="show-children-level-modal{{$level->id}}">
    <x-slot name="title">Mes élèves</x-slot>
    <x-slot name="size">modal-xl</x-slot>
    <x-slot name="body">
       <table class="table table-bordered">
        <thead>
            <tr>
                <th class="w3-green text-light">Genre</th>
                <th class="w3-green text-light">Nom</th>
                <th class="w3-green text-light">Prénom</th>
                <th class="w3-green text-light">Age</th>
                <th class="w3-green text-light">Parent</th>
            </tr>
        </thead>
        <tbody>
            @if ($level->registrations->count() == 0)
                <tr>
                    <td colspan="6" class="text-center">Aucun élève trouvé</td>
                </tr>
            @endif
            @foreach ($level->registrations as $registration)
                <tr>
                    <td>{{ $registration->child->genre }}</td>
                    <td>{{ $registration->child->firstname }}</td>
                    <td>{{ strtoupper($registration->child->lastname) }}</td>
                    <td>{{ $registration->child->getAgeAttribute() }} ans</td>
                    <td>
                       {{ $registration->child->parent->getFullNameAttribute() }},
                       {{ $registration->child->parent->email }},
                       {{ $registration->child->parent->phone }}
                    </td>
                </tr>
                {{-- @endif --}}
            @endforeach
        </tbody>
       </table>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{_('Fermer') }}</button>
    </x-slot>
</x-modal>