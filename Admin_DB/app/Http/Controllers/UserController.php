<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userDetails()
    {

        return view('userDetails');
    }
    public function showMedical()
    {

        return view('medical');
    }
}
