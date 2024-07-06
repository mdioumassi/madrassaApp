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
                                    class="nav-link">{{ _('Roles') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('permissions.index') }}" aria-current="page"
                                    class="nav-link active w3-indigo">{{ _('Permissions') }}</a>
                            </li>
                        </ul>
                        <div class="pull-right mb-3">
                            @can('permission-create')
                                <button class="w3-button w3-green" data-bs-toggle="modal"
                                    data-bs-target="#modal-create-permission"><i class="fa fa-plus"></i>
                                    {{ _('Ajouter une permission') }}</button>
                            @endcan
                        </div>
                        <table class="table table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th class="w3-green text-light">{{ _('Nom') }}</th>
                                    <th class="w3-green text-light">{{ _('Description') }}</th>
                                    <th width="280px" class="w3-green text-light">{{ _('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->description }}</td>
                                        <td>
                                            <div class="w3-bar">
                                                @can('permission-edit')
                                                    <button class="w3-button w3-ripple w3-yellow w3-small w3-left me-3"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-edit-permission{{ $permission->id }}">
                                                        <i class="fa-solid fa-pen-to-square"></i> {{ _('Modifier') }}
                                                    </button>
                                                @endcan
                                                @can('permission-delete')
                                                    <button class="w3-button w3-ripple w3-red w3-small w3-left"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-delete-permission{{ $permission->id }}">
                                                        <i class="fa-solid fa-trash-can"></i> {{ _('Supprimer') }}
                                                    </button>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($permissions as $permission)
            <x-modal id="modal-edit-permission{{ $permission->id }}">
                <x-slot name="title">{{ _('Modifier la permission') }}</x-slot>
                <x-slot name="size">modal-lg</x-slot>
                <x-slot name="body">
                    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">{{ _('Nom') }}</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $permission->name }}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="description">{{ _('Description') }}</label>
                            <textarea name="description" id="description" class="form-control" rows="3">{{ $permission->description }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">{{ _('Modifier') }}</button>
                        </div>
                    </form>
                </x-slot>
                <x-slot name="footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ _('Fermer') }}</button>
                </x-slot>
            </x-modal>
            <x-modal id="modal-delete-permission{{ $permission->id }}">
                <x-slot name="title">{{ _('Supprimer la permission') }}</x-slot>
                <x-slot name="size">modal-lg</x-slot>
                <x-slot name="body">
                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="form-group mt-3">
                            <p>{{ _('Voulez-vous vraiment supprimer cette permission?') }}</p>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-danger">{{ _('Supprimer') }}</button>
                        </div>
                    </form>
                </x-slot>
                <x-slot name="footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">{{ _('Annuler') }}</button>
                </x-slot>
            </x-modal>
        @endforeach
        <x-modal id="modal-create-permission">
            <x-slot name="title">{{ _('Ajouter une permission') }}</x-slot>
            <x-slot name="size">modal-lg</x-slot>
            <x-slot name="body">
                <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="name">{{ _('Nom') }}</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <label for="description">{{ _('Description') }}</label>
                        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">{{ _('Ajouter') }}</button>
                    </div>
                </form>
            </x-slot>
            <x-slot name="footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ _('Fermer') }}</button>
            </x-slot>
        </x-modal>
    </div>
@endsection
