@extends('layout.app')
@section('content')
    <div class="container mb-3 mt-3">

        <div class="col-md-6-ml-3">

            <div class="row g-0 border rounded overflow-hidden flex-md-col mb-4 shadow-sm h-md-1000 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <div class="col-6 d-flex ">
                        <img src="{{ $articles->image_url }}" class="card-rounded mx-auto h-50 d-block" alt="image article">
                    </div>
                    <div class="col-5">
                        <strong class="d-inline-block mb-2 text-success-emphasis">{{ $articles->categorie }}</strong>
                        <h3 class="mb-0">{{ $articles->nom }}</h3>
                        <div class="mb-1 text-body-secondary">{{ $articles->created_at }}</div>
                        <p class="mb-auto">{{ $articles->description }}</p>
                    </div>
                </div>

            </div>

            <a class="d-inline-flex mb-3" href="{{ route('articles.edit', $articles->id) }}">
                <button class="btn btn-primary btn-sm">
                    <i class="fa-solid fa-pencil"></i>    Modifier
                </button>
            </a>
            <form action="{{ route('articles.destroy', $articles->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>  Supprimer</button>
            </form>
        </div>
        <div class="row">

            <div class="col-md-6">
                <form action="{{ route('commentaire.store') }}" method="POST" style="display:inline">
                    @csrf
                    <div class="col-md-6">
                        <input type="hidden" name="article_id" value="{{ $articles->id }}">
                        <label>Nom complet</label>
                        <input type="text" class="form-control" name="nom_complet_auteur">
                        <textarea class="mt-3" name="contenu" id="contenu" cols="40" rows="5"></textarea>
                        <button type="submit" class="btn btn-dark btn-sm"><i class="fa-solid fa-comment"></i>   Commenter</button>
                    </div>

                </form>
            </div>
            <div class="col-md-6">
                <h3><i class="fa-solid fa-comments"></i> Commentaires</h3>
                <hr>
                @foreach ($articles->commentaires as $comment)
                    <h6>Auteur : {{ $comment->nom_complet_auteur }} </h6>
                    <p>{{ $comment->contenu }}</p>
                    <a class="d-inline-flex mb-3" href="{{ route('articles.edit', $articles->id) }}">
                        <button class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-pencil"></i>   Modifier
                        </button>
                    </a>
                    <form action="{{ route('commentaire.destroy', $articles->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>  Supprimer</button>
                    </form>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
