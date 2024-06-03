@extends('layout.app')
@section('content')
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <a href="{{ route('articles.index') }}" class="btn btn-dark mb-3"> < Retour</a>
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">Bienvenu dans la poste {{ $articles->nom }} !</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posté le {{ $articles->created_at }} par meblo barham</div>
                        <!-- Post categories-->
                        <a class="badge bg-secondary text-decoration-none link-light"
                            href="#!">{{ $articles->a_la_une }}</a>
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded" src="{{ $articles->image_url }}" alt="..." />
                    </figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4">{{ $articles->description }}</p>
                        <p class="fs-5 mb-4 d-flex">
                            <a class="d-inline-flex mb-3" href="{{ route('articles.edit', $articles->id) }}">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-pencil"></i> Modifier
                                </button>
                            </a>
                        <form action="{{ route('articles.destroy', $articles->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                                Supprimer</button>
                        </form>
                        </p>
                    </section>
                </article>
                <!-- Comments section-->
                <section class="mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            <form action="{{ route('commentaire.store') }}" method="POST" style="display:inline">
                                @csrf
                                <div class="col-md-6">
                                    <input type="hidden" name="article_id" value="{{ $articles->id }}">
                                    <label>Nom complet</label>
                                    <input type="text" class="form-control @error('nom_complet_auteur') is-invalid @enderror" value="{{ old('nom_complet_auteur') }}" name="nom_complet_auteur">
                                    <textarea class="mt-3 @error('contenu') is-invalid @enderror" name="contenu"  value="{{ old('contenu') }}" id="contenu" cols="40" rows="5"></textarea>
                                    <button type="submit" class="btn btn-dark btn-sm"><i class="fa-solid fa-comment"></i>
                                        Commenter</button>
                                </div>

                            </form> <!-- Comment with nested comments-->

                            <!-- Single comment-->
                            <div class="col d-block">
                                <hr>
                                @foreach ($articles->commentaires as $comment)
                                    <div class="ms-3">
                                        <div class="flex-shrink-0"><img class="rounded-circle"
                                                src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="fw-bold">{{ $comment->nom_complet_auteur }}</div>
                                        {{ $comment->contenu }}
                                    </div>
                                    <a class="d-inline-flex mb-3  justify-content-end"
                                        href="{{ route('commentaire.edit', $comment->id, $articles->id) }}">
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fa-solid fa-pencil"></i> Modifier
                                        </button>
                                    </a>
                                    <form action="{{ route('commentaire.destroy', $comment->id) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fa-solid fa-trash"></i>
                                            Supprimer</button>
                                    </form>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..."
                                aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">Web Design</a></li>
                                    <li><a href="#!">HTML</a></li>
                                    <li><a href="#!">Freebies</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">JavaScript</a></li>
                                    <li><a href="#!">CSS</a></li>
                                    <li><a href="#!">Tutorials</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Side Widget</div>
                    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use,
                        and feature the Bootstrap 5 card component!</div>
                </div>
            </div>
        </div>
    </div>


@endsection
