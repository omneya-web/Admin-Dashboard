<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Google\Cloud\Firestore\FirestoreClient;

class placesController extends Controller
{
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
   
}
