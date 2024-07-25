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
                <li class="breadcrumb-item"><a href="{{ route('admin.parents.list') }}">{{ _('Parents') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ _('Les enfants') }}</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Liste des enfants') }}</div>
                    <div class="card-body">
                        {{-- <a href="{{ route('admin.parents.list') }}"><button class="btn btn-primary mb-3"><i
                                    class='fas fa-user-friends'></i> Liste des
                                parents</button></a> --}}
                        {{-- <div class="pull-right mb-3">
                            <a class="btn btn-success" href="{{ route('children.create') }}"><i class="fa fa-plus"></i>
                                {{ _('Ajouter un enfant') }}</a>
                        </div> --}}
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-success text-light">Genre</th>
                                    <th class="bg-success text-light">Nom</th>
                                    <th class="bg-success text-light">Prénom</th>
                                    <th class="bg-success text-light">Age</th>
                                    <th class="bg-success text-light">Parent</th>
                                    <th class="bg-success text-light">Status</th>
                                    <th class="bg-success text-light">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($children->count() == 0)
                                    <tr>
                                        <td colspan="8" class="text-center">Aucun enfant trouvé</td>
                                    </tr>
                                @endif
                                @foreach ($children as $child)
                                    <tr>
                                        <td class="w3-center">{!! $child->getGenre() !!}</td>
                                        <td>{{ $child->firstname }}</td>
                                        <td>{{ strtoupper($child->lastname) }}</td>
                                        <td>{{ $child->getAgeAttribute() }} ans</td>
                                        <td>
                                            @if ($child->parent->type->value == 'parent')
                                                <a href="" data-bs-toggle="modal"
                                                    data-bs-target="#modal-show-users{{ $child->parent->id }}">{{ $child->parent->getFullNameAttribute() }}</a>
                                            @endif
                                        </td>
                                        @if (!$child->is_registered($child->id))
                                            <td><span class="w3-text-red">Non inscrit</span></td>
                                        @else
                                            <td><span class="w3-text-green">Inscrit</span></td>
                                        @endif

                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modal-view-detail-child{{ $child->id }}"><i
                                                    class="fa-solid fa-list"></i> {{ _('View') }}</button>
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modal-view-edit-child{{ $child->id }}"><i
                                                    class="fa-solid fa-pen-to-square"></i> {{ _('Edit') }}</button>
                                            @if ($child->is_registered($child->id))
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modal-fiche-registration{{ $child->registration->id }}"">
                                                    <i class="fa fa-drivers-license-o"></i> {{ _('Fiche') }}</button>
                                            @else
                                                <button type="button" class="btn btn-info btn-sm" disabled><i
                                                        class="fa fa-drivers-license-o"></i> {{ _('Fiche') }}</button>
                                            @endif
                                            <form action="{{ route('children.destroy', $child->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')"><i
                                                        class="fa-solid fa-trash"></i> {{ _('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                    {{-- @endif --}}
                                @endforeach
                            </tbody>
                        </table>
                        {!! $children->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($children as $child)
    @include('admin.users._modal.show-users', ['user' => $child->parent])
        @include('admin.children._modal.child-show', ['child' => $child])
        @include('admin.children._modal.child-edit', ['child' => $child])
        @if ($child->registration)
            @include('registrations._modals.fiche-registration', ['registration' => $child->registration])
        @endif
    @endforeach
@endsection
