@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Editer un utilisateur') }}</div>
                    <div class="card-body">
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
                                        <option value="Parent" @if ($user->type == 'parent') selected @endif>Parent
                                        </option>
                                        <option value="etudiant" @if ($user->type == 'adulte') selected @endif>Adulte</option>
                                        <option value="professeur" @if ($user->type == 'professeur') selected @endif>Professeur</option>
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

                            <button type="submit" class="btn btn-primary">Editer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
