<?php

namespace App\Http\Controllers;

class UserProductController extends Controller
{
    public function docall(string $name)
    {
        return $name;
//        return view('fruits');
    }
}
