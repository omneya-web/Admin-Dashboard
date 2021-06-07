@extends('layouts.includes')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> AdminProfile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Admin Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
          @foreach($data as $admin)
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="/dist/img/user2-160x160.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"></h3>

                <p class="text-muted text-center"></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                  <input type="text" class="form-control" id="inputName" value= "{{$admin['name']}}">
                  </li>
                  <li class="list-group-item">
                  <input type="email" class="form-control" id="inputEmail" value= "{{$admin['email']}}">
                  </li>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$admin['adminId']}}">
                                 Edit Profile
                        </button>
                </ul>

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!------------------------------------------------------------------------>
            <div class="modal fade" id="exampleModal{{$admin['adminId']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                           <form method="post" action="/updateAdmin/{{$admin['adminId']}}">
                                @csrf
                                <div class="container">
                                  <div class="row">
                                    <div class="col-md-8 offset-md-2 mt-4">
                                      <!-- hidden -->
                                      <input type="hidden" value="{{$admin['name']}}" name="refEmail">
                                      <input type="hidden" value="{{$admin['email']}}" name="refType">


                                       <!-- Name -->
                                      <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" class="form-control" id="inputName" name="name" value="{{$admin['name']}}">
                                      </div>
                                      <!-- End of Name -->
                                      <!-- EMail, Password -->
                                      <div class="form-row">
                                      
                                        <div class="form-group col-md-6">
                                          <label for="inputPassword4">Password</label>
                                          <input type="password" class="form-control" id="inputPassword4" name="password" value="{{$admin['password']}}">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="inputName">Gender</label>
                                        <input type="text" class="form-control" id="inputName" name="gender" value="{{$admin['gender']}}">
                                      </div>
                                      <!-- End EMail password -->
                                       <!-- Address -->
                                      <div class="form-group">
                                        <label for="inputAddress">Date of Birth</label>
                                        <input type="text" class="form-control" id="inputAddress" name="dateofbirth" value="{{$admin['birthDate']}}"> 
                                      </div>
                                      <!-- End of Name -->
                                      
                                       <!-- mobile , type -->
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputPhone4">Phone</label>
                                          <input type="Phone" class="form-control" id="inputPhone4" name="phone" value="{{$admin['phone']}}">
                                        </div>
                                       
                                      </div>
                                      <!-- End mobile type -->
                                      <!-- IS approved -->
                                      <!-- End of approve -->
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                  </div>
                                </div>
                               </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!------------------------------------------------------------------------>
            <!-- About Me Box -->
            <div class="card card-primary">
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills"></ul>
                   <div class="card-body">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputaddress" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="inputaddress" value= "{{$admin['name']}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputphonenumber" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-7">
                          <input class="form-control" id="inputphonenumber" value= "{{$admin['phone']}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputdateofbirth" class="col-sm-2 col-form-label">Date of Birth</label>
                        <div class="col-sm-7">
                          <input class="form-control" id="inputdateofbirth" value= "{{$admin['birthDate']}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputphonenumber" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-7">
                          <input class="form-control" id="inputphonenumber" value = "{{$admin['gender']}}">
                        </div>
                      </div>
                    @endforeach
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  


@endsection
