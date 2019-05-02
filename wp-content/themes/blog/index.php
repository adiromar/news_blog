 <?php get_header();?>
  
<?php

$cat = get_categories();
// echo '<pre>';
// print_r($cat);
?>
  <section class="site-section pt-5 pb-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">


              <div class="owl-carousel owl-theme home-slider">
                <div>
                  <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url('<?php echo get_bloginfo('template_directory'); ?>/images/img_1.jpg'); ">
                    <div class="text half-to-full">
                      <span class="category mb-5">Food</span>
                      <div class="post-meta">
                        
                        <span class="author mr-2"><img src="<?php echo get_bloginfo('template_directory'); ?>/images/person_1.jpg" alt="Colorlib"> Colorlib</span>&bullet;
                        <span class="mr-2">March 15, 2018 </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                        
                      </div>
                      <h3>How to Find the Video Games of Your Youth</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
                    </div>
                  </a>


                </div>
                <div>
                  <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url('<?php echo get_bloginfo('template_directory'); ?>/images/img_2.jpg'); ">
                    <div class="text half-to-full">
                      <span class="category mb-5">Travel</span>
                      <div class="post-meta">
                        
                        <span class="author mr-2"><img src="<?php echo get_bloginfo('template_directory'); ?>/images/person_1.jpg" alt="Colorlib"> Colorlib</span>&bullet;
                        <span class="mr-2">March 15, 2018 </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                        
                      </div>
                      <h3>How to Find the Video Games of Your Youth</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
                    </div>
                  </a>
                </div>
                <div>
                  <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url('<?php echo get_bloginfo('template_directory'); ?>/images/img_3.jpg'); ">
                    <div class="text half-to-full">
                      <span class="category mb-5">Sports</span>
                      <div class="post-meta">
                        
                        <span class="author mr-2"><img src="<?php echo get_bloginfo('template_directory'); ?>/images/person_1.jpg" alt="Colorlib"> Colorlib</span>&bullet;
                        <span class="mr-2">March 15, 2018 </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                        
                      </div>
                      <h3>How to Find the Video Games of Your Youth</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
                    </div>
                  </a>
                </div>

              </div>
             
            </div>
          </div>
          
        </div>


      </section>
      <!-- END section -->

      <!-- latest posts section -->

      <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <!-- <h2 class="mb-4">Latest Posts</h2> -->
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">

            	<h4 class="mb-4 heading-line">Latest</h4>
              <div class="row">
<?php
$args =array(
	'post_type' => 'post',
	'category__not_in' => array(1),
	'meta_key' => 'meta-checkbox',
	'meta_value' => 'yes',
    'meta_compare' => '!=',
	'posts_per_page' => 6,
	
);
$the_query = new WP_QUERY( $args );

if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 

?>
                <div class="col-md-4 post-div">
                  	<?php if( !has_post_thumbnail() ){ ?>
						<img class="cat-img img-responsive blog-entry element-animate media-left blog-entry default-image" src="<?php echo get_bloginfo('template_directory'); ?>/images/images.png">
					<?php }else{ ?>
						<a href="<?= the_permalink() ?>"><?php the_post_thumbnail('thumbnail', ['class' => 'img-responsive cat-img blog-entry element-animate media-left blog-entry']) ;?></a>
					<?php } ?>

                    <!-- <a href="<?php the_permalink() ;?>" class="blog-entry element-animate media-left blog-entry" data-animate-effect="fadeIn"> <?php the_post_thumbnail('thumbnail', ['class' => 'img-responsive']) ;?></a> -->
                    <div class="blog-content-body">
                      <div class="post-meta">

                        <span class="author mr-2">
                        	<?php 
                        	$author_id = get_the_author_meta('ID');
                        	$avatar = get_avatar($author_id, 32);

                        	if($avatar): ?>
                        		<?php echo $avatar ?>
                        	<?php else: ?>
                        	<img src="<?php echo get_bloginfo('template_directory'); ?>/images/person_1.jpg" alt="Colorlib">

                        <?php endif; ?>
                        	 <?= the_author_meta( 'user_nicename' , $author_id )?></span>&bullet;
                        <span class="mr-2"><?= get_the_date(); ?></span> &bullet;
                        <!-- <span class="ml-2"><span class="fa fa-comments"></span> 3</span> -->
                      </div>
                      <a href="<?= the_permalink(); ?>"><?= get_the_title(); ?></a>
                    </div>
                </div>
<?php endwhile; endif; ?>
         
          <hr class="col-md-12">   
		<!-- Featured posts -->
<h4 class="col-md-12 mt-4 heading-line">Featured</h4>
<?php
$argss =array(
	'post_type' => 'post',
	'posts_per_page' => 6,
	'meta_key' => 'meta-checkbox',
    'meta_value' => 'yes'
);
$feat = new WP_QUERY( $argss );

if ( have_posts() ) : while ( $feat->have_posts() ) : $feat->the_post(); 
?>

   <div class="col-md-4 post-div">
            <?php if( !has_post_thumbnail() ){ ?>
				<a href="<?= the_permalink() ?>"><img class="cat-img img-responsive blog-entry element-animate media-left blog-entry default-image" src="<?php echo get_bloginfo('template_directory'); ?>/images/images.png"></a>
					<?php }else{ ?>
				<a href="<?= the_permalink() ?>"><?php the_post_thumbnail('thumbnail', ['class' => 'img-responsive cat-img blog-entry element-animate media-left blog-entry']) ;?></a>
					<?php } ?>

                <!-- <a href="<?php the_permalink() ;?>" class="blog-entry element-animate media-left blog-entry" data-animate-effect="fadeIn"> <?php the_post_thumbnail('thumbnail', ['class' => 'img-responsive']) ;?></a> -->
                <div class="blog-content-body">
                    <div class="post-meta">

                    <span class="author mr-2">
                       <?php 
                        	$author_id = get_the_author_meta('ID');
                        	$avatar = get_avatar($author_id, 32);

                        	if($avatar): ?>
                        		<?php echo $avatar ?>
                        	<?php else: ?>
                        	<img src="<?php echo get_bloginfo('template_directory'); ?>/images/person_1.jpg" alt="Colorlib">

                        <?php endif; ?>
                        	 <?= the_author_meta( 'user_nicename' , $author_id )?></span>&bullet;
                        <span class="mr-2"><?= get_the_date(); ?></span> &bullet;
                        <!-- <span class="ml-2"><span class="fa fa-comments"></span> 3</span> -->
                      </div>
                      <a href="<?= the_permalink(); ?>"><?= get_the_title(); ?></a>
		</div>
	</div>
<?php endwhile; endif; ?>

              </div>

             <!--  <div class="row mt-5">
                <div class="col-md-12 text-center">
                  <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination">
                      <li class="page-item  active"><a class="page-link" href="#">&lt;</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">4</a></li>
                      <li class="page-item"><a class="page-link" href="#">5</a></li>
                      <li class="page-item"><a class="page-link" href="#">&gt;</a></li>
                    </ul>
                  </nav>
                </div>
              </div> -->

            </div>

            <!-- END main-content -->

            <?php get_sidebar(); ?>
 

          </div>
        </div>
      </section>

      
 <?php get_footer();?>