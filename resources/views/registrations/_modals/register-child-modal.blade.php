@php
    $parents = App\Models\User::where('type', 'parent')->get();
@endphp

<x-modal id="modal-register-child">
    <x-slot name="title">{{ _('Séléctionner ou crée un parent')}}</x-slot>
    <x-slot name="size">modal-lg</x-slot>
    <x-slot name="body">
    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="parent_id">{{ _('Parent') }}</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="">{{ _('Séléctionner un parent') }}</option>
                        @foreach ($parents as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->getFullNameAttribute() }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="parent_id">{{ _('Ou créer un parent') }}</label>
                    <a href="{{ route('step0.register.parent.create') }}" class="btn btn-primary btn-block">{{ _('Créer un parent') }}</a>
                </div>
            </div>
        </div>
    </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{_('Fermer') }}</button>
    </x-slot>
</x-modal>