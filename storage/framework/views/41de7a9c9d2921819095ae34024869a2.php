
<?php $__env->startSection('page-title'); ?>
  Create Media
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
  <section class="content">
    <!-- SELECT2 EXAMPLE -->
    <!-- form start -->
    <form name="formCreate" id="formCreate" method="POST" action="<?php echo e(Route('media.store')); ?>" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <div class="box box-primary">
      <!-- /.box-header -->
        <div class="box-body">
          
          <!-- row start -->
          <div class="row"> 
            <div class="col-xs-6">                  
              <div class="form-group <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <label for="title">Title <span class="text text-red">*</span></label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="label label-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div> 
              <div class="form-group <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <label for="slug">Slug <span class="text text-red">*</span></label>
                <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug">
                <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="label label-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="form-group @error('media_type) has-error @enderror">
                <label>Media Type <span class="text text-red">*</span></label>
                <select name="media_type" id="media_type" class="form-control" style="width: 100%;">
                  <option value="none">-- Select Media Type --</option>
                  <option value="slider">Slider</option>
                  <option value="gallery">Gallery</option>
                </select>
                <?php $__errorArgs = ['media_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="label label-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>                 
            <div class="col-xs-6">
              <div class="form-group">
                <label for="media_img">Media Image <span class="text text-red">*</span></label>
                <input type="file" name="media_img" class="form-control" id="media_img">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter ..."></textarea>
              </div>
            </div>
          </div>
          <!-- row end -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-danger">Cancel</button>
        </div>
      </div>
      <!-- /.box -->
    </form>
    <!-- form end -->
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\gatewaybooks\resources\views/admin/media/create.blade.php ENDPATH**/ ?>