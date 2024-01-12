<?php

namespace App\Validators;

use App\Contracts\AuthValidatorInterface;
use Illuminate\Contracts\Validation\Validator;

use App\Rules\ForbiddenWordsRule;


class AuthValidator implements AuthValidatorInterface
{
    public function validate(array $data): Validator
    {
        $rules = [
            'name' => ['required', 'max:60', 'string', new ForbiddenWordsRule],
            'email' => ['required', 'max:100', 'email'],
            'password' => ['required', 'min:8', 'max:255', 'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/']

        ];

        $messages = [
            'name.required' => 'The name is required, please enter a name to continue',
            'name.max' => 'The name must have less than 60 characters.',
            'name.string' => 'The name must be a text.',
            'email.required' => 'The email is required. please enter a email to continue',
            'email.max' => 'The email must have less than 100 characters.',
            'email.email' => 'The email must be in a valid email format.',
            'password.required' => 'The password is required, please enter a name to continue',
            'password.max' => 'The password must have less than 100 characters.',
            'password.regex' => 'The password must have at least one letter capital, a number and a symbol.'
        ];

        // Accedemos a la clase Validator en el espacio de nombres global, no es Illuminate\Contracts\Validation\Validator
        return \Validator::make($data, $rules, $messages);
    }
}