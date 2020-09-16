<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $book = Book::all()->toArray();
        return array_reverse($book);
    }

    public function add(Request $req)
    {
        $book = new Book([
            'title' => $req->input('title'),
            'author' => $req->input('author'),
            'publisher' => $req->input('publisher'),
            'year' => $req->input('year'),
        ]);
        $book->save();

        return response()->json('SUKSES MASUK DATA');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    public function update($id, Request $req)
    {
        $book = Book::find($id);
        $book->update($req->all());
        
        return response()->json('SUKSES UPDATE');
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();

        return response()->json('SUKSES DELETE');
    }
}
