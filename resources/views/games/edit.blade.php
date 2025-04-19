@extends('layouts.app')

@section('content')
<h1>Редактиране на {{ $game->title }}</h1>
<form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Заглавие:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $game->title) }}" required>
    </div>
    <div class="form-group">
        <label for="genre">Жанр:</label>
        <input type="text" class="form-control" id="genre" name="genre" value="{{ old('genre', $game->genre) }}" required>
    </div>
    <div class="form-group">
        <label for="release_year">Година на издаване:</label>
        <input type="number" class="form-control" id="release_year" name="release_year" value="{{ old('release_year', $game->release_year) }}">
    </div>
    <div class="form-group">
        <label for="description">Описание:</label>
        <textarea class="form-control" id="description" name="description">{{ old('description', $game->description) }}</textarea>
    </div>
    <div class="form-group">
        <label for="image_path">Линк към снимка:</label>
        <input type="url" class="form-control" id="image_path" name="image_path" value="{{ old('image_path', $game->image_path) }}">
        <small class="form-text text-muted">Въведете URL адрес на снимката.</small>
        @if ($game->image_path)
        <div>
            <img src="{{ $game->image_path }}" alt="{{ $game->title }}" class="img-thumbnail" style="max-width: 200px;">
        </div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Запази промените</button>
    <a href="{{ route('games.index') }}" class="btn btn-secondary">Отказ</a>
</form>
@endsection