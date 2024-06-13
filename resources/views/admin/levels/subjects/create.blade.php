@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ajouter une matière') }}</div>

                    <div class="card-body">
                        <h2 class="rounded mb-5 text-center bg-success text-light">{{ $level->label }}</h2>

                        <form method="POST" action="{{ route('admin.levels.subjects.store', $level->id) }}">
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
                                <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Commentaire') }}</label>

                                <div class="col-md-6">
                                    <textarea id="comment" class="form-control @error('description') is-invalid @enderror" name="comment"></textarea>

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