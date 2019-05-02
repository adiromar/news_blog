<?php
get_header(); 

$cat = $wp_query->get_queried_object_category();
$idd = $wp_query->get_queried_object_id();
$cat_name = get_cat_name( $idd );

?>

<div class="container mt-4 mb-5">
	<div class="row">
		<div class="col-md-8" style="overflow-y: hidden">
	<?php 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		$post_id = get_the_ID();
		$author_id = get_the_author_meta('ID');
		$avatar = get_avatar($author_id, 32);

		$cat = get_the_category( $post_id );
		
		?>

<div class="col-md-12 mt-4" >
	<h4><?= get_the_title(); ?></h4>
	<?php echo $avatar . ' ' ?><small><?= the_author_meta( 'user_nicename' , $author_id ) . ' , ' . get_the_date(); ?></small>
	<hr>

	<?php echo do_shortcode("[carousel_slide id='87']"); ?>
	
<?php	echo the_content(); ?>
</div>


	<?php endwhile; endif; ?>
	</div>

<!-- 	<div class="col-md-4">
		
		<h4>News</h4><hr>
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
			
			<div class="row post-widget">
			<div class="col-md-4 fpost-img">
				<a href="<?= the_permalink()?>"><?php the_post_thumbnail('thumbnail', ['class' => 'img-responsive post-img']) ;?></a>
			</div>
			<div class="col-md-8 fpost-body">
				<a href="<?= the_permalink(); ?>"><?= get_the_title(); ?></a>
			</div>
			</div>
			
<?php endwhile; endif; ?>

<hr>
<h4>Featured</h4>
<?php 
		$argss =array(
	'post_type' => 'post',
	'posts_per_page' => 6,
	'meta_key' => 'meta-checkbox',
    'meta_value' => 'yes',
);
$the_query = new WP_QUERY( $argss );

if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
			?>
			
			<div class="row post-widget">
			<div class="col-md-4 fpost-img">
				<a href="<?= the_permalink()?>"><?php the_post_thumbnail('thumbnail', ['class' => 'img-responsive post-img']) ;?></a>
			</div>
			<div class="col-md-8 fpost-body">
				<a href="<?= the_permalink(); ?>"><?= get_the_title(); ?></a>
			</div>
			</div>
			
<?php endwhile; endif; ?>
	</div> -->


<!-- sidebar starts -->

<?php get_sidebar(); ?>

<!-- sidebar ends -->

</div>
	<h4 class="heading-line mb-4">Related Posts</h4>
	<div class="row mb-4">
		<!-- <div class="col-md-12"> -->
		<?php 
		// echo '<pre>'; 
		// print_r($cat);

		$rel =array(
			'post__not_in' => array($post_id),
			'posts_per_page' => 4,
			'meta_key' => 'meta-checkbox',
    		'meta_value' => 'yes',
    		'meta_compare' => '!=',
    		'cat' => array($cat[0]->term_id),    		
);
$related = new WP_QUERY( $rel );

if ( have_posts() ) : while ( $related->have_posts() ) : $related->the_post();
			?>
			<div class="col-md-3">
				<!-- <div class="row"> -->
			<div class="col-md-12">
				<?php if( !has_post_thumbnail() ){ ?>
				<a href="<?= the_permalink() ?>"><img class="img-responsive blog-entry element-animate media-left blog-entry default-image" src="<?php echo get_bloginfo('template_directory'); ?>/images/images.png"></a>
					<?php }else{ ?>
				<a href="<?= the_permalink() ?>"><?php the_post_thumbnail('thumbnail', ['class' => 'img-responsive blog-entry element-animate media-left blog-entry']) ;?></a>
					<?php } ?>

			</div>
				<div class="col-md-12 post-div">
				<a href="<?= the_permalink(); ?>"><?= get_the_title(); ?></a>
			</div>
				<!-- </div> -->
			</div>
<?php endwhile; endif; ?>
		<!-- </div> -->
	</div>


</div>
<?php get_footer(); ?>