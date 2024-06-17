@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">{{ __('Les niveaux des cours') }}</div>
                    <div class="card-body">
                        {{-- <a href="{{ route('admin.courses.create')}}" class="btn btn-success mb-3">{{ _('Ajouter un cours') }}</a> --}}
                        <div class="d-grid gap-2 d-md-block mb-3">
                            @foreach ($courses as $course)
                                <a href="{{ route('admin.courses.select.levels', $course->id) }}"><button class="btn btn-outline-primary" type="button">{{ $course->label }}</button></a>
                            @endforeach
                        </div>
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
                                @if ($levels->count() == 0)
                                    <tr>
                                        <td colspan="7" class="text-center">{{ _('Aucun niveau trouvé') }}</td>
                                    </tr>
                                @endif
                                @foreach ($levels as $level)
                                    <tr>
                                        <th>{{ $level->id }}</th>
                                        <td>{{ $level->label }}</td>
                                        <td>{{ $level->tarif }}€/Année</td>
                                        <td>{{ $level->registration_fees }}€</td>
                                        <td>{{ $level->hours }}h/semaines</td>
                                        <td>
                                            @if($level->subjects->count() == 0)
                                            {{ _('Aucune matière') }}
                                            @else
                                            <a href="{{ route('level.subjects', $level->id) }}">{{ $level->subjects->count() }}
                                                matères</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.subjects.create', $level->id) }}"
                                                class="btn btn-primary">{{ _('Add Subject') }}</a>
                                            <a href="{{ route('admin.levels.show', $level->id) }}"
                                                class="btn btn-primary">{{ _('View') }}</a>
                                            <a href="{{ route('admin.levels.edit', $level->id) }}"
                                                class="btn btn-warning">{{ _('Edit') }}</a>
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
@endsection
