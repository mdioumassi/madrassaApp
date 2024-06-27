@extends('layouts.app')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ _('Profile') }}</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header w3-green">{{ __('Profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                            @csrf

                            @if (session('success'))
                                <div class="alert alert-success" role="alert" class="text-danger">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Avatar: </label>
                                    <input id="avatar" type="file"
                                        class="form-control @error('avatar') is-invalid @enderror" name="avatar"
                                        value="{{ old('avatar') }}" autocomplete="avatar">

                                    @error('avatar')
                                        <span role="alert" class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <img src="/avatars/{{ auth()->user()->avatar }}" style="width:80px;margin-top: 10px;">
                                    <span class="">{{ auth()->user()->type }}</span>
                                </div>

                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="civility" class="form-label">Civilité: </label>
                                    <input class="form-control" type="text" id="name" name="name"
                                        value="{{ auth()->user()->civility }}" autofocus="">
                                    @error('civility')
                                        <span role="alert" class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="function" class="form-label">Fonction: </label>
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="{{ auth()->user()->function }}" autofocus="">
                                    @error('function')
                                        <span role="alert" class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Name: </label>
                                    <input class="form-control" type="text" id="name" name="name"
                                        value="{{ auth()->user()->name }}" autofocus="">
                                    @error('name')
                                        <span role="alert" class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email: </label>
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="{{ auth()->user()->email }}" autofocus="">
                                    @error('email')
                                        <span role="alert" class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="password" class="form-label">Password: </label>
                                    <input class="form-control" type="password" id="password" name="password"
                                        autofocus="">
                                    @error('password')
                                        <span role="alert" class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="confirm_password" class="form-label">Confirm Password: </label>
                                    <input class="form-control" type="password" id="confirm_password"
                                        name="confirm_password" autofocus="">
                                    @error('confirm_password')
                                        <span role="alert" class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="phone" class="form-label">Phone: </label>
                                    <input class="form-control" type="text" id="phone" name="phone"
                                        value="{{ auth()->user()->phone }}" autofocus="">
                                    @error('phone')
                                        <span role="alert" class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="full_address" class="form-label">Adresse: </label>
                                    <input class="form-control" type="text" id="city" name="full_address"
                                        value="{{ auth()->user()->full_address }}" autofocus="">
                                    @error('full_address')
                                        <span role="alert" class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12 offset-md-5">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Upload Profile') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
