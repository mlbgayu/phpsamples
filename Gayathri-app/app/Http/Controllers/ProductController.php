<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

class ProductController extends BaseController
{
    public function fruits()
    {
        return view("Apple");
    }

}
