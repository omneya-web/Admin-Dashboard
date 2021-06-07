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
use App\admin;

class AdminController extends Controller
{
    //
    //----------------------------------------Methods-That-Handle-Admins-------------------------------------//
    public function addAdmin()
    {

        return view('addAdmin');
    }
    //----------------------------------------Method-End-Begin------------------------------------//
    public function addAdminUser(Request $request) 
   {

   $databaseinstance = app('firebase.firestore')->database()->collection('Admin')->newDocument();
    $data= [
        'admin_birthDate' => $request->dateofbirth,
        'admin_email' => $request->email,
        'admin_gender'=> $request->gender,
        'admin_name'=> $request->fullname,
        'admin_password'=> $request->password,
        'admin_phone'=> $request->phone,
     ];
    $databaseinstance ->set($data);
    return redirect()->route('addAdmin');
   }
    //----------------------------------------Method-End-Begin------------------------------------//
    public function updateAdminUser(Request $request,$id) 
    {
 
    $databaseinstance = app('firebase.firestore')->database()->collection('Admin')->document($id);
     $data= [
         'admin_birthDate' => $request->dateofbirth,
         'admin_gender'=> $request->gender,
         'admin_name'=> $request->name,
         'admin_password'=> $request->password,
         'admin_phone'=> $request->phone,
      ];
     $databaseinstance ->update([
         ['path' => 'admin_birthDate','value' => $request->dateofbirth],
         ['path' => 'admin_gender','value' => $request->gender],
         ['path' => 'admin_name','value' => $request->name],
         ['path' => 'admin_password','value' => $request->password],
         ['path' => 'admin_phone','value' => $request->phone],
         ]);
     return redirect()->back()->with('UPDATED', 'Updated');
    }
    //----------------------------------------Method-End-Begin------------------------------------//
   public function getAllAdmin() 
   {
       $admins = [
         'id', 
         'birthDate',
         'email',
         'gender',
         'name',
         'password',
         'phone'
       ];
       
   $databaseinstance = app('firebase.firestore')->database()->collection('Admin');
   $documents = $databaseinstance -> documents();
   foreach($documents as $document)
   {
    if ($document->exists())
    {
        if($document->id() != Auth::User()->firebase_id)
        {
            $arr = $document->data();
            $arr['id'] = $document->id();
            $admins = $arr;
            $admins['email'] = $document->data()['admin_email'];
            $admins['name']= $document->data()['admin_name'];
            $admins['phone'] = $document->data()['admin_phone'];
            $data[] = $admins; 
        }
    }
   }
   return view('admins')->with('data',$data);
   }
   //----------------------------------------Method-End-Begin------------------------------------//

   public function getAdminDetails($id) 
   {
       $admin = [
         'adminId', 
         'birthDate',
         'email',
         'gender',
         'name',
         'phone',
         'password',
         'lastlogin'
       ];
       
   $databaseinstance = app('firebase.firestore')->database()->collection('Admin');
   $documents = $databaseinstance -> documents();
   foreach($documents as $document)
   {
    if ($document->exists())
    {
        if($document->id() == $id)
        {
            $arr = $document->data();
            
                $admin = $arr;
                $admin['adminId'] = $document->id();
                $admin['email'] = $document->data()['admin_email'];
                $admin['name']= $document->data()['admin_name'];
                $admin['birthDate'] = $document->data()['admin_birthDate'];
                $admin['gender']= $document->data()['admin_gender'];
                $admin['phone'] = $document->data()['admin_phone'];
                $admin['password'] = $document->data()['admin_password'];
                $data[] = $admin;
            
        } 
    }
   }
   if($admin['adminId'] == Auth::User()->firebase_id)   
    {
        return view('adminprofile')->with('data',$data);
    }
   else
    {
        return view('adminDetails')->with('data',$data); 
    }
   }
   //----------------------------------------Method-End-Begin------------------------------------//
   public function deleteAdmin($id)
   {
      $databaseinstance = app('firebase.firestore')->database()->collection('Admin')->document($id)->delete();
      return redirect()->back()->with('DELETED', 'Deleted');
   }
   //----------------------------------------Method-End-Begin------------------------------------//
   //----------------------------------------Methods-That-Handle-Users-------------------------------------//
   public function getAllUsers() 
   {
       $users = [
         'id', 
         'birthDate',
         'email',
         'gender',
         'name',
         'phone'
       ];
       
   $databaseinstance = app('firebase.firestore')->database()->collection('users');
   $documents = $databaseinstance -> documents();
   foreach($documents as $document)
   {
    if ($document->exists())
    {
        
            $arr = $document->data();
            $arr['id'] = $document->id();
            $users = $arr;
            $users['email'] = $document->data()['user_email'];
            $users['name']= $document->data()['user_name'];
            $users['gender'] = $document->data()['user_gender'];
            $users['phone']= $document->data()['user_phone'];
            $data[] = $users; 
    }
   }
   return view('users')->with('data',$data);
   }
   //----------------------------------------Method-End-Begin------------------------------------//
   public function deleteUser($id)
   {
      $databaseinstance = app('firebase.firestore')->database()->collection('users')->document($id)->delete();
      return redirect()->back()->with('DELETED', 'Deleted');
   }
   //----------------------------------------Method-End-Begin------------------------------------//
   public function getUserDetails($id) 
   {
        $users = [
        'id', 
        'birthDate',
        'email',
        'gender',
        'name',
        'phone',
        'address',
        'registerDate'
        ];
       
   $databaseinstance = app('firebase.firestore')->database()->collection('users');
   $documents = $databaseinstance -> documents();
   foreach($documents as $document)
   {
    if ($document->exists())
    {
        if($document->id() == $id)
        {
            $arr = $document->data();
            $arr['id'] = $document->id();
            $users = $arr;
            $users['email'] = $document->data()['user_email'];
            $users['name']= $document->data()['user_name'];
            $users['gender'] = $document->data()['user_gender'];
            $users['phone']= $document->data()['user_phone'];
            $users['birthDate']= $document->data()['user_birthDate'];
            $users['address'] = $document->data()['user_address'];
            $users['registerDate']= $document->data()['user_registerDate'];
            $data[] = $users; 
            
        } 
    }
   }
   
   return view('userDetails')->with('data',$data);
   }
   //----------------------------------------Method-End-Begin------------------------------------//
   public function getUserMedicalRecord($id) 
   {
        $record = [
        'id',
        'rayName', 
        'rayDate',
        'reportTranslation',
        'record_exist'
        ];
       
   $databaseinstance = app('firebase.firestore')->database()->collection('medical_record');
   $documents = $databaseinstance -> documents();
   foreach($documents as $document)
   {
    if ($document->exists())
    { 
            
        $User_id =  $document->data()['user_id']->id();
        if(str_contains($User_id,$id))
        {
            $record['id'] = $document->id();
            $record['rayName'] = $document->data()['ray_name'];
            $record['rayDate']= $document->data()['ray_date'];
            $record['reportTranslation']= $document->data()['report_translation'];
            $record['record_exist']= '1';
            $data[] = $record;
            
        }
        else
        {
            $record['record_exist']= '0';
        }    
    }
   }  
        if($record['record_exist'] !=0)
        {
            return view('medical')->with('data',$data);
        }
        else
        {
            return redirect()->back()->with('not found', 'not found');
        }
   
   }
   //----------------------------------------Method-End-Begin------------------------------------//
   public function deleteUserMedicalRecord($id)
   {
      $databaseinstance = app('firebase.firestore')->database()->collection('medical_record')->document($id)->delete();
      return redirect()->back()->with('DELETED', 'Deleted');
   }
   //----------------------------------------Method-End-Begin------------------------------------//
   public function getUserMedicalRecordDetails($id)
   {
        $record = [
        'id',
        'rayName', 
        'rayDate',
        'reportDate',
        'reportTranslation',
        'record_exist'
        ];
     $databaseinstance = app('firebase.firestore')->database()->collection('medical_record');
     $documents = $databaseinstance -> documents();
     foreach($documents as $document)
     {
         if($document->exists())
         {
             if($document->id() == $id)
             {
                $record['id'] = $document->id();
                $record['rayName'] = $document->data()['ray_name'];
                $record['rayDate']= $document->data()['ray_date'];
                $record['reportDate']= $document->data()['report_date'];
                $record['reportTranslation']= $document->data()['report_translation'];
                $record['record_exist']= '1';
                $data[] = $record;
             }
         }
     }
     return view('medicalRecordDetails')->with('data',$data);
   }
    //----------------------------------------Method-End-Begin------------------------------------//
   //----------------------------------------Methods-That-Handle-Places-------------------------------------//
   public function getAllPlaces() 
   {
       $place = [
         'admin_id',
         'place_id', 
         'place_location',
         'place_name',
         'place_type',
         'place_phone'
       ];
       
   $databaseinstance = app('firebase.firestore')->database()->collection('places');
   $documents = $databaseinstance -> documents();
   foreach($documents as $document)
   {
    if ($document->exists())
    {
        
            $arr = $document->data();
            $place = $arr;
            $place['place_id'] = $document->id();
            $place['place_location'] = $document->data()['place_location'];
            $place['place_name']= $document->data()['place_name'];
            $place['place_type'] = $document->data()['place_type'];
            $place['place_phone'] = $document->data()['place_phone'];
            $data[] = $place; 
    }
   }
   return view('places')->with('data',$data);
   }
   //----------------------------------------Method-End-Begin------------------------------------//
   public function deletePlace($id)
   {
      $databaseinstance = app('firebase.firestore')->database()->collection('places')->document($id)->delete();
      return redirect()->back()->with('DELETED', 'Deleted');
   }
   //----------------------------------------Method-End-Begin------------------------------------//
   public function updatePlaces(Request $request,$id) 
   {
       $place = [
         'admin_id',
         'place_id', 
         'place_location',
         'place_name',
         'place_phone',
         'place_type'
       ];
       
    $databaseinstance = app('firebase.firestore')->database()->collection('places')->document($id);
    $data= [
        'place_location' => $request->place_location,
        'place_name' => $request->place_name,
        'place_phone' => $request->place_phone,
        'place_type' => $request->place_type,
     ];
    $databaseinstance ->update([
        ['path' => 'place_location','value' => $request->place_location],
        ['path' => 'place_name','value' => $request->place_name],
        ['path' => 'place_phone','value' => $request->place_phone],
        ['path' => 'place_type','value' => $request->place_type],
        ]);
        return redirect()->route('places');
   }
   //----------------------------------------Method-End-Begin------------------------------------//
   public function addPlace(Request $request) 
   {

   $databaseinstance = app('firebase.firestore')->database()->collection('places')->newDocument();
    $data= [
        'place_location' => $request->place_location,
        'place_name' => $request->place_name,
        'place_phone'=> $request->place_phone,
        'place_type'=> $request->place_type,
        'place_id' => '',
        'admin_id' =>app('firebase.firestore')->database()->collection('Admin')->document(Auth::User()->firebase_id),
     ];
    $databaseinstance ->set($data);
    return redirect()->back()->with('ADDED', 'Added');
   }
    //----------------------------------------Method-End-Begin------------------------------------//
    public function getPlace($id) 
   {
       $place = [
         'admin_id',
         'place_id', 
         'place_location',
         'place_name',
         'place_phone',
         'place_type'
       ];
       
   $databaseinstance = app('firebase.firestore')->database()->collection('places');
   $documents = $databaseinstance -> documents();
   foreach($documents as $document)
   {
    if ($document->exists())
    {
        if($document->id() == $id)
        {
            $arr = $document->data();
            $place = $arr;
            $place['place_id'] = $document->id();
            $place['place_location'] = $document->data()['place_location'];
            $place['place_name']= $document->data()['place_name'];
            $place['place_phone'] = $document->data()['place_phone'];
            $place['place_type'] = $document->data()['place_type'];
            $data[] = $place;
        }        
    }
   }
   return view('updatePlaces')->with('data',$data);
   }
   //----------------------------------------Method-End-Begin------------------------------------//
   //----------------------------------------Methods-That-Handle-FEEDBACK-------------------------------------//
   public function getAllFeedback() 
   {
       $feedback = [
         'email',
         'id', 
         'subject',
         'date'
       ];
       
   $databaseinstance = app('firebase.firestore')->database()->collection('feedback');
   $documents = $databaseinstance -> documents();
   foreach($documents as $document)
   {
    if ($document->exists())
    {
        
            $arr = $document->data();
            $feedback = $arr;
            $feedback['id'] = $document->id();
            $feedback['email'] = $document->data()['email'];
            $feedback['subject']= $document->data()['subject'];
            $feedback['date'] = $document->data()['date'];
            $data[] = $feedback; 
    }
   }
   return view('feedback')->with('data',$data);
   }
   //----------------------------------------Method-End-Begin------------------------------------//
   public function deleteFeedback($id)
   {
      $databaseinstance = app('firebase.firestore')->database()->collection('feedback')->document($id)->delete();
      return redirect()->back()->with('DELETED', 'Deleted');
   }
   //----------------------------------------Method-End-Begin------------------------------------//
   public function readFeedback($id) 
   {
       $feedback = [
         'id',
         'email', 
         'feedback'
       ];
       
   $databaseinstance = app('firebase.firestore')->database()->collection('feedback');
   $documents = $databaseinstance -> documents();
   foreach($documents as $document)
   {
    if ($document->exists())
    {
        if($document->id() == $id)
        {
            $arr = $document->data();
            $feedback = $arr;
            $feedback['id'] = $document->id();
            $feedback['email'] = $document->data()['email'];
            $feedback['feedback'] = $document->data()['feedback'];
            $data[] = $feedback; 
        }
    }
   }
   return view('message')->with('data',$data);
   }
   //----------------------------------------Method-End-Begin------------------------------------//
   public function reply($email)
   {

       return view('reply')->with('email',$email);
   }
   //----------------------------------------Method-End-Begin------------------------------------//
   public function replyonFeedback(Request $request,$email) 
   {
       $feedback = [
         'id',
         'email', 
         'feedback_response'
       ];
       
   $databaseinstance = app('firebase.firestore')->database()->collection('users');
   $query = $databaseinstance->where('user_email', '=',  $email);
   $documents = $query -> documents();
   foreach($documents as $document)
   {
    if ($document->exists())
    {
        $feedback['id'] = $document->id();
        $databaseinstance->document($feedback['id'])->update([
            ['path' => 'user_feedback_response','value' => $request->user_feedback_response],
            ]);
    }
   }
   return redirect()->back()->with('REPLIED', 'Replied');
   }
   //----------------------------------------Method-End-Begin------------------------------------//
}
