@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modifier un cours') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.courses.update', $course->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="label" class="col-md-4 col-form-label text-md-end">{{ __('Libellé') }}</label>

                                <div class="col-md-6">
                                    <input id="label" type="text" class="form-control @error('label') is-invalid @enderror"
                                        name="label" value="{{ $course->label }}" autocomplete="label" autofocus>

                                    @error('label')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                                        name="description" autocomplete="description" autofocus>{{ $course->comment }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-primary">Annuler</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection