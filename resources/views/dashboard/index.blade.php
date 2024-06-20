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
                                        <i class="fa-solid fa-children" style='font-size:110px'></i>
                                    </div>

                                    <div class="card-footer">
                                        <a href="{{ route('children.index') }}"><button
                                                class="btn btn-outline-primary">{{ _('Les enfants') }}</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fa-solid fa-book" style='font-size:110px'></i>
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
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('dashboard.users')
            </div>
        </div>
    </div>

    @endsection
