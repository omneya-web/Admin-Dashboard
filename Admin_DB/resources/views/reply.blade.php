@extends('layouts.includes')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reply</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-12">

          <!-- /.card -->

          <div class="card" style="height:90%">
            <div class="card-header">
            </div>
            <!--------------------------------------------------------------------------------------->
              <form method="post" action="/replyonFeedback/{{$email}}">
              @csrf
                <div class="card-body" >
                  <div class="form-group row">
                    <input name="user_feedback_response" type="text" class="form-control form-rounded" rows="9" cols="50" value ="Enter your reply here">
                  </div>
                  <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm-1">Send</button>
                </div>
              </form>
            <!-- /.card-header -->
            

 







@endsection