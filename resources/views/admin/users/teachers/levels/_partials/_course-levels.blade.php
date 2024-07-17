<div class="col-md-6 mb-4">
    <div class="w3-card-2">
        <header class="w3-container w3-blue-grey">
            <h3>{{ $level->label }}</h3>
        </header>
        <div class="w3-container">
            <div class="row mb-3">
                <div class="col">
                    <table class="w3-table w3-bordered">
                        <tr>
                            <td><strong>Nombre d'élèves:</strong></td>
                            <td><span class="badge w3-green">{{ $level->registrations->count() }}</span></td>
                            @if ($level->registrations->count() > 0)
                                <td>
                                    <button class="w3-button w3-small w3-yellow" data-bs-toggle="modal"
                                        data-bs-target="#show-children-level-modal{{$level->id}}"><i class="fa-solid fa-children"></i>
                                        {{ _('Afficher') }}</button>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <td><strong>Nombre de matières:</strong></td>
                            <td><span class="badge w3-red">{{ $level->subjects->count() }}</span></td>
                            <td>
                                <button class="w3-button w3-small w3-blue" data-bs-toggle="modal"
                                    data-bs-target="#add-subject-modal{{ $level->id }}"><i
                                        class="fa-solid fa-plus"></i>
                                    {{ _('Ajouter') }}</button>
                            </td>
                        </tr>
                        @if ($level->description)
                            <tr>
                                <td><strong>Description:</strong></td>
                                <td>{{ $level->description }}</td>
                            </tr>
                            @else
                            <tr>
                                <td><strong>Description:</strong></td>
                                <td>{{ _('Pas de description') }}</td>
                            </tr>
                        @endif
                    </table>
                    @if ($level->subjects->count() > 0)
                        <div class="accordion accordion-flush" id="accordion{{$level->id}}">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne{{$level->id}}">
                                    <button class="accordion-button collapsed w3-panel w3-light-grey w3-leftbar w3-padding" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne{{$level->id}}" aria-expanded="false"
                                        aria-controls="flush-collapseOne{{$level->id}}">
                                        <b class="w3-center">LES MATIERES</b>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne{{$level->id}}" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne{{$level->id}}" data-bs-parent="#accordion{{$level->id}}">
                                    <div class="accordion-body">
                                        <ul class="w3-ul w3-border">
                                            <ol>
                                                @foreach ($level->subjects as $subject)
                                                    <li>{{ $subject->label }}</li>
                                                @endforeach
                                            </ol>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.users.teachers.levels._modals.add-subject-modal', [
    'level' => $level,
    'user' => $level->teacher,
])
@include('admin.users.teachers.levels._modals.children-level-modal', [
    'level' => $level,
    'user' => $level->teacher,
])
