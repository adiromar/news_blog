<?php /* Template Name: Category template   */
get_header(); 

$cat = $wp_query->get_queried_object_category();
$idd = $wp_query->get_queried_object_id();
$cat_name = get_cat_name( $idd );
?>

<div class="container content-container">
	<div class="row mt-5 ml-1">
	<h4 class="h-line"><?= $cat_name ?></h4>
	</div>

	<div class="section mt-4">
		<div class="row">
			<div class="col-md-8 col-lg-8">
				<?php
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$args = array (
              		'orderby' => 'date',
              		'posts_per_page' => -1,
              		'cat' => array($idd),
              		'paged' => $paged,
            );
			$query = new WP_Query($args);

			
          if($query->have_posts()) : while($query->have_posts()) : $query->the_post();
          	$postcat = get_the_category( $post->ID );
			$category_id = get_cat_ID( $postcat[0]->name );
			$category_link = get_category_link( $category_id );
			$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
			$unique_id = $post->ID;
				?>

				<!-- post -->
							<div class="row cat-widget">
								<div class="col-md-4 blog-entriess">
									<!-- <a class="post-img" href="<?php the_permalink() ;?>"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/post-1.jpg" alt=""></a> -->
									<?php if( !has_post_thumbnail() ){ ?>
										<a href="<?= the_permalink() ?>"><img class="img-responsive blog-entry element-animate media-left blog-entry default-image" src="<?php echo get_bloginfo('template_directory'); ?>/images/images.png"></a>
									<?php }else{ ?>
									<a href="<?= the_permalink() ?>"><?php the_post_thumbnail('thumbnail', ['class' => 'img-responsive blog-entry element-animate media-left blog-entry']) ;?></a>
								<?php } ?>
								</div>
									<div class="col-md-8">
										<div class="col-md-12">
											<span class="post-date"><?= the_date();?></span>
										</div>
									<div class="col-md-12 dpost-body">
										<a href="<?php the_permalink() ;?>"><?= the_title();?></a>

									</div>
								</div>
							</div>
							<!-- /post -->
<?php endwhile;  ?>		
<?php  endif;?>

			</div>

			<div class="col-md-4">
				<div class="row">
				<?php get_sidebar(); ?>
				</div>
			</div>

		</div>
	</div>
</div>
<style type="text/css">
	.navigation li a,
.navigation li a:hover,
.navigation li.active a,
.navigation li.disabled {
    color: #fff;
    text-decoration:none;
}
 
.navigation li {
    display: inline;
}
 
.navigation li a,
.navigation li a:hover,
.navigation li.active a,
.navigation li.disabled {
    background-color: #6FB7E9;
    border-radius: 3px;
    cursor: pointer;
    padding: 12px;
    padding: 0.75rem;
}
 
.navigation li a:hover,
.navigation li.active a {
    background-color: #3C8DC5;
}
</style>

<?php get_footer(); ?>