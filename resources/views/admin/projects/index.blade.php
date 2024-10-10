@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-between align-items-center mb-4">
            <div class="col-6">
                <h2>Elenco progetti</h2>
            </div>
            <div class="col-6 text-end">
                <!-- Pulsante per creare un nuovo progetto -->
                <a href="{{ route('admin.projects.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> New Project
                </a>
            </div>
        </div>

        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Anteprima</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>URL</th>
                        <th>Slug</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>
                                <img src="{{ $project->image ? asset('storage/' . $project->image) : 'https://placehold.co/600x400?text=Immagine+copertina' }}"
                                    alt="{{ $project->title }}" class="img-fluid"
                                    style="width: 80px; height: 80px; object-fit: cover;">
                            </td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->url }}</td>
                            <td>{{ $project->slug }}</td>
                            <td>
                                <div class="d-flex flex-column gap-1">
                                    <!-- Pulsante per visualizzare il progetto -->
                                    <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <!-- Pulsante per modificare il progetto -->
                                    <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <!-- Form per eliminare il progetto -->
                                    <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete-post">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modale per la conferma dell'eliminazione -->
    @include('admin.projects.partials.modal_delete')
@endsection
