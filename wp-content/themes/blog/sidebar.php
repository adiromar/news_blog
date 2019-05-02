           <div class="col-md-12 col-lg-4 sidebar">

              <div class="sidebar-box">
                <div class="bioo text-center">
                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="background-color: black;">

            <!-- tabs and pills      	 -->
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Latest</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Featured</a>
  </li>
 <!--  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">News</a>
  </li> -->
</ul>

<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  	<?php
$argss =array(
	'post_type' => 'post',
	'posts_per_page' => 6,
	'meta_key' => 'meta-checkbox',
    'meta_value' => 'yes',
    'meta_compare' => '!=',
);
$the_query = new WP_QUERY( $argss );
if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
  	?>
  	<div class="row img-link">
			<div class="col-md-4">
				<?php if( !has_post_thumbnail() ){ ?>
					<a href="<?= the_permalink(); ?>"><img class="cat-img img-responsive post-img" src="<?php echo get_bloginfo('template_directory'); ?>/images/images.png"></a>
				<?php }else{ ?>
					<a href="<?= the_permalink() ?>"><?php the_post_thumbnail('thumbnail', ['class' => 'img-responsive post-img']) ;?></a>
				<?php } ?>

				<!-- <a href="<?= the_permalink()?>"><?php the_post_thumbnail('thumbnail', ['class' => 'img-responsive post-img']) ;?></a> -->
			</div>
			<div class="col-md-8 sidebar-link">
				<a style="float: left;" href="<?= the_permalink(); ?>"><?= get_the_title(); ?></a>
			</div>
			</div><hr>
			
<?php endwhile; endif; ?>

  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  		<?php
$argu =array(
	'post_type' => 'post',
	'posts_per_page' => 6,
	'meta_key' => 'meta-checkbox',
    'meta_value' => 'yes'
);
$feat = new WP_QUERY( $argu );
if ( have_posts() ) : while ( $feat->have_posts() ) : $feat->the_post();
  	?>
  		<div class="row">
			<div class="col-md-4">
				<?php if( !has_post_thumbnail() ){ ?>
					<img class="cat-img img-responsive post-img" src="<?php echo get_bloginfo('template_directory'); ?>/images/images.png">
				<?php }else{ ?>
					<a href="<?= the_permalink() ?>"><?php the_post_thumbnail('thumbnail', ['class' => 'img-responsive post-img']) ;?></a>
				<?php } ?>

				<!-- <a href="<?= the_permalink()?>"><?php the_post_thumbnail('thumbnail', ['class' => 'img-responsive post-img']) ;?></a> -->
			</div>
			<div class="col-md-8">
				<a href="<?= the_permalink(); ?>"><?= get_the_title(); ?></a>
			</div>
		</div><hr>
			
<?php endwhile; endif; ?>
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">this is news section</div>
</div>

<!-- tabs and pills ends here -->

                </div>
              </div>
            </div>
            <!-- END sidebar -->