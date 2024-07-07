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
            <li class="breadcrumb-item"><a href="{{ route('dashboard.course-and-levels') }}">{{ _('Cours & Niveaux') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.courses.select.levels.keyword', $level->course->keywords) }}">{{$level->course->label}}</a></li>
            <li class="breadcrumb-item">{{ $level->label }}</li>
            <li class="breadcrumb-item active" aria-current="page">{{ _('Matières') }}</li>
        </ol>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><span class="bg-success py-2 px-3 text-light rounded">Nveau:</span> {{ $level->label }}
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.subjects.create', $level->id) }}"><button class="btn btn-primary mb-3">Ajouter une matière</button></a>
                        {{-- <a href="{{ route('admin.levels.index') }}"><button class="btn btn-success mb-3">Afficher les
                                niveaux</button></a> --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="bg-success text-light">{{ _('Libelle') }}</th>
                                    <th class="bg-success text-light">{{ _('Description') }}</th>
                                    <th class="bg-success  text-light">{{ _('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <td>{{ $subject->label }}</td>
                                        <td>{{ $subject->description }}</td>
                                        <td>
                                            <a href="{{ route('admin.subjects.show', $subject->id) }}" class="btn btn-primary">{{ _('View') }}</a>
                                            <a href="{{ route('admin.subjects.edit', $subject->id) }}" class="btn btn-warning">{{ _('Edit') }}</a>
                                            <form action="{{ route('admin.subjects.destroy', $subject->id) }}"  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">{{ _('Delete') }}</button>
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
@endsection
