@extends('layouts.includes')

@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report Details</h1>
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
              @foreach($data as $record)
                    <label for="inputphonenumber">Report Translation </label>
                    <input type="text" class="form-control" id="inputphonenumber" value= "{{$record['reportTranslation']}}">
                  </div>
                  <div class="form-group row">
                  <li></li>
                    <label for="inputphonenumber">Report Date </label>
                    <input type="text" class="form-control" id="inputphonenumber" value= "{{$record['reportDate']}}">
                  </div>
             </div>
              <!-- /.col -->
        <div class="col-md-6"> 
                </div> 
                <!-- /.form-group -->
                @endforeach
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
      
                      </div>
                    </div>
                  </div>
       </section>
            
@endsection