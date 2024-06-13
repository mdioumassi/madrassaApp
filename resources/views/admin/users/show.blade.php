@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ $user->name }} {{ $user->lastname }}</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <table class="table">
                                    <thead> </thead>
                                    <tbody>
                                        <tr><th class="bg-success text-light">Civilité</th><td></td><td> {{ $user->civility }} </td></tr>
                                        <tr><th class="bg-success text-light">Type</th><td></td><td> {{ $user->type }} </td></tr>
                                        <tr><th class="bg-success text-light">Fonction</th><td></td><td> {{ $user->function }} </td></tr>
                                        <tr><th class="bg-success text-light">Nom</th><td></td><td> {{ $user->name }} </td></tr>
                                        <tr><th class="bg-success text-light">Prénom</th><td></td><td> {{ $user->lastname }} </td></tr>
                                        <tr><th class="bg-success text-light">Email</th><td></td><td> {{ $user->email }} </td></tr>
                                        <tr><th class="bg-success text-light">Téléphone</th><td></td><td> {{ $user->phone }} </td></tr>
                                        <tr><th class="bg-success text-light">Adresse</th><td></td><td> {{ $user->full_address }} </td></tr>
                                        <tr><th class="bg-success text-light">Enfants</th><td></td><td>
                                             <a href="{{ route('parent.children', $user->id)}}">{{ $user->children->count()}} Enfants</a> 
                                        </td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h4>Enfants</h4>
                                <ul>
                                    @foreach ($user->children as $child)
                                        <li>{{ $child->name }} {{ $child->lastname }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <a href="{{ route('admin.users.edit', $user->id) }}"><button class="btn btn-primary">Editer</button></a>
                        <a href="{{ route('admin.users.index') }}"><button class="btn btn-primary">Retour</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection