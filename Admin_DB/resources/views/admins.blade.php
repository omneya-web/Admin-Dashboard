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
                  <th>Admin_Name </th>
                  <th>Admin_Email</th>
                  
                  <th>Last_Login</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                
                  <tr class="table-active">

                    
                <tr>
                  
                @foreach($data as $admin)
                    <td>{{$admin['name']}}</td>
                    <td>{{$admin['email']}}</td>
                  <td></td>
                  
                  <td>                          <a class="btn btn-primary btn-sm" href="/adminDetails#">
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
</body>
</html>
@endsection