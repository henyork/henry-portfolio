
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

<?php if(!htmlspecialchars($_COOKIE["alt"]) && is_home()): ?>
	<script>
	

	//mobile check
	window.mobileCheck = function() {
  	let check = false;
  	(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  	return check;
	};
	if(window.mobileCheck()){
		document.cookie = 'alt=1';
		window.location.reload();
	}

    // print "false" if direction is down and "true" if up
	var popUpCounter = 0;
	var mouseX = 100;
	var mouseY = 100;
	
	document.addEventListener('mousemove', (event) => {
		mouseX = event.clientX; mouseY = event.clientY;
		popUpCounter++;
	});
	
	const page = document.getElementById("whole-page");
	
	var base_elmnt = document.documentElement;
	const isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
	if (isMobile) {
		page.zoom=1.8;
	}
	base_elmnt.zoom = 1;
	var matrix = [1,0,0,0,0];
	const scaleFactor = .95;
	
	base_elmnt.onwheel = function _page__onwheel( e ) {
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

	base_elmnt.onscrollforeward = function( e ) {
		var scaleVal = matrix[0]*(1/scaleFactor); 
		//if(scaleVal < 1){scaleVal = 1;} 
		/* UNCOMMENT TO ENABLE SCROLLING
		page.style.transform = "scale("+scaleVal+")"; 
		page.style.transformOrigin = "calc("+page.offsetTop+"px + 50%) calc("+page.offsetLeft+"px + 50%);";
		page.style.transformOrigin = mouseX+" "+mouseY;
		*/
	 };

	base_elmnt.onscrollbackward = function( e ) {
	var scaleVal = matrix[0]*scaleFactor; 
	if(scaleVal < .8){scaleVal = .8;}
	/* UNCOMMENT TO ENABLE SCROLLING 
	page.style.transform = "scale("+scaleVal+")";
	
	 page.style.transformOrigin = "calc("+page.offsetTop+"px + 50%) calc("+page.offsetLeft+"px + 50%);";
	 page.style.transformOrigin = mouseX+" "+mouseY; */
	};    


		// Make the DIV element draggable:
	dragElement(document.getElementById("whole-page"),base_elmnt);

	function dragElement(elmnt,base_elmnt) {
	var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
	
		base_elmnt.onmousedown = dragMouseDown;
	

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
		// set the element's new position: UNCOMMENT BELOW TO ENABLE DRAGGING
		//elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
		//elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
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
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			if ( is_front_page() && is_home() ) :
				
				
				?>
				
				<a href= "<?php echo esc_url( home_url( '/' ) ); ?>"> <img class="site-logo"  rel="home" src='<?php echo($image[0]) ?>'></a>
				
				<?php
			else :
				
				?>
				<a href= "<?php echo esc_url( home_url( '/' ) ); ?>"> <img class="site-logo"  rel="home" src='<?php echo($image[0]) ?>'></a>
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
			
			
			<?php
			if(!is_single()){
			if(0) {
				wp_nav_menu(
					array(
						'theme_location' => 'menu-2',
						'menu_id'        => 'alternate-menu',
					)
				);
			}else{
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
			}
		}
		?>
		</nav><!-- #site-navigation -->
	</div>	
		
		
		
	</header><!-- #masthead -->
