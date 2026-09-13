
<?php $__env->startSection('page-title'); ?>
  Edit Book
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
  <section class="content">
    <!-- form start -->
    <form name="formEdit" id="formEdit" method="POST" action="<?php echo e(Route('book.update', $book->id)); ?>" enctype="multipart/form-data">
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
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="<?php echo e($book->title); ?>">
              </div> 
              <div class="form-group">
                <label for="slug">Slug <span class="text text-red">*</span></label>
                <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" value="<?php echo e($book->slug); ?>">
              </div>
              <div class="form-group">
                <label>Category <span class="text text-red">*</span></label>
                <select class="form-control" name="category_id" id="category_id" style="width: 100%;">
                  <option value="none">-- Select Category --</option>
                </select>
              </div>
              <div class="form-group">
                <label>Author <span class="text text-red">*</span></label>
                <select class="form-control" name="author_id" id="author_id" style="width: 100%;">
                  <option value="none">-- Select Author --</option>
                </select>
              </div>
              <div class="form-group">
                <label for="availability">Availability <span class="text text-red">*</span></label>
                <input type="text" class="form-control" name="availability" id="availability" placeholder="Availability" value="<?php echo e($book->title); ?>">
              </div>
              <div class="form-group">
                <label for="price">Price: <span class="text text-red">*</span></label> 
                <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo e($book->title); ?>">
              </div>
              <div class="form-group">
                <label for="publisher">Publisher</label>
                <input type="text" class="form-control" name="publisher" id="publisher" placeholder="Publisher" value="<?php echo e($book->title); ?>">
              </div>
              <div class="form-group">
                <label>Country of Publisher <span class="text text-red">*</span></label>
                <select class="form-control select2" name="country_of_publisher" id="country_of_publisher" style="width: 100%;">
                  <option value="none"> -- Select Country -- </option>
                  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($country->name); ?>" <?php echo e(($country->name == $book->country) ? 'selected' : null); ?>><?php echo e($country->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN" value="<?php echo e($book->title); ?>">
              </div>
              <div class="form-group">
                <label for="isbn_10">ISBN-10</label>
                <input type="text" class="form-control" name="isbn_10" id="isbn_10" placeholder="ISBN-10" value="<?php echo e($book->title); ?>">
              </div>
            </div>                 
            <div class="col-xs-6">
              <div class="form-group">
                <label for="book_img">Book Image</label>
                <input type="file" class="form-control" name="book_img" id="book_img" >
                <small class="label label-warning">Cover Photo will be uploaded</small>
              </div>
              <div class="form-group">
                <label for="book_upload">Book Upload</label>
                <input type="file" class="form-control" name="book_upload" id="book_upload" >
                <small class="label label-warning">Book (PDF) will be uploaded </small>
              </div>
              <div class="form-group">
                <label for="audience">Audience</label>
                <input type="text" class="form-control" name="audience" id="audience" placeholder="Audience" value="<?php echo e($book->title); ?>">
              </div>
              <div class="form-group">
                <label for="format">Format</label>
                <input type="text" class="form-control" name="format" id="format" placeholder="Format" value="<?php echo e($book->title); ?>">
              </div>
              <div class="form-group">
                <label for="language">Language</label>
                <input type="text" class="form-control" name="language" id="language" placeholder="Language" value="<?php echo e($book->title); ?>">
              </div>
              <div class="form-group">
                <label for="total_pages">Total Pages</label>
                <input type="text" class="form-control" name="total_pages" id="total_pages" placeholder="Total Pages" value="<?php echo e($book->title); ?>">
              </div>
              <div class="form-group">
                <label for="edition_number">Edition Number</label>
                <input type="text" class="form-control" name="edition_number" id="edition_number" placeholder="Edition Number" value="<?php echo e($book->title); ?>">
              </div>
              <div class="form-group">
                <label>Recomended</label>
                <select class="form-control" name="recomended" id="recomended" style="width: 100%;">
                  <option value="none">-- Select Recomended --</option>
                  <option value="yes" <?php echo e(($book->book_feature == 'no') ? 'selected' : null); ?>>Recomended</option>
                  <option value="no" <?php echo e(($book->book_feature == 'yes') ? 'selected' : null); ?>>Not Recomended</option>
                </select>
              </div>
              <div class="form-group">
                <label for="description">Description <span class="text text-red">*</span></label>
                <textarea class="form-control" name="description" rows="5" id="description" placeholder="Description"><?php echo e($book->description); ?></textarea>
              </div>
            </div>
          </div>
          <!-- row end -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="<?php echo e(Route('book.all')); ?>" class="btn btn-danger">Cancel</a>
        </div>
      </div>
      <!-- /.box -->
    </form>
    <!-- form end -->  
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\gatewaybooks\resources\views/admin/book/edit.blade.php ENDPATH**/ ?>