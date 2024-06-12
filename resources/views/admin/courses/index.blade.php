@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-uppercase">{{ __('Nos cours') }}</div>
                    <div class="card-body">
                        <a href="{{ route('admin.courses.create') }}"><button class="btn btn-success">{{ _('Ajouter un cours') }}</button></a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-success text-light">#</th>
                                <th class="bg-success text-light">{{ _('Label') }}</th>
                                <th class="bg-success text-light">{{ _('Comment') }}</th>
                                <th class="bg-success text-light">{{ _('Classe') }}</th>
                                <th class="bg-success text-light">{{ _('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <th>{{ $course->id }}</th>
                                    <td>{{ $course->label }}</td>
                                    <td>{{ $course->comment }}</td>
                                    <td><a href="{{ route('admin.courses.levels.list', $course->id)}}">{{ $course->levels->count()}} Niveaux</a></td>
                                    <td>
                                        <a href="{{ route('admin.courses.add.levels', $course->id) }}" class="btn btn-primary">{{ _('Add Levels') }}</a>
                                        <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-primary">{{ _('View') }}</a>
                                        <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning">{{ _('Edit') }}</a>
                                        <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">{{ _('Delete') }}</button>
                                        </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $courses->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
