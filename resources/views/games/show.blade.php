@extends('layouts.app')

@section('content')
    <h1>{{ $game->title }}</h1>
    @if ($game->image_path)
        <div>
            <img src="{{ asset($game->image_path) }}" alt="{{ $game->title }}" class="img-thumbnail" style="max-width: 300px;">
        </div>
    @endif
    <p><strong>Жанр:</strong> {{ $game->genre }}</p>
    <p><strong>Година на издаване:</strong> {{ $game->release_year ?? 'Няма информация' }}</p>
    <p><strong>Описание:</strong> {{ $game->description ?? 'Няма описание' }}</p>
    <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning">Редактирай</a>
    <a href="{{ route('games.index') }}" class="btn btn-secondary">Обратно към списъка</a>
@endsection