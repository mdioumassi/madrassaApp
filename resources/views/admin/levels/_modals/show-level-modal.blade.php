<x-modal id="show-level-modal{{$level->id}}">
    <x-slot name="title">{{ $level->label }}</x-slot>
    <x-slot name="size">modal-xl</x-slot>
    <x-slot name="body">
        <div class="row mb-3">
            <div class="col">
                <table class="table">
                    <thead> </thead>
                    <tbody>
                        <tr><th class="bg-success text-light">Label</th><td></td><td> {{ $level->label }} </td></tr>
                        <tr><th class="bg-success text-light">Tarif</th><td></td><td> {{ $level->tarif }}€/année </td></tr>
                        <tr><th class="bg-success text-light">Frais d'inscription</th><td></td><td> {{ $level->registration_fees }}€ </td></tr>
                        <tr><th class="bg-success text-light">Horaires</th><td></td><td> {{ $level->hours }}h/semaines </td></tr>
                        <tr><th class="bg-success text-light">Matières</th><td></td><td> <a href="{{ route('level.subjects', $level->id)}}">{{ $level->subjects->count()}} Matières</a> </td></tr>
                        @if ($level->comment) <tr><th class="bg-success text-light">Commentaire</th><td></td><td> {{ $level->comment }} </td></tr> @endif
                        @if ($level->teacher) <tr><th class="bg-success text-light">Professeur</th><td></td><td> {{ $level->teacher->name }} {{ $level->teacher->lastname }} </td></tr> @endif
                    </tbody>
                </table>
            </div>
            @if ($level->subjects && $level->subjects->count() > 0)
            <div class="col-md-6">
                <h4>Matières</h4>
                <ul>
                    @foreach ($level->subjects as $subject)
                        <li>{{ $subject->label }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{_('Fermer') }}</button>
    </x-slot>
</x-modal>