<?php $__env->startSection('page-title'); ?>
    Home
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<main class="main-content">
		<div id="main-slider" class="main-slider">
		<?php $__empty_1 = true; $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
		<!-- Item -->
		<div class="item">
			<?php if($slider->media_img == 'No image found'): ?>
				<img src="<?php echo e(asset('uploads/no-img.png')); ?>" width="1349" height="516" alt="No image found">
			<?php else: ?>
				<img src="<?php echo e(asset('uploads/'.$slider->media_img)); ?>" width="1349" height="516" alt="<?php echo e($slider->title); ?>">
			<?php endif; ?>
		</div>
		<!-- Item -->
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
			<div class="alert alert-danger">No record found!</div>
		<?php endif; ?>
	</div>
	
		<section class="upcoming-release">
		<!-- Heading -->
		<div class="container-fluid p-0">
		  	<div class="release-heading pull-right h-white">
		  		<h5>New and Upcoming Release</h5>
		  	</div>
		</div>
		<!-- Heading -->

		<!-- Upcoming Release Slider -->
		<div class="upcoming-slider">
			<div class="container">
				<!-- Release Book Detail -->
				<div class="release-book-detail h-white p-white">
						<div class="release-book-slider">
							<?php $__empty_1 = true; $__currentLoopData = $upcoming_books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upcoming_book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<div class="item">
								<div class="detail">
									<h5><a href="<?php echo e(Route('book.show', $upcoming_book->slug)); ?>"><?php echo e(Str::limit($upcoming_book->title, 50, '...')); ?></a></h5>
									<p><?php echo e(Str::limit($upcoming_book->description, 120, '...')); ?></p>
									<span>Rs/ <?php echo e(number_format( $upcoming_book->price )); ?></span>
									<i class="fa fa-angle-double-right"></i>
								</div>
								<div class="detail-img">
									<?php if($upcoming_book->book_img == 'No image found'): ?>
										<img src="<?php echo e(asset('uploads/no-img.png')); ?>" width="112" height="156" alt="No image found">
									<?php else: ?>
										<img src="<?php echo e(asset('uploads/'.$upcoming_book->book_img)); ?>" width="112" height="156" alt="<?php echo e($upcoming_book->title); ?>">
									<?php endif; ?>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<div class="alert alert-danger">No record found!</div>
							<?php endif; ?>
						</div>
					</div>
				<!-- Release Book Detail -->

				<!-- Thumbs -->
				<div class="release-thumb-holder">
						<ul id="release-thumb" class="release-thumb">
							<?php $__currentLoopData = $upcoming_books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $upcoming_book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li>
								<a data-slide-index="<?php echo e($key); ?>" href="<?php echo e(Route('book.show', $upcoming_book->slug)); ?>">
									<span><?php echo e(Str::limit($upcoming_book->title, 8, '...')); ?></span>
									<?php if($upcoming_book->book_img == 'No image found'): ?>
										<img src="<?php echo e(asset('uploads/no-img.png')); ?>" width="94" height="122" alt="No image found">
									<?php else: ?>
										<img src="<?php echo e(asset('uploads/'.$upcoming_book->book_img)); ?>" width="94" height="122" alt="<?php echo e($upcoming_book->title); ?>">
									<?php endif; ?>
									<span data-toggle="modal" data-target="#quick-view" class="plus-icon">+</span>
								</a>
							</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
				<!-- Thumbs -->

			</div>
		</div>
		<!-- Upcoming Release Slider -->

		</section>
	
		<!-- Best Seller Products -->
		<section class="best-seller tc-padding">
		<div class="container">
			
			<!-- Main Heading -->
			<div class="main-heading-holder">
				<div class="main-heading style-1">
					<h2>Best <span class="theme-color">Downloaded</span> Books</h2>
				</div>
			</div>
			<!-- Main Heading -->

			<!-- Best sellers Tabs -->
			<div id="best-sellers-tabs" class="best-sellers-tabs">
			  	<!-- Tab panes -->
			  	<div class="tab-content">

			  		<!-- Best Seller Slider -->
			    	<div id="tab-1">
			    		<div class="best-seller-slider">
			    			<!-- Product Box -->
			    			<?php $__empty_1 = true; $__currentLoopData = $downloaded_books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $downloaded_book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
			    			<!-- Product Box -->
			    			<div class="item">
			    				<div class="product-box">
			    					<div class="product-img">
										<?php if($downloaded_book->book_img == 'No image found'): ?>
											<img src="<?php echo e(asset('uploads/no-img.png')); ?>" width="132" height="197" alt="No image found">
										<?php else: ?>
											<img src="<?php echo e(asset('uploads/'.$downloaded_book->book_img)); ?>" width="132" height="197" alt="<?php echo e($downloaded_book->title); ?>">
										<?php endif; ?>
			    						<ul class="product-cart-option position-center-x">
			    							<li><a href="<?php echo e($downloaded_book->facebook_id); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
			    							<li><a href="<?php echo e($downloaded_book->twitter_id); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
			    							<li><a href="<?php echo e($downloaded_book->linkedin_id); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
			    						</ul>
			    					</div>
			    					<div class="product-detail">
			    						<span><?php echo e($downloaded_book->category->title); ?></span>
			    						<h5><a href="<?php echo e(Route('book.show', $downloaded_book->slug)); ?>"><?php echo e($downloaded_book->title); ?></a></h5>
			    						<p><?php echo e(Str::limit($downloaded_book->description, 20, '...')); ?></p>
			    						<div class="rating-nd-price">
			    							<strong>Rs/ <?php echo e(number_format($downloaded_book->price)); ?></strong>
			    						</div>
			    						<div class="aurthor-detail">
			    							<span><img src="<?php echo e(asset('assets/images/book-aurthor/img-01.jpg')); ?>" alt=""><?php echo e($downloaded_book->author->title); ?></span>
			    							<a class="add-wish" href="#"><i class="fa fa-heart"></i></a>
			    						</div>
			    					</div>
			    				</div>
			    			</div>
			    			<!-- Product Box -->
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<div class="alert alert-danger">No record found!</div>
							<?php endif; ?>
			    			<!-- Product Box -->
			    			
			    		</div>
			    	</div>
			    	<!-- Best Seller Slider -->
			  	</div>
			  	<!-- Tab panes -->

				</div>
			<!-- Best sellers Tabs -->
		</div>
	</section>
		<!-- Best Seller Products -->

		<!-- Recomend products -->
		<div class="recomended-products tc-padding">
			<div class="container">
				<!-- Main Heading -->
				<div class="main-heading-holder">
					<div class="main-heading">
						<h2>Staff <span class="theme-color">Recomended </span> Books</h2>
						<p>Whether you’re a large or small employer, enterpreneur, educational institution, professional</p>
					</div>
				</div>
				<!-- Main Heading -->

				<!-- Recomend products Slider -->
				<div class="recomend-slider">

					<?php $__empty_1 = true; $__currentLoopData = $recommended_books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recommended_book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<!-- Item -->
					<div class="item">
						<?php if($recommended_book->book_img == 'No image found'): ?>
							<img src="<?php echo e(asset('uploads/no-img.png')); ?>" width="109" height="150" alt="No image found">
						<?php else: ?>
							<a href="<?php echo e(Route('book.detail', $recommended_book->slug)); ?>"><img src="<?php echo e(asset('uploads/'.$recommended_book->book_img)); ?>" width="109" height="150" alt="<?php echo e($recommended_book->title); ?>"></a>
						<?php endif; ?>
					</div>
					<!-- Item -->
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
						<div class="alert alert-danger">No record found!</div>
					<?php endif; ?>
				</div>
				<!-- Recomend products Slider -->
			</div>
		</div>
		<!-- Recomend products -->

		<!-- Book Collections -->
		<section class="book-collection">
			<div class="container">
				<div class="row">

					<!-- Book Collections Tabs -->
					<div>
						<!-- collection Name -->
						<div class="col-lg-3 col-sm-12">
							<div class="sidebar">
								<h4>Top Books Catagories</h4>
								<ul>
									<?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<li><a href="<?php echo e(Route('category.show', $category->slug)); ?>"><?php echo e($category->title); ?></a></li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<div class="alert alert-danger">No record found!</div>
									<?php endif; ?>
								</ul>
							</div>
						</div>
						<!-- collection Name -->

						<!-- Collection Content -->
						<div class="col-lg-9 col-sm-12">
							<div class="collection">

								<!-- Secondary heading -->
								<div class="sec-heading">
									<h3>Shop <span class="theme-color">Books</span> Collection</h3>
									<a class="view-all" href="#">View All<i class="fa fa-angle-double-right"></i></a>
								</div>
								<!-- Secondary heading -->

								<!-- Collection Content -->
								<div class="collection-content">
									<ul>
										<?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<li>
											<div class="s-product">
												<div class="s-product-img">
													<?php if($book->book_img == 'No image found'): ?>
														<img src="<?php echo e(asset('uploads/no-img.png')); ?>" width="145" height="209" alt="No image found">
													<?php else: ?>
														<img src="<?php echo e(asset('uploads/'.$book->book_img)); ?>" width="145" height="209" alt="<?php echo e($book->title); ?>">
													<?php endif; ?>
													
													<div class="s-product-hover"></div>
												</div>
												<h6><a href="<?php echo e(Route('book.show', $book->slug)); ?>"><?php echo e(Str::limit($book->title, 15, '...')); ?></a></h6>
												<span><?php echo e(Str::limit($book->author->title, 20)); ?></span>
											</div>
										</li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<div class="alert alert-danger">No record found!</div>
										<?php endif; ?>
									</ul>
								</div>
								<!-- Collection Content -->

								<!-- Pagination -->
								<div class="pagination-holder">
									<?php echo e($books->links('pagination.default')); ?>

								</div>
								<!-- Pagination -->

							</div>
						</div>
						<!-- Collection Content -->
					</div>
					<!-- Book Collections Tabs -->
				</div>
			</div>
		</section>
		<!-- Book Collections Tabs -->

				</div>
			</div>
		</section>
		<!-- Book Collections --> 

		<!-- Services -->
		<section>&nbsp;</section>
		<!-- Services --> 

		<!-- Timeline -->
		<section class="timeline-area tc-padding">
			<div class="container">
				<div class="row">
					<!-- Aurthor -->
					<div class="col-lg-3 col-sm-12">
						<div class="aurthor-img">
							<?php if($author_feature->author_img == 'No image found'): ?>
								<img src="<?php echo e(asset('uploads/no-img.png')); ?>" width="243" height="344" alt="No image found">
							<?php else: ?>
								<img src="<?php echo e(asset('uploads/'.$author_feature->author_img)); ?>" width="243" height="344" alt="<?php echo e($author_feature->title); ?>">
							<?php endif; ?>
						</div>
					</div>
					<!-- Aurthor -->

					<!-- Aurthor History -->
					<div class="col-lg-9 col-sm-12 h-white">
						<h2>Author <span class="theme-color">History</span> of Inovation</h2>
						<div id="timeline">
							<ul id="issues">
								<li id="1985">
									<div class="text-box">
										<div class="left-box">
											<h5><span class="theme-color"><?php echo e($author_feature->title); ?></span> <?php echo e($author_feature->designation); ?></h5>
											<p><?php echo e($author_feature->description); ?></p>
											<div class="follow">
												<ul class="social-icons">
													<li>Follow us</li>
													<li><a class="facebook" href="<?php echo e($author_feature->facebook_id); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
													<li><a class="twitter" href="<?php echo e($author_feature->twitter_id); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
													<li><a class="youtube" href="<?php echo e($author_feature->youtube_id); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
													<li><a class="pinterest" href="<?php echo e($author_feature->pinterest_id); ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
												</ul>
											</div>
										</div>
										<ul class="s-related-products">
										<?php $__currentLoopData = $author_feature->author_books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $author_book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($key < 3): ?>
											<li>
												<?php if($author_book->book_img == 'No image found'): ?>
													<img src="<?php echo e(asset('uploads/no-img.png')); ?>" width="89" height="119" alt="No image found">
												<?php else: ?>
													<img src="<?php echo e(asset('uploads/'.$author_book->book_img)); ?>" width="89" height="119" alt="<?php echo e($author_book->title); ?>">
												<?php endif; ?>
												<h6 class="name"><?php echo e(Str::limit($author_book->title, 8, '...')); ?></h6>
											</li>
										<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<!-- Aurthor History -->

				</div>
			</div>
		</section>
		<!-- Timeline --> 

		<!-- Blog Nd Gallery-->
		<section class="tc-padding">
			<div class="container">
		      <div class="row">
		      	<!-- Blog -->
		        	<div class="col-lg-4 col-xs-12">
		            <!-- Secondary heading -->
		      		<div class="sec-heading">
		      			<h3>Latest <span class="theme-color">Blog</span> Post</h3>
		      		</div>
		      		<!-- Secondary heading -->

		      		<!-- Blog list -->
		            <div class="blog-style-1">
			             <div class="post-box">
			                <div class="thumb"><img src="<?php echo e(asset('assets/images/blog/img-01.jpg')); ?>" alt=""></div>
			                <div class="text-column"> <strong><i class="fa fa-user" aria-hidden="true"></i>Justin Greene</strong>
			                <a href="blog-detail.html">24 Images About Bookstores That Every Reader </a> <span><i class="fa fa-clock-o" aria-hidden="true"></i>2 hour ago</span>
			                <em><i class="fa fa-heart" aria-hidden="true"></i>125</em> </div>
			             </div>
			             <div class="post-box">
			                <div class="thumb"><img src="<?php echo e(asset('assets/images/blog/img-02.jpg')); ?>" alt=""></div>
			                <div class="text-column"> <strong><i class="fa fa-user" aria-hidden="true"></i>Rodolpho Henrique</strong>
			                <a href="blog-detail.html">The 30 Best Places To Be If You Love Books Mark</a> <span><i class="fa fa-clock-o" aria-hidden="true"></i>2 hour ago</span>
			                <em><i class="fa fa-heart" aria-hidden="true"></i>125</em> </div>
			             </div>
			             <div class="post-box">
			                <div class="thumb"><img src="<?php echo e(asset('assets/images/blog/img-03.jpg')); ?>" alt=""></div>
			                <div class="text-column"> <strong><i class="fa fa-user" aria-hidden="true"></i>Anderson jhon</strong>
			                <a href="blog-detail.html">The Old Butcher's Bookshop, a rare books store</a> <span><i class="fa fa-clock-o" aria-hidden="true"></i>2 hour ago</span>
			                <em><i class="fa fa-heart" aria-hidden="true"></i>125</em> </div>
			             </div>
		            </div>
		            <!-- Blog list -->

		        	</div>
		        	<!-- Blog -->

		        	<!-- Gallery -->
		        	<div class="col-lg-8 col-xs-12">
		            <div class="gallery">

		              	<!-- Secondary heading -->
		        		<div class="sec-heading">
		        			<h3>Gallery <span class="theme-color">Bookshop</span></h3>
		        			<a class="view-all" href="#">View All<i class="fa fa-angle-double-right"></i></a>
		        		</div>
		        		<!-- Secondary heading -->

		        		<!-- Gallery List -->
			            <ul>
			                <?php $__empty_1 = true; $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
			                <li>
			                  	<div class="gallery-figure">
			                  		<?php if($gallery->media_img == 'No image found'): ?>
										<img src="<?php echo e(asset('uploads/no-img.png')); ?>" width="242" height="187" alt="No image found">
									<?php else: ?>
										<img src="<?php echo e(asset('uploads/'.$gallery->media_img)); ?>" width="242" height="187" alt="<?php echo e($gallery->title); ?>">
									<?php endif; ?> 
			                  		<div class="overlay"></div>
			                  	</div>
			                </li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<div class="alert alert-danger">No record found!</div>
							<?php endif; ?>
			            </ul>
			            <!-- Gallery List -->

		            </div>
		        	</div>
		        	<!-- Gallery -->

		      </div>
		  	</div>
		</section>
		<!-- Blog Nd Gallery--> 
	</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\gatewaybooks\resources\views/index.blade.php ENDPATH**/ ?>