<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Google\Cloud\Firestore\FirestoreClient;

class feedbackController extends Controller
{
    
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
