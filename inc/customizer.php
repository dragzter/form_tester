<?php
/**
 * form_tester Theme Customizer
 *
 * @package form_tester
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function form_tester_customize_register( $wp_customize ) {
	
	

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'form_tester_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'form_tester_customize_partial_blogdescription',
		) );
	}

	$main_panel = 'main_settings_panel';
	$wp_customize->add_panel($main_panel , array(
		'title' 	=> 'Custom Settings',
		'Description' => 'A Panel for Custom Settings',
		'priority' 	=> 1
	));

	$section = 'cta_section';
	$setting_name = $section . '_cta_post';

	$wp_customize->add_section( $section, array(
		'title' 	=> 'CTA Section',
		'priority' 	=> 100,
		'panel'		=> $main_panel
	));

	$wp_customize->add_setting( $setting_name);

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, $setting_name . '_control', array(
		'label'    => 'Select Page/Post',
		'section'  => $section,
		'settings'  => $setting_name,
		'type'     => 'dropdown-pages'
	)));
	  
}
add_action( 'customize_register', 'form_tester_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function form_tester_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function form_tester_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function form_tester_customize_preview_js() {
	wp_enqueue_script( 'form_tester-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'form_tester_customize_preview_js' );
