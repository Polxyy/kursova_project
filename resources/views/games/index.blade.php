<!DOCTYPE html>
<html>
<head>
    <title>Библиотека за игри</title>
    <style>
        nav {
            background-color: #f8f9fa;
            padding: 10px;
            margin-bottom: 20px;
            border-bottom: 1px solid #dee2e6;
        }

        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #007bff;
        }

        nav form {
            display: inline;
        }

        nav button {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            text-decoration: none;
            font-size: inherit;
            padding: 0;
            margin-left: 15px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('games.index') }}">Игри</a>
        @auth
            <a href="{{ route('home') }}">Начало</a> {{-- Ако искате връзка към /home --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Изход</button>
            </form>
        @else
            <a href="{{ route('login') }}">Вход</a>
            <a href="{{ route('register') }}">Регистрация</a>
        @endauth
    </nav>
    <h1>Списък с игри</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('games.create') }}">Добави нова игра</a>

    @if ($games->count() > 0)
        <ul>
            @foreach ($games as $game)
                <li>
                    @if ($game->image_path)
                        <img src="{{ asset($game->image_path) }}" alt="{{ $game->title }}" style="max-width: 50px; vertical-align: middle;">
                    @endif
                    <a href="{{ route('games.show', $game->id) }}">{{ $game->title }}</a> ({{ $game->release_year ?? 'Няма година' }}) - {{ $game->genre }}
                    <a href="{{ route('games.edit', $game->id) }}">Редактирай</a>
                    <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Сигурни ли сте, че искате да изтриете тази игра?')">Изтрий</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Няма добавени игри.</p>
    @endif
</body>
</html>