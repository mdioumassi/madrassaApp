@extends('layouts.app')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">{{ _('Utilisateurs') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.parents.list') }}">{{ _('Parents') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $user->name }} {{ $user->lastname }}</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ $user->name }} {{ $user->lastname }}</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <table class="table">
                                    <thead> </thead>
                                    <tbody>
                                        <tr>
                                            <th class="bg-success text-light">Civilité</th>
                                            <td></td>
                                            <td> {{ $user->civility }} </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-success text-light">Type</th>
                                            <td></td>
                                            <td> {{ $user->type }} </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-success text-light">Fonction</th>
                                            <td></td>
                                            <td> {{ $user->function }} </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-success text-light">Nom</th>
                                            <td></td>
                                            <td> {{ $user->name }} </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-success text-light">Prénom</th>
                                            <td></td>
                                            <td> {{ $user->lastname }} </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-success text-light">Email</th>
                                            <td></td>
                                            <td> {{ $user->email }} </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-success text-light">Téléphone</th>
                                            <td></td>
                                            <td> {{ $user->phone }} </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-success text-light">Adresse</th>
                                            <td></td>
                                            <td> {{ $user->full_address }} </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-success text-light">Enfants</th>
                                            <td></td>
                                            <td>
                                                <a href="{{ route('parent.children', $user->id) }}">{{ $user->children->count() }}
                                                    Enfants</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                @if ($user->children->count() > 0)
                                    <h4>Enfants</h4>
                                    <ul>
                                        @foreach ($user->children as $child)
                                            <li>{{ $child->firstname }} {{ $child->lastname }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <a href="{{ route('admin.users.edit', $user->id) }}"><button
                                class="btn btn-primary">Editer</button></a>
                        <a href="{{ route('admin.users.index') }}"><button class="btn btn-primary">Retour</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
