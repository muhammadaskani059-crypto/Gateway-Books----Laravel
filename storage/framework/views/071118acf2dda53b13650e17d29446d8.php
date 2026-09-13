<?php $__env->startSection('page-title'); ?>
    Gallery
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<main class="main-content">

		<!-- Gallery -->
        <div class="gallery tc-padding">
      		<div class="container">
      			<div class="row no-gutters">
					<?php $__empty_1 = true; $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<div class="col-lg-3 col-xs-6 r-full-width">
      					<div class="gallery-figure style-2"> 
	                  		<?php if($gallery->media_img == 'No image found'): ?>
								<img src="/uploads/no-img.png" width="283" height="283" alt="No image found">
							<?php else: ?>
								<img src="/uploads/<?php echo e($gallery->media_img); ?>" width="283" height="283" alt="<?php echo e($gallery->title); ?>">
							<?php endif; ?>
	                  		<div class="overlay"></div>
	                  	</div>
      				</div>
      				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
						<div class="alert alert-danger">No record found!</div>
					<?php endif; ?>
      				<div class="col-xs-12">
      					<div class="pagination-holder">
		           			<?php echo e($galleries->links('pagination.default')); ?>

		           		</div>
      				</div>
      			</div>
            </div>
      	</div>
		<!-- Gallery -->

	</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\gatewaybooks\resources\views/gallery.blade.php ENDPATH**/ ?>