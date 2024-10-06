    <x-modal id="modal-view-edit-child{{ $child->id }}">
        <x-slot name="size">modal-lg</x-slot>
        <x-slot name="title">{{ $child->firstname }} {{ $child->lastname }}</x-slot>
        <x-slot name="body">
            <form method="POST" action="{{ route('children.update', $child->id) }}" class="w3-light-grey w3-padding"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{$child->parent->id}}">
                <div class="row">
                    <div class="col-4">
                        <img id="preview-photo" width="200px" class="w3-center" src="/photos/{{$child->photo}}">
                        <div class="">
                            <label class="form-label" for="inputPhoto">Choisir une photo:</label>
                            <input type="file" name="photo" id="inputPhoto"
                                class="form-control @error('photo') is-invalid @enderror" value="/photos/{{$child->photo}}">

                            @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="genre">{{ __('Genre') }}:</label>
                                @php $genre = $child->genre; @endphp
                                <select id="genre" class="form-select @error('genre') is-invalid @enderror"
                                    name="genre">
                                    <option value="garçon" {{ $genre == 'garçon' ? 'selected' : '' }}>Garçon</option>
                                    <option value="fille" {{ $genre == 'fille' ? 'selected' : '' }}>Fille</option>
                                </select>

                                @error('genre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="firstname">{{ __('Prénom') }}:</label>
                                <input id="firstname" type="text"
                                    class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                    value="{{ $child->firstname }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="lastname">{{ __('Nom') }}:</label>
                                <input id="lastname" type="text"
                                    class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                    value="{{ $child->lastname }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="birthdate">{{ __('Date de naissance') }}:</label>
                                <input id="birthdate" type="date"
                                    class="form-control @error('birthdate') is-invalid @enderror" name="birthdate"
                                    value="{{ $child->birthdate }}" required autocomplete="birthdate" autofocus>

                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="french_class">{{ __('Classe Française') }}:</label>
                                <input id="french_class" type="text"
                                    class="form-control @error('french_class') is-invalid @enderror" name="french_class"
                                    value="{{ $child->french_class }}" required autocomplete="french_class" autofocus>

                                @error('french_class')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
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
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ _('Fermer') }}</button>
        </x-slot>
    </x-modal>
