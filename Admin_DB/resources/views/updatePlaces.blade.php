@extends('layouts.includes')

@section('content')

<html>
<head>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Place</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Update Place</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
</head>
<body>
    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- form start -->
              @foreach($data as $place)
              <form method="post" action="/updatePlaces/{{$place['place_id']}}">
              @csrf
                <div class="card-body" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1">Name </label>
                    <input name="place_name" type="text" class="form-control" id="exampleInputEmail1" value ="{{$place['place_name']}}">
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail1">Location</label>
                    <input name="place_location" type="text" class="form-control" id="exampleInputEmail1" value ="{{$place['place_location']}}">
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail1">Phone</label>
                    <input name="place_phone" type="phone" class="form-control" id="exampleInputEmail1" value ="{{$place['place_phone']}}">
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail1">Type</label>
                    <input name="place_type" type="text" class="form-control" id="exampleInputEmail1" value ="{{$place['place_type']}}">
                  </div>
                  <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
              @endforeach
                </div>
                <!-- /.card-body -->
              
              
            </div>
            </body>
            <!-- /.card -->

@endsection