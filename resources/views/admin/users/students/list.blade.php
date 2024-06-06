@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Liste des students') }}</div>
                    <div class="card-body">
                        <a href="{{ route('admin.users.index') }}"><button class="btn btn-primary mb-3">Tous les utilisateurs</button></a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="bg-success text-light">#</th>
                                    <th class="bg-success text-light">Civilité</th>
                                    <th class="bg-success text-light">Nom</th>
                                    <th class="bg-success text-light">Prénom</th>
                                    <th class="bg-success text-light">Email</th>
                                    <th class="bg-success text-light">Téléphone</th>
                                    <th class="bg-success text-light">Fonction</th>
                                    <th class="bg-success text-light">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <th>{{ $student->id }}</th>
                                        <td>{{ $student->civility }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->lastname }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->function }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.show', $student->id) }}"
                                                class="btn btn-primary">{{ _('View') }}</a>
                                            <a href="{{ route('admin.users.edit', $student->id) }}"
                                                class="btn btn-warning">{{ _('Edit') }}</a>
                                            <form action="{{ route('admin.users.destroy', $student->id) }}" method="POST"
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
                        {!! $students->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection