<?php

namespace App\Traits;

use Illuminate\Support\Facades\Session;

trait FlashMessages
{
    public function successMessage($message)
    {
        Session::flash('success', $message);
    }

    public function errorMessage($message)
    {
        Session::flash('error', $message);
    }

    public function serverErrorMessage($message = null){
        $message = $message ?? __('messages.server.internal');
        $this->errorMessage($message);
    }
}
