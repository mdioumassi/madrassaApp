@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Recapitulatif de votre inscription</h1>
                <p>Merci de vérifier les informations suivantes avant de valider votre inscription.</p>
                <form action="{{ route('registrations.store') }}" method="post">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
