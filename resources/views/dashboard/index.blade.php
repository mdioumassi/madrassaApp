@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <i class='fas fa-users' style='font-size:110px'></i>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('admin.users.index') }}"><button
                                                class="btn btn-outline-primary">{{_('Les utilisateurs')}}</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fa-solid fa-people-roof" style='font-size:110px'></i>
                                    </div>

                                    <div class="card-footer">
                                        <a href="{{ route('admin.parents.list') }}"><button
                                                class="btn btn-outline-primary">{{ _('Les parents') }}</button></a>
                                    </div>
                                </div>
                            </div>
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
                            {{-- <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fa-solid fa-book" style='font-size:110px'></i>
                                    </div>

                                    <div class="card-footer">
                                        <a href="{{ route('admin.courses.index') }}"><button
                                                class="btn btn-outline-primary">{{ _('Les cours') }}</button></a>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fa-solid fa-book" style='font-size:110px'></i>
                                    </div>

                                    <div class="card-footer">
                                        <a href="{{ route('admin.levels.index') }}"><button
                                                class="btn btn-outline-primary">{{ _('Cours & classes') }}</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some example text. Some example text.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
