@php
    $teachers = App\Models\User::where('type', 'professeur')->get();
@endphp

<x-modal id="edit-level-modal{{$level->id}}">
    <x-slot name="title">{{ $level->label }}</x-slot>
    <x-slot name="size">modal-lg</x-slot>
    <x-slot name="body">
        <form method="POST" action="{{ route('admin.levels.update', $level->id) }}">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <label for="label" class="col-md-4 col-form-label text-md-end">{{ __('Libelle') }}</label>

                <div class="col-md-6">
                    <input id="label" type="text" class="form-control @error('label') is-invalid @enderror"
                        name="label" value="{{ $level->label }}" autocomplete="label" autofocus>

                    @error('label')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="tarif" class="col-md-4 col-form-label text-md-end">{{ __('Tarif') }}</label>

                <div class="col-md-6">
                    <input id="tarif" type="text" class="form-control @error('tarif') is-invalid @enderror"
                        name="tarif" value="{{ $level->tarif }}" autocomplete="tarif">

                    @error('tarif')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="registration_fees"
                    class="col-md-4 col-form-label text-md-end">{{ __('Frais d\'inscription') }}</label>

                <div class="col-md-6">
                    <input id="registration_fees" type="text"
                        class="form-control @error('registration_fees') is-invalid @enderror"
                        name="registration_fees" value="{{ $level->registration_fees }}" autocomplete="registration_fees">

                    @error('registration_fees')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="hours" class="col-md-4 col-form-label text-md-end">{{ __('Horaires') }}</label>

                <div class="col-md-6">
                    <input id="hours" type="text" class="form-control @error('hours') is-invalid @enderror"
                        name="hours" value="{{ $level->hours }}" autocomplete="hours">

                    @error('hours')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Commentaire') }}</label>

                <div class="col-md-6">
                    <textarea id="comment" class="form-control @error('comment') is-invalid @enderror"
                        name="comment" autocomplete="comment">{{ $level->comment }}</textarea>

                    @error('comment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="teacher_id" class="col-md-4 col-form-label text-md-end">{{ __('Professeur') }}</label>

                <div class="col-md-6">
                    <select id="teacher_id" class="form-select @error('teacher_id') is-invalid @enderror"
                        name="teacher_id" autocomplete="teacher_id">
                        <option value="">Choisir un professeur</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" @if ($level->teacher_id == $teacher->id) selected @endif>
                                {{ $teacher->name }} {{ $teacher->lastname }}
                            </option>
                        @endforeach
                    </select>

                    @error('teacher_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Modifier') }}
                    </button>
                </div>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{_('Fermer') }}</button>
    </x-slot>
</x-modal>