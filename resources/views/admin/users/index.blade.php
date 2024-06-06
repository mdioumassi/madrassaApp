@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>
                    <div class="card-body">
                        <a href="{{ route('admin.users.create') }}"><button class="btn btn-primary">Ajouter un utilisateur</button></a>
                        <a href="{{ route('admin.parents.list') }}"><button class="btn btn-success">Liste des parents</button></a>
                        <a href="{{ route('admin.students.list') }}"><button class="btn btn-success">Liste des etudiants</button></a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-success text-light">#</th>
                                <th class="bg-success text-light">Civilité</th>
                                <th class="bg-success text-light">Nom</th>
                                <th class="bg-success text-light">Prénom</th>
                                <th class="bg-success text-light">Email</th>
                                <th class="bg-success text-light">Téléphone</th>
                                <th class="bg-success text-light">Type</th>
                                <th class="bg-success text-light">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th>{{ $user->id }}</th>
                                    <td>{{ $user->civility }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->type }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary">{{ _('View') }}</a>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">{{ _('Edit') }}</a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
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
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
