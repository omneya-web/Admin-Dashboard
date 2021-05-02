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

class AdminController extends Controller
{
    //
    public function adminDetails()
    {

        return view('adminDetails');
    }
    public function addAdmin()
    {

        return view('addAdmin');
    }
    public function addAdminUser(Request $request) 
   {

   $databaseinstance = app('firebase.firestore')->database()->collection('Admin')->newDocument();
    $data= [
        'admin_birthDate' => $request->dateofbirth,
        'admin_email' => $request->email,
        'admin_id' => $request->phone,
        'admin_gender'=> $request->gender,
        'admin_name'=> $request->fullname,
        'admin_password'=> Hash::make($request->password),
        'admin_phone'=> $request->phone,
     ];
    $databaseinstance ->set($data);
    return redirect()->route('addAdmin');
   }

   public function getAllAdmin() 
   {
       $admins = [
         'id', 
         'dateofbirth',
         'email',
         'gender',
         'name',
         'phone'
       ];
       
   $databaseinstance = app('firebase.firestore')->database()->collection('Admin');
   $documents = $databaseinstance -> documents();
   foreach($documents as $document)
   {
    if ($document->exists())
    {
        $arr = $document->data();
        $arr['id'] = $document->id();
        $admins = $arr;
        $admins['email'] = $document->data()['admin_email'];
        $admins['name']= $document->data()['admin_name'];
        $data[] = $admins; 
    }
   }
   return view('admins')->with('data',$data);
   }

   public function deleteAdmin($id)
   {
      $databaseinstance = app('firebase.firestore')->database()->collection('Admin')->document($id)->delete();
      return redirect()->back()->with('DELETED', 'Deleted');
   }
   
}
