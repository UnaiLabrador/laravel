@extends('layout')
@section('content')
    <style>
        .uper {
            margin-top: 40px
        }
    </style>
    <div class="uper">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <button class="btn btn-primary">
            <a href="{{ route('games.create') }}" class="text-white text-decoration-none">Add Game</a>
        </button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Game Name</td>
                    <td>Game Price</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($games as $game)
                    <tr class="align-items-center">
                        <td>{{ $game->id }}</td>
                        <td>{{ $game->name }}</td>
                        <td>{{ $game->price }}</td>
                        <td><a href="{{ route('games.edit', $game->id) }}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('games.destroy', $game->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
