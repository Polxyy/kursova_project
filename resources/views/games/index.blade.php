@extends('layouts.app')

@section('content')
    <h1>Списък с игри</h1>
    <p><a href="{{ route('games.create') }}" class="btn btn-primary">Добави нова игра</a></p>
    @if ($games->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Снимка</th>
                    <th>Заглавие</th>
                    <th>Жанр</th>
                    <th>Година</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($games as $game)
                    <tr>
                        <td>
                            @if ($game->image_path)
                                <img src="{{ asset($game->image_path) }}" alt="{{ $game->title }}" style="max-width: 50px; vertical-align: middle;">
                            @endif
                        </td>
                        <td><a href="{{ route('games.show', $game->id) }}">{{ $game->title }}</a></td>
                        <td>{{ $game->genre }}</td>
                        <td>{{ $game->release_year ?? '-' }}</td>
                        <td>
                            <a href="{{ route('games.edit', $game->id) }}" class="btn btn-sm btn-warning">Редактирай</a>
                            <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Сигурни ли сте, че искате да изтриете тази игра?')">Изтрий</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Няма добавени игри.</p>
    @endif
@endsection