<?php

namespace App\Http\Controllers;

use App\Functions\MyFunctions;

abstract class Controller
{
    public function showGreeting()
    {
        $greeting = MyFunctions::greet('Samuel Rai');
        return view('pages.user.home', ['greeting' => $greeting]);
    }
}