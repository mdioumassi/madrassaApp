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
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">{{ _('Utilisateurs') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ _('Permissions & Roles') }}</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-light text-center"><i class='far fa-user-circle'></i>
                        {{ __('Permissions & Rôles') }}</div>
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}" aria-current="page"
                                    class="nav-link active w3-indigo">{{ _('Roles') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('permissions.index') }}" aria-current="page"
                                    class="nav-link">{{ _('Permissions') }}</a>
                            </li>
                        </ul>
                        <div class="pull-right">
                            @can('role-create')
                                <a class="w3-button w3-green mb-3" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i>
                                    Créer un rôle</a>
                            @endcan
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <th class="w3-green text-light" width="100px">No</th>
                                <th class="w3-green text-light">Name</th>
                                <th class="w3-green text-light" width="280px">Action</th>
                            </tr>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}"><i
                                                class="fa-solid fa-list"></i> Show</a>
                                        @can('role-edit')
                                            <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}"><i
                                                    class="fa-solid fa-pen-to-square"></i> Edit</a>
                                        @endcan

                                        @can('role-delete')
                                            <form method="POST" action="{{ route('roles.destroy', $role->id) }}"
                                                style="display:inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa-solid fa-trash"></i> Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
