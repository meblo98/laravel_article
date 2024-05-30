@extends('layout.app')

@section('content')
<div class="container">
    <h3 align="center" class="mt-5 -mb-2">Enregistré un articles</h3>
<div class="row">
<div class="form-area">
    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label>Titre</label>
                <input type="text" class="form-control" name="nom">
            </div>
            <div class="col-md-6">
                <label>Image</label>
                <input type="text" placeholder="mettez l'url de l'image" class="form-control" name="image">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Catégorie</label>
                <input type="text" class="form-control" name="categorie">
            </div>
            <div class="col-md-6">
                <label>Tendance</label>
                <select class="form-select" name="a_la_une" aria-label="Default select example">
                    <option selected>choissir la tendance</option>
                    <option value="A la une">A la une</option>
                    <option value="Non">Non</option>
                  </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Description</label>
                {{-- <input type="text" class="form-control" name="description"> --}}
                <textarea name="description" class="form-control" id="description"  cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <input type="submit" class="btn btn-info mb-3" value="enregistrer">
            </div>
        </div>
    </form>
</div>
</div>
</div>
@endsection
