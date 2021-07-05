<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\FieldValue;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\admin;


class userController extends Controller
{
    //----------------------------------------Methods-That-Handle-Users-------------------------------------//
    public function getAllUsers() 
    {
        $users = [
          'id', 
          'birthDate',
          'email',
          'gender',
          'name',
          'phone',
          'user_no_rays',
          'user_no_reports'
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
             $users['user_no_rays'] = $document->data()['user_no_rays'];
             $users['user_no_reports']= $document->data()['user_no_reports'];
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
         'image',
         'gender',
         'name',
         'phone',
         'address',
         'isEnabled',
         'lastLogin',
         'registerDate'
         ];
        
    $databaseinstance = app('firebase.firestore')->database()->collection('users')->document($id);
    $snapshot = $databaseinstance->snapshot();
     if ($snapshot->exists())
     {
             $arr = $snapshot->data();
             $arr['id'] = $snapshot->id();
             $users = $arr;
             $users['email'] = $snapshot->data()['user_email'];
             $users['name']= $snapshot->data()['user_name'];
             $users['image']= $snapshot->data()['user_image'];
             $users['gender'] = $snapshot->data()['user_gender'];
             $users['phone']= $snapshot->data()['user_phone'];
             $users['birthDate']= $snapshot->data()['user_birthDate'];
             $users['address'] = $snapshot->data()['user_address'];
             $users['isEnabled']= $snapshot->data()['isEnabled'];
             $users['lastLogin']= $snapshot->data()['user_lastLogin'];
             $users['registerDate']= $snapshot->data()['user_registerDate'];
             $data[] = $users; 
             
      }
    if($users['isEnabled'] == 1)
    {
      $users['isEnabled'] = "user is enabled";
    }else
    {
      $users['isEnabled'] = "user is disabled";
    }
    return view('userDetails')->with('data',$data);
    }
    //----------------------------------------Method-End-Begin------------------------------------//
    public function disableEnableUser($id) 
    {
         $users = [
         'id', 
         'isEnabled'
         ];
        
    $databaseinstance = app('firebase.firestore')->database()->collection('users')->document($id);
    $snapshot = $databaseinstance->snapshot();
    
     if ($snapshot->exists())
     {
             $arr = $snapshot->data();
             $arr['id'] = $snapshot->id();
             $users = $arr;
             $users['isEnabled']= $snapshot->data()['isEnabled'];   
     }
    
    if($users['isEnabled'] == 1)
    {
      $databaseinstance ->update([
      ['path' => 'isEnabled','value' => FieldValue::increment(-1)],
      ]);
    }else
    {
      $databaseinstance ->update([
         ['path' => 'isEnabled','value' => FieldValue::increment(1)],
         ]);
    }
    return $this->getUserDetails($id);
    }
    //----------------------------------------Method-End-Begin------------------------------------//
    public function getUserMedicalRecord($id,$check) 
    {
         $record = [
         'id',
         'rayName', 
         'rayDate',
         'rayResult',
         'reportDate',
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
             $record['rayResult']= $document->data()['ray_result'];
             $record['reportDate']= $document->data()['report_date'];
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
            if($check == 1)
            {
               return view('medicalRays')->with('data',$data);
            }else if($check == 2)
            {
               return view('medicalReports')->with('data',$data);
            }
         }
         else
         {
             return redirect()->back()->with('not found', 'not found');
         }
    
    }
    //----------------------------------------Method-End-Begin------------------------------------//
    public function deleteUserMedicalRecord($id,$check)
    {
      $user_id ;
      $databaseinstance = app('firebase.firestore')->database()->collection('medical_record')->document($id);
      $document = $databaseinstance->snapshot();
      if ($document->exists())
      {
         $user_id = $document->data()['user_id']->id();
         $user_id = str_replace(' ', '', $user_id);
      }
      if($check == 1 )
      {
         app('firebase.firestore')->database()->collection('users')->document($user_id)->update([
            ['path' => 'user_no_rays','value' => FieldValue::increment(-1)],
         ]);
      }elseif($check == 2 )
      {
         app('firebase.firestore')->database()->collection('users')->document($user_id)->update([
            ['path' => 'user_no_reports','value' => FieldValue::increment(-1)],
         ]);
      }
      app('firebase.firestore')->database()->collection('medical_record')->document($id)->delete();
       return redirect()->back()->with('DELETED', 'Deleted');
    }
    //----------------------------------------Method-End-Begin------------------------------------//
    public function getUserMedicalRecordDetails($id,$check)
    {
         $record = [
         'id',
         'rayName', 
         'rayDate',
         'rayResult',
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
                 $record['rayResult']= $document->data()['ray_result'];
                 $record['reportDate']= $document->data()['report_date'];
                 $record['reportTranslation']= $document->data()['report_translation'];
                 $record['record_exist']= '1';
                 $data[] = $record;
              }
          }
      }
      if($check == 1)
      {
         return view('medicalRaysDetails')->with('data',$data);
      }elseif($check == 2)
      {
         return view('medicalReportsDetails')->with('data',$data);
      }
      
    }
     //----------------------------------------Method-End-Begin------------------------------------//
   
}
