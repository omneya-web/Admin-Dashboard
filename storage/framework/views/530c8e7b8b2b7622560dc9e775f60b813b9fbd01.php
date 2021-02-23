

<?php $__env->startSection('content'); ?>
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="/dist/img/user2-160x160.jpg"
                       alt="User profile picture">
                </div>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Name</b> <a class="float-right">Admin name</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">admin_name@gmail.com</a>
                  </li>
                  <li class="list-group-item">
                    <b>Gender</b> <a class="float-right">Male</a>
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

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
                <ul class="nav nav-pills">
                   <div class="card-body">
                  
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="inputName" placeholder="Name">
                         
                        </div>
                        <a class="btn btn-primary btn-sm-1" href="#">
                              <i class="fas fa-edit">
                              </i>
                              Edit
                          </a>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-7">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                        <a class="btn btn-primary btn-sm-1" href="#">
                              <i class="fas fa-edit">
                              </i>
                              Edit
                          </a>
                      </div>
                      <div class="form-group row">
                        <label for="inputaddress" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="inputaddress" placeholder="Address">
                        </div>
                        <a class="btn btn-primary btn-sm-1" href="#">
                              <i class="fas fa-edit">
                              </i>
                              Edit
                          </a>
                      </div>
                      <div class="form-group row">
                        <label for="inputphonenumber" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-7">
                          <input class="form-control" id="inputphonenumber" placeholder="Phone number"></textarea>
                        </div>

                        <a class="btn btn-primary btn-sm-1" href="#">
                              <i class="fas fa-edit">
                              </i>
                              Edit
                          </a>
                      </div>
                      <div class="form-group row">
                        <label for="inputdateofbirth" class="col-sm-2 col-form-label">Date of Birth</label>
                        <div class="col-sm-7">
                          <input class="form-control" id="inputdateofbirth" placeholder="DD/MM/YYYY"></textarea>
                        </div>

                        <a class="btn btn-primary btn-sm-1" href="#">
                              <i class="fas fa-edit">
                              </i>
                              Edit
                          </a>
                      </div>
                      <div class="form-group row">
                        <label for="inputgender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="form-group">
                  <select class="form-control select2" style="width: 98%;">
                    <option selected="selected">Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    
                  </select>
                </div>

                        <a class="btn btn-primary btn-sm-1" href="#" style="height:0%">
                              <i class="fas fa-edit">
                              </i>
                              Edit
                          </a>
                      </div>
                      <div class="form-group row">
                        <label for="inputlastlogin" class="col-sm-2 col-form-label">Last Login</label>
                        <div class="col-sm-7">
                          <input class="form-control" id="inputlastlogin" placeholder="DD/MM/YYYY/  HH:MM:SS"></input>
                        </div>

                        <a class="btn btn-primary btn-sm-1" href="#">
                              <i class="fas fa-edit">
                              </i>
                              Edit
                          </a>
                      </div>
                      <div class="form-group row">
                        <label for="inputoldpassword" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="inputoldpassword" placeholder="Old Password">
                        </div>
                        <a class="btn btn-primary btn-sm-1" href="#">
                              <i class="fas fa-edit">
                              </i>
                              Edit
                          </a>
                      </div>
                      <div class="form-group row">
                        <label for="inputconfirmpassword" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="inputconfirmpassword" placeholder="Confirm Password">
                        </div>
                        <a class="btn btn-primary btn-sm-1" href="#">
                              <i class="fas fa-edit">
                              </i>
                              Edit
                          </a>
                        </div>
                        <div class="form-group row">
                        <label for="inputPhoto" class="col-sm-2 col-form-label"style="height:10%S"> Upload Image</label>

                        <div class="form-group row">
                    <div class="input-group">
                      <div class="custom-file">
                      <form action="/action_page.php">
                          
                               <input type="file" id="img" name="img" accept="image/*">
                            
                               
                      </div>
                      
                    </div>
                  </div>
                        
                        </div>
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>

                   </div>  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.includes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Admin-Dashboard\Admin_DB\resources\views/PROFILE.blade.php ENDPATH**/ ?>