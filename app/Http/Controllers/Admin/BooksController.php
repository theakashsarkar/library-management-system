<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\addBook;
use App\Models\Book;
use App\Models\categories;
use Illuminate\Http\Request;
use App\Models\author;
use App\Models\publishers;
use App\Http\Requests\BookRequest;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.pages.Books.index', ['books' => Book::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.Books.index',['categories' => categories::all(), 'authors' => author::all(), 'publishers' => publishers::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {

        $book = new Book();
        $book->author_id = $request->author_id;
        $book->publisher_id = $request->publishers_id;
        $book->category_id = $request->category_id;
        $book->book_name  = $request->book_name;
        $book->book_title = $request->book_title;
        $book->subject = $request->subject_name;
        $book->numberOfPages = $request->numberOfPages;
        $book->status = $request->status;
        $book->language = $request->language;
        $book->datePublish = $request->publish_date;
        $book->totalCopy  = $request->total_copy;

        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $book->image = $imageName;
        }
        $book->save();
        return redirect('/admin/books')->with('success', 'book successfully create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.pages.Books.index',['categories' => categories::all(), 'authors' => author::all(), 'publishers' => publishers::all(),'book' => Book::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
