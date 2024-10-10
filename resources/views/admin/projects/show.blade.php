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
                        <h2 class="mb-0">{{ $project->title }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Colonna dell'immagine -->
                            <div class="col-md-6 d-flex align-items-center">
                                <img src="{{ $project->image ? asset('storage/' . $project->image) : 'https://placehold.co/600x400?text=Immagine+copertina' }}"
                                    alt="{{ $project->title }}" class="img-fluid"
                                    style="max-width: 100%; height: auto; max-height: 400px; width: 100%;">
                            </div>

                            <!-- Colonna dei testi -->
                            <div class="col-md-6">
                                <p><strong>Slug:</strong> {{ $project->slug }}</p>
                                <p><strong>Description:</strong> {{ $project->description }}</p>
                                <p><strong>URL:</strong> <a href="{{ $project->url }}"
                                        target="_blank">{{ $project->url }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
