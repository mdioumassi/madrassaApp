<x-modal id="modal-add-parent-child{{ $user->id }}">
    <x-slot name="title">{{ _('Ajouter un enfant') }}</x-slot>
    <x-slot name="size">modal-lg</x-slot>
    <x-slot name="body">
        <form method="POST" action="{{ route('child.parent.store', $user->id) }}">
            @csrf
            <div class="row mb-3">
                <label for="genre" class="col-md-4 col-form-label text-md-end">{{ __('Genre') }}</label>

                <div class="col-md-6">
                    <select id="genre" class="form-select @error('genre') is-invalid @enderror" name="genre">
                        <option value="G">Garçon</option>
                        <option value="F">Fille</option>
                    </select>

                    @error('genre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="firstname" class="col-md-4 col-form-label text-md-end">{{ __('Prénom') }}</label>

                <div class="col-md-6">
                    <input id="firstname" type="text"
                        class="form-control @error('firstname') is-invalid @enderror" name="firstname" required
                        autocomplete="firstname" autofocus>

                    @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                <div class="col-md-6">
                    <input id="lastname" type="text"
                        class="form-control @error('lastname') is-invalid @enderror" name="lastname" required
                        autocomplete="lastname" autofocus>

                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="birthdate"
                    class="col-md-4 col-form-label text-md-end">{{ __('Date de naissance') }}</label>

                <div class="col-md-6">
                    <input id="birthdate" type="date"
                        class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" required
                        autocomplete="birthdate" autofocus>

                    @error('birthdate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="french_class"
                    class="col-md-4 col-form-label text-md-end">{{ __('Classe Française') }}</label>

                <div class="col-md-6">
                    <input id="french_class" type="text"
                        class="form-control @error('french_class') is-invalid @enderror" name="french_class"
                        required autocomplete="french_class" autofocus>

                    @error('french_class')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Ajouter') }}
                    </button>
                </div>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ _('Fermer') }}</button>
    </x-slot>
</x-modal>
