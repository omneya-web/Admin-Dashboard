<?php

namespace App\Http\Controllers;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Http\Request;
use Auth;

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
        if(!Auth::user()->isApproved) 
        {
             Auth::logout();
            return redirect('/login');
        }
        $users_cnt  = 0;
        $admins_cnt = 0;
          
      $databaseinstance_admin = app('firebase.firestore')->database()->collection('users');
      $documents_admin = $databaseinstance_admin -> documents();
       foreach($documents_admin as $document)
       {
        if ($document->exists())
        {
           $users_cnt++;
        }
       } 
      $databaseinstance_user = app('firebase.firestore')->database()->collection('Admin');
      $documents_user = $databaseinstance_user -> documents();
       foreach($documents_user as $document)
       {
        if ($document->exists())
        {
            $admins_cnt++;
        }
       } 
        return view('home',['users_cnt' => $users_cnt],['admins_cnt' => $admins_cnt]);
    }
       
   
    public function profile()
    {

        return view('adminprofile');
    }
   
    public function Admins()
    {

        return view('admins');
    }
    
    public function addUser()
    {

        return view('addUser');
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
