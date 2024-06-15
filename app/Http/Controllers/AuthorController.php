<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Author::orderBy('id', 'desc')->paginate(5);
        // dd($result->toArray());
        return view('author.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'author'=>['required', 'unique:authors,name']
        ]);
        Author::create(['name'=> $request->author]);
        return redirect()->to('authors')->with('success', 'Author Added');

    }

    /**
     * Display the specified resource.
     */
    // public function show(Author $author)
    // {
    //     dd($author);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $author)
    {
        //
        $request->validate([
            'author'=>['required', 'unique:authors,name,'.$author]
        ]);
        $author_details = Author::find($author);
        $author_details->name = $request->author;
        $author_details->save();
        return redirect()->to('authors')->with('success', 'Author Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $author = Author::find($id);
        $author->delete();
    }
}
