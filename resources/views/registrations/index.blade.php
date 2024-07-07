@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>All Registrations</h1>
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-primary" href="{{ route('registrations.create') }}">Add Registration</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Enfant</th>
                            <th>Cours</th>
                            <th>Classe</th>
                            <th>Registration Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $registration)
                            <tr>
                                <td>{{ $registration->child->getFullNameAttribute() }}</td>
                                <td>{{ $registration->course->label }}</td>
                                <td>{{ $registration->level->label }}</td>
                                <td>{{ $registration->registration_date }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('registrations.edit', $registration->id) }}">Edit</a>
                                    <form style="display:inline-block" method="POST" action="{{ route('registrations.destroy', $registration->id) }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="form-control btn btn-danger">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection