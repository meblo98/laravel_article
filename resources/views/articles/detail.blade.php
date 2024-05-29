@extends('layout.app')
@section('content')

<div class="container">
    <div class="col-md-6-ml-3">

        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-1000 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <div class="col-auto d-flex d-lg-block">
                    <img src="{{ $articles->image }}" class="card-img-top" alt="image article">
                </div>
            <strong class="d-inline-block mb-2 text-success-emphasis">{{ $articles->categorie }}</strong>
            <h3 class="mb-0">{{ $articles->nom }}</h3>
            <div class="mb-1 text-body-secondary">{{ $articles->created_at }}</div>
            <p class="mb-auto">{{ $articles->description }}</p>
        </div>

        </div>
        <div class="row d-inline-flex">
            <a href="{{ route('articles.index')}}" class="icon-link gap-1 icon-link-hover stretched-link">
                Retourner
                <svg class="bi"><use xlink:href="#chevron-right"/></svg>
            </a>
        </div>
        <a class="d-inline-flex mb-3"  href="{{ route('articles.edit', $articles->id) }}">
            <button class="btn btn-primary btn-sm">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier
            </button>
        </a>
        <form action="{{ route('articles.destroy', $articles->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
        </form>
        </div>
        <div class="comm">
            <h3>Commentaires</h3>
            <form action="{{ route('commentaire.store', $articles->id) }}" method="POST" style="display:inline">
                <div class="col-md-6">
                    <label>Nom complet</label>
                    <input type="text" class="form-control" name="nom_complet_auteur">
                    <textarea class="mt-3" name="contenu" id="contenu" cols="50" rows="10"></textarea>
                    <button type="submit" class="btn btn-danger btn-sm">Commenter</button>
                </div>

            </form>
            @foreach($articles->commentaire as $comment)
            <h4>Auteur :  {{ $comment->nom_complet_auteur }} </h4>
            <p>{{ $comment->contenu }}</p>
            @endforeach
        </div>
</div>

@endsection
