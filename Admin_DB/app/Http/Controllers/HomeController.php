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
        $this->middleware('auth');
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
<<<<<<< Updated upstream
=======
       

    public function profile()
    {

        return view('Profile');
    }
<<<<<<< Updated upstream
    public function feedback()
        {

          return view('feedback');
        }
        public function places()
        {

          return view('places');
        }
        public function primaryexamination()
        {
            return view('primaryexamination');
        }
        public function message()
        {
            return view('message');
        }

        public function reply()
        {
            return view('reply');
        }
    

>>>>>>> Stashed changes
}
=======


   











}
>>>>>>> Stashed changes
