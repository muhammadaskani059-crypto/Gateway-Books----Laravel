<?php $__env->startSection('page-title'); ?>
  Manage Media's
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
  <section class="content">      
    <!-- /.row -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"> 
          <a class="btn btn-danger btn-xm"><i class="fa fa-eye"></i></a>
          <a class="btn btn-danger btn-xm"><i class="fa fa-eye-slash"></i></a>
          <a class="btn btn-danger btn-xm"><i class="fa fa-trash"></i></a>
          <a href="<?php echo e(Route('media.create')); ?>" class="btn btn-default btn-xm"><i class="fa fa-plus"></i></a>
        </h3>
        <div class="box-tools">
          <form method="GET" action="/admin/media">
          <div class="input-group input-group-sm" style="width: 250px;">
            <input type="search" name="s" class="form-control pull-right" placeholder="Search" value="<?php echo e((request()->get('s')) ? request()->get('s') : null); ?>">
            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
          </form>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <?php if($medias): ?>
        <table class="table table-bordered">
          <thead style="background-color: #F8F8F8;">
            <tr>
              <th width="4%"><input type="checkbox" name="" id="checkAll"></th>
              <th width="20%">Title</th>
              <th width="20%">Media Type</th>
              <th width="20%">Media Image</th>
              <th width="10%">Status</th>
              <th width="10%">Manage</th>
            </tr>
          </thead>
          <?php $__currentLoopData = $medias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
          <tr>
            <td><input type="checkbox" name="" id="" class="checkSingle"></td>
            <td><?php echo e($media->title); ?></td>
            <td><?php echo e($media->media_type); ?></td>
            <td>
              <?php if($media->media_img == 'No image found'): ?>
                <img src="/uploads/no-img.png" width="100" height="100" class="img-thumbnail" alt="No image found">
              <?php else: ?>
                <img src="/uploads/<?php echo e($media->media_img); ?>" width="100" height="100" class="img-thumbnail" alt="<?php echo e($media->title); ?>">
              <?php endif; ?>
            </td>
            <td>
              <?php if($media->status == 'DEACTIVE'): ?>
              <a href="<?php echo e(Route('media.status', $media->id)); ?>" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-down"></i></a>
              <?php else: ?>
              <a href="<?php echo e(Route('media.status', $media->id)); ?>" class="btn btn-info btn-sm"><i class="fa fa-thumbs-up"></i></a>
              <?php endif; ?>
            </td>
            <td>
              <a href="<?php echo e(Route('media.edit', $media->id)); ?>" class="btn btn-info btn-flat btn-sm"> <i class="fa fa-edit"></i></a>
              <a href="<?php echo e(Route('media.delete', $media->id)); ?>" onclick="return confirm('Are you sure you want to delete this?  ')" class="btn btn-danger btn-flat btn-sm"> <i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
      </div>
      <!-- /.box-body -->
      <div class="box-footer clearfix">
        <div class="row">
          <div class="col-sm-6">
            <span style="display:block;font-size:15px;line-height:34px;margin:20px 0;">
              Showing <?php echo e(($medias->currentpage()-1)*$medias->perpage()+1); ?> to <?php echo e($medias->currentpage()*$medias->perpage()); ?>

              of  <?php echo e($medias->total()); ?> entries
            </span>
          </div>
          <div class="col-sm-6 text-right">
            <?php echo e($medias->links()); ?>

          </div>
        </div>
      </div>
      <?php else: ?>
        <div class="alert alert-danger">No record found!</div>
      <?php endif; ?>
    </div>
    <!-- /.box-body -->
    </div>
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\gatewaybooks\resources\views/admin/media/index.blade.php ENDPATH**/ ?>