<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Validators\BookValidator;
class BookController extends Controller
{
    private $bookValidator;
    public function __construct( BookValidator $bookValidator )
    {
        $this->bookValidator = $bookValidator;  
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate data
        $validationResults = $this->bookValidator->validate( $request->all() );

        if( $validationResults->fails() ):
            return response()->json(["warning", "The book could not save", $validationResults->errors()->first()], 422);
        endif;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
