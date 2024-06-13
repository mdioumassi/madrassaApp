@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Liste des parents') }}</div>
                    <div class="card-body">
                        {{-- <a href="{{ route('admin.users.index') }}"><button class="btn btn-primary mb-3">Tous les utilisateurs</button></a> --}}
                        <a href="{{ route('children.index') }}"><button class="btn btn-success mb-3">Liste des enfants</button></a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="bg-success text-light">Civilité</th>
                                    <th class="bg-success text-light">Nom</th>
                                    <th class="bg-success text-light">Prénom</th>
                                    <th class="bg-success text-light">Email</th>
                                    <th class="bg-success text-light">Téléphone</th>
                                    <th class="bg-success text-light">Fonctions</th>
                                    <th class="bg-success text-light">Enfants</th>
                                    <th class="bg-success text-light">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parents as $parent)
                                    <tr>
                                        <td>{{ $parent->civility }}</td>
                                        <td>{{ $parent->name }}</td>
                                        <td>{{ $parent->lastname }}</td>
                                        <td>{{ $parent->email }}</td>
                                        <td>{{ $parent->phone }}</td>
                                        <td>{{ $parent->function }}</td>
                                        <td><a href="{{route('parent.children', $parent->id)}}">{{ $parent->children->count()}} enfant.s</a></td>
                                        <td>
                                            <a href="{{ route('admin.users.show', $parent->id) }}"
                                                class="btn btn-primary">{{ _('View') }}</a>
                                            <a href="{{ route('admin.users.edit', $parent->id) }}"
                                                class="btn btn-warning">{{ _('Edit') }}</a>
                                            <form action="{{ route('admin.users.destroy', $parent->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')">{{ _('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $parents->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection