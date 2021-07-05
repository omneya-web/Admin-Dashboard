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
            <h1>Manage Admins</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Manage Admins</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <head>
<body>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Admins Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name </th>
                  <th>Email</th> 
                  <th>Phone</th>
                  <th>Last Login</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  
                @foreach($data as $admin)
                    <td>{{$admin['name']}}</td>
                    <td>{{$admin['email']}}</td>
                    <td>{{$admin['phone']}}</td>
                    <td>{{$admin['last_login']}}</td>
                  <td>        <a class="btn btn-primary btn-sm" href="/getAdminDetails/{{$admin['id']}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                         
                          </a>
                          <a class="btn btn-danger btn-sm" href="/deleteAdmin/{{$admin['id']}}">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a></td>
                </tr>
                @endforeach
               
                </tbody>
              </table>
              <div class="card-footer">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleAddModal">
                                 Add Admin
                        </button>
                        <!------------------------------------------------------------------------------------->
                        <div class="modal fade" id="exampleAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add new Admin</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                           <form method="post" action="{{route('addAdminUser')}}">
                                @csrf
                                <div class="container">
                                  <div class="row">
                                    <div class="col-md-8 offset-md-2 mt-4">
                                     <!-- Name -->
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
                                      
                                      <!-- End mobile type -->
                                      <!-- IS approved -->
                                      <!-- End of approve -->
                                        <button type="submit" class="btn btn-primary">Add</button>
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
                        <!------------------------------------------------------------------------------------->
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Password confirmation -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
            $('#password, #confirm_password').on('keyup', function () {
            if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
            } else 
            $('#message').html('Not Matching').css('color', 'red');
              });
</script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
@endsection