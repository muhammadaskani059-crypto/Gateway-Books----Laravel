<?php $__env->startSection('page-title'); ?>
    About Us
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<main class="main-content">

		<!-- Service And Mission -->
		<section class="service-nd-mission tc-padding-top white-bg">
			<div class="container">
				<!-- Mission & values -->
		    	<div class="mission tc-padding-bottom">
		    		<div class="row">

		    			<!-- Mission Disc -->
		    			<div class="col-lg-6 col-xs-12">
		    				<div class="mission-disc">
		    					<h4>Mission <span>&amp; values</span></h4>
		    					<strong>Text Publishing is an independent, Melbourne-based publisher of literary fiction and non-fiction. Text won the Australian Book Industry Awards (ABIA) Small Publisher of the Year in 2012, 2013 and 2014.</strong>
		    					<p>At Text we want to publish books that make a difference to people’s lives. We believe that reading should be a marvellous experience, that every book you read should somehow change your life if only by a fraction. We love the phrase ‘lost in a book’.</p>
		    					<p> lost in books every day—on the tram, on the beach, in bed. Reading is what keeps the imagination supple and challenges preconceptions and prejudices.</p>
		    					<a href="#" class="btn-1 shadow-0">Read more<i aria-hidden="true" class="fa fa-arrow-circle-right"></i></a>
		    				</div>
		    			</div>
		    			<!-- Mission Disc -->

		    			<!-- Laptop Img -->
		    			<div class="col-sm-6">
		    				<div class="laptop-img">
		    					<img class="floating" src="/assets/images/laptop.png" alt="">
		    				</div>
		    			</div>
		    			<!-- Laptop Img -->

		    		</div>
		    	</div>
		    	<!-- Mission & values -->

			</div>
		</section>
		<!-- Service And Mission -->
		<!-- Team -->
		<section class="tc-padding white-bg">
			<div class="container">
				
				<!-- Main Heading -->
	    		<div class="main-heading-holder">
	    			<div class="main-heading style-2">
	    				<h2>Our <span class="theme-color">Creative Team</span></h2>
	    				<p>We are committed to providing first-class services to the writers who trust us</p>
	    			</div>
	    		</div>
	    		<!-- Main Heading -->	

				<!-- Team Slider -->
				<div class="team-slider">
					
					<!-- Team Colmun -->
					<?php $__empty_1 = true; $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<div class="item">
						<div class="team-column">
							<div class="team-img">
								<?php if($team->team_img == 'No image found'): ?>
									<img src="/uploads/no-img.png" width="263" height="253" alt="No image found">
								<?php else: ?>
									<img src="/uploads/<?php echo e($team->team_img); ?>" width="263" height="253" alt="<?php echo e($team->fullname); ?>">
								<?php endif; ?>
								<div class="overlay-padding">
									<div class="overlay">
										<ul class="position-center-center">
											<li>Tel: <?php echo e($team->telephone); ?></li>
											<li>Mob: <?php echo e($team->mobile); ?></li>
											<li>Email: <?php echo e($team->email); ?></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="team-detail">
								<h5><?php echo e($team->fullname); ?></h5>
								<span><?php echo e(Str::limit($team->designation, 25)); ?></span>
							</div>
							<div class="team-btm">
								<ul class="social-icons"> 
									<li><a class="facebook" href="<?php echo e($team->facebook_id); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="<?php echo e($team->twitter_id); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
									<li><a class="pinterest" href="<?php echo e($team->pinterest_id); ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
						<div class="alert alert-danger">No record found!</div>
					<?php endif; ?>
					<!-- Team Colmun -->

				</div>
				<!-- Team Slider -->

			</div>
		</section>
		<!-- Team -->

	</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel_project\gatewaybooks\resources\views/about.blade.php ENDPATH**/ ?>