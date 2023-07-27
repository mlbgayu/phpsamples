<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class UserController  extends  BaseController
{
 public function gayathri()
 {
     return view("Hello");
 }
    public function bhavya()
    {
        return view("Beautiful");
    }

}
