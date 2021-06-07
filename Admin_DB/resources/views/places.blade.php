@extends('layouts.includes')
@section('content')

 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Places</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Places</li>
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
                  <th>Name</th>
                  <th>Location</th>
                  <th>Phone</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                @foreach($data as $place)
                    <td>{{$place['place_name']}}</td>
                    <td>{{$place['place_location']}}</td>
                    <td>{{$place['place_phone']}}</td>
                    <td>{{$place['place_type']}}</td>
                  <td>   
                  <!----------------need---action-------------->    
                  
                  <a class="btn btn-primary btn-sm" href="/viewPlace/{{$place['place_id']}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                        
                          <a class="btn btn-danger btn-sm" href="/deletePlace/{{$place['place_id']}}">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a></td>
                </tr>
                @endforeach
                </tbody>
                
              </table>
              <!------------------------------------------------------------------------------------->
              
              <!------------------------------------------------------------------------------------->
               <div class="card-footer">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleAddModal">
                                 Add
                        </button>
                        <!------------------------------------------------------------------------------------->
                        <div class="modal fade" id="exampleAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add new place</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                           <form method="post" action="/addPlace">
                                @csrf
                                <div class="container">
                                  <div class="row">
                                    <div class="col-md-8 offset-md-2 mt-4">
                                     <!-- Name -->
                                      <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" class="form-control" id="inputName" name="place_name" placeholder="Name">
                                      </div>
                                      <!-- End of Name -->

                                      <div class="form-group">
                                        <label for="inputName">Location</label>
                                        <input type="text" class="form-control" id="inputName" name="place_location" placeholder="Location">
                                      </div>
                                      <!-- End EMail password -->
                                       <!-- Address -->
                                      <div class="form-group">
                                        <label for="inputPhone4">Phone</label>
                                        <input type="text" class="form-control" id="inputPhone4" name="place_phone" placeholder="Phone"> 
                                      </div>
                                      <div class="form-group">
                                        <label for="inputName">Type</label>
                                        <input type="text" class="form-control" id="inputName" name="place_type" placeholder="Type">
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
