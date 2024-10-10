@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-dark text-white d-flex align-items-center justify-content-between">
                        <h2 class="mb-0">Create New Project</h2>
                        <!-- Link per tornare alla lista dei progetti -->
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-light">Back to Projects</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Campo per il titolo del progetto -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Project Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Slug generato automaticamente (disabilitato) -->
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                    value="{{ old('slug') }}" placeholder="Generato automaticamente" disabled>
                            </div>

                            <!-- Campo per la descrizione del progetto -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="5" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Campo per l'URL del progetto -->
                            <div class="mb-3">
                                <label for="url" class="form-label">Project URL</label>
                                <input type="url" class="form-control @error('url') is-invalid @enderror" id="url"
                                    name="url" value="{{ old('url') }}">
                                @error('url')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Campo per l'immagine del progetto -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Immagine</label>
                                <input type="file" name="image" id="image"
                                    class="form-control form-control-sm @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Pulsante per creare il progetto -->
                            <button type="submit" class="btn btn-primary">Create Project</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
