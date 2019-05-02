<?php /* Template Name: Test template   */

$paged = get_query_var('paged');
				$args = array (
					'paged' => $paged,
              		'orderby' => 'date',
              		'posts_per_page' => 2,
              		'paged' => $paged,
            );
			$query = new WP_Query($args);

	if($query->have_posts()) : while($query->have_posts()) : $query->the_post();
?>
<div class="col-md-12">
	<a href="<?php the_permalink() ;?>"><?= the_title();?></a>
</div>


<?php endwhile; endif; ?>
<?php echo '<p style="color:red; padding: 5px; font-size: 16px; text-align:center; margin-top: 20px;">' . paginate_links(array('total'=> $query->max_num_pages)); ?>
          <?php wp_reset_postdata(); ?>
