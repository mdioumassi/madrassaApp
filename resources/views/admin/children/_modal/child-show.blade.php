<x-modal id="modal-view-detail-child{{$child->id}}">
    <x-slot name="size">modal-xl</x-slot>
    <x-slot name="title">{{ $child->firstname }} {{ $child->lastname }}</x-slot>
    <x-slot name="body">
        <div class="row">
            <div class="col-3">
                <img src="{{ $child->photo }}" class="img-fluid" alt="photo">
            </div>
            <div class="col">
                <table class="table">
                    <tbody>
                        <tr>
                            <th width="200px" class="bg-success text-light">Genre</th>
                            <td> {{ $child->genre }} </td>
                        </tr>
                        <tr>
                            <th class="bg-success text-light">Nom</th>
                            <td> {{ $child->firstname }} </td>
                        </tr>
                        <tr>
                            <th class="bg-success text-light">Prénom</th>
                            <td> {{ $child->lastname }} </td>
                        </tr>
                        <tr>
                            <th class="bg-success text-light">Age</th>
                            <td> {{ $child->getAgeAttribute() }} ans </td>
                        </tr>
                        <tr>
                            <th class="bg-success text-light">Classe Française</th>
                            <td> {{ $child->french_class }} </td>
                        </tr>
                        <tr>
                            {{-- <th class="bg-success text-light">Parent</th>
                            <td></td>
                            <td> <a
                                    href="{{ route('admin.users.show', $child->parent->id) }}">{{ $child->parent->name }}</a>
                            </td> --}}
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                @if ($child->registration == null)
                    <div class="alert alert-danger">Aucune inscription</div>
                @else
                <b>{{ strtoupper($child->registration->course->label) }}</b>
                    <ul>
                        <li>{{ $child->registration->level->label }}</li>
                    </ul>
                @endif
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        {{-- <a href="{{ route('children.edit', $child->id) }}"><button class="btn btn-primary">{{ _('Editer') }}</button></a> --}}
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{_('Fermer') }}</button>
    </x-slot>
</x-modal>