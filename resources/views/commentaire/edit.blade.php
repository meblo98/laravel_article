@extends('layout.app')

@section('content')

<div class="container justify-content-center mt-3">
    <a href="" class="btn btn-link justify-content-center">Retour</a>
    <div class="row">
        <form action="{{ route('commentaire.edit', $commentaire->id) }}" method="POST">
            {!! csrf_field() !!}
            @method("GET")
            <div class="col-md-6">
                {{-- <input type="hidden" name="article_id" value="{{ $articles->id }}"> --}}
                <label>Nom complet</label>
                <input type="text" class="form-control" name="nom_complet_auteur" value="{{ $commentaire->nom_complet_auteur }}">
                <textarea class="mt-3" name="contenu" id="contenu" cols="70" rows="8">{{ $commentaire->contenu }}</textarea>
            </div>
            <button type="submit" class="btn btn-dark btn-sm"><i class="fa-solid fa-comment"></i>Commenter</button>
        </form>
    
@endsection