@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between mb-3">
                    <!-- Form per eliminare il progetto con conferma -->
                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                        onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina Progetto</button>
                    </form>

                    <!-- Link per tornare alla lista dei progetti -->
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back to Projects</a>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-dark text-white">
                        <h2 class="mb-0">Edit Project: {{ $project->title }}</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- Colonna dell'immagine attuale -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="current_image" class="form-label">Current Image</label>
                                        <div>
                                            <img src="{{ $project->image ? asset('storage/' . $project->image) : 'https://placehold.co/600x400?text=Immagine+copertina' }}"
                                                alt="{{ $project->title }}" class="img-fluid"
                                                style="max-width: 100%; height: auto; max-height: 400px;">
                                        </div>
                                    </div>
                                </div>

                                <!-- Colonna dei campi di input -->
                                <div class="col-md-6">
                                    <!-- Campo per il titolo del progetto -->
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Project Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title" value="{{ old('title', $project->title) }}"
                                            required>
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Slug generato automaticamente (disabilitato) -->
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Slug (Generato automaticamente)</label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                            value="{{ $project->slug }}" disabled>
                                    </div>

                                    <!-- Campo per la descrizione del progetto -->
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                            rows="5" required>{{ old('description', $project->description) }}</textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Campo per l'URL del progetto -->
                                    <div class="mb-3">
                                        <label for="url" class="form-label">Project URL</label>
                                        <input type="url" class="form-control @error('url') is-invalid @enderror"
                                            id="url" name="url" value="{{ old('url', $project->url) }}">
                                        @error('url')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Campo per aggiornare l'immagine -->
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Upload New Image</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            id="image" name="image">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Pulsante per aggiornare il progetto -->
                            <button type="submit" class="btn btn-primary">Update Project</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
