@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <div class="row">
                            @if (auth()->user()->hasRole('Admin'))
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <i class="w3-text-light-green fa-solid fa-children"
                                                        style='font-size:110px'></i>
                                                </div>
                                                <div class="col">
                                                    <button type="button" class="btn btn-primary">
                                                        <span class="badge bg-danger"></span>
                                                        {{ _('Enfants') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('children.index') }}"><button
                                                    class="btn btn-outline-primary">{{ _('Les enfants') }}</button></a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (auth()->user()->hasRole('Parent'))
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <i class="w3-text-light-green fa-solid fa-children"
                                                        style='font-size:110px'></i>
                                                </div>
                                                <div class="col">
                                                    <button type="button" class="btn btn-primary">
                                                        <span
                                                            class="badge bg-danger">{{ auth()->user()->children()->count() }}</span>
                                                        {{ _('Enfants') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('parent.children.grille', auth()->user()->id) }}"><button
                                                    class="btn btn-outline-primary">{{ _('Mes enfants') }}</button></a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (auth()->user()->hasRole('Professeur'))
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header w3-green">
                                            <strong>{{ auth()->user()->getFullNameAttribute() }}</strong></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="https://www.w3schools.com/w3css/img_snowtops.jpg"
                                                        alt="" class="img-thumbnail"
                                                        style="width: 200px; height: 200px;">
                                                </div>
                                                <div class="col-md-8">
                                                    <p><strong>Civilité:</strong> {{ auth()->user()->civility }}</p>
                                                    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                                                    <p><strong>Téléphone:</strong> {{ auth()->user()->phone }}</p>
                                                    <p><strong>Roles:</strong>
                                                        @if (!empty(auth()->user()->getRoleNames()))
                                                            @foreach (auth()->user()->getRoleNames() as $v)
                                                                <label class="badge bg-success">{{ $v }}</label>
                                                            @endforeach
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            @if(auth()->user()->levels->count() > 0)
                                                <a href="{{ route('admin.teachers.levels.grille', auth()->user()->id) }}"><button
                                                        class="btn btn-outline-primary">Mes <span
                                                            class="badge w3-green">{{ auth()->user()->levels->count() }}</span>
                                                        classes</button></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <i class='fas fa-user-edit' style='font-size:110px'></i
                                                    style='font-size:110px'></i>
                                            </div>
                                            <div class="col">
                                                <span class="badge w3-green">{{ auth()->user()->getFullNameAttribute() }}</span><br>
                                                @if (!empty(auth()->user()->getRoleNames()))
                                                    @foreach (auth()->user()->getRoleNames() as $v)
                                                        <span class="badge bg-success">{{ $v }}</span>
                                                    @endforeach
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="card-footer">
                                        <a href="{{ route('user.profile') }}">
                                            <button class="btn btn-outline-primary">{{ _('Mon profil') }}</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if (auth()->user()->hasRole('Admin'))
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <i class="fa fa-unlock-alt" style="font-size:110px"></i>
                                        </div>

                                        <div class="card-footer">
                                            <a href="{{ route('permissions.index') }}">
                                                <button
                                                    class="btn btn-outline-primary">{{ _('Rôles & Permissions') }}</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (auth()->user()->hasRole('Admin'))
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (auth()->user()->hasRole('Admin'))
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @include('dashboard.users')
                </div>
            </div>
        @endif
    </div>
@endsection
