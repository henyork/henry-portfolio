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
	if(htmlspecialchars($_COOKIE["alt"])){
	//alternate/mobile homepage	script
		echo '</div>';
				
				$args = array(
					'numberposts' => -1
				);
				$posts = get_posts($args);
				
				if(!empty($posts)){
					echo '<div class = "row">';
					foreach ($posts as $post_data) {
						$content = apply_filters('the_content', $post_data->post_content);
						$title = $post_data->post_title; 
						$id = $post_data->ID;
						$year = get_the_date('Y',$id);
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
		}else{
	
		echo '</div>';
		
?>





<div id="category1" class="category-box"><h1 class="category-heading">mechanics</h1></div>
<div id="category2" class="category-box"><h1 class="category-heading">electronics</h1></div>
<div id="category3" class="category-box"><h1 class="category-heading">programming</h1></div>
<div id="category4" class="category-box"><h1 class="category-heading">art</h1></div>
<div class="category-box-extension" id="extension-left"></div>
<div class="category-box-extension" id="extension-top"></div>
<div class="category-box-extension" id="extension-right"></div>
<div class="category-box-extension" id="extension-bottom"></div>
<div id="category-box-mask"></div>
		
<?php
		//main homepage script - primary posts
		
		$args = array('numberposts' => -1,'orderby' => 'title','tag'=>'primary','category_name'=>'electronics');
		$posts = get_posts($args);
		if(!empty($posts)){
			$num_posts= count($posts);
			$count = 0;
			$space_per = 50/$num_posts;
			for($i = 0; $i<$num_posts; $i++){
				$x[$i]=$space_per*$i+1/2*$space_per;
				$y[$i]=1/50*pow($x[$i]-50,2);
			}
			foreach($posts as $post_data){
				$width = rand(5, 9);
				$height = $width * 850/700;
				$y_val = $y[$count];
				$x_val = $x[$count];
				$duration = rand(3,10);
				$title = $post_data->post_title; 
				$id = $post_data->ID;
				$year = get_the_date($format = 'Y', $post = $id);
				if (has_post_thumbnail($id)){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'single-post-thumbnail' ); 
					$link = get_permalink($id);
					echo '<div style = "-webkit-text-stroke-width: '.$width*.0008.'em; font-size: '.$width.'vw; animation-duration:'.$duration.'s, 1s; top:'.($y_val+1/2*$height).'vh; right:'.($x_val-1/2*$width).'vw; width:'.$width.'vw;" class = "card-container">';
					echo '<a href="'.$link.'">';
					echo '<img href= "" style = "" class = "project-card" src="'. $image[0] .'" alt="'. get_the_title() .'" />';
					echo '<div class = "project-card-title">'.$title.'</div>';
					echo '<div class = "project-card-year">'.$year.'</div>';
					echo '</a>';
					echo '</div>';
				}
				$count++;
			}
			}
			
			$args = array('numberposts' => -1,'orderby' => 'title','tag'=> 'secondary','category_name'=>'electronics');
			$posts = get_posts($args);
			if(!empty($posts)){
				$num_posts= count($posts);
				$count = 0;
				$space_per = 50/$num_posts;
				for($i = 0; $i<$num_posts; $i++){
					$x[$i]=$space_per*$i+1/2*$space_per;
					$y[$i]=1/30*pow($x[$i]-30,2);
				}
				foreach($posts as $post_data){
					$width = rand(2, 4);
					$y_val = $y[$count];
					$x_val = $x[$count];
					$duration = rand(3,10);
					$title = $post_data->post_title; 
					$id = $post_data->ID;
					$year = get_the_date($format = 'Y', $post = $id);
					if (has_post_thumbnail($id)){
						$image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'single-post-thumbnail' ); 
						$link = get_permalink($id);
						echo '<div style = "-webkit-text-stroke-width: '.$width*.0008.'em; font-size: '.$width.'vw; animation-duration:'.$duration.'s, 1s; top:'.$y_val.'vh; right:'.($x_val-1/2*$width).'vw; width:'.$width.'vw;" class = "card-container">';
						echo '<a href="'.$link.'">';
						echo '<img href= "" style = "" class = "project-card" src="'. $image[0] .'" alt="'. get_the_title() .'" />';
						echo '<div class = "project-card-title">'.$title.'</div>';
						echo '<div class = "project-card-year">'.$year.'</div>';
						echo '</a>';
						echo '</div>';
					}
					$count++;
				}
			}
		
			//Secondary posts
			/*
			$args = array('numberposts' => -1,'orderby' => 'title', 'tag'=>'secondary');
			$posts = get_posts($args);

			if(!empty($posts)){

				$numposts= count($posts);
				$count = 1;


				foreach($posts as $post_data){


					if($count < 1/2 * $numposts){
						$x = 15+((140/$numposts)*$count);
						$y = 50+ sqrt(1000*1*(1-(($x-50)**2)/1225));
					}
					if($count >= 1/2*$numposts){
						$x = 155-((140/$numposts)*$count);
						$y = 40- sqrt(1000*1*(1-(($x-50)**2)/1225));
					}


					$width = rand(2, 4);

					$duration = rand(3,10);
					$count++;

					$title = $post_data->post_title; 
					$id = $post_data->ID;
					$year = get_the_date($format = 'Y', $post = $id);
					if (has_post_thumbnail($id)){
						$image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'single-post-thumbnail' ); 
						$link = get_permalink($id);
						echo '<div style = "-webkit-text-stroke-width: '.$width*.0008.'em; font-size: '.$width.'vw; animation-duration:'.$duration.'s, 1s; top:'.$y.'vh; left:'.($x-1/2*$width).'vw; width:'.$width.'vw;" class = "card-container">';
						echo '<a href="'.$link.'">';
						echo '<img href= "" style = "" class = "project-card" src="'. $image[0] .'" alt="'. get_the_title() .'" />';
						echo '<div class = "project-card-title">'.$title.'</div>';
						echo '<div class = "project-card-year">'.$year.'</div>';
						echo '</a>';
						echo '</div>';
					}


				}
				} */
		}
?>
		


		

		

	</main><!-- #main -->

<?php

get_footer();
?>