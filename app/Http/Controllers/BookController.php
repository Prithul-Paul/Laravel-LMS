<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private function category_author_publisher(){
        $category = Category::all();
        $author = Author::all();
        $publisher = Publisher::all();
        return ['category'=>$category, 'author'=>$author, 'publisher'=>$publisher];
   }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Book::with(['categories','authors','publishers'])->orderBy('id', 'desc')->paginate(5);
        // $result = Book::with(['categories','authors','publishers'])->get();
        // dd($result->toArray());
        return view('book.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $result = $this->category_author_publisher();
        return view('book.create', compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_name'=>['required', 'unique:books,book_name'],
            'book_category'=>['required'],
            'book_author'=>['required'],
            'book_publisher'=>['required'],
            'book_qty'=>['required'],
        ]);
        // dd($request->book_category);
        // dd(Book::first());
        $book_insert_arr = array(
            'book_name'=>$request->book_name,
            'author_id'=>$request->book_author,
            'publisher_id'=>$request->book_publisher,
            'status'=>1,
            'qty'=>$request->book_qty
        );
        $inserted_book_id = Book::create($book_insert_arr);
        $inserted_book_id->categories()->syncWithoutDetaching($request->book_category);
        return redirect()->route('books')->with('success', 'Book Inserted');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $category = Category::all();
        $author = Author::all();
        $publisher = Publisher::all();
        // $book = Book::with(['categories'])->find($book->id);
        // $trainer->skills->pluck('id');
        $books_cat_array = $book->categories->pluck('id');
        return view('book.edit', compact('book','category', 'author', 'publisher', 'books_cat_array'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $book)
    {
        $request->validate([
            'book_name'=>['required', 'unique:books,book_name,'.$book],
            'book_category'=>['required'],
            'book_author'=>['required'],
            'book_publisher'=>['required'],
            'book_qty'=>['required'],
        ]);
        $book_details = Book::find($book);
        $book_details->book_name = $request->book_name;
        $book_details->author_id  = $request->book_author;
        $book_details->publisher_id = $request->book_publisher;
        $book_details->qty = $request->book_qty;
        $book_details->save();
        $book_details->categories()->sync($request->book_category);
        return redirect()->route('books')->with('success', 'Book Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->categories()->detach();
        $book->delete();
    }
}
