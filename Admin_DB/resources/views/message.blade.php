@extends('layouts.includes')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Message</h1>
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
            
            <!-- /.card-header -->
            <div class="card-body" align="center">
                
            <textarea class=" form-control form-rounded" name="message" rows="9" cols="50"></textarea>
            
              <a class="btn btn-primary btn-sm-1" href="/reply" >

                              <i class="fas fa-reply" >
                              </i>
                              Reply
                          </a>
            </div>

 


@endsection