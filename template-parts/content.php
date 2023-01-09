<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package henry-portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	

	<div class="entry-content">
	
	<?php 
	
	$categories = get_the_category();
	echo '<h2 class= "post-info">';
	foreach($categories as $category_data){
		if(($category_data === reset($categories)) && (sizeof($categories) > 1)){
			echo 'Categories: <b>';
		}elseif($category_data === reset($categories)){
			echo 'Category: <b>';
		}
		
		
		echo $category_data -> name;
		if(!($category_data === end($categories))){
			echo ', ';
		}
		
	}
	
	?></b></h2>
	<h2 class="post-info">| Year: <b><?php echo get_the_date('Y');?></b></h2>
	
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'henry-portfolio' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'henry-portfolio' ),
				'after'  => '</div>',
			)
		);

	


		?>
	</div><!-- .entry-content -->
	<script>

	function backBtn(defUrl) {
    defUrl = defUrl || window.location.origin;
    var prev = window.location.href;

    window.history.go(-1);

    setTimeout(function(){ 
        if (window.location.href == prev) {
            window.location.href = defUrl; 
        }
    }, 500);
	}
	</script>
	<input class="back-button" type="button" value="🢠 Back" onclick="backBtn()">
	

	<div class= post-spacing></div>
	
	
</article><!-- #post-<?php the_ID(); ?> -->
