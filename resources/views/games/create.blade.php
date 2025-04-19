<!DOCTYPE html>
<html>
<head>
    <title>Добавяне на игра</title>
</head>
<body>
    <h1>Добавяне на нова игра</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="title">Заглавие:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="genre">Жанр:</label>
            <input type="text" id="genre" name="genre" value="{{ old('genre') }}" required>
        </div>

        <div>
            <label for="release_year">Година на издаване:</label>
            <input type="number" id="release_year" name="release_year" value="{{ old('release_year') }}">
        </div>

        <div>
            <label for="description">Описание:</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="image">Снимка:</label>
            <input type="file" id="image" name="image">
        </div>

        <button type="submit">Запази</button>
        <a href="{{ route('games.index') }}">Отказ</a>
    </form>
</body>
</html>