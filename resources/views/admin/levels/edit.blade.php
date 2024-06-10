@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modifier un niveau') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.levels.update', $level->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="label" class="col-md-4 col-form-label text-md-end">{{ __('Libelle') }}</label>

                                <div class="col-md-6">
                                    <input id="label" type="text" class="form-control @error('label') is-invalid @enderror"
                                        name="label" value="{{ $level->label }}" autocomplete="label" autofocus>

                                    @error('label')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="slug" class="col-md-4 col-form-label text-md-end">{{ __('Slug') }}</label>

                                <div class="col-md-6">
                                    <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror"
                                        name="slug" value="{{ $level->slug }}" autocomplete="slug" autofocus readonly>

                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tarif" class="col-md-4 col-form-label text-md-end">{{ __('Tarif') }}</label>

                                <div class="col-md-6">
                                    <input id="tarif" type="text" class="form-control @error('tarif') is-invalid @enderror"
                                        name="tarif" value="{{ $level->tarif }}" autocomplete="tarif">

                                    @error('tarif')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="registration_fees"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Frais d\'inscription') }}</label>

                                <div class="col-md-6">
                                    <input id="registration_fees" type="text"
                                        class="form-control @error('registration_fees') is-invalid @enderror"
                                        name="registration_fees" value="{{ $level->registration_fees }}" autocomplete="registration_fees">

                                    @error('registration_fees')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="hours" class="col-md-4 col-form-label text-md-end">{{ __('Horaires') }}</label>

                                <div class="col-md-6">
                                    <input id="hours" type="text" class="form-control @error('hours') is-invalid @enderror"
                                        name="hours" value="{{ $level->hours }}" autocomplete="hours">

                                    @error('hours')
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

