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
            <h1>Add User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Add User</li>
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
              
                <div class="card-body" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1">FullName </label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail1">Mobile Number</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter phone Number">
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail1">Date-Of-Birth</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter date-Of-Birth">
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Address">
                  </div>
                  
                  <div class="form-group">
                  <label>Gender</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    
                  </select>
                </div>
                  <div class="form-group row">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputFile">Upload Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                      <form action="/action_page.php">
                           <label for="img">Select image:</label>
                               <input type="file" id="img" name="img" accept="image/*">
                            
                               
                      </div>
                      
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <a class="btn btn-primary " href="#">
                              Add
                          </a>
                </div>
              </form>
            </div>
            </body>
            <!-- /.card -->

            





















@endsection