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
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @foreach($data as $user)
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{$user['image']}}"
                       alt="User profile picture">
                </div>
                <span id='message'></span>
                </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
              <li></li>
                    <label for="exampleInputEmail1">FullName </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value= "{{$user['name']}}" readonly>
                  </div>
                  <div class="form-group row">
                  <li></li>
                    <label for="exampleInputEmail1">Email </label>
                    <input type="email" class="form-control" id="exampleInputEmail1" value= "{{$user['email']}}" readonly>
                  </div>
                  <div class="form-group row">
                  <li></li>
                    <label for="exampleInputEmail1">Address </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value= "{{$user['address']}}" readonly>
                  </div>
                  <div class="form-group row">
                  <li></li>
                    <label for="exampleInputEmail1">Gender </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value= "{{$user['gender']}}" readonly>
                  </div>
             </div>
              <!-- /.col -->
        <div class="col-md-6">
              
                <div class="form-group row">
                <li></li>
                    <label for="exampleInputEmail1">Phone Number </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value= "{{$user['phone']}}" readonly>
                  </div>
                 
                  <div class="form-group row">
                  <li></li>
                  <label for="exampleInputEmail1">Date-Of-Birth</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" value= "{{$user['birthDate']}}" readonly>
                            
                         </div>

                         <div class="form-group row">
                  <li></li>
                    <label for="exampleInputEmail1">Register_Date </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value= "{{$user['registerDate']}}" readonly>
                  </div>
                  <div class="form-group row">
                  <li></li>
                    <label for="exampleInputEmail1">Last Login </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value= "{{$user['lastLogin']}}" readonly>
                  </div>     
                </div> 
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="card-footer">
              <input type="hidden" name="status" class="form-control" id="status" value= "{{$user['isEnabled']}}" >
                        <a id="btnid"class="btn btn-primary btn-sm" href="/disableEnableUser/{{$user['id']}}"><i class = "fas fa"></i>Enable</a>
                        </div>
            </div>
            <!-- /.row -->
            
       </div>
       </section>
       @endforeach
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
            $( function () 
            {
            if ($('#status').val() == 1) 
            {
            $('#message').html('User is Enabled').css('color', 'green');
            $('#btnid').text('Disable');
            } else 
            {
              $('#message').html('User is Disabled').css('color', 'red');
              $('#btnid').text('Enable');
            }
              });
            </script>      
@endsection