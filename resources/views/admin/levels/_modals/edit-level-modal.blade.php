<x-modal id="edit-level-modal{{$level->id}}">
    <x-slot name="title">{{ _('')}}</x-slot>
    <x-slot name="size">modal-lg</x-slot>
    <x-slot name="body">
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{_('Fermer') }}</button>
    </x-slot>
</x-modal>