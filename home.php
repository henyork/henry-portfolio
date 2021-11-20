<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package henry-portfolio
 */

get_header();
?>
    
	<main id="primary" class="site-main">
		<?php
		
		$pages = get_pages(); 
		foreach ($pages as $page_data) {
			 
			//echo('<img>')
			$content = apply_filters('the_content', $page_data->post_content); 
			 $title = $page_data->post_title; 
			 $id = $page_data->ID;
			 /*echo('<h1>');
			 //echo($id);
			 echo('</h1>');*/
			
			 if (has_post_thumbnail($id)){
			 	$image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'single-post-thumbnail' ); 
			 	
				 echo '<div class = "project-card">';
				 echo '<img src="'. $image[0] .'" alt="'. get_the_title() .'" />';
				 echo '<div class = "project-card-title">'.$title.'</div>';
				 echo '</div>';
			 }
			 //echo $content; 
		}
		?>
		


		

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php

get_footer();
?>