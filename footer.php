<?php 
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package henry-portfolio
 */

?>
	
	<footer id="colophon" class="site-footer">
		<div style="text-align:center;" class="site-info">
			
				
			
			
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				//$name = bloginfo( 'name' );
				//echo '<h3 class=footer-text>© Henry York 2021</h3>';
				//echo '<h2 class="footer-name">'.$name.'</h2>';
				//printf( esc_html__( 'Theme: %1$s by %2$s.', 'henry-portfolio' ), 'henry-portfolio', '<a href="http://underscores.me/">Henry York</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<div id="footer-menu">
<?php
	//		wp_nav_menu(
	//			array(
	//				'theme_location' => 'menu-2',
	//				'menu_id'        => 'secondary-menu',
	//			)
	//		);
?>
</div>


<?php if(is_home()): ?>

<div id = "pop-up" style = "background-color:<?php echo get_theme_mod('popupcolor');?>;">
<div>
<?php echo get_theme_mod('popupentrytext');?>
</div>
<div>
<?php echo get_theme_mod('popuplinkentrytext');?> 
<a href= "/alt-home">alternate page</a>
</div>
</div>



<noscript>
	<div class = "js-deactivated">
	<h2>I require JavaScript to be active!</h2>
	<a  href="/alt-home">
	<h3>Or, view an alternate page<h3>
	</a>
	</div>
	<style>
		#whole-page{
			opacity:10%;
			pointer-events:none;
		}
		.js-deactivated{
			
		}
		#pop-up{
			display:none;
		}
	</style>
</noscript>

<?php endif; ?>



</body>
</div>
</html>
