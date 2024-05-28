@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h2>Liste des articles articles</h2>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">Créer un nouvel article</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Descriptin</th>
                <th>Date de création</th>
                <th>Descriptin</th>
                <th>Image</th>
                <th>A la une</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->content }}</td>
                <td>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('articles.show', $article->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('articles.edit', $article->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
