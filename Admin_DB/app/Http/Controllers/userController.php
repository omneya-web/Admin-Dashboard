<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;


class userController extends Controller
{
  public function addUserForm() {

    return view('dashboard.addUser');
  }
   public function addUser(Request $request) 
   {
       /*
   	// CHECK IF ESXITS
   	if (User::where('email', $request->email)->exists()) 
      {

   		return redirect()->back()->with('fail', 'EMAILL  exists');

	     }

   	// Add in database



   	$user = new User();
   	$user->name 		   = $request->name ;
   	$user->email   		 = $request->email;
   	$user->password  	 = Hash::make($request->password);
   	$user->Address     = $request->address;
   	$user->Phone       = $request->phone;
   	$user->Type   		 = $request->type;
   	$user->isApproved  = 1;
   	$user->save();

         */
    // Add in fireStore 
  /* $db = new FirestoreClient([
        'projectid' => 'loginproj-1',
    ]);
*/
   $db = app('firebase.firestore')->database()->collection('users')->newDocument();
  	$phdata= [
    'PharmacyAddress' => $request->address,
    'PharmacyEmail' => $request->email,
    'PharmacyName' => $request->name,
    'PharmacyPassword' =>$request->password,
    'PharmacyPhone' => $request->phone,
    'PharmacyType' => $request->type,
    'IsApproved' => 1

	  ];
    $data= [
    'user_address' => 'haram',
    'user_birthDate' => '1/1/1111',
    'user_email' => 'test@test.com',
    'user_gender'=> 'male',
    'user_id' => '1',
    'user_image' => 'dummy',
    'user_lastLogin'=> 'dummy',
    'user_name'=> 'dummy',
    'user_password'=> 'dummy',
    'user_phone'=> 'dummy',
    'user_registerDate'=> 'dummy',
     ];
    $db ->set($data);
   // user or pharamacy
   /* 
    if($request->type == 3) {

    	$docRef = $db->collection('Pharmacies')->add($phdata);
    }else {
            $docRef = $db->collection('Users')->add($data);
    }
    	//$docRef =$docRef->addDocument();

    	return redirect()->back()->with('success', 'User is added');
    */
   }

   public function Users() 
   {

    $users = User::all();

    return view('users')->with('users' , $users);

   }
   
   //---------------------------------------------------------------------------//
   /*
   public function showUser() 
    {

    	$data =[];

    	 $db = new FirestoreClient([
        'projectId' => 'loginproj-1',
   		 ]);

       //admin 
       // show all products 
       
       //if(Auth::User()->Type == 0) 
       //{

          $Ref = $db->collection('Users');
          $documents = $Ref->documents();
            foreach ($documents as $document) 
            {
              if ($document->exists()) 
              {
                  $arr = $document->data();
                  $arr['id'] = $document->id();
                  $data []= $arr;
      
              } 
           }

        //}else   

         //pharmacy 
        // show its products 
        /*
         {
          $docRef = $db->collection('Products');
          $query = $docRef->where('PharmacyEmail' , '=' , Auth::User()->email) ;
          $documents = $query->documents();
          foreach ($documents as $document) 
          {
             if ($document->exists()) {
      
                  $arr = $document->data();
                  $arr['id'] = $document->id();
                  $data []= $arr;
      
             } 
          }
        }
        
   return view('showUser')->with('data' ,$data );


    }
    */
    //-------------------------------------------------------------------------------//
   //DELETEUSER
   public function userDetails()
    {

        return view('userDetails');
    }
    public function showMedical()
    {

        return view('medical');
    }
   public function deleteUser($email ) 
   {
    // type from SQL 
    $user = User::where('email', '=', $email)->first();
    $type = $user->Type ;
    //for fireStore
     $db = new FirestoreClient([
        'projectid' => 'loginproj-1',
      ]);
   


    // check pharmacy or NOT 
    if($type == 3) {

     // pharamcy or admin

     $docRef = $db->collection('Pharmacies');
     $query = $docRef->where('PharmacyEmail' , '=' , $email) ;
    $documents = $query->documents();
     foreach ($documents as $document) 
     {
        if ($document->exists()) {

            $db->collection('Pharmacies')->document($document->id())->delete();

      
        } 
     }

    }else{

      // pharamcy or admin

     $docRef = $db->collection('Users');
     $query = $docRef->where('UserEmail' , '=' , $email) ;
    $documents = $query->documents();
     foreach ($documents as $document) 
     {
        if ($document->exists()) {

            $db->collection('Users')->document($document->id())->delete();

      
        } 
     }

    }
    //End firebase


      //for SQL 
    DB::table('users')->where('email', $email)->delete();



      return redirect()->back()->with('DELETED', 'Deleted');

   }
   public function updateUser(Request $request) 
   {

     DB::table('users')
        ->where('email',  $request->refEmail)  // find your user by their email
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array(
         'Address' => $request->address,
         'name' => $request->name,
         'password' =>Hash::make($request->password),
         'Phone' => $request->phone,
         'IsApproved' => $request->approve,
        ));  // update the record in the DB.

        // check pharamcy or

         //  Update record in fireStore


    //for fireStore
     $db = new FirestoreClient([
        'projectid' => 'loginproj-1',
      ]);
   


    // check pharmacy or NOT 
    if($request->refType == 3) {

     // pharamcy or admin

     $docRef = $db->collection('Pharmacies');
     $query = $docRef->where('PharmacyEmail' , '=' , $request->refEmail) ;
     $documents = $query->documents();
     foreach ($documents as $document) 
     {
        if ($document->exists()) {

            $docRef->document($document->id())->set([

                     'PharmacyAddress' => $request->address,
                     'PharmacyEmail' => $request->refEmail,
                     'PharmacyName' => $request->name,
                     'PharmacyPassword' =>$request->password,
                     'PharmacyPhone' => $request->phone,
                     'PharmacyType' => $request->refType,
                     'IsApproved' => $request->approve,

                  ]);


      
        } 
     }

    }else{

      // pharamcy or admin

     $docRef = $db->collection('Users');
     $query = $docRef->where('UserEmail' , '=' ,$request->refEmail) ;
    $documents = $query->documents();
     foreach ($documents as $document) 
     {
        if ($document->exists()) {

            $docRef->document($document->id())->set([

                    
                     'address' => $request->address,
                     'firstName' => $request->email,
                     'lastName' => $request->name,
                     //'UserPassword' =>$request->password,
                     //'UserPhone' => $request->phone,
                     'userType' => $request->type,

                  ]);


      
        } 
     }

    }
    //End firebase


      return redirect()->back()->with('UPDATED', 'UPDATED');
   }




}
