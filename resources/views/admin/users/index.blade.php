@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modal-create-users">{{ _('Ajouter un utilisateur') }}</button>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" aria-current="page" class="nav-link active" >{{_('Tous les utulisateurs')}}</a>
                          </li>
                        <li class="nav-item">
                          <a href="{{ route('admin.parents.list') }}" aria-current="page" class="nav-link" >{{_('Liste des parents')}}</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('admin.students.list') }}">{{_('Liste des adultes')}}</a>
                        </li>
                      </ul>
                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th class="bg-success text-light">Civilité</th>
                                <th class="bg-success text-light">Nom</th>
                                <th class="bg-success text-light">Prénom</th>
                                <th class="bg-success text-light">Email</th>
                                <th class="bg-success text-light">Téléphone</th>
                                <th class="bg-success text-light">Type</th>
                                <th class="bg-success text-light">Enfants</th>
                                <th class="bg-success text-light">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->civility }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{$user->type}}</td>
                                    @if ($user->type== 'parent' && $user->children->count() > 0)
                                        <td>
                                            <a href="{{ route('parent.children', $user->id) }}">{{ $user->children->count() }} enfant.s</a>
                                        </td>
                                    @else
                                        <td>0 enfant</td>
                                    @endif
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modal-show-users{{$user->id}}">{{ _('View') }}</button>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modal-edit-users{{$user->id}}">{{ _('Edit') }}</button>
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
    @include('admin.users._modal.create-users')
    @include('admin.users._modal.show-users', ['users' => $users])
    @include('admin.users._modal.edit-users', ['users' => $users])
@endsection
