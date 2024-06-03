<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{


    public $commentaire;
    public function __construct(){
        $this->commentaire = new Commentaire();

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->get();
        $commentaire = Commentaire::all();
        return view('articles.detail', compact('commentaire'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.detail');
        return redirect('articles.detail');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->commentaire->create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articles = Article::all();
        $response['commentaire'] = $this->commentaire->find($id);
        return view('commentaire.edit')->with($response);
     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $commentaires = $this->commentaire->find($id);
        $commentaires->update(array_merge($commentaires->toArray(), $request->toArray()));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commentaires = $this->commentaire->findOrFail($id);
        $commentaires->delete();
        return redirect()->back();
    }
}
