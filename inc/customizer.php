<?php
/**
 * henry-portfolio Theme Customizer
 *
 * @package henry-portfolio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */



function starter_customize_register( $wp_customize ) 
{
    $wp_customize->add_section( 'popup' , array(
        'title'    => __( 'Pop-Up', 'starter' ),
        'priority' => 30
    ) );   

    $wp_customize->add_setting( 'popupentrytext' , array(
        'default'   => '',
        'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );

    $wp_customize->add_control( 'popupentry', array(
        'label'    => __( 'Pop-Up Text', 'starter' ),
		'type' => 'textarea',
        'section'  => 'popup',
        'settings' => 'popupentrytext'
		
    ) ) ;

	$wp_customize->add_setting( 'popuplinkentrytext' , array(
        'default'   => '',
        'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );

    $wp_customize->add_control( 'popuplinkentry', array(
        'label'    => __( 'Pop-Up Link Text', 'starter' ),
		'type' => 'textarea',
        'section'  => 'popup',
        'settings' => 'popuplinkentrytext'
		
    ) ) ;
	
	$wp_customize->add_setting( 'altpopuplinkentrytext' , array(
        'default'   => '',
        'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );

    $wp_customize->add_control( 'altpopuplinkentry', array(
        'label'    => __( 'Alternate Pop-Up Link Text', 'starter' ),
		'type' => 'textarea',
        'section'  => 'popup',
        'settings' => 'altpopuplinkentrytext'
		
    ) ) ;
	



	$wp_customize->add_setting( 'popupcolor',
   array(
      'default' => '#333',
      'sanitize_callback' => 'sanitize_hex_color',
  	 )
	);
	$wp_customize->add_control( 'popupcolor',
		array(
		'label' => __( 'Pop-Up Background' ),
		'section' => 'popup',
		'type' => 'color',
	)
	);
	
	$wp_customize->add_panel( 'cards', array(
	 'priority'       => 10,
	  'capability'     => 'edit_theme_options',
	  'theme_supports' => '',
	  'title'          => __('Cards', 'henry-portfolio'),
	  'description'    => __('Several settings pertaining my theme', 'henry-portfolio'),
	) );
	
	
	$args = array('numberposts' => -1,'orderby' => 'title');
	$posts = get_posts($args);
	
	if(!empty($posts)){
		$num_posts= count($posts);
		$count = 0;
		foreach($posts as $post_data){
			$wp_customize->add_section( 'card'.$post_data->ID.'section' , array(
			'title'    => __( $post_data->post_title, 'starter' ),
				'priority' => 30,
				'panel' => 'cards'
			) );
			
			$wp_customize->add_setting( 'card'.$post_data->ID.'x_val',
				 array(
					 'default' => '50'
					 
					 )
					);
			$wp_customize->add_control( 'card'.$post_data->ID.'x', array(
					'label'    => __( $post_data->post_title.' X', 'starter' ),
					'type' => 'number',
					'section'  => 'card'.$post_data->ID.'section',
					'settings' => 'card'.$post_data->ID.'x_val'

					) ) ;
			$wp_customize->add_setting( 'card'.$post_data->ID.'y_val',
				 array(
					 'default' => '50'
					 )
					);
			$wp_customize->add_control( 'card'.$post_data->ID.'y', array(
					'label'    => __( $post_data->post_title.' Y', 'starter' ),
					'type' => 'number',
					'section'  => 'card'.$post_data->ID.'section',
					'settings' => 'card'.$post_data->ID.'y_val'

					) ) ;
			$wp_customize->add_setting( 'card'.$post_data->ID.'width_val',
				 array(
					 'default' => '5'
					 )
					);
			$wp_customize->add_control( 'card'.$post_data->ID.'width', array(
					'label'    => __( $post_data->post_title.' Width', 'starter' ),
					'type' => 'number',
					'section'  => 'card'.$post_data->ID.'section',
					'settings' => 'card'.$post_data->ID.'width_val'

					) ) ;
			$count++;
		}
	}
	
	
	

}
add_action( 'customize_register', 'starter_customize_register');






 
function henry_portfolio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'henry_portfolio_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'henry_portfolio_customize_partial_blogdescription',
			)
		);

		

	}
}
add_action( 'customize_register', 'henry_portfolio_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function henry_portfolio_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function henry_portfolio_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function henry_portfolio_customize_preview_js() {
	wp_enqueue_script( 'henry-portfolio-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'henry_portfolio_customize_preview_js' );
