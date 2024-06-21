@extends('layouts.app')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">{{ _('Utilisateurs') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ _('Parents') }}</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><span class="bg-success py-2 px-3 text-light rounded">Utilisateurs</span>
                        {{ __('Parents') }}</div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modal-create-users">{{ _('Ajouter un parent') }}</button>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" aria-current="page"
                                class="nav-link">{{ _('Utilisateurs') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.parents.list') }}" aria-current="page"
                                class="nav-link active">{{ _('Parents') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.students.list') }}">{{ _('Adultes') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.teachers.list') }}">{{ _('Professeurs') }}</a>
                        </li>
                    </ul>
                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th class="bg-success text-light">ID</th>
                                <th class="bg-success text-light">Civilité</th>
                                <th class="bg-success text-light">Nom</th>
                                <th class="bg-success text-light">Prénom</th>
                                <th class="bg-success text-light">Email</th>
                                <th class="bg-success text-light">Téléphone</th>
                                <th class="bg-success text-light">Enfants</th>
                                <th class="bg-success text-light">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->count() == 0)
                                <tr>
                                    <td colspan="7" class="text-center">Aucun utilisateur trouvé</td>
                                </tr>
                            @endif
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->civility }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    @if ($user->type == 'parent' && $user->children->count() > 0)
                                        <td>
                                           <a href="{{ route('parent.children', $user->id) }}"> <span class="w3-badge">{{ $user->children->count() }}</span>
                                                enfant.s</a>
                                        </td>
                                    @else
                                        <td>0 enfant</td>
                                    @endif
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modal-add-parent-child{{ $user->id }}">{{ _('Add child') }}</button>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modal-show-users{{ $user->id }}">{{ _('View') }}</button>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#modal-edit-users{{ $user->id }}">{{ _('Edit') }}</button>
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
    @foreach ($users as $user)
        @include('admin.users._modal.show-users', ['user' => $user])
        @include('admin.users._modal.edit-users', ['user' => $user])
        @include('admin.children._modal.child-add-in-parent', ['user' => $user])
    @endforeach
@endsection
