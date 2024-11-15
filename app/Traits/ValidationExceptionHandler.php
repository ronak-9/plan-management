<?php

namespace App\Traits;

use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

trait ValidationExceptionHandler
{
    protected function failedValidation(Validator $validator)
    {
        Session::flash('error', $validator->messages()->first());
        throw (new ValidationException($validator))->errorBag($this->errorBag)->redirectTo($this->getRedirectUrl());
    }
}
