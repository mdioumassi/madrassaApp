@extends('layouts.app')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">{{ _('Utilisateurs') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ _('Ajouter un utilisateur') }}</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header w3-green"><i class='fas fa-user-edit'></i> {{ __('Editer un utilisateur') }}</div>
                    <div class="card-body">
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
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="civility"
                                    class="col-md-4 col-form-label text-md-end ">{{ __('Civility') }}</label>

                                <div class="col-md-6">
                                    <select id="civility" class="form-select @error('civility') is-invalid @enderror"
                                        name="civility">
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
                            </div>

                            <div class="row mb-3">
                                <label for="type"
                                    class="col-md-4 col-form-label text-md-end ">{{ __('Type') }}</label>

                                <div class="col-md-6">
                                    <select id="type" class="form-select @error('type') is-invalid @enderror"
                                        name="type">
                                        <option value="parent" @if ($user->type == 'parent') selected @endif>Parent
                                        </option>
                                        <option value="adulte" @if ($user->type == 'adulte') selected @endif>Adulte
                                        </option>
                                        <option value="professeur" @if ($user->type == 'professeur') selected @endif>
                                            Professeur</option>
                                        <option value="admin" @if ($user->type == 'admin') selected @endif>Admin
                                        </option>
                                        <option value="webmaster" @if ($user->type == 'webmaster') selected @endif>
                                            Webmaster
                                    </select>

                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end ">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $user->name }}">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="lastname"
                                    class="col-md-4 col-form-label text-md-end ">{{ __('Lastname') }}</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text"
                                        class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                        value="{{ $user->lastname }}">

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="function"
                                    class="col-md-4 col-form-label text-md-end ">{{ __('Function') }}</label>

                                <div class="col-md-6">
                                    <input id="function" type="function"
                                        class="form-control @error('function') is-invalid @enderror" name="function"
                                        value="{{ $user->function }}">

                                    @error('function')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-end ">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ $user->phone }}">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="full_address"
                                    class="col-md-4 col-form-label text-md-end ">{{ __('Full Address') }}</label>

                                <div class="col-md-6">
                                    <input id="full_address" type="text"
                                        class="form-control @error('full_address') is-invalid @enderror"
                                        name="full_address" value="{{ $user->full_address }}">

                                    @error('full_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end ">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $user->email }}">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end ">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="confirm-password"
                                    class="col-md-4 col-form-label text-md-end ">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="confirm-password" type="password"
                                        class="form-control @error('confirm-password') is-invalid @enderror"
                                        name="confirm-password">

                                    @error('confirm-password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="roles"
                                    class="col-md-4 col-form-label text-md-end ">{{ __('Roles') }}</label>

                                <div class="col-md-6">
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

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Editer') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
