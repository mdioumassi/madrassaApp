@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Nos niveauxs') }}</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($levels as $level)
                                <div class="col-4 mb-5">
                                    <div class="card-header">{{ $level->label }}</div>
                                    <div class="card">
                                        <div class="card-body">
                                            <ul>
                                                @foreach ($level->subjects as $subject)
                                                    <li>{{ $subject->label }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                {{-- <a href="{{ route('admin.levels.show', $level->id) }}">{{ $level->label }}</a> --}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
