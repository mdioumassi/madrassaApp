<x-modal id="add-subject-modal{{$level->id}}">
    <x-slot name="title">{{ _('Ajouter une matière')}}</x-slot>
    <x-slot name="size">modal-lg</x-slot>
    <x-slot name="body">
        <form method="POST" action="{{ route('admin.levels.subjects.store', $level->id) }}">
            @csrf

            <div class="row mb-3">
                <label for="label" class="col-md-4 col-form-label text-md-end">{{ __('Label') }}</label>

                <div class="col-md-6">
                    <input id="label" type="text" class="form-control @error('label') is-invalid @enderror"
                        name="label" autocomplete="label" autofocus>

                    @error('label')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Commentaire') }}</label>

                <div class="col-md-6">
                    <textarea id="comment" class="form-control @error('description') is-invalid @enderror" name="comment"></textarea>

                    @error('comment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Ajouter') }}
                    </button>
                </div>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{_('Fermer') }}</button>
    </x-slot>
</x-modal>