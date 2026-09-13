

<?php $__env->startSection('page-title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
    <section class="content">

      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-tasks"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Categoreis</span>
              <span class="info-box-number"><?php echo e($categories); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-pencil"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Authors</span>
              <span class="info-box-number"><?php echo e($authors); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Books</span>
              <span class="info-box-number"><?php echo e($books); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Teams</span>
              <span class="info-box-number"><?php echo e($teams); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel_project\gatewaybooks\resources\views/admin/index.blade.php ENDPATH**/ ?>