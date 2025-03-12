<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento do Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Gerenciamento do Evento</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
            
                    <li class="nav-item"><a class="nav-link" href="{{ route('pessoa.index') }}">Pessoas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('sala.index') }}">Salas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('espacocafe.index') }}">Espaços de Café</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('etapa.index') }}">Etapas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('alocacao.index') }}">Alocar Pessoas</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
