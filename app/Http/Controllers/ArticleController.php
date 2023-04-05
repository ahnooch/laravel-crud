<?php

namespace App\Http\Controllers;

use App\Models\article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Designation' => 'required',
            'stock' => 'required',
        ]);
        
        Article::create($request->post());

        return redirect()->route('articles.index')->with('success','article has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(article $article)
    {
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $article = Article::find($id);
    $designations = Article::distinct()->pluck('Designation');

    return view('articles.edit', compact('article', 'designations'));
}


    



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
{
    $request->validate([
        'Designation' => 'required',
        'stock' => 'required|numeric',
    ]);

    $article->Designation = $request->input('Designation');
    
    if ($request->has('add_to_stock')) {
        $article->stock += $request->input('stock');
    } elseif ($request->has('remove_from_stock')) {
        $article->stock -= $request->input('stock');
    } else {
        $article->stock = $request->input('stock');
    }

    $article->save();

    return redirect()->route('articles.index')->with('success','Article has been updated successfully');
}




 /**
     * Remove the specified resource from storage.
     */
    public function destroy(article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('Seuccuss');
    }
}
