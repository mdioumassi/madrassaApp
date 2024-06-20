<div class="card">
    <div class="card-header">{{ __('Les utilisateurs') }}</div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <i class='fas fa-users' style='font-size:110px'></i>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.users.index') }}"><button
                                class="btn btn-outline-primary">{{_('Utilisateurs')}}</button></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <i class='fa-solid fa-user' style='font-size:110px'></i>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.parents.list') }}"><button
                                class="btn btn-outline-primary">{{_('Parents')}}</button></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <i class='fa-solid fa-user' style='font-size:110px'></i>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.students.list') }}"><button
                                class="btn btn-outline-primary">{{_('Adultes')}}</button></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <i class='fa-solid fa-user' style='font-size:110px'></i>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.teachers.list') }}"><button
                                class="btn btn-outline-primary">{{_('Professeurs')}}</button></a>
                    </div>
                </div>
            </div>
         
        </div>
    </div>
</div>
