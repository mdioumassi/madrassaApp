@extends('layouts.app')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.course-and-levels') }}">{{ _('Cours & Niveaux') }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ _('Cours de coran adulte') }}</li>
        </ol>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-uppercase">{{ __('Cours de coran pour adulte') }}</div>
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="{{ route('admin.courses.select.levels.keyword', 'arabe-enfant') }}"
                                    aria-current="page" class="nav-link ">{{ _('Cours d\'arabe pour enfant') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('admin.courses.select.levels.keyword', 'arabe-adulte') }}">{{ _('Cours d\'arabe pour adulte') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('admin.courses.select.levels.keyword', 'coran-enfant') }}">{{ _('Cours de coran pour enfant') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active w3-green"
                                    href="{{ route('admin.courses.select.levels.keyword', 'coran-adulte') }}">{{ _('Cours de coran pour adulte') }}</a>
                            </li>
                        </ul>
                        <button type="button" class="btn w3-teal mb-2 mt-2" data-bs-toggle="modal"
                            data-bs-target="#modal-create-course-level" style="width: 15%">
                            {{ _('Ajouter un niveau') }}
                        </button>
                        <table class="table mt-2">
                            <thead>
                                <tr>
                                    <th class="bg-success text-light">{{ _('Libelle') }}</th>
                                    <th class="bg-success text-light">{{ _('Tarif') }}</th>
                                    <th class="bg-success text-light">{{ _('Frais d\'inscription') }}</th>
                                    <th class="bg-success text-light">{{ _('Horaires') }}</th>
                                    <th class="bg-success text-light">{{ _('Matières') }}</th>
                                    <th class="bg-success  text-light">{{ _('Actions') }}</th>
                                </tr>
                            </thead>
                            @if ($levels->count() == 0)
                                <tr>
                                    <td colspan="7" class="text-center">Aucun niveau trouvé</td>
                                </tr>
                            @endif
                            <tbody>
                                @foreach ($levels as $level)
                                    <tr>
                                        <td>{{ $level->label }}</td>
                                        <td>{{ $level->tarif }}€/Année</td>
                                        <td>{{ $level->registration_fees }}€</td>
                                        <td>{{ $level->hours }}h/semaines</td>
                                        <td>
                                            @if ($level->subjects->count() == 0)
                                                {{ _('Aucune matière') }}
                                            @else
                                                <a href="{{ route('level.subjects', $level->id) }}">
                                                    <span class="w3-badge">{{ $level->subjects->count() }}</span>
                                                    matères</a>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#add-subject-modal{{ $level->id }}">{{ _('Add Subject') }}</button>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#show-level-modal">{{ _('View') }}</button>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#edit-level-modal">{{ _('Edit') }}</button>
                                            <form action="{{ route('admin.levels.destroy', $level->id) }}" method="POST"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.courses._modals.create-course-level', ['keyword' => 'coran-adulte'])
    @foreach ($levels as $level)
        @include('admin.levels._modals.add-subject-modal', ['level' => $level])
        @include('admin.levels._modals.edit-level-modal', ['level' => $level])
        @include('admin.levels._modals.show-level-modal', ['level' => $level])
    @endforeach
@endsection
