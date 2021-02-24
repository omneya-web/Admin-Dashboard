<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
       
   
    public function profile()
    {

        return view('adminprofile');
    }
    public function Users ()
    {

        return view('users');
    }
    public function Admins()
    {

        return view('admins');
    }
    
    public function addUser()
    {

        return view('addUser');
    }
    public function addAdmin()
    {

        return view('addAdmin');
    }

    public function primary()
    {

        return view('primary');
    }
    public function feedback()
    {

        return view('feedback');
    }
    public function places()
    {

        return view('places');
    }
    public function message()
    {

        return view('message');
    }
    public function reply()
    {

        return view('reply');
    }



    

   











}
