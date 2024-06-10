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
                                    <a href="{{ route('admin.users.index')}}"><button class="btn btn-outline-primary">Les utilisateurs</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Card title</h4>
                                  <div class="card-footer">
                                    <a href="{{ route('admin.levels.index')}}"><button class="btn btn-outline-primary">Les niveaux</button></a>
                                </div>
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
