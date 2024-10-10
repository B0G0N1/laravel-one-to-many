<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Boolfolio</title>

    @vite(['resources/js/app.js'])
</head>

<body>
    @include('partials.header')

    <main class="d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="container text-center">
            <!-- Introduzione al sito -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="mb-4">Benvenuti su Laravel Boolfolio</h1>
                    <p class="lead">
                        Laravel Boolfolio è un portfolio online dove puoi condividere i tuoi progetti di coding.
                        Carica i tuoi progetti, visualizza i dettagli e mostra al mondo il tuo lavoro.
                    </p>
                </div>
            </div>

            <!-- Sezione delle funzionalità -->
            <div class="row mt-5">
                <div class="col-md-4">
                    <i class="fas fa-code fa-3x mb-3"></i>
                    <h3>Carica i tuoi Progetti</h3>
                    <p>
                        Aggiungi facilmente i tuoi progetti di coding, inclusi titolo, descrizione e link al repository.
                    </p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-eye fa-3x mb-3"></i>
                    <h3>Visualizza e Condividi</h3>
                    <p>
                        Visualizza i dettagli dei tuoi progetti e condividili con amici e colleghi.
                    </p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-laptop-code fa-3x mb-3"></i>
                    <h3>Progetti Open Source</h3>
                    <p>
                        Condividi i tuoi progetti open source e contribuisci alla community di sviluppatori.
                    </p>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-success btn-lg mt-4 py-3 px-5">
                        Inizia a Caricare i tuoi Progetti
                    </a>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
