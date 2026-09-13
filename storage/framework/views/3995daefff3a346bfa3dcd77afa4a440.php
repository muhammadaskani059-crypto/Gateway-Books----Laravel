

<?php $__env->startSection('page-title'); ?>
  Edit Author
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <!-- form start -->
    <form name="formEdit" id="formEdit" method="POST" action="<?php echo e(Route('author.update', $author->id)); ?>"
      enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <?php echo method_field('put'); ?>
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
          <!-- row start -->
          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="title">Title <span class="text text-red">*</span></label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                  value="<?php echo e($author->title); ?>">
              </div>

              <div class="form-group">
                <label for="slug">Slug <span class="text text-red">*</span></label>
                <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug"
                  value="<?php echo e($author->slug); ?>" readonly>
              </div>
              <div class="form-group">
                <label for="designation">Designation <span class="text text-red">*</span></label>
                <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation"
                  value="<?php echo e($author->designation); ?>">
              </div>
              <div class="form-group">
                <label for="dob">Date of birth: <span class="text text-red">*</span></label>
                <input type="date" name="dob" class="form-control" id="dob" placeholder="Date of Birth"
                  value="<?php echo e($author->dob); ?>">
              </div>

              <div class="form-group">
                <label for="email">Email <span class="text text-red">*</span></label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                  value="<?php echo e($author->email); ?>">
              </div>
              <div class="form-group">
                <label>Country <span class="text text-red">*</span></label>
                <select name="country" id="country" class="form-control select2" style="width: 100%;">
                  <option value="none">-- Select Country --</option>
                </select>
              </div>

              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone"
                  value="<?php echo e($author->phone); ?>">
              </div>

              <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="description" class="form-control" rows="5"
                  placeholder="Enter ..."><?php echo e($author->description); ?></textarea>
              </div>
            </div>

            <div class="col-xs-6">
              <div class="form-group">
                <label for="author_img">Author Image <span class="text text-red">*</span></label>
                <input type="file" name="author_img" class="form-control" id="author_img">
              </div>
              <div class="form-group">
                <label for="facebook_id">Facebook ID</label>
                <input type="text" name="facebook_id" class="form-control" id="facebook_id" placeholder="Facebook ID"
                  value="<?php echo e($author->facebook_id); ?>">
              </div>

              <div class="form-group">
                <label for="twitter_id">Twitter ID</label>
                <input type="text" name="twitter_id" class="form-control" id="twitter_id" placeholder="Twitter ID"
                  value="<?php echo e($author->twitter_id); ?>">
              </div>

              <div class="form-group">
                <label for="youtube_id">YouTube ID</label>
                <input type="text" name="youtube_id" class="form-control" id="youtube_id" placeholder="YouTube ID"
                  value="<?php echo e($author->youtube_id); ?>">
              </div>
              <div class="form-group">
                <label for="pinterest_id">Pinterest ID</label>
                <input type="text" name="pinterest_id" class="form-control" id="pinterest_id" placeholder="Pinterest ID"
                  value="<?php echo e($author->pinterest_id); ?>">
              </div>
              <div class="form-group">
                <label>Author Feature</label>
                <select name="author_feature" id="author_feature" class="form-control select2" style="width: 100%;">
                  <option value="no">NO</option>
                  <option value="yes">Yes</option>
                </select>
              </div>
            </div>
          </div>

          <!-- row end -->

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="<?php echo e(Route('author.all')); ?>" type="reset" class="btn btn-danger">Cancel</a>
        </div>
      </div>
      <!-- /.box -->
      <!-- form end -->
    </form>

  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\gatewaybooks\resources\views/admin/author/edit.blade.php ENDPATH**/ ?>