<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Publisher::orderBy('id', 'desc')->paginate(5);
        // dd($result->toArray());
        return view('publisher.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'publisher'=>['required', 'unique:publishers,name']
        ]);
        Publisher::create(['name'=> $request->publisher]);
        return redirect()->to('publishers')->with('success', 'Publisher Added');
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        return view('publisher.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $publisher)
    {
        $request->validate([
            'publisher'=>['required', 'unique:publishers,name,'.$publisher]
        ]);
        $publisher_details = Publisher::find($publisher);
        $publisher_details->name = $request->publisher;
        $publisher_details->save();
        return redirect()->to('publishers')->with('success', 'Publisher Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $publisher = Publisher::find($id);
        $publisher->delete();
    }
}
