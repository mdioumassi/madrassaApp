@extends('layouts.app')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{_('Dashboard')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.parents.list')}}">{{_('Parents')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{_('Les enfants')}}</li>
            </ol>
          </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Liste des enfants') }}</div>
                    <div class="card-body">
                        <a href="{{ route('admin.parents.list') }}"><button class="btn btn-primary mb-3">Liste des
                                parents</button></a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="bg-success text-light">#</th>
                                    <th class="bg-success text-light">Genre</th>
                                    <th class="bg-success text-light">Nom</th>
                                    <th class="bg-success text-light">Prénom</th>
                                    <th class="bg-success text-light">Date de naissance</th>
                                    <th class="bg-success text-light">Classe Française</th>
                                    <th class="bg-success text-light">Parent</th>
                                    <th class="bg-success text-light">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($children->count() == 0)
                                    <tr>
                                        <td colspan="8" class="text-center">Aucun enfant trouvé</td>
                                    </tr>
                                @endif
                                @foreach ($children as $child)
                                @if($child->parent->type == 'parent')
                                <tr>
                                    <th>{{ $child->id }}</th>
                                    <td>{{ $child->genre }}</td>
                                    <td>{{ $child->firstname }}</td>
                                    <td>{{ $child->lastname }}</td>
                                    <td>{{ $child->birthdate }}</td>
                                    <td>{{ $child->french_class }}</td>
                                    <td>
                                        @if($child->parent->type == 'parent')
                                            <a href="{{ route('admin.users.show', $child->parent->id) }}">{{ $child->parent->name }}</a>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modal-view-detail-child{{ $child->id }}">{{ _('View') }}</button>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#modal-view-edit-child{{ $child->id }}">{{ _('Edit') }}</button>
                                        <form action="{{ route('children.destroy', $child->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">{{ _('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        {!! $children->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($children as $child)
        @include('admin.children._modal.child-show', ['child' => $child])
        @include('admin.children._modal.child-edit', ['child' => $child])
    @endforeach
@endsection
