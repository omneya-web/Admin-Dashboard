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
            <h1>Manage Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Manage Users</li>
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
              <h3 class="card-title">Users Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name </th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>type</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach($users as $user)
                  <tr class="table-active">
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->Address}}</td>
                    <td>{{$user->Phone}}</td>
                    <td>{{$user->type}}</td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$user->id}}">
                                 Edit
                        </button>

                        <a href="/dashboard/deleteUser/{{$user->email}}" class="btn btn-xs btn-info pull-right">Delete</a>

                      </div>
                    </td>
                   
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">UpdateUser</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                           <form method="post" action="{{ route('updateUser') }}">
                                @csrf
                                <div class="container">
                                  <div class="row">
                                    <div class="col-md-8 offset-md-2 mt-4">
                                      <!-- hidden -->
                                      <input type="hidden" value="{{$user->email}}" name="refEmail">
                                      <input type="hidden" value="{{$user->Type}}" name="refType">


                                       <!-- Name -->
                                      <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" class="form-control" id="inputName" name="name" value="{{$user->name}}">
                                      </div>
                                      <!-- End of Name -->
                                      <!-- EMail, Password -->
                                      <div class="form-row">
                                      
                                        <div class="form-group col-md-6">
                                          <label for="inputPassword4">Password</label>
                                          <input type="password" class="form-control" id="inputPassword4" name="password" >
                                        </div>
                                      </div>
                                      <!-- End EMail password -->
                                       <!-- Address -->
                                      <div class="form-group">
                                        <label for="inputAddress">Address</label>
                                        <input type="text" class="form-control" id="inputAddress" name="address" value="{{$user->Address}}"> 
                                      </div>
                                      <!-- End of Name -->
                                      
                                       <!-- mobile , type -->
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputPhone4">Phone</label>
                                          <input type="Phone" class="form-control" id="inputPhone4" name="phone" value="{{$user->Phone}}">
                                        </div>
                                       
                                      </div>
                                      <!-- End mobile type -->
                                      <!-- IS approved -->
                                       <div class="form-group">
                                       
                                          <select class="form-control" id="approve" name="approve">
                                            <option value="1">approve</option>
                                            <option value="0">not</option>
                                           
                                          </select>
                                      </div>
                                      <!-- End of approve -->

                                     
                                    
                                      <button type="submit" class="btn btn-primary">update</button>
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
                  @endforeach  
                
                </tbody>
                <tfoot>
                <tr>
                  
                </tr>
                </tfoot>
              </table>
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

<!-- jQuery -->
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