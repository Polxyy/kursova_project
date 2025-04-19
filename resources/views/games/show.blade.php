<!DOCTYPE html>
<html>
<head>
    <title>{{ $game->title }}</title>
</head>
<body>
    <h1>{{ $game->title }}</h1>

    @if ($game->image_path)
        <div>
            <img src="{{ asset($game->image_path) }}" alt="{{ $game->title }}" style="max-width: 300px;">
        </div>
    @endif

    <p>Жанр: {{ $game->genre }}</p>
    <p>Година на издаване: {{ $game->release_year ?? 'Няма информация' }}</p>
    <p>Описание: {{ $game->description ?? 'Няма описание' }}</p>

    <a href="{{ route('games.edit', $game->id) }}">Редактирай</a>
    <a href="{{ route('games.index') }}">Обратно към списъка</a>
</body>
</html>