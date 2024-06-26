@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ $child->firstname }} {{$child->lastname }}</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <table class="table">
                                    <thead> </thead>
                                    <tbody>
                                        <tr>
                                            <th class="bg-success text-light">Genre</th>
                                            <td></td>
                                            <td> {{ $child->genre }} </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-success text-light">Nom</th>
                                            <td></td>
                                            <td> {{ $child->firstname }} </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-success text-light">Prénom</th>
                                            <td></td>
                                            <td> {{ $child->lastname }} </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-success text-light">Date de naissance</th>
                                            <td></td>
                                            <td> {{ $child->birthdate }} </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-success text-light">Classe Française</th>
                                            <td></td>
                                            <td> {{ $child->french_class }} </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-success text-light">Parent</th>
                                            <td></td>
                                            <td> <a
                                                    href="{{ route('admin.users.show', $child->parent->id) }}">{{ $child->parent->name }}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-success text-light">Créé le</th>
                                            <td></td>
                                            <td> {{ $child->created_at }} </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-success text-light">Modifié le</th>
                                            <td></td>
                                            <td> {{ $child->updated_at }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="{{ route('children.edit', $child->id) }}"><button
                                class="btn btn-primary">Editer</button></a>
                        <a href="{{ route('children.index') }}"><button class="btn btn-primary">Retour</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
