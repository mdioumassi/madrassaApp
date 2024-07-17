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
                        {{-- Bloc cours arabe pour enfant --}}
                        <div class="w3-card-4 mb-5">
                            <header class="w3-container w3-indigo">
                                <h1>{{ _('Cours d\'arabe pour enfant') }}</h1>
                            </header>
                            <div class="w3-container mt-4">
                                <div class="row">
                                    @foreach ($levels as $level)
                                        @if ($level->course->keywords == 'arabe-enfant')
                                            @include(
                                                'admin.users.teachers.levels._partials._course-levels',
                                                ['level' => $level]
                                            )
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- Bloc cours arabe pour adulte --}}
                        <div class="w3-card-4 mb-5">
                            <header class="w3-container w3-blue mb-2">
                                <h1>{{ _('Cours d\'arabe pour adulte') }}</h1>
                            </header>
                            <div class="w3-container mt-4">
                                <div class="row">
                                    @foreach ($levels as $level)
                                        @if ($level->course->keywords == 'arabe-adulte')
                                            @include(
                                                'admin.users.teachers.levels._partials._course-levels',
                                                ['level' => $level]
                                            )
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- Bloc cours coran pour enfant --}}
                        <div class="w3-card-4 mb-5">
                            <header class="w3-container  w3-cyan">
                                <h1>{{ _('Cours de coran pour enfant') }}</h1>
                            </header>
                            <div class="w3-container mt-4">
                                <div class="row">
                                    @foreach ($levels as $level)
                                        @if ($level->course->keywords == 'coran-enfant')
                                            @include(
                                                'admin.users.teachers.levels._partials._course-levels',
                                                ['level' => $level]
                                            )
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- Bloc cours coran pour adulte --}}
                        <div class="w3-card-4 mb-5">
                            <header class="w3-container  w3-light-blue">
                                <h1>{{ _('Cours de coran pour adulte') }}</h1>
                            </header>
                            <div class="w3-container mt-4">
                                <div class="row">
                                    @foreach ($levels as $level)
                                        @if ($level->course->keywords == 'coran-adulte')
                                            @include(
                                                'admin.users.teachers.levels._partials._course-levels',
                                                ['level' => $level]
                                            )
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
