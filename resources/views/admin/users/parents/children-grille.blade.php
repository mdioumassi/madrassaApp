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
                <li class="breadcrumb-item"><a href="{{ route('admin.parents.list') }}">{{ _('Parents') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $parent->lastname }} {{ $parent->name }}</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><span class="bg-success py-2 px-3 text-light rounded">Parent:</span>
                        {{ $parent->lastname }} {{ $parent->name }}</div>
                    <div class="card-body">
                        <div class="pull-right mb-3">
                            @can('child-create')
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#modal-add-parent-child{{ $parent->id }}">{{ _('Ajouter un enfant') }}</button>
                            @endcan
                        </div>
                        <div class="row">
                            @foreach ($children as $child)
                                <div class="col-md-6 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="https://www.w3schools.com/w3css/img_snowtops.jpg"
                                                        alt="{{ $child->firstname }}" class="img-thumbnail"
                                                        style="width: 200px; height: 200px;">
                                                </div>
                                                <div class="col-md-8">
                                                    <p><strong>{{ $child->firstname }} {{ $child->lastname }}</strong></p>
                                                    <p><strong>Genre:</strong> {{ $child->genre }}</p>
                                                    <p><strong>Age:</strong> 10 ans</p>
                                                    <p><strong>Classe Française:</strong> {{ $child->french_class }}</p>
                                                    <p><strong>Classe:</strong> Niveau 0 - Arabe</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="w3-bar">
                                                <button class="w3-button w3-ripple w3-yellow w3-small w3-left me-3" data-bs-toggle="modal"
                                                    data-bs-target="#modal-view-edit-child{{ $child->id }}">
                                                    <i
                                                    class="fa-solid fa-pen-to-square"></i>  {{ _('Modifier') }}
                                                </button>
                                                <a href="#" class="w3-button w3-ripple w3-green w3-small w3-left">{{ _('Incription') }}</a>
                                                <a href="#" class="w3-button w3-ripple w3-indigo w3-small w3-right">{{ _('Fiche d\'inscription') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($children as $child)
        {{-- @include('admin.children._modal.child-show', ['child' => $child]) --}}
        @include('admin.children._modal.child-edit', ['child' => $child])
        @include('admin.children._modal.child-add-in-parent', ['user' => $child->parent])
    @endforeach
@endsection
