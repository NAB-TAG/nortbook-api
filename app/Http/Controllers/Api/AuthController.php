<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Validators\AuthValidator;
use App\Services\AuthService;

class AuthController extends Controller
{
    private $authValidator;
    private $authService;

    public function __construct( AuthValidator $authValidator, AuthService $authService ){
        $this->authService = $authService;
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

        // Register a user
        $response = $this->authService->register( $request->all() );

        // Response
        return $response;
    }

    /**
     * Log in
     */
    public function login( Request $request )
    {
        // Validate data
        $validationResults = $this->authValidator->validateLogin( $request->all() );

        if( $validationResults->fails() ):
            return response()->json(["warning", "The user could not register", $validationResults->errors()->first()], 422);
        endif;

        // Log in user
        $response = $this->authService->login( $request->all() );

        // response
        return $response;
        
    }

    /**
     * Display the specified resource.
     */
    public function logout()
    {
        // Log out user
        $response = $this->authService->logout();

        // response
        return $response;
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
