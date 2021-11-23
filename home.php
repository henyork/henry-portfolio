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
		$args = array(
            
            'orderby' => 'date',
            'order' => 'DESC',
            
        );
		$posts = get_posts($args); 
		
		echo '<div class = "row">';

		//2021


		foreach ($posts as $post_data) {
			 
			//echo('<img>')
			$content = apply_filters('the_content', $post_data->post_content); 
			 $title = $post_data->post_title; 
			 $id = $post_data->ID;
			 /*echo('<h1>');
			 //echo($id);
			 echo('</h1>');*/
			
			 if (has_post_thumbnail($id)){
			 	$image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'single-post-thumbnail' ); 
			 	$link = get_permalink($id);
				 
				 echo '<div class = "column">';
				 echo '<a href="'.$link.'">';
				 echo '<img href= "" class = "project-card" src="'. $image[0] .'" alt="'. get_the_title() .'" />';
				 echo '<div class = "project-card-title">'.$title.'</div>';
				 echo '</a>';
				 echo '</div>';
				 
			 }
			 //echo $content; 
		}
		echo '</div>';
		?>
		


		

		

	</main><!-- #main -->

<?php

get_footer();
?>