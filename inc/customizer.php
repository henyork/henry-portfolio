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
function henry_portfolio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_setting( 'header_textcolor' , array(

		'default'   => '#000000',
		
		'transport' => 'refresh',
		
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(

		'label'      => __( 'Header Color', 'henry-portfolio' ),
		
		'section'    => 'your_section_id',
		
		'settings'   => 'your_setting_id',
		
		) ) );





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
