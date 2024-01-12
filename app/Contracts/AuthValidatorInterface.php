<?php

namespace App\Contracts;

use Illuminate\Contracts\Validation\Validator;

interface AuthValidatorInterface
{
    public function validate( array $data ): Validator;
    // public function validateEdit( array $data ): Validator;
}
