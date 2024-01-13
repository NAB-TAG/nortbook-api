<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Cookie;

class BookService
{
    public function store( array $data )
    {
        $book = new Book();
        $book->title = $data[ "title" ];
        $book->publication_year = $data[ "publication_year" ];
        $user = auth('sanctum')->user();
        $book->author = $user->name;
        

        if ( $book->save() ) {
            return response()->json(["success", "Successful operation", "The book has registered successfully."], 201);
        } else {
            return response()->json(["error", "Failed operation", "The book has can not registered for a problem the server, cominicate have the admin."], 500);
        }
    }


    public function index()
    {
        $books = Book::orderBy('id', 'asc')->paginate(
                $perPage = 12, $columns = [ "*" ]
            )->onEachSide(0);
        return $books;
    }

    
}