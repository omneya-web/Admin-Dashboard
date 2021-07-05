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
            <h1>Add Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Add Admin</li>
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
              <form method = "post" action = "{{route('addAdminUser')}}" >
              @csrf
                <div class="card-body" >
                  <div class="form-group row">
                    <label for="exampleInputEmail1">FullName </label>
                    <input name="fullname" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail1">Mobile Number</label>
                    <input name="phone" type="tel" class="form-control" id="exampleInputEmail1" placeholder="012-34-567-890" pattern="[0-9]{3}[0-9]{2}[0-9]{3}[0-9]{3}" required>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail1">Date-Of-Birth</label>
                    <input name="dateofbirth" type="date" class="form-control" id="exampleInputEmail1" placeholder="Enter date-Of-Birth" required>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail1">Gender </label>
                    <input name="gender" list="gender" class="form-control" id="exampleInputEmail1" required>
                    <datalist id="gender">
                    <option value="Male">
                    <option value="Female">
                    </datalist>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input name="confirm_password" type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" required>
                    <span id='message'></span>
                  </div>
                  <!-- JavaScript -->
                  
                    <!-- JavaScript---End-->
                  <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add</button>
                </div>
              </form>
                </div>
                <!-- /.card-body -->
              
              
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
            $('#password, #confirm_password').on('keyup', function () {
            if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
            } else 
            $('#message').html('Not Matching').css('color', 'red');
              });
            </script>
            </body>
            <!-- /.card -->


</html>
@endsection