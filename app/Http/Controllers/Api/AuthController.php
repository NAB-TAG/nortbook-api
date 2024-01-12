<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Validators\AuthValidator;
class AuthController extends Controller
{
    private $authValidator;

    public function __construct( AuthValidator $authValidator ){
        $this->authValidator = $authValidator;
    }
    /**
     * Register user
     */
    public function register( Request $request )
    {
        // Validate data
        $validationResults = $this->authValidator->validate( $request->all() );

        if( $validationResults->fails() ):
            return response()->json(["warning", "The user could not register", $validationResults->errors()->first()], 422);
        endif;

        
        return response()->json(["success", "Validation is finished", "Everything is in order."], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
