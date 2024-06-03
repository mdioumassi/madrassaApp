@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Détails de l\'utilisateur') }}</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
                        </div>
                        <div class="form-group row">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                        </div>
                        <div class="form-group row">
                            <label for="created_at">Créé le</label>
                            <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $user->created_at }}" readonly>
                        </div>
                        <div class="form-group row">
                            <label for="updated_at">Modifié le</label>
                            <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $user->updated_at }}" readonly>
                        </div>
                        <a href="{{ route('admin.users.edit', $user->id) }}"><button class="btn btn-primary">Editer</button></a>
                        <a href="{{ route('admin.users.index') }}"><button class="btn btn-primary">Retour</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection