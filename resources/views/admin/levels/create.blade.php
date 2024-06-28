@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ajouter un niveau') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.levels.store') }}">
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
                                <label for="tarif" class="col-md-4 col-form-label text-md-end">{{ __('Tarif') }}</label>

                                <div class="col-md-6">
                                    <input id="level" type="text" class="form-control @error('tarif') is-invalid @enderror"
                                    name="tarif">

                                    @error('tarif')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="registration_fees" class="col-md-4 col-form-label text-md-end">{{ __('Frais d\'inscription') }}</label>

                                <div class="col-md-6">
                                    <input id="registration_fees" type="text" class="form-control @error('registration_fees') is-invalid @enderror" name="registration_fees">

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
                                    <input id="hours" type="text" class="form-control @error('registration_fees') is-invalid @enderror" name="hours">

                                    @error('hours')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Commentaire') }}</label>

                                <div class="col-md-6">
                                    <textarea id="comment" class="form-control @error('comment') is-invalid @enderror"
                                        name="comment" autocomplete="comment" autofocus></textarea>

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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection