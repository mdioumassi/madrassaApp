<x-modal id="modal-create-users">
    <x-slot name="title">{{ _('Ajouter un utilisateur') }}</x-slot>
    <x-slot name="size">modal-xl</x-slot>
    <x-slot name="body">
        <form method="POST" action="{{ route('admin.users.store') }}" id="form-create-user" enctype="multipart/form-data" class="w3-padding w3-light-grey">
            @csrf
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="civility">{{ __('Civilité') }}:</label>
                    <select id="civility" class="form-select @error('civility') is-invalid @enderror" name="civility">
                        <option value='' selected="selected">--Selectionner--</option>
                        <option value="Mr">Monsieur</option>
                        <option value="Mme">Madame</option>
                        <option value="Mlle">Mademoiselle</option>
                    </select>

                    @error('civility')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="type">{{ __('Type') }}:</label>
                    <select id="type" class="form-select @error('type') is-invalid @enderror" name="type">
                        <option value='' selected="selected">--Selectionner--</option>
                        <option value="parent">Parent</option>
                        <option value="adulte">Adulte</option>
                        <option value="professeur">Professeur</option>
                        <option value="admin">Admin</option>
                        <option value="webmaster">Webmaster</option>
                    </select>

                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="function">{{ __('Fonction') }}:</label>
                    <input id="function" type="text" class="form-control @error('function') is-invalid @enderror"
                        name="function" value="{{ old('function') }}" autocomplete="function" autofocus>

                    @error('function')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <label for="name">{{ __('Prénom') }}:</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="lastname">{{ __('Nom') }}:</label>
                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                        name="lastname" value="{{ old('lastname') }}" autocomplete="lastname" autofocus>

                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <label for="email">{{ __('Adresse E-Mail') }}:</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="phone">{{ __('Téléphone') }}:</label>
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                        name="phone" value="{{ old('phone') }}" autocomplete="phone">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <label for="full_address">{{ __('Adresse complète') }}:</label>
                    <input id="full_address" type="text"
                        class="form-control @error('full_address') is-invalid @enderror" name="full_address"
                        value="{{ old('full_address') }}" autocomplete="address">

                    @error('full_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <label for="password">{{ __('Mot de passe') }}:</label>
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password"
                        autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="password-confirm">{{ __('Confirmation de mot de passe') }}:</label>
                    <input id="password-confirm" type="password" class="form-control" name="confirm-password"
                        autocomplete="new-password">
                </div>
                <div class="col">
                    <label for="roles">{{ __('Roles') }}</label>
                    <select id="roles" class="form-select @error('roles') is-invalid @enderror" name="roles[]"
                        multiple>
                        @foreach ($roles as $value => $label)
                            <option value="{{ $value }}">
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>

                    @error('roles')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Valider') }}
                    </button>
                </div>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ _('Fermer') }}</button>
    </x-slot>
</x-modal>
