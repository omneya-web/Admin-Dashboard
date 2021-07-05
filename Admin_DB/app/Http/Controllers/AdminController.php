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
         'admin_img'=> $request->img,
      ];
      //Uploading image to firebase storage
      $image = $request->img; 
      $name     = $id;  
      $localfolder = public_path('firebase-temp-uploads') .'/'; 
     
      $extension = $image->getClientOriginalExtension();  
      $file      = $name. '.' . $extension;  
      if ($image->move($localfolder, $file)) 
      {  
         $uploadedfile = fopen($localfolder.$file, 'r');  
      }
    
      //moving image from firebase storage to firebase firestore
      //$imageReference = app('firebase.storage')->getBucket()->object($firebase_storage_path.'/'.$id);  
      $image_url = $file;
        

     $databaseinstance ->update([
         ['path' => 'admin_birthDate','value' => $request->dateofbirth],
         ['path' => 'admin_gender','value' => $request->gender],
         ['path' => 'admin_name','value' => $request->name],
         ['path' => 'admin_password','value' => $request->password],
         ['path' => 'admin_phone','value' => $request->phone],
         ['path' => 'admin_img','value' => $image_url],
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
         'phone',
         'last_login'
       ];
       
   $databaseinstance = app('firebase.firestore')->database()->collection('Admin');
   $documents = $databaseinstance -> documents();
   try {
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
             $admins['last_login'] = $document->data()['last_login'];
             $data[] = $admins; 
         }
     }
    }
   } catch(\Exception $exception) {
       return view('adminsError');
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
         'admin_img',
         'last_login'
       ];
       
   $databaseinstance = app('firebase.firestore')->database()->collection('Admin')->document($id);
   $snapshot = $databaseinstance->snapshot();
    if ($snapshot->exists())
    {
            $arr = $snapshot->data();
            
                $admin = $arr;
                $admin['adminId'] = $snapshot->id();
                $admin['email'] = $snapshot->data()['admin_email'];
                $admin['name']= $snapshot->data()['admin_name'];
                $admin['birthDate'] = $snapshot->data()['admin_birthDate'];
                $admin['gender']= $snapshot->data()['admin_gender'];
                $admin['phone'] = $snapshot->data()['admin_phone'];
                $admin['password'] = $snapshot->data()['admin_password'];
                $admin['admin_img'] = $snapshot->data()['admin_img'];
                $admin['last_login'] = $snapshot->data()['last_login'];
                $data[] = $admin;
            
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
  
}