@extends('layouts.includes')
@section('content')

 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Feedback</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Feedback</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <!-- /.card -->

          <div class="card">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>E-Mail</th>
                  <th>Subject</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                @foreach($data as $feedback)
                    <td>{{$feedback['email']}}</td>
                    <td>{{$feedback['subject']}}</td>
                    <td>{{$feedback['date']}}</td>
                  <td>        
                       <a class="btn btn-primary btn-sm" href="/message/{{$feedback['id']}}">
                              <i class="fas fa-folder">
                              </i>
                              Read
                          </a>
                          
                          <a class="btn btn-danger btn-sm" href="/deleteFeedback/{{$feedback['id']}}">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                          </td>
                </tr>
                @endforeach
                </tbody>
                
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


    
@endsection
