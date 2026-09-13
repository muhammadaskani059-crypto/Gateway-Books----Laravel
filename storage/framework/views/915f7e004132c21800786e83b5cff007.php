<?php $__env->startSection('page-title'); ?>
    Authors
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<main class="main-content">

		<!-- Author Listing -->
		<div class="author-listing tc-padding">
			<div class="container">
				<div class="row">

					<!-- Content -->
					<div class="col-lg-9 col-md-8 col-xs-12">
													
						<!-- Author Filter -->
						<div class="authors-filter">
							<ul>
								<?php $__currentLoopData = range('A', 'Z'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li><a href="author?letter=<?php echo e(Str::lower($letter)); ?>"><?php echo e($letter); ?></a></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
						<!-- Author Filter -->

						<!-- Author List -->
						<ul class="author-list">
							<?php $__empty_1 = true; $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<li>
								<div class="author-list-widget">
									<div class="arthor-list-img">
										<?php if($author->author_img == 'No image found'): ?>
											<img src="/uploads/no-img.png" width="178" height="178" alt="No image found">
										<?php else: ?>
											<img src="/uploads/<?php echo e($author->author_img); ?>" width="178" height="178" alt="<?php echo e($author->title); ?>">
										<?php endif; ?>
										<div class="overlay"></div>
									</div>
									<div class="author-list-detail">
										<h4><?php echo e($author->title); ?></h4>
										<span>Born: <?php echo e($author->dob); ?> <?php echo e(Str::upper($author->country)); ?></span>
										<p><?php echo e(Str::limit($author->description, 120)); ?></p>
										<a href="<?php echo e(Route('author_detail', $author->slug)); ?>" class="btn-1 sm">Read more<i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
							</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<div class="alert alert-danger">No record found!</div>
							<?php endif; ?>

						</ul>
						<!-- Author List -->

						<!-- Pagination -->
		           		<div class="pagination-holder">
							<?php echo e($authors->links('pagination.default')); ?>

		           		</div>
		           		<!-- Pagination -->

					</div>
					<!-- Content -->

					<!-- Aside -->
					<aside class="col-lg-3 col-md-4 col-xs-12">
						<!-- Aside Widget -->
						<div class="aside-widget">
							<h6>Feature Authors</h6>
							<ul class="s-arthor-list">
								<?php $__empty_1 = true; $__currentLoopData = $author_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author_feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

								<li>
									<div class="s-arthor-wighet">
										<div class="s-arthor-img">
										<?php if($author_feature->author_img == 'No image found'): ?>
											<img src="/uploads/no-img.png" width="45" height="45" alt="No image found">
										<?php else: ?>
											<img src="/uploads/<?php echo e($author_feature->author_img); ?>" width="45" height="45" alt="<?php echo e($author_feature->title); ?>">
										<?php endif; ?>
											<div class="overlay">
												<a class="position-center-center" href="#"></a>
											</div>
										</div>
										<div class="s-arthor-detail">
											<h6><?php echo e($author_feature->title); ?> </h6>
											<a href="#">&nbsp;</a>
										</div>
									</div>
								</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									<div class="alert alert-danger">No record found!</div>
								<?php endif; ?>
								
							</ul>
						</div>
						<!-- Aside Widget -->

						<!-- Aside Widget -->
						<div class="aside-widget">
							<h6>Most Downloaded Books</h6>
							<ul class="books-year-list">
								<?php $__empty_1 = true; $__currentLoopData = $downloaded_books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $downloaded_book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
								<li>
									<div class="books-post-widget">
										<?php if($downloaded_book->book_img == 'No image found'): ?>
											<img src="/uploads/no-img.png" width="54" height="73" alt="No image found">
										<?php else: ?>
											<img src="/uploads/<?php echo e($downloaded_book->book_img); ?>" width="54" height="73" alt="<?php echo e($downloaded_book->title); ?>">
										<?php endif; ?>
										<h6><a href="#"><?php echo e($downloaded_book->title); ?></a></h6>
										<span>By <?php echo e($downloaded_book->author_id); ?></span>
									</div>
								</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									<div class="alert alert-danger">No record found!</div>
								<?php endif; ?>
								
							</ul>
						</div>
						<!-- Aside Widget -->

					</aside>
					<!-- Aside -->

				</div>
			</div>
		</div>
		<!-- Author Listing -->

	</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel_project\gatewaybooks\resources\views/author.blade.php ENDPATH**/ ?>