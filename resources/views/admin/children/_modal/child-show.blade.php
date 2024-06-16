{{-- @foreach ($childs as $child) --}}
<x-modal id="modal-view-detail-child{{$child->id}}">
    <x-slot name="title">{{ $child->firstname }} {{ $child->lastname }}</x-slot>
    <x-slot name="body">
        <table class="table">
            <thead> </thead>
            <tbody>
                <tr>
                    <th class="bg-success text-light">Genre</th>
                    <td></td>
                    <td> {{ $child->genre }} </td>
                </tr>
                <tr>
                    <th class="bg-success text-light">Nom</th>
                    <td></td>
                    <td> {{ $child->firstname }} </td>
                </tr>
                <tr>
                    <th class="bg-success text-light">Prénom</th>
                    <td></td>
                    <td> {{ $child->lastname }} </td>
                </tr>
                <tr>
                    <th class="bg-success text-light">Date de naissance</th>
                    <td></td>
                    <td> {{ $child->birthdate }} </td>
                </tr>
                <tr>
                    <th class="bg-success text-light">Classe Française</th>
                    <td></td>
                    <td> {{ $child->french_class }} </td>
                </tr>
                <tr>
                    <th class="bg-success text-light">Parent</th>
                    <td></td>
                    <td> <a
                            href="{{ route('admin.users.show', $child->parent->id) }}">{{ $child->parent->name }}</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </x-slot>
    <x-slot name="footer">
        {{-- <a href="{{ route('children.edit', $child->id) }}"><button class="btn btn-primary">{{ _('Editer') }}</button></a> --}}
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{_('Fermer') }}</button>
    </x-slot>
</x-modal>
{{-- @endforeach --}}