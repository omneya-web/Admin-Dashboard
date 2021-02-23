
<?php $__env->startSection('content'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reply</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-12">

          <!-- /.card -->

          <div class="card" style="height:90%">
            <div class="card-header">
            </div>
            
            <!-- /.card-header -->
            <div class="card-body" align="center">
                
            <textarea class=" form-control form-rounded" name="message" rows="9" cols="50"></textarea>
            
              <a class="btn btn-primary btn-sm-1" href="#" >

                              <i class="fas fa-envelope" >
                              </i>
                              Send
                          </a>
            </div>

 
























<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.includes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Admin-Dashboard\Admin_DB\resources\views/reply.blade.php ENDPATH**/ ?>