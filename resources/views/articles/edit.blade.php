@extends('layout.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Gestion des articles</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('articles.update', $articles->id) }}">
                {!! csrf_field() !!}
                  @method("PATCH")
                    <div class="row">
                        <div class="col-md-6">
                            <label>Titre</label>
                            <input type="text" class="form-control" name="nom" value="{{ $articles->nom }}">
                        </div>
                        <div class="col-md-6">
                            <label>Image</label>
                            <input type="text" class="form-control" name="image" value="{{ $articles->image }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Categorie</label>
                            <input type="text" class="form-control" name="categorie" value="{{ $articles->categorie }}">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Description</label>
                            {{-- <input type="text" class="form-control" name="phone" value="{{ $articles->description }}"> --}}
                            <textarea name="description" class="form-control" id="description" value="{{ $articles->description }}" cols="30" rows="10"></textarea>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>

                    </div>
                </form>
            </div>

            </div>
        </div>
    </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:#b3e5fc;
        }

        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }

        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush
