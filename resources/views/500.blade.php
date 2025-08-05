<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Erreur 500</title>
</head>
<body>
    <h1>Erreur interne du serveur</h1>
    <p>Une erreur est survenue. Merci de réessayer plus tard.</p>

    {{-- Optionnel : affiche le message si le debug est activé --}}
    @if(config('app.debug'))
        <p style="color:red;">{{ $exception->getMessage() }}</p>
    @endif
</body>
</html>
