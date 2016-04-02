<?php
/**
 * openhc Customizer functionality
 *
 * @package openhc
 * @since openhc 1.0
 */

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since openhc 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function openhc_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->add_section( 'openhc_theme_options', array(
		'title'    => esc_html__( 'Front Page', 'openhc' ),
		'priority' => 34,
	) );

	/* Front Page: Featured Page One */
	$wp_customize->add_setting( 'openhc_featured_page_one', array(
		'default'           => '',
		'sanitize_callback' => 'openhc_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'openhc_featured_page_one', array(
		'label'             => esc_html__( 'First Content Block', 'openhc' ),
		'section'           => 'openhc_theme_options',
		'priority'          => 9,
		'type'              => 'dropdown-pages',
	) );

	/* Front Page: Featured Page Two */
	$wp_customize->add_setting( 'openhc_featured_page_two', array(
		'default'           => '',
		'sanitize_callback' => 'openhc_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'openhc_featured_page_two', array(
		'label'             => esc_html__( 'Second Content Block', 'openhc' ),
		'section'           => 'openhc_theme_options',
		'priority'          => 10,
		'type'              => 'dropdown-pages',
	) );

	/* Front Page: Featured Page Three */
	$wp_customize->add_setting( 'openhc_featured_page_three', array(
		'default'           => '',
		'sanitize_callback' => 'openhc_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'openhc_featured_page_three', array(
		'label'             => esc_html__( 'Third Content Block', 'openhc' ),
		'section'           => 'openhc_theme_options',
		'priority'          => 11,
		'type'              => 'dropdown-pages',
	) );

	$wp_customize->add_section( 'openhc_theme_options_about', array(
		'title'    => esc_html__( 'About Page', 'openhc' ),
		'priority' => 35,
	) );

	/* Front Page: Featured Page One */
	$wp_customize->add_setting( 'openhc_featured_aboutpage_one', array(
		'default'           => '',
		'sanitize_callback' => 'openhc_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'openhc_featured_aboutpage_one', array(
		'label'             => esc_html__( 'First Content Block', 'openhc' ),
		'section'           => 'openhc_theme_options_about',
		'priority'          => 10,
		'type'              => 'dropdown-pages',
	) );

	/* Front Page: Featured Page One */
	$wp_customize->add_setting( 'openhc_featured_aboutpage_two', array(
		'default'           => '',
		'sanitize_callback' => 'openhc_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'openhc_featured_aboutpage_two', array(
		'label'             => esc_html__( 'Second Content Block', 'openhc' ),
		'section'           => 'openhc_theme_options_about',
		'priority'          => 11,
		'type'              => 'dropdown-pages',
	) );

/**
* Adds the individual sections for projects page
*/
	$wp_customize->add_section( 'openhc_theme_options_projects', array(
		'title'    => esc_html__( 'Projects Page', 'openhc' ),
		'priority' => 36,
	) );

	/* Blog Layout */
	$wp_customize->add_setting( 'openhc_projects_layout', array(
		'default'           => 'top-header',
		'sanitize_callback' => 'openhc_sanitize_choices',
	) );
	$wp_customize->add_control( 'openhc_projects_layout', array(
		'label'             => esc_html__( 'Projects Page Settings', 'openhc' ),
		'section'           => 'openhc_theme_options_projects',
		'settings'          => 'openhc_projects_layout',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'top-header'   => esc_html__( 'Top Content Block', 'openhc' ),
			'no-header'  => esc_html__( 'Without Top Content Block', 'openhc' ),
		)
	) );

