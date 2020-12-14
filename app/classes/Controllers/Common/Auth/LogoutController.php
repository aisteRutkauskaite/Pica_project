<?php

namespace App\Controllers\Auth;

use App\App;

class LogoutController
{
    public function logout()
    {
        App::$session->logout('/login');
    }

}