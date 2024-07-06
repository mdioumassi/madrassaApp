@extends('layouts.app')

@section('content')
    <div class="container">
        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _('Dashboard') }}</a></li>
                <li class="breadcrumb-item">{{ $user->getFullNameAttribute() }}</li>
                <li class="breadcrumb-item active" aria-current="page">{{ _('Mes classes') }}</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center bg-success text-light">
                        <strong>{{ $user->getFullNameAttribute() }}: </strong>Mes Classes
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card-header w3-indigo mb-2"><b>{{_('Cours d\'arabe pour enfant')}}</b></div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($levels as $level)
                                @if ($level->course->keywords == 'arabe-enfant')
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <div class="card-header w3-green">{{ $level->label }}</div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="https://www.w3schools.com/w3css/img_snowtops.jpg"
                                                            alt="{{ $level->name }}" class="img-thumbnail"
                                                            style="width: 200px; height: 200px;">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><strong>Nombre d'élèves:</strong></p>
                                                        <p><strong>Nombre de matières:
                                                                {{ $level->subjects->count() }}</strong> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="w3-bar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card-header w3-blue mb-2"><strong>{{_('Cours d\'arabe pour adulte')}}</strong></div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($levels as $level)
                                @if ($level->course->keywords == 'arabe-adulte')
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <div class="card-header w3-green">{{ $level->label }}</div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="https://www.w3schools.com/w3css/img_snowtops.jpg"
                                                            alt="{{ $level->name }}" class="img-thumbnail"
                                                            style="width: 200px; height: 200px;">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><strong>Nombre d'élèves:</strong></p>
                                                        <p><strong>Nombre de matières:
                                                                {{ $level->subjects->count() }}</strong> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="w3-bar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card-header w3-cyan mb-2"><strong>{{_('Cours de coran pour enfant')}}</strong></div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($levels as $level)
                                @if ($level->course->keywords == 'coran-enfant')
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <div class="card-header w3-green">{{ $level->label }}</div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="https://www.w3schools.com/w3css/img_snowtops.jpg"
                                                            alt="{{ $level->name }}" class="img-thumbnail"
                                                            style="width: 200px; height: 200px;">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><strong>Nombre d'élèves:</strong></p>
                                                        <p><strong>Nombre de matières:
                                                                {{ $level->subjects->count() }}</strong> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="w3-bar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card-header w3-light-blue mb-2">
                                    <strong>{{_('Cours de coran pour adulte')}}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($levels as $level)
                                @if ($level->course->keywords == 'coran-adulte')
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <div class="card-header w3-green">{{ $level->label }}</div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="https://www.w3schools.com/w3css/img_snowtops.jpg"
                                                            alt="{{ $level->name }}" class="img-thumbnail"
                                                            style="width: 200px; height: 200px;">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><strong>Nombre d'élèves:</strong></p>
                                                        <p><strong>Nombre de matières:
                                                                {{ $level->subjects->count() }}</strong> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="w3-bar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
