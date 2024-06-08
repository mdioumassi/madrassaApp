@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Mes enfants') }}</div>
                    <div class="card-body">
                        <h1>{{ $parent->lastname }} {{ $parent->name }}</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="bg-success text-light">Genre</th>
                                    <th class="bg-success text-light">Nom</th>
                                    <th class="bg-success text-light">Prénom</th>
                                    <th class="bg-success text-light">Date de naissance</th>
                                    <th class="bg-success text-light">Classe Française</th>
                                    <th class="bg-success text-light">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($children as $child)
                                    <tr>
                                        <td>{{ $child->genre }}</td>
                                        <td>{{ $child->firstname }}</td>
                                        <td>{{ $child->lastname }}</td>
                                        <td>{{ $child->birthdate }}</td>
                                        <td>{{ $child->french_class }}</td>
                                        <td>
                                            <a href="{{ route('children.show', $child->id) }}" class="btn btn-primary">{{ _('View') }}</a>
                                            <a href="{{ route('children.edit', $child->id) }}" class="btn btn-warning">{{ _('Edit') }}</a>
                                            <form action="{{ route('children.destroy', $child->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">{{ _('Delete') }}</button>
                                            </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('admin.parents.list') }}" class="btn btn-primary">{{ _('Liste des parents') }}</a>
                       {{--  <a href="{{ route('children.create', $child->parent->id) }}" class="btn btn-success">{{ _('Ajouter un enfant') }}</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
