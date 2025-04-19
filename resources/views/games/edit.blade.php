<!DOCTYPE html>
<html>
<head>
    <title>Редактиране на {{ $game->title }}</title>
</head>
<body>
    <h1>Редактиране на {{ $game->title }}</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Заглавие:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $game->title) }}" required>
        </div>

        <div>
            <label for="genre">Жанр:</label>
            <input type="text" id="genre" name="genre" value="{{ old('genre', $game->genre) }}" required>
        </div>

        <div>
            <label for="release_year">Година на издаване:</label>
            <input type="number" id="release_year" name="release_year" value="{{ old('release_year', $game->release_year) }}">
        </div>

        <div>
            <label for="description">Описание:</label>
            <textarea id="description" name="description">{{ old('description', $game->description) }}</textarea>
        </div>

        <div>
            <label for="image">Снимка:</label>
            <input type="file" id="image" name="image">
            @if ($game->image_path)
                <div>
                    <img src="{{ asset($game->image_path) }}" alt="{{ $game->title }}" style="max-width: 200px;">
                </div>
            @endif
        </div>

        <button type="submit">Запази промените</button>
        <a href="{{ route('games.index') }}">Отказ</a>
    </form>
</body>
</html>