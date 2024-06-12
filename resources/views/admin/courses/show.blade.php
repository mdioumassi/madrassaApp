@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-decoration-none fw-bold text-uppercase text-primary">{{ $course->label }}</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <table class="table">
                                    <thead> </thead>
                                    <tbody>
                                        <tr><th class="bg-success text-light">Label</th><td></td><td> {{ $course->label }} </td></tr> 
                                        <tr><th class="bg-success text-light">Comment</th><td></td><td> {{ $course->comment }} </td></tr>
                                        <tr><th class="bg-success text-light">Classes</th><td></td><td> <a href="{{ route('admin.courses.levels.list', $course->id)}}">{{ $course->levels->count()}} Niveaux</a> </td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h4>{{ _('Les classes') }}</h4>
                                <ul>
                                    @foreach ($course->levels as $level)
                                        <li>{{ $level->label }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <a href="{{ route('admin.courses.edit', $course->id) }}"><button class="btn btn-primary">{{ _('Editer') }}</button></a>
                        <a href="{{ route('admin.courses.add.levels', $course->id)}}"><button class="btn btn-primary">{{ _('Ajouter une classe') }}</button></a>
                        <a href="{{ route('admin.courses.index')}}"><button class="btn btn-primary">{{ _('Liste des cours') }}</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection