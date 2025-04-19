@extends('layouts.app')

@section('content')
<h1>Добавяне на нова игра</h1>
<form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Заглавие:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
    </div>
    <div class="form-group">
        <label for="genre">Жанр:</label>
        <input type="text" class="form-control" id="genre" name="genre" value="{{ old('genre') }}" required>
    </div>
    <div class="form-group">
        <label for="release_year">Година на издаване:</label>
        <input type="number" min="1900" max="2099" step="1" value="2025" class="form-control" id="release_year" name="release_year" value="{{ old('release_year') }}">
    </div>

    <div class="form-group">
        <label for="description">Описание:</label>
        <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
    </div>
    <div class="form-group">
        <label for="image_path">Линк към снимка:</label>
        <input type="url" class="form-control" id="image_path" name="image_path" value="{{ old('image_path') }}">
        <small class="form-text text-muted">Въведете URL адрес на снимката.</small>
    </div>
    <button type="submit" class="btn btn-primary">Запази</button>
    <a href="{{ route('games.index') }}" class="btn btn-secondary">Отказ</a>
</form>
@endsection