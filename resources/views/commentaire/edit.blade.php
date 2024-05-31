@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="{{ route('commentaire.update', $commentaire->id) }}">
            {!! csrf_field() !!}
            @method("PATCH")
            <div class="col-md-6">
                <input type="hidden" name="article_id" value="{{ $articles->id }}">
                <label>Nom complet</label>
                <input type="text" class="form-control" name="nom_complet_auteur" value="{{ $commentaire->nom_complet_auteur }}">
                <textarea class="mt-3" name="contenu" id="contenu" cols="40" rows="5">value="{{ $commentaire->contenu }}"</textarea>
                <button type="submit" class="btn btn-dark btn-sm"><i class="fa-solid fa-comment"></i>Commenter</button>
            </div>
        </form>
    
@endsection