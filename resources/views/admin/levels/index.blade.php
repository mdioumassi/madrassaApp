@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Les niveaux des cours') }}</div>
                    <div class="card-body">
                        <a href="{{ route('admin.levels.create') }}"><button class="btn btn-primary mb-3">Ajouter un niveau</button></a>
                        {{-- <a href="{{ route('admin.parents.list') }}"><button class="btn btn-primary mb-3">Liste des parents</button></a> --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="bg-success text-light">#</th>
                                    <th class="bg-success text-light">{{ _('Libelle') }}</th>
                                    <th class="bg-success text-light">{{ _('Tarif') }}</th>
                                    <th class="bg-success text-light">{{ _('Frais d\'inscription') }}</th>
                                    <th class="bg-success text-light">{{ _('Horaires') }}</th>
                                    <th class="bg-success text-light">{{ _('Matières') }}</th>
                                    <th class="bg-success  text-light">{{ _('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($levels as $level)
                                    <tr>
                                        <th>{{ $level->id }}</th>
                                        <td>{{ $level->label }}</td>
                                        <td>{{ $level->tarif }}€/Année</td>
                                        <td>{{ $level->registration_fees }}</td>
                                        <td>{{ $level->hours }}</td>
                                        <td><a href="{{ route('level.subjects', $level->id) }}">{{ $level->subjects->count() }} matères</a></td>
                                        <td>
                                            <a href="{{ route('admin.subjects.create', $level->id) }}" class="btn btn-primary">{{ _('Add Subject') }}</a>
                                            <a href="{{ route('admin.levels.show', $level->id) }}" class="btn btn-primary">{{ _('View') }}</a>
                                            <a href="{{ route('admin.levels.edit', $level->id) }}" class="btn btn-warning">{{ _('Edit') }}</a>
                                            <form action="{{ route('admin.levels.destroy', $level->id) }}" method="POST" class="d-inline">
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
                        {!! $levels->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection