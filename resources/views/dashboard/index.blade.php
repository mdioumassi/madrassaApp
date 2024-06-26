@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <i class="w3-text-light-green fa-solid fa-children" style='font-size:110px'></i>
                                            </div>
                                            <div class="col">
                                                <span></span>
                                                <button type="button" class="btn btn-primary">
                                                    <span class="badge bg-danger">{{auth()->user()->children()->count()}}</span>
                                                    {{ _('Enfants') }}
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card-footer">
                                        @if(auth()->user()->hasRole('Admin'))
                                        <a href="{{ route('children.index') }}"><button
                                                class="btn btn-outline-primary">{{ _('Les enfants') }}</button></a>
                                        @endif
                                        @if(auth()->user()->hasRole('Parent'))
                                        <a href="{{ route('parent.children', auth()->user()->id) }}"><button
                                                class="btn btn-outline-primary">{{ _('Mes enfants') }}</button></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="w3-text-teal fa-solid fa-book" style='font-size:110px'></i>
                                    </div>

                                    <div class="card-footer">
                                        <a href="{{ route('dashboard.course-and-levels') }}">
                                            <button class="btn btn-outline-primary">{{ _('Cours & classes') }}</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(auth()->user()->hasRole('Admin'))
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('dashboard.users')
            </div>
        </div>
        @endif
    </div>

    @endsection
