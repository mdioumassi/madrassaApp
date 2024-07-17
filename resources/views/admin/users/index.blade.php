@extends('layouts.app')

@section('content')
    <div class="container">
        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ _('Utilisateurs') }}</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-light"><b><i class='far fa-user-circle'></i> {{ __('Les utilisateurs') }}</b></div>
                    <div class="card-body">
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modal-create-users"><i class="fa fa-plus"></i>
                            {{ _('Ajouter un utilisateur') }}</button> --}}
                        <div class="pull-right">
                            @can('user-create')
                                <a class="w3-button w3-green mb-2" href="{{ route('admin.users.create') }}"><i
                                        class="fa fa-plus"></i> {{ _('Ajouter un utlisateur') }}</a>
                            @endcan
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index') }}" aria-current="page"
                                    class="nav-link active">{{ _('Utulisateurs') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.parents.list') }}" aria-current="page"
                                    class="nav-link">{{ _('Parents') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.students.list') }}">{{ _('Adultes') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.teachers.list') }}">{{ _('Professeurs') }}</a>
                            </li>
                        </ul>
                        <table class="table table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th class="w3-green text-light">Civilité</th>
                                    <th class="w3-green text-light">Nom</th>
                                    <th class="w3-green text-light">Prénom</th>
                                    <th class="w3-green text-light">Email</th>
                                    <th class="w3-green text-light">Téléphone</th>
                                    <th class="w3-green text-light">Type</th>
                                    <th class="w3-green text-light">Roles</th>
                                    <th class="w3-green text-light">Enfants</th>
                                    <th class="w3-green text-light">Classes</th>
                                    <th class="w3-green text-light">Actions</th>
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
                                        <td>{{ $user->type }}</td>
                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $v)
                                                    <label class="badge bg-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->getUserType() == 'parent' && $user->children->count() > 0)
                                                <a href="{{ route('parent.children.list', $user->id) }}"> <span
                                                        class="badge w3-black">{{ $user->children->count() }}
                                                        enfant.s</span>
                                                </a>
                                            @endif
                                            @if ($user->getUserType() == 'parent' && $user->children->count() == 0)
                                                <span class="badge w3-black"> 0 enfant</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->getUserType() == 'professeur' && $user->levels()->count() > 0)
                                                <a href="{{ route('admin.teachers.levels.list', $user->id) }}">
                                                    <span class="badge w3-black">{{ $user->levels()->count() }}
                                                        niveaux</span>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modal-show-users{{ $user->id }}"><i
                                                    class="fa-solid fa-list"></i> {{ _('View') }}</button>
                                            @can('user-edit')
                                                <a class="btn btn-warning btn-sm"
                                                    href="{{ route('admin.users.edit', $user->id) }}"><i
                                                        class="fa-solid fa-pen-to-square"></i> {{ _('Edit') }}</a>
                                            @endcan
                                            @can('user-delete')
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure?')"><i
                                                            class="fa-solid fa-trash"></i>
                                                        {{ _('Delete') }}</button>
                                                </form>
                                            @endcan
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
    </div>
    @include('admin.users._modal.create-users', ['roles' => $roles])
    @foreach ($users as $user)
        @include('admin.users._modal.show-users', ['user' => $user])
        @include('admin.users._modal.edit-users', ['user' => $user])
        @include('admin.children._modal.child-add-in-parent', ['user' => $user])
    @endforeach
@endsection
