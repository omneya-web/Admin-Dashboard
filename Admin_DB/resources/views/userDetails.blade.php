@extends('layouts.includes')

@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>UserDetails</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>
                </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
              <li></li>
                    <label for="exampleInputEmail1">FullName </label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                  </div>
                  <div class="form-group row">
                  <li></li>
                    <label for="exampleInputEmail1">Email </label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group row">
                  <li></li>
                    <label for="exampleInputEmail1">Address </label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter address">
                  </div>
                <div class="form-group">
                <li>  <label>Gender</label></li>
                
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">gender</option>
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
             </div>
              <!-- /.col -->
        <div class="col-md-6">
              
                <div class="form-group row">
                <li></li>
                    <label for="exampleInputEmail1">Phone Number </label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter phoneNumber">
                  </div>
                 
                  <div class="form-group row">
                  <li></li>
                  <label for="exampleInputEmail1">Date-Of-Birth</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="DD/MM/YYYY">
                            
                         </div>

                         <div class="form-group row">
                  <li></li>
                    <label for="exampleInputEmail1">Register_Date </label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                  </div>


                  <div class="form-group row">
                  <li></li>
                    <label for="exampleInputEmail1">Last_Login </label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                  </div>
                         
                </div> 
                <!-- /.form-group -->
                
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="card-footer">
                <a class="btn btn-primary " href="/medical">
                              Medical Record
                          </a>
                </div>
       </div>
       </section>
            
@endsection