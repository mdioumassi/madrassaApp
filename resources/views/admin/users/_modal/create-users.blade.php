<x-modal id="modal-create-users">
    <x-slot name="title">{{ _('Ajouter un utilisateur')}}</x-slot>
    <x-slot name="size">modal-lg</x-slot>
    <x-slot name="body">
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div class="row mb-3">
                <label for="civility" class="col-md-4 col-form-label text-md-end">{{ __('Civility') }}</label>

                <div class="col-md-6">
                    <select id="civility" class="form-select @error('civility') is-invalid @enderror" name="civility">
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
            </div>


            <div class="row mb-3">
                <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('Type') }}</label>

                <div class="col-md-6">
                    <select id="type" class="form-select @error('type') is-invalid @enderror" name="type">
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
            </div>


            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Lastname') }}</label>

                <div class="col-md-6">
                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" autocomplete="lastname" autofocus>

                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="full_address" class="col-md-4 col-form-label text-md-end">{{ __('Full Address') }}</label>

                <div class="col-md-6">
                    <input id="full_address" type="text" class="form-control @error('full_address') is-invalid @enderror" name="full_address" value="{{ old('full_address') }}" autocomplete="full_address" autofocus>

                    @error('full_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="function" class="col-md-4 col-form-label text-md-end">{{ __('Function') }}</label>

                <div class="col-md-6">
                    <input id="function" type="text" class="form-control @error('function') is-invalid @enderror" name="function" value="{{ old('function') }}" autocomplete="function" autofocus>

                    @error('function')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="confirm-password" autocomplete="new-password">
                </div>
            </div>

            <div class="row mb-3">
                <label for="roles" class="col-md-4 col-form-label text-md-end">{{ __('Roles') }}</label>

                <div class="col-md-6">
                    <select id="roles" class="form-select @error('roles') is-invalid @enderror" name="roles[]" multiple>
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
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{_('Fermer') }}</button>
    </x-slot>
</x-modal>