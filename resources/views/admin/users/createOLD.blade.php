@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ajouter un utilisateur') }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf
                            {{-- <div class="form-group row">
                                <label for="civility">{{ _('Civility') }}</label>
                                <select id="civility" name="civility">
                                    <option value="M">Monsieur</option>
                                    <option value="Mme">Madame</option>
                                    <option value="Mlle">Mademoiselle</option>
                                </select>
                            </div> --}}
                            <div class="form-group row">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            {{-- <div class="form-group row">
                                <label for="lastname">Prénom</label>
                                <input type="text" class="form-control" id="lastname" name="lastname">
                            </div> --}}
                            <div class="form-group row">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            {{-- <div class="form-group row">
                                <label for="phone">Téléphone</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="form-group row">
                                <label for="full_address">Adresse</label>
                                <input type="text" class="form-control" id="full_address" name="full_address">
                            </div>
                            <div class="form-group row">
                                <label for="type">{{ _('Type') }}</label>
                                <select id="type" name="type">
                                    <option value="parent">Parent</option>
                                    <option value="etudiant">Etudiant</option>
                                </select>
                            </div> --}}
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection