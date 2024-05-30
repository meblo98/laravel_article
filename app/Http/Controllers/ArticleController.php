<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public $articles;
    public function __construct(){
        $this->articles = new Article();

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
        return redirect('articles');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->articles->create($request->all());
        return redirect('articles');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {

        $articles = Article::with('commentaires')->find($id);
        return view('articles.detail', compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response['articles'] = $this->articles->find($id);
        return view('articles.edit')->with($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $articles = $this->articles->find($id);
        $articles->update(array_merge($articles->toArray(), $request->toArray()));
        return redirect('articles');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $articles = $this->articles->find($id);
        $articles->delete();
        return redirect('articles');
    }
}
