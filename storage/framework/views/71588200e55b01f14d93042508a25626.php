<?php $__env->startSection('page-title'); ?>
    <?php echo e($author_detail->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<main class="main-content">

		<!-- Arthor Detail -->
		<div class="single-aurthor-detail tc-padding">
			<div class="container">
				<div class="row">
					
					<!-- Aside -->
					<aside class="col-lg-4 col-md-5">
						<div class="arthor-detail-column">
							<div class="arthor-img">
								<?php if($author_detail->author_img == 'No image found'): ?>
									<img src="/uploads/no-img.png" width="207" height="197" alt="No image found">
								<?php else: ?>
									<img src="/uploads/<?php echo e($author_detail->author_img); ?>" width="207" height="197" alt="<?php echo e($author_detail->title); ?>">
								<?php endif; ?>
							</div>
							<div class="arthor-detail">
								<h4><?php echo e($author_detail->title); ?></h4>
								<span><?php echo e($author_detail->designation); ?></span>
							</div>
							<div class="social-activity">
								<div>
									<ul class="social-icons">
					                	<li><a class="facebook" href="<?php echo e($author_detail->facebook_id); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
					                    <li><a class="twitter" href="<?php echo e($author_detail->twitter_id); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
					                    <li><a class="youtube" href="<?php echo e($author_detail->youtube_id); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
					                    <li><a class="pinterest" href="<?php echo e($author_detail->pinterest_id); ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
					                </ul>
				                </div>
				         	</div>
						</div>
					</aside>
					<!-- Aside -->

					<!-- Content -->
					<div class="col-lg-8 col-md-7">
						<div class="single-arthor-detail">

							<!-- Widget -->
							<div class="single-arthor-widget">
								<h5>Author Overview</h5>
								<div class="author-overview">
									<p><?php echo e($author_detail->description); ?></p>
								</div>
							</div>
							<!-- Widget -->

							<!-- Widget -->
							<div class="single-arthor-widget">
								<h5>Recommended <span style="color:orange;"><?php echo e($author_detail->title); ?></span> Titles </h5>

								<!-- Recommended -->
							  	<div id="filter-masonry" class="gallery-masonry">

					    			<!-- Product Box -->
					    			<div class="col-lg-3 col-xs-6 r-full-width masonry-grid most-recent">
					    				<div class="recommended-book">
					    					<div class="recommended-book-img">
					    						<img src="/assets/images/arthor-recommended/img-01.jpg" alt="">
					    					</div>
					    					<div class="recommended-book-detail">
						    					<h6>Jewels of Nizam</h6>
						    					<span>By Muriel Barbery</span>
						    					<ul class="rating-stars">
				    								<li><i class="fa fa-star"></i></li>
				    								<li><i class="fa fa-star"></i></li>
				    								<li><i class="fa fa-star"></i></li>
				    								<li><i class="fa fa-star"></i></li>
				    								<li><i class="fa fa-star-half-o"></i></li>
				    							</ul>
			    							</div>
					    				</div>
					    			</div>
					    			<!-- Product Box -->

					    			<!-- Product Box -->
					    			<div class="col-lg-3 col-xs-6 r-full-width masonry-grid most-popular">
					    				<div class="recommended-book">
					    					<div class="recommended-book-img">
					    						<img src="/assets/images/arthor-recommended/img-02.jpg" alt="">
					    					</div>
					    					<div class="recommended-book-detail">
						    					<h6>Cakes &amp; Bakes</h6>
						    					<span>By Muriel Barbery</span>
						    					<ul class="rating-stars">
				    								<li><i class="fa fa-star"></i></li>
				    								<li><i class="fa fa-star"></i></li>
				    								<li><i class="fa fa-star"></i></li>
				    								<li><i class="fa fa-star"></i></li>
				    								<li><i class="fa fa-star-half-o"></i></li>
				    							</ul>
			    							</div>
					    				</div>
					    			</div>
					    			<!-- Product Box -->

					    			<!-- Product Box -->
					    			<div class="col-lg-3 col-xs-6 r-full-width masonry-grid fiction">
					    				<div class="recommended-book">
					    					<div class="recommended-book-img">
					    						<img src="/assets/images/arthor-recommended/img-03.jpg" alt="">
					    					</div>
					    					<div class="recommended-book-detail">
						    					<h6>Jamie’s Kitchen</h6>
						    					<span>By Muriel Barbery</span>
						    					<ul class="rating-stars">
				    								<li><i class="fa fa-star"></i></li>
				    								<li><i class="fa fa-star"></i></li>
				    								<li><i class="fa fa-star"></i></li>
				    								<li><i class="fa fa-star"></i></li>
				    								<li><i class="fa fa-star-half-o"></i></li>
				    							</ul>
			    							</div>
					    				</div>
					    			</div>
					    			<!-- Product Box -->

					    			<!-- Product Box -->
					    			<div class="col-lg-3 col-xs-6 r-full-width masonry-grid free-books">
					    				<div class="recommended-book">
					    					<div class="recommended-book-img">
					    						<img src="/assets/images/arthor-recommended/img-04.jpg" alt="">
					    					</div>
					    					<div class="recommended-book-detail">
						    					<h6>Inexpensive Family</h6>
						    					<span>By Muriel Barbery</span>
						    					<ul class="rating-stars">
				    								<li><i class="fa fa-star"></i></li>
				    								<li><i class="fa fa-star"></i></li>
				    								<li><i class="fa fa-star"></i></li>
				    								<li><i class="fa fa-star"></i></li>
				    								<li><i class="fa fa-star-half-o"></i></li>
				    							</ul>
			    							</div>
					    				</div>
					    			</div>
					    			<!-- Product Box -->

							  	</div>
							  	<!-- Recommended -->

							</div>
							<!-- Widget -->
						</div>
					</div>
					<!-- Content -->
				</div>
			</div>
		</div>
		<!-- Arthor Detail -->
	</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\gatewaybooks\resources\views/author_detail.blade.php ENDPATH**/ ?>