@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ИГРИИИ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  
                    <div class="d-flex flex-column align-items-center">
                        <h2>Добре дошли в библиотеката за игри!</h2>
                        <a href="{{ route('games.index') }}" class="btn btn-primary mt-3">Виж игрите</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection