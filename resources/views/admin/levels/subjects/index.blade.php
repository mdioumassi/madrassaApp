@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="text-decoration-none fw-bold text-uppercase text-primary" href="{{ route('admin.levels.show', $level->id) }}">{{ $level->label }}</a>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.subjects.create', $level->id) }}"><button class="btn btn-primary mb-3">Ajouter une matière</button></a>
                        <a href="{{ route('admin.levels.index' )}}"><button class="btn btn-success mb-3">Afficher les niveaux</button></a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="bg-success text-light">#</th>
                                    <th class="bg-success text-light">{{ _('Libelle') }}</th>
                                    <th class="bg-success text-light">{{ _('Commentaire') }}</th>
                                    <th class="bg-success  text-light">{{ _('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <th>{{ $subject->id }}</th>
                                        <td>{{ $subject->label }}</td>
                                        <td>{{ $subject->comment }}</td>
                                        <td>
                                            <a href="{{ route('admin.subjects.show', $subject->id) }}" class="btn btn-primary">{{ _('View') }}</a>
                                            <a href="{{ route('admin.subjects.edit', $subject->id) }}" class="btn btn-warning">{{ _('Edit') }}</a>
                                            <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST" class="d-inline">
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
@endsection