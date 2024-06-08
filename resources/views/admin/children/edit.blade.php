@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modifier un enfant') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('children.update', $child->id)}}">
                        @csrf
                        @method('PUT')
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
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror"
                                    name="firstname" value="{{ $child->firstname }}" required autocomplete="firstname" autofocus>

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
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                                    name="lastname" value="{{ $child->lastname }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-end">{{ __('Date de naissance') }}</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror"
                                    name="birthdate" value="{{ $child->birthdate }}" required autocomplete="birthdate" autofocus>

                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="french_class" class="col-md-4 col-form-label text-md-end">{{ __('Classe Française') }}</label>

                            <div class="col-md-6">
                                <input id="french_class" type="text" class="form-control @error('french_class') is-invalid @enderror"
                                    name="french_class" value="{{ $child->french_class }}" required autocomplete="french_class" autofocus>

                                @error('french_class')
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
