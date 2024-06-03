@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>
                    <div class="card-body">
                        <a href="{{ route('admin.users.create') }}"><button class="btn btn-primary">Ajouter un
                                utilisateur</button></a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th>{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
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
