<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Resources\api\BookResource;
// use App\Http\Resources\BooksResource;


class BookController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BooksResource::collection(Book::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$book = new Book;
		$book->account_id = 1;
		$book->user_id = 1;
		$book->contact_id = 1;
		$book->company_id = 1;
		$book->goal_id = $request->goal_id;
		$book->name = $request->name;
		$book->category = $request->category;
		$book->date_start = '2021-11-15 00:00:00';
		$book->date_due = '2021-11-19 00:00:00';
		$book->date_conclusion = $request->date_conclusion;
		$book->description = $request->description;
		$book->status = $request->status;
		$book->trash = 0;
        $book->save();
		
        return response()->json([
            'message' => "Projeto $request->name criado",
			'id' => $book->id,
			'name' => $book->name,
			'description' => $book->description,
			
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
		return new BookResource(Book::find($book->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
	
	/**
	 * Retorna os valores possíveis para SITUAÇÃO / STATUS 
	 */
	public function getBooksStatus() {
		return $status = Book::getStatus();
	}
	
}
