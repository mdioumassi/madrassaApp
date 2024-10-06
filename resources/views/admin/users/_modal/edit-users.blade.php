@php
      $roles = \Spatie\Permission\Models\Role::all()->pluck('name', 'name');
      $userRole = $user->roles->pluck('name', 'name')->all();
@endphp
<x-modal id="modal-edit-users{{ $user->id }}">
    <x-slot name="title">{{ $user->name }} {{ $user->lastname }}</x-slot>
    <x-slot name="size">modal-xl</x-slot>
    <x-slot name="body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" id="form-create-user" enctype="multipart/form-data" class="w3-padding w3-light-grey">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col">
                    <label for="civility">{{ __('Civility') }}</label>
                    <select id="civility" class="form-select @error('civility') is-invalid @enderror" name="civility">
                        <option value="Mr" @if ($user->civility == 'Mr') selected @endif>Monsieur
                        </option>
                        <option value="Mme" @if ($user->civility == 'Mme') selected @endif>Madame
                        </option>
                        <option value="Mlle" @if ($user->civility == 'Mlle') selected @endif>
                            Mademoiselle</option>
                    </select>

                    @error('civility')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
      
                <div class="col">
                    <label for="type">{{ __('Type') }}</label>
                    <select id="type" class="form-select @error('type') is-invalid @enderror" name="type">
                        <option value="parent" @if ($user->type == 'parent') selected @endif>Parent
                        </option>
                        <option value="adulte" @if ($user->type == 'adulte') selected @endif>Adulte</option>
                        <option value="professeur" @if ($user->type == 'professeur') selected @endif>Professeur</option>
                        <option value="admin" @if ($user->type == 'admin') selected @endif>Admin</option>
                        <option value="webmaster" @if ($user->type == 'webmaster') selected @endif>Webmaster
                    </select>

                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="function">{{ __('Function') }}</label>
                    <input id="function" type="function" class="form-control @error('function') is-invalid @enderror"
                        name="function" value="{{ $user->function }}">

                    @error('function')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ $user->name }}">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="lastname">{{ __('Lastname') }}</label>
                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                        name="lastname" value="{{ $user->lastname }}">

                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="phone">{{ __('Phone') }}</label>
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                        name="phone" value="{{ $user->phone }}">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $user->email }}">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="full_address">{{ __('Full Address') }}</label>
                    <input id="full_address" type="text"
                        class="form-control @error('full_address') is-invalid @enderror" name="full_address"
                        value="{{ $user->full_address }}">

                    @error('full_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
               

                <div class="col">
                    <label for="confirm-password">{{ __('Confirm Password') }}</label>
                    <input id="confirm-password" type="password"
                        class="form-control @error('confirm-password') is-invalid @enderror"
                        name="confirm-password">

                    @error('confirm-password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="col">
                    <label for="roles">{{ __('Roles') }}</label>
                    <select name="roles[]" class="form-control" multiple="multiple">
                        @foreach ($roles as $value => $label)
                            <option value="{{ $value }}"
                                {{ isset($userRole[$value]) ? 'selected' : '' }}>
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
            <button type="submit" class="btn btn-primary">{{ _('Modifier') }}</button>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ _('Fermer') }}</button>
    </x-slot>
</x-modal>