/**
* Adds the individual sections for causes page
*/
	$wp_customize->add_section( 'openhc_theme_options_causes', array(
		'title'    => esc_html__( 'Causes Page', 'openhc' ),
		'priority' => 37,
	) );

	/* Blog Layout */
	$wp_customize->add_setting( 'openhc_causes_layout', array(
		'default'           => 'top-header-one',
		'sanitize_callback' => 'openhc_sanitize_choices',
	) );
	$wp_customize->add_control( 'openhc_causes_layout', array(
		'label'             => esc_html__( 'Causes Page Settings', 'openhc' ),
		'section'           => 'openhc_theme_options_causes',
		'settings'          => 'openhc_causes_layout',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'top-header-one'   => esc_html__( 'Top Content Block', 'openhc' ),
			'no-header-one'  => esc_html__( 'Without Top Content Block', 'openhc' ),
		)
	) );

/**
* Adds the individual sections for projects page
*/
	$wp_customize->add_section( 'openhc_theme_options_stories', array(
		'title'    => esc_html__( 'Stories Page', 'openhc' ),
		'priority' => 38,
	) );

	/* Blog Layout */
	$wp_customize->add_setting( 'openhc_stories_layout', array(
		'default'           => 'top-header-two',
		'sanitize_callback' => 'openhc_sanitize_choices',
	) );
	$wp_customize->add_control( 'openhc_stories_layout', array(
		'label'             => esc_html__( 'Stories Page Settings', 'openhc' ),
		'section'           => 'openhc_theme_options_stories',
		'settings'          => 'openhc_stories_layout',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'top-header-two'   => esc_html__( 'Top Content Block', 'openhc' ),
			'no-header-two'  => esc_html__( 'Without Top Content Block', 'openhc' ),
		)
	) );

/**
* Adds the individual sections for blog
*/
	$wp_customize->add_section( 'openhc_theme_options_blog', array(
		'title'    => esc_html__( 'Blog Page', 'openhc' ),
		'priority' => 39,
	) );

	/* Blog Layout */
	$wp_customize->add_setting( 'openhc_blog_layout', array(
		'default'           => 'sidebar-right',
		'sanitize_callback' => 'openhc_sanitize_choices',
	) );
	$wp_customize->add_control( 'openhc_blog_layout', array(
		'label'             => esc_html__( 'Blog Layout', 'openhc' ),
		'section'           => 'openhc_theme_options_blog',
		'settings'          => 'openhc_blog_layout',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'full'   => esc_html__( 'Full Post Layout', 'openhc' ),
			'sidebar-right'  => esc_html__( 'Right Sidebar Layout', 'openhc' ),
			'sidebar-left'  => esc_html__( 'Left Sidebar Layout', 'openhc' ),
			'grid-right'  => esc_html__( 'Grid Layout + Right Sidebar', 'openhc' ),
			'grid-left'  => esc_html__( 'Grid Layout + Left Sidebar', 'openhc' ),
			'grid-full'  => esc_html__( 'Full Grid Layout', 'openhc' ),
			'list'  => esc_html__( 'List Layout', 'openhc' ),
		)
	) );

	/* Post Display */
	$wp_customize->add_setting( 'openhc_post_type', array(
		'default'           => 'full-lenght',
		'sanitize_callback' => 'openhc_sanitize_choices',
	) );
	$wp_customize->add_control( 'openhc_post_type', array(
		'label'             => esc_html__( 'Post Display', 'openhc' ),
		'section'           => 'openhc_theme_options_blog',
		'settings'          => 'openhc_post_type',
		'priority'          => 2,
		'type'              => 'radio',
		'choices'           => array(
			'full-lenght'   => esc_html__( 'Full Lenght', 'openhc' ),
			'excerpt-lenght'  => esc_html__( 'Excerpt', 'openhc' ),
		)
	) );


	/* Post Settings */
	$wp_customize->add_setting( 'openhc_post_footer', array(
		'default'           => false,
		'sanitize_callback' => 'openhc_sanitize_checkbox',
	) );
	$wp_customize->add_control('openhc_post_footer', array(
				'label'      => esc_html__( 'Hide Post Meta', 'openhc' ),
				'section'    => 'openhc_theme_options_blog',
				'settings'   => 'openhc_post_footer',
				'type'		 => 'checkbox',
				'priority'	 => 3
		) );

	/* Single Post Layout */
	$wp_customize->add_setting( 'openhc_single_post_layout', array(
		'default'           => 'single-sidebar-right',
		'sanitize_callback' => 'openhc_sanitize_choices',
	) );
	$wp_customize->add_control( 'openhc_single_post_layout', array(
		'label'             => esc_html__( 'Single Post Layout', 'openhc' ),
		'section'           => 'openhc_theme_options_blog',
		'settings'          => 'openhc_single_post_layout',
		'priority'          => 4,
		'type'              => 'radio',
		'choices'           => array(
			'single-full'   => esc_html__( 'Full Post Layout', 'openhc' ),
			'single-sidebar-right'  => esc_html__( 'Right Sidebar Layout', 'openhc' ),
			'single-sidebar-left'  => esc_html__( 'Left Sidebar Layout', 'openhc' ),
		)
	) );

	/* Related Post Settings */
	$wp_customize->add_setting( 'openhc_related_post', array(
		'default'           => false,
		'sanitize_callback' => 'openhc_sanitize_checkbox',
	) );
	$wp_customize->add_control('openhc_related_post', array(
				'label'      => esc_html__( 'Hide Related Post on Single Post', 'openhc' ),
				'section'    => 'openhc_theme_options_blog',
				'settings'   => 'openhc_related_post',
				'type'		 => 'checkbox',
				'priority'	 => 5
		) );

	/* Archive Layout */
	$wp_customize->add_setting( 'openhc_archive_layout', array(
		'default'           => 'single-sidebar-right',
		'sanitize_callback' => 'openhc_sanitize_choices',
	) );
	$wp_customize->add_control( 'openhc_archive_layout', array(
		'label'             => esc_html__( 'Archive Layout', 'openhc' ),
		'section'           => 'openhc_theme_options_blog',
		'settings'          => 'openhc_archive_layout',
		'priority'          => 6,
		'type'              => 'radio',
		'choices'           => array(
			'archive-full'   => esc_html__( 'Full Post Layout', 'openhc' ),
			'archive-sidebar-right'  => esc_html__( 'Right Sidebar Layout', 'openhc' ),
			'archive-sidebar-left'  => esc_html__( 'Left Sidebar Layout', 'openhc' ),
			'archive-grid-right'  => esc_html__( 'Grid Layout + Right Sidebar', 'openhc' ),
			'archive-grid-left'  => esc_html__( 'Grid Layout + Left Sidebar', 'openhc' ),
			'archive-grid-full'  => esc_html__( 'Full Grid Layout', 'openhc' ),
			'archive-list'  => esc_html__( 'List Layout', 'openhc' ),
		)
	) );

/**
* Adds the individual sections for header
*/
	$wp_customize->add_section( 'openhc_theme_options_header', array(
		'title'    => esc_html__( 'Header Options', 'openhc' ),
		'priority' => 30,
	) );

	/* Header Layout */
	$wp_customize->add_setting( 'openhc_header_layout', array(
		'default'           => 'fixed-header',
		'sanitize_callback' => 'openhc_sanitize_choices',
	) );
	$wp_customize->add_control( 'openhc_header_layout', array(
		'label'             => esc_html__( 'Header Options', 'openhc' ),
		'section'           => 'openhc_theme_options_header',
		'settings'          => 'openhc_header_layout',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'fixed-header'   => esc_html__( 'Fixed Header', 'openhc' ),
			'standard-header'  => esc_html__( 'Standard Header', 'openhc' ),
			'alternative-header'  => esc_html__( 'Alternative Header', 'openhc' ),
		)
	) );

/**
* Social Menu Position
*/
	$wp_customize->add_section( 'openhc_social_menu_section' , array(
   		'title'    => esc_html__( 'Social Menu Position on Desktop', 'openhc' ),
   		'priority'   => 31,
	) );

	/* Custom CSS*/
	$wp_customize->add_setting( 'openhc_social_top', array(
		'default'           => '90',
		'sanitize_callback' => 'openhc_sanitize_text',
	) );
	$wp_customize->add_control( 'openhc_social_top', array(
		'label'             => esc_html__( 'Social Menu Position on Desktop', 'openhc' ),
		'section'           => 'openhc_social_menu_section',
		'settings'          => 'openhc_social_top',
		'type'		        => 'textarea',
		'priority'          => 1,
	) );

