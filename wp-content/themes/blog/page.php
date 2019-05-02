<?php

get_header();
$id = get_the_ID();

?>
<div class="container mt-5">
	<h4><?= get_the_title() ?></h4>

	<?php get_the_content() ?>
</div>



<?php get_footer(); ?>