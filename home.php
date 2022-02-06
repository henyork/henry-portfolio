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
		echo '</div>';
		
		//new Post getting
	
		$args = array('numberposts' => -1,'orderby' => 'title');
		$posts = get_posts($args);

		if(!empty($posts)){
			
			$numposts= count($posts);
			$count = 1;
			
			
			foreach($posts as $post_data){
				
				if($count < 1/2 * $numposts){
					$x = 15+((140/$numposts)*$count);
					$y = 50+ sqrt(400*1*(1-(($x-50)**2)/1225));
				}
				if($count >= 1/2*$numposts){
					$x = 155-((140/$numposts)*$count);
					$y = 50- sqrt(400*1*(1-(($x-50)**2)/1225));
				}
				$width = rand(3, 5);
				$duration = rand(3,10);
				$count++;

				$title = $post_data->post_title; 
				$id = $post_data->ID;
				$year = get_the_date($format = 'Y', $post = $id);
				if (has_post_thumbnail($id)){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'single-post-thumbnail' ); 
					$link = get_permalink($id);
					echo '<div style = "animation-duration:'.$duration.'s; top:'.$y.'vh; left:'.($x-1/2*$width).'vw; width:'.$width.'vw;" class = "card-container">';
					echo '<a href="'.$link.'">';
					echo '<img href= "" style = "" class = "project-card" src="'. $image[0] .'" alt="'. get_the_title() .'" />';
					echo '<div class = "project-card-title">'.$title.'</div>';
					echo '<div class = "project-card-year">'.$year.'</div>';
					echo '</a>';
					echo '</div>';
				}


			}
		}




				/*
				OLD POST GETTING
				$cur_yr = date('Y');
				$year = $cur_yr;
				$args = array(
					'numberposts' => -1
				);
				
				$posts = get_posts($args);
				if(!empty($posts)){
					echo '<div class = "row">';
					foreach ($posts as $post_data) {
						//echo('<img>')
						$content = apply_filters('the_content', $post_data->post_content); 
						$title = $post_data->post_title; 
						$id = $post_data->ID;
						if (has_post_thumbnail($id)){
							$image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'single-post-thumbnail' ); 
							$link = get_permalink($id);
							echo '<div class = "column">';
							echo '<a href="'.$link.'">';
							echo '<img href= "" class = "project-card" src="'. $image[0] .'" alt="'. get_the_title() .'" />';
							echo '<div class = "project-card-title">'.$title.'</div>';
							echo '<div class = "project-card-year">'.$year.'</div>';
							echo '</a>';
							echo '</div>';
						}
					}
					echo '</div>';
					}
					*/
		
		?>
		


		

		

	</main><!-- #main -->

<?php

get_footer();
?>