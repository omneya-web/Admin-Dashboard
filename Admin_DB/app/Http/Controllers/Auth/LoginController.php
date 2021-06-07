<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Kreait\Firebase\Exception\FirebaseException;
use Illuminate\Validation\ValidationException;
use DB;
use Auth;
use App\User;
use App\admin;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function loginAdmin(Request $request)
    {
        $databaseinstance = app('firebase.firestore')->database()->collection('Admin');
        $query = $databaseinstance->where('admin_email', '=',  $request->email);
        $documents = $query -> documents();
      //  $documents = $databaseinstance -> documents();
        foreach ($documents as $document)
        {
            if ($document->exists())
            {     
                if($document->data()['admin_password'] == $request->password)
                {
                    $user = new User();
                    $user->firebase_id = $document->id();
                    $user->name = $document->data()['admin_name'];
                    $user->email = $request->email;
                    $user->password = $request->password;
                    $user->save();
                    Auth::login($user);
                    
                        return redirect()->route('home');
                    
                }
            } 
        }
           
    }
}
