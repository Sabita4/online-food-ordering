<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function userHome()
    {
        return view('about');
    }
    function adminNested()
    {
        return view('admin.Nested');
    }
}
