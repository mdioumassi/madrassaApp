@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><span class="bg-success py-2 px-3 text-light rounded">Parent:</span> {{ $parent->lastname }} {{ $parent->name }}</div>
                    <div class="card-body">
                        <div class="pull-right mb-3">
                            @can('child-create')
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-add-parent-child{{ $parent->id }}">{{ _('Ajouter un enfant') }}</button>
                            @endcan
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="bg-success text-light">Genre</th>
                                    <th class="bg-success text-light">Nom</th>
                                    <th class="bg-success text-light">Prénom</th>
                                    <th class="bg-success text-light">Date de naissance</th>
                                    <th class="bg-success text-light">Classe Française</th>
                                    <th class="bg-success text-light">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($children as $child)
                                    <tr>
                                        <td>{{ $child->genre }}</td>
                                        <td>{{ $child->firstname }}</td>
                                        <td>{{ $child->lastname }}</td>
                                        <td>{{ $child->birthdate }}</td>
                                        <td>{{ $child->french_class }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modal-view-detail-child{{ $child->id }}"><i class="fa-solid fa-list"></i> {{ _('View') }}</button>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modal-view-edit-child{{ $child->id }}"><i class="fa-solid fa-pen-to-square"></i> {{ _('Edit') }}</button>
                                            @can('child-delete')
                                            <form action="{{ route('children.destroy', $child->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i> {{ _('Delete') }}</button>
                                            </form>
                                            @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <a href="{{ route('admin.parents.list') }}" class="btn btn-primary">{{ _('Liste des parents') }}</a> --}}
                       {{-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-add-parent-child{{ $child->parent->id }}">{{ _('Ajouter un enfant') }}</button> --}}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($children as $child)
        @include('admin.children._modal.child-show', ['child' => $child])
        @include('admin.children._modal.child-edit', ['child' => $child])
        @include('admin.children._modal.child-add-in-parent', ['user' => $child->parent])
    @endforeach
@endsection