/**
* Search Bar
*/
	$wp_customize->add_section( 'openhc_search_bar_section' , array(
   		'title'    => esc_html__( 'Search Box', 'openhc' ),
   		'priority'   => 29,
	) );

	$wp_customize->add_setting( 'openhc_search_top', array(
		'default'           => false,
		'sanitize_callback' => 'openhc_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'openhc_search_top', array(
		'label'             => esc_html__( 'Hide Search Box', 'openhc' ),
		'section'           => 'openhc_search_bar_section',
		'settings'          => 'openhc_search_top',
		'type'		        => 'checkbox',
		'priority'          => 1,
	) );

/**
* Adds the individual sections for custom logo
*/
	$wp_customize->add_section( 'openhc_logo_section' , array(
	  'title'       => esc_html__( 'Logo', 'openhc' ),
	  'priority'    => 28,
	  'description' => esc_html__( 'Upload a logo to replace the default site name and description in the header', 'openhc' )
	) );
	$wp_customize->add_setting( 'openhc_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'openhc_logo', array(
		'label'    => esc_html__( 'Logo', 'openhc' ),
		'section'  => 'openhc_logo_section',
		'settings' => 'openhc_logo',
	) ) );

/**
	* Shop Sidebar
	*/
	$wp_customize->add_section( 'openhc_shop_section' , array(
	  'title'       => esc_html__( 'WooCommerce Options', 'openhc' ),
	  'priority'    => 40,
	  'description' => esc_html__( 'Hide sidebar on main and single product page', 'openhc' )
	) );
	$wp_customize->add_setting( 'openhc_shop_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'openhc_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'openhc_shop_sidebar', array(
		'label'             => esc_html__( 'Check this box if you want to hide sidebar on main product page', 'openhc' ),
		'section'           => 'openhc_shop_section',
		'settings'          => 'openhc_shop_sidebar',
		'type'		        => 'checkbox',
		'priority'          => 1,
	) );
	$wp_customize->add_setting( 'openhc_shop_single_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'openhc_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'openhc_shop_single_sidebar', array(
		'label'             => esc_html__( 'Check this box if you want to hide sidebar on single product page', 'openhc' ),
		'section'           => 'openhc_shop_section',
		'settings'          => 'openhc_shop_single_sidebar',
		'type'		        => 'checkbox',
		'priority'          => 2,
	) );

/**
* Custom CSS
*/
	$wp_customize->add_section( 'openhc_custom_css_section' , array(
   		'title'    => esc_html__( 'Custom CSS', 'openhc' ),
   		'description'=> 'Add your custom CSS which will overwrite the theme CSS',
   		'priority'   => 32,
	) );

	/* Custom CSS*/
	$wp_customize->add_setting( 'openhc_custom_css', array(
		'default'           => '',
		'sanitize_callback' => 'openhc_sanitize_text',
	) );
	$wp_customize->add_control( 'openhc_custom_css', array(
		'label'             => esc_html__( 'Custom CSS', 'openhc' ),
		'section'           => 'openhc_custom_css_section',
		'settings'          => 'openhc_custom_css',
		'type'		        => 'textarea',
		'priority'          => 1,
	) );

