<x-modal id="modal-level-edit{{ $level->id }}">
    <x-slot name="size">modal-lg</x-slot>
    <x-slot name="title">{{ $level->label }}"</x-slot>
    <x-slot name="body">
        <form action="{{ route('admin.levels.update', $level) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="label">{{ _('Niveau') }}</label>
                <input type="text" name="label" id="label" class="form-control" value="{{ $level->label }}">
            </div>
            <div class="form-group mb-3">
                <label for="description">{{ _('Description') }}</label>
                <textarea name="description" id="description" class="form-control"
                    rows="3">{{ $level->description }}</textarea>
            </div>
            <input type="hidden" name="grille" value="teacher">
            <button class="btn btn-primary" type="submit">Modifier</button>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ _('Fermer') }}</button>
    </x-slot>
</x-modal>
