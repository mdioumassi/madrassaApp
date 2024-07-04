@extends('layouts.app')

@section('content')
    <div class="container">
        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">{{ _('Utilisateurs') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.teachers.list') }}">{{ _('Professeurs') }}</a></li>
            <li class="breadcrumb-item"><a class="btn btn-link" data-bs-toggle="modal"
                    data-bs-target="#modal-show-users{{ $user->id }}" style="margin-top:-6px"> {{ $user->name }}
                    {{ $user->lastname }} </a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ _('Les niveaux') }}</li>
        </ol>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><span class="bg-success py-2 px-3 text-light rounded">Cours:</span>
                        </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modal-create-level">{{ _('Ajouter un niveau') }}</button>
                        <table class="table table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th class="w3-green text-light">{{ _('Libelle') }}</th>
                                    <th class="w3-green text-light">{{ _('Tarif') }}</th>
                                    <th class="w3-green text-light">{{ _('Frais d\'inscription') }}</th>
                                    <th class="w3-green text-light">{{ _('Horaires') }}</th>
                                    <th class="w3-green text-light">{{ _('Cours') }}</th>
                                    <th class="w3-green text-light">{{ _('Matières') }}</th>
                                    <th class="w3-green  text-light">{{ _('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($levels as $level)
                                    <tr>
                                        <td>{{ $level->label }}</td>
                                        <td>{{ $level->tarif }}€/Année</td>
                                        <td>{{ $level->registration_fees }}€</td>
                                        <td>{{ $level->hours }}h/semaines</td>
                                        <td>{{$level->course->lavel}}</td>
                                        <td>
                                            @if ($level->subjects->count() == 0)
                                            <span class="badge w3-black">0 matière</span>
                                            @else
                                                <a href="{{ route('level.subjects', $level->id) }}"><span
                                                        class="badge w3-black">{{ $level->subjects->count() }} matères</span></a>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#add-subject-modal{{ $level->id }}">{{ _('Add Subject') }}</button>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#show-level-modal{{ $level->id }}">{{ _('View') }}</button>
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit-level-modal{{ $level->id }}">{{ _('Edit') }}</button>
                                            <form action="{{ route('admin.levels.destroy', $level->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">{{ _('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('admin.users.teachers.levels._modals.show-users', ['user' => $user])
    {{-- @include('admin.users.teachers.levels._modals.create-level-modal', ['user' => $user]) --}}
    @foreach ($levels as $level)
        @include('admin.users.teachers.levels._modals.add-subject-modal', ['level' => $level, 'user' => $user])
        @include('admin.users.teachers.levels._modals.edit-level-modal', ['level' => $level, 'user' => $user])
        @include('admin.levels._modals.show-level-modal', ['level' => $level])
    @endforeach
@endsection
