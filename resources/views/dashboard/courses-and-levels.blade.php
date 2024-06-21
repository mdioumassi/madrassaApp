@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _('Dashboard') }}</a></li>
                        {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard.course-and-levels') }}">{{ _('Cours & Niveaux') }}</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">{{ _('Cours & Niveaux') }}</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header">{{ __('Cours & classes') }}</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($courses as $course)
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <i class="w3-text-teal fa-solid fa-book" style='font-size:110px'></i>
                                                </div>
                                                <div class="col">
                                                    <span></span>
                                                    <button type="button" class="btn btn-primary">
                                                        <span class="badge bg-danger">{{ $course->levels->count() }}</span>
                                                        Niveaux
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <a href="{{ route('admin.courses.select.levels.keyword', $course->keywords) }}"><button
                                                    class="btn btn-outline-primary">{{ $course->label }}</button></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