/**
* Custom Colors
*/
	$wp_customize->add_section( 'openhc_new_section_color_general' , array(
   		'title'      => esc_html__( 'Custom Colors', 'openhc' ),
   		'description'=> '',
   		'priority'   => 33,
	) );

	/* Colors General */
	$wp_customize->add_setting( 'openhc_button_colors', array(
		'default'           => '#f7931d',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'openhc_button_colors', array(
		'label'             => esc_html__( 'Primary Theme Color (eg, Orange)', 'openhc' ),
		'section'           => 'openhc_new_section_color_general',
		'settings'          => 'openhc_button_colors',
		'priority'          => 1,
	) ) );

	$wp_customize->add_setting( 'openhc_button_hover_colors', array(
		'default'           => '#f89e35',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'openhc_button_hover_colors', array(
		'label'             => esc_html__( 'Theme Accent Color (eg, Light Orange)', 'openhc' ),
		'section'           => 'openhc_new_section_color_general',
		'settings'          => 'openhc_button_hover_colors',
		'priority'          => 2,
	) ) );

	$wp_customize->add_setting( 'openhc_dark_button_colors', array(
		'default'           => '#333',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'openhc_dark_button_colors', array(
		'label'             => esc_html__( 'Dark Gray Background Elements', 'openhc' ),
		'section'           => 'openhc_new_section_color_general',
		'settings'          => 'openhc_dark_button_colors',
		'priority'          => 3,
	) ) );

	$wp_customize->add_setting( 'openhc_light_gray_colors', array(
		'default'           => '#f5f4f4',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'openhc_light_gray_colors', array(
		'label'             => esc_html__( 'Light Gray Background Elements', 'openhc' ),
		'section'           => 'openhc_new_section_color_general',
		'settings'          => 'openhc_light_gray_colors',
		'priority'          => 4,
	) ) );
  
  $wp_customize->add_setting( 'openhc_dark_muted_colors', array(
		'default'           => '#333',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'openhc_dark_muted_colors', array(
		'label'             => esc_html__( 'Dark Muted Background Elements', 'openhc' ),
		'section'           => 'openhc_new_section_color_general',
		'settings'          => 'openhc_dark_muted_colors',
		'priority'          => 3,
	) ) );

	$wp_customize->add_setting( 'openhc_light_muted_colors', array(
		'default'           => '#f5f4f4',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'openhc_light_muted_colors', array(
		'label'             => esc_html__( 'Light Muted Background Elements', 'openhc' ),
		'section'           => 'openhc_new_section_color_general',
		'settings'          => 'openhc_light_muted_colors',
		'priority'          => 4,
	) ) );

	$wp_customize->add_setting( 'openhc_header_colors', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'openhc_header_colors', array(
		'label'             => esc_html__( 'Theme Contrast Color (eg, White)', 'openhc' ),
		'section'           => 'openhc_new_section_color_general',
		'settings'          => 'openhc_header_colors',
		'priority'          => 5,
	) ) );

	$wp_customize->add_setting( 'openhc_header_background_submenu_colors', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'openhc_header_background_submenu_colors', array(
		'label'             => esc_html__( 'Submenu Background Color', 'openhc' ),
		'section'           => 'openhc_new_section_color_general',
		'settings'          => 'openhc_header_background_submenu_colors',
		'priority'          => 6,
	) ) );

	$wp_customize->add_setting( 'openhc_header_font_colors', array(
		'default'           => '#333',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'openhc_header_font_colors', array(
		'label'             => esc_html__( 'Menu Text Color', 'openhc' ),
		'section'           => 'openhc_new_section_color_general',
		'settings'          => 'openhc_header_font_colors',
		'priority'          => 7,
	) ) );

	$wp_customize->add_setting( 'openhc_header_font_submenu_colors', array(
		'default'           => '#333',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'openhc_header_font_submenu_colors', array(
		'label'             => esc_html__( 'Submenu Text Color', 'openhc' ),
		'section'           => 'openhc_new_section_color_general',
		'settings'          => 'openhc_header_font_submenu_colors',
		'priority'          => 8,
	) ) );

	$wp_customize->add_setting( 'openhc_header_font_current_colors', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'openhc_header_font_current_colors', array(
		'label'             => esc_html__( 'Current Menu Item Color', 'openhc' ),
		'section'           => 'openhc_new_section_color_general',
		'settings'          => 'openhc_header_font_current_colors',
		'priority'          => 9,
	) ) );

	$wp_customize->add_setting( 'openhc_footer_font_colors', array(
		'default'           => '#b6b6b3',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'openhc_footer_font_colors', array(
		'label'             => esc_html__( 'Footer Text Color', 'openhc' ),
		'section'           => 'openhc_new_section_color_general',
		'settings'          => 'openhc_footer_font_colors',
		'priority'          => 10,
	) ) );

	$wp_customize->add_setting( 'openhc_button_font_colors', array(
		'default'           => '#333',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'openhc_button_font_colors', array(
		'label'             => esc_html__( 'Orange Button Text Color', 'openhc' ),
		'section'           => 'openhc_new_section_color_general',
		'settings'          => 'openhc_button_font_colors',
		'priority'          => 11,
	) ) );

	$wp_customize->add_setting( 'openhc_copyright_border_colors', array(
		'default'           => '#494949',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'openhc_copyright_border_colors', array(
		'label'             => esc_html__( 'Copyright Top Border Color', 'openhc' ),
		'section'           => 'openhc_new_section_color_general',
		'settings'          => 'openhc_copyright_border_colors',
		'priority'          => 12,
	) ) );

	/**
* Adds the individual sections for footer
*/
	$wp_customize->add_section( 'openhc_copyright_section' , array(
   		'title'    => esc_html__( 'Copyright Settings', 'openhc' ),
   		'description' => esc_html__( 'This is a settings section.', 'openhc' ),
   		'priority'   => 302,
	) );

	$wp_customize->add_setting( 'openhc_copyright', array(
		'default'           => esc_html__( 'openhc Theme by Anariel Design. All rights reserved', 'openhc' ),
		'sanitize_callback' => 'openhc_sanitize_text',
	) );
	$wp_customize->add_control( 'openhc_copyright', array(
		'label'             => esc_html__( 'Copyright text', 'openhc' ),
		'section'           => 'openhc_copyright_section',
		'settings'          => 'openhc_copyright',
		'type'		        => 'text',
		'priority'          => 1,
	) );

	$wp_customize->add_setting( 'hide_copyright', array(
		'sanitize_callback' => 'openhc_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'hide_copyright', array(
		'label'             => esc_html__( 'Hide copyright text', 'openhc' ),
		'section'           => 'openhc_copyright_section',
		'settings'          => 'hide_copyright',
		'type'		        => 'checkbox',
		'priority'          => 1,
	) );

	/**
	 * Adds the individual sections for custom favicon
	 */
	$wp_customize->add_section( 'openhc_favicon_section' , array(
		'title'       => esc_html__( 'Favicon', 'openhc' ),
		'priority'    => 301,
		'description' => 'Upload a favicon',
	) );
	$wp_customize->add_setting( 'openhc_favicon', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'openhc_favicon', array(
		'label'    => esc_html__( 'Favicon', 'openhc' ),
		'section'  => 'openhc_favicon_section',
		'settings' => 'openhc_favicon',
	) ) );
}
add_action( 'customize_register', 'openhc_customize_register', 11 );

/**
 * Sanitization
 */
//Checkboxes
function openhc_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}
//Integers
function openhc_sanitize_int( $input ) {
	if( is_numeric( $input ) ) {
		return intval( $input );
	}
}
//Text
function openhc_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}
//No sanitize - empty function for options that do not require sanitization -> to bypass the Theme Check plugin
function openhc_no_sanitize( $input ) {
}

//Radio Buttons and Select Lists
function openhc_sanitize_choices( $input, $setting ) {
	global $wp_customize;

	$control = $wp_customize->get_control( $setting->id );

	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}

//Sanitize the dropdown pages.
function openhc_sanitize_dropdown_pages( $input ) {
	if ( is_numeric( $input ) ) {
		return intval( $input );
	}
}

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since openhc 1.0
 */
function openhc_customize_preview_js() {
	wp_enqueue_script( 'openhc-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'openhc_customize_preview_js' );