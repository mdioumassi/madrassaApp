@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ $level->label }}</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <table class="table">
                                    <thead> </thead>
                                    <tbody>
                                        <tr><th class="bg-success text-light">Label</th><td></td><td> {{ $level->label }} </td></tr>
                                        <tr><th class="bg-success text-light">Tarif</th><td></td><td> {{ $level->tarif }} </td></tr>
                                        <tr><th class="bg-success text-light">Frais d'inscription</th><td></td><td> {{ $level->registration_fees }} </td></tr>
                                        <tr><th class="bg-success text-light">Horaires</th><td></td><td> {{ $level->hours }} </td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h4>Matières</h4>
                                <ul>
                                    @foreach ($level->subjects as $subject)
                                        <li>{{ $subject->label }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <a href="{{ route('admin.levels.edit', $level->id) }}"><button class="btn btn-primary">Editer</button></a>
                        <a href="{{ route('admin.levels.index')}}"><button class="btn btn-primary">Retour</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection