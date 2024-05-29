<?php

namespace App\Http\Controllers;

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
        $commentaire = Commentaire::all();
        return view('articles.detail', compact('commentaire'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('commentaire.create');
        return redirect('articles.detail');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->commentaire->create($request->all());
        return redirect('commentaire');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
