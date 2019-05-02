<?php

// setting post thumbnails
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 80, 80 ); 

// creating a checkbox in admin panel
function sm_custom_meta() {
    add_meta_box( 'sm_meta', __( 'Featured Posts', 'sm-textdomain' ), 'sm_meta_callback', 'post' );
}

function sm_meta_callback( $post ) {
    $featured = get_post_meta( $post->ID );
    ?>
 
	<p>
    <div class="sm-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $featured['meta-checkbox'] ) ) checked( $featured['meta-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Make this post Featured', 'sm-textdomain' )?>
        </label>
        
    </div>
</p>
 
    <?php
}
add_action( 'add_meta_boxes', 'sm_custom_meta' );

/**
 * Saves the custom meta input
 */
function sm_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'sm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
 // Checks for input and saves
if( isset( $_POST[ 'meta-checkbox' ] ) ) {
    update_post_meta( $post_id, 'meta-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'meta-checkbox', '' );
}
 
}
add_action( 'save_post', 'sm_meta_save' );



// pagination here
// function wpbeginner_numeric_posts_nav() {
 
//     if( is_singular() )
//         return;
 
//     global $wp_query;
 
//     /** Stop execution if there's only 1 page */
//     if( $query->max_num_pages <= 1 )
//         return;
 
//     $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
//     $max   = intval( $query->max_num_pages );
 
//     /** Add current page to the array */
//     if ( $paged >= 1 )
//         $links[] = $paged;
 
//     /** Add the pages around the current page to the array */
//     if ( $paged >= 3 ) {
//         $links[] = $paged - 1;
//         $links[] = $paged - 2;
//     }
 
//     if ( ( $paged + 2 ) <= $max ) {
//         $links[] = $paged + 2;
//         $links[] = $paged + 1;
//     }
 
//     echo '<div class="navigation"><ul>' . "\n";
 
//     /** Previous Post Link */
//     if ( get_previous_posts_link() )
//         printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
//     /** Link to first page, plus ellipses if necessary */
//     if ( ! in_array( 1, $links ) ) {
//         $class = 1 == $paged ? ' class="active"' : '';
 
//         printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
//         if ( ! in_array( 2, $links ) )
//             echo '<li>…</li>';
//     }
 
//     /** Link to current page, plus 2 pages in either direction if necessary */
//     sort( $links );
//     foreach ( (array) $links as $link ) {
//         $class = $paged == $link ? ' class="active"' : '';
//         printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
//     }
 
//     /** Link to last page, plus ellipses if necessary */
//     if ( ! in_array( $max, $links ) ) {
//         if ( ! in_array( $max - 1, $links ) )
//             echo '<li>…</li>' . "\n";
 
//         $class = $paged == $max ? ' class="active"' : '';
//         printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
//     }
 
//     /** Next Post Link */
//     if ( get_next_posts_link() )
//         printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
//     echo '</ul></div>' . "\n";
 
// }

// another method pagination

function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $query;
    $numpages = $query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }
}


// slider settings
add_filter('carousel_slider_load_scripts', 'carousel_slider_load_scripts');
function carousel_slider_load_scripts( $load_scripts ) {
    return true;
}
?>