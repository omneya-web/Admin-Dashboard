@extends('layouts.includes')

@section('content')
<style>
.sliderfortestandbest{
  height: 400px;
  width: 750px;
  overflow: hidden;
  box-shadow: 1px 1px 15px rgba(0,0,0,0.4);
}
.sliderfortestandbest .imagesofsliderfortestandbest{
  height: 100%;
  width: 100%;
}
.imagesofsliderfortestandbest .imgofslider{
  height: 100%;
  width: 100%;
}
.imagesofsliderfortestandbest .imgofslider2{
  height: 100%;
  width: 100%;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$users_cnt}}</h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$users_cnt}}<sup style="font-size: 20px"></sup></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$admins_cnt}}</h3>

                <p>Admins</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/admins" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$users_cnt}}</h3>

                <p> Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
    


        <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title"> Admins</h3>
                  <a href="/admins">View admins</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                <div class="sliderfortestandbest">
                    <div class="imagesofsliderfortestandbest">
                      <img class="imgofslider" src="/dist/img/manager1.jpeg">
                      <img class="imgofslider" src="/dist/img/manager2.jpg">
                      <img class="imgofslider" src="/dist/img/manager3.png">
                      <img class="imgofslider" src="/dist/img/manager4.jpg">
                      </div>
                  </div>
                </div>
                <!-- /.d-flex -->
              </div>
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Users</h3>
                  <a href="/users">View Users</a>
                </div>
              </div>
              <div class="card-body">
              <div class="d-flex">
              <div class="sliderfortestandbest">
                    <div class="imagesofsliderfortestandbest">
                      <img class="imgofslider2" src="/dist/img/people1.jpg">
                      <img class="imgofslider2" src="/dist/img/people2.jpg">
                      <img class="imgofslider2" src="/dist/img/people3.jpg">
                      </div>
                  </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
   </div>
   <script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>
<script>
      var indexValue = 0;
      function slideShow(){
        setTimeout(slideShow, 2500);
        var x;
        const img = document.querySelectorAll("img.imgofslider");
        for(x = 0; x < img.length; x++){
          img[x].style.display = "none";
        }
        indexValue++;
        if(indexValue > img.length){indexValue = 1}
        img[indexValue -1].style.display = "block";
      }
      slideShow();
    </script>
    <script>
      var indexValue = 0;
      function slideShow1(){
        setTimeout(slideShow1, 2500);
        var x;
        const img = document.querySelectorAll("img.imgofslider2");
        for(x = 0; x < img.length; x++){
          img[x].style.display = "none";
        }
        indexValue++;
        if(indexValue > img.length){indexValue = 1}
        img[indexValue -1].style.display = "block";
      }
      slideShow1();
    </script>
@endsection
