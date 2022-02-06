<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package henry-portfolio
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<div id= "whole-page">
<head>

	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.typekit.net/rwi5iqd.css">
	
	<?php wp_head(); 
	
	?>
	<!-- Zoom Script -->

<?php if(is_home()): ?>
	<script>
	
    // print "false" if direction is down and "true" if up
	var popUpCounter = 0;
	var mouseX = 100;
	var mouseY = 100;
	
	document.addEventListener('mousemove', (event) => {
		mouseX = event.clientX; mouseY = event.clientY;
		popUpCounter++;
	});
	
	const page = document.getElementById("whole-page");
	
	var elem = document.documentElement;

	page.zoom = 1;
	var matrix = [1,0,0,0,0];
	const scaleFactor = .95;
	
	page.onwheel = function _page__onwheel( e ) {
    	e.preventDefault();
    	this[ e.deltaY < 0 ? 'onscrollforeward' : 'onscrollbackward' ]();
		let compStyle = window.getComputedStyle(page);
		let curScale = compStyle.getPropertyValue('transform');
		
		matrix = curScale
             .split('(')[1]
             .split(')')[0]
             .split(',')
             .map(parseFloat);
		popUpCounter*=1.1;
		if(popUpCounter>200){
			popUp = document.getElementById("pop-up");
			popUp.style.opacity = "5%";
		}
	};

	page.onscrollforeward = function( e ) {
		var scaleVal = matrix[0]*(1/scaleFactor); 
		//if(scaleVal < 1){scaleVal = 1;} 
		this.style.transform = "scale("+scaleVal+")"; 
		this.style.transformOrigin = "calc("+this.offsetTop+"px + 50%) calc("+this.offsetLeft+"px + 50%);";
	 };

	page.onscrollbackward = function( e ) {
	var scaleVal = matrix[0]*scaleFactor; 
	//if(scaleVal < 1){scaleVal = 1;}
	 this.style.transform = "scale("+scaleVal+")";
	 this.style.transformOrigin = "calc("+this.offsetTop+"px + 50%) calc("+this.offsetLeft+"px + 50%);";
	};    


		// Make the DIV element draggable:
	dragElement(document.getElementById("whole-page"));

	function dragElement(elmnt) {
	var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
	
		elmnt.onmousedown = dragMouseDown;
	

	function dragMouseDown(e) {
		console.log("mouse down");
		e = e || window.event;
		e.preventDefault();
		// get the mouse cursor position at startup:
		pos3 = e.clientX;
		console.log(pos3);
		pos4 = e.clientY;
		document.onmouseup = closeDragElement;
		// call a function whenever the cursor moves:
		document.onmousemove = elementDrag;
	}

	function elementDrag(e) {
		e = e || window.event;
		e.preventDefault();
		// calculate the new cursor position:
		pos1 = pos3 - e.clientX;
		pos2 = pos4 - e.clientY;
		pos3 = e.clientX;
		pos4 = e.clientY;
		// set the element's new position:
		elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
		elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
	}

	function closeDragElement() {
		// stop moving when mouse button is released:
		document.onmouseup = null;
		document.onmousemove = null;
	}
}
    </script>
<?php endif; ?>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'henry-portfolio' ); ?></a>

	<header id="masthead" class="site-header">
		
	
	
	<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 id="henry-title" class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			endif;
			/*$henry_portfolio_description = get_bloginfo( 'description', 'display' );
			if ( $henry_portfolio_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $henry_portfolio_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; */?>
	</div><!-- .site-branding -->
	
	<div class= "nav-menu">
		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'henry-portfolio' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</div>	
		
		
		
	</header><!-- #masthead -->
