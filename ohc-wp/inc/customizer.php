<?php
/**
 * Maisha Customizer functionality
 *
 * @package Maisha
 * @since Maisha 1.0
 */

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Maisha 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function maisha_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->add_section( 'maisha_theme_options', array(
		'title'    => esc_html__( 'Front Page', 'maisha' ),
		'priority' => 34,
	) );

	/* Front Page: Featured Page One */
	$wp_customize->add_setting( 'maisha_featured_page_one', array(
		'default'           => '',
		'sanitize_callback' => 'maisha_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'maisha_featured_page_one', array(
		'label'             => esc_html__( 'First Content Block', 'maisha' ),
		'section'           => 'maisha_theme_options',
		'priority'          => 9,
		'type'              => 'dropdown-pages',
	) );

	/* Front Page: Featured Page Two */
	$wp_customize->add_setting( 'maisha_featured_page_two', array(
		'default'           => '',
		'sanitize_callback' => 'maisha_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'maisha_featured_page_two', array(
		'label'             => esc_html__( 'Second Content Block', 'maisha' ),
		'section'           => 'maisha_theme_options',
		'priority'          => 10,
		'type'              => 'dropdown-pages',
	) );

	/* Front Page: Featured Page Three */
	$wp_customize->add_setting( 'maisha_featured_page_three', array(
		'default'           => '',
		'sanitize_callback' => 'maisha_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'maisha_featured_page_three', array(
		'label'             => esc_html__( 'Third Content Block', 'maisha' ),
		'section'           => 'maisha_theme_options',
		'priority'          => 11,
		'type'              => 'dropdown-pages',
	) );

	$wp_customize->add_section( 'maisha_theme_options_about', array(
		'title'    => esc_html__( 'About Page', 'maisha' ),
		'priority' => 35,
	) );

	/* Front Page: Featured Page One */
	$wp_customize->add_setting( 'maisha_featured_aboutpage_one', array(
		'default'           => '',
		'sanitize_callback' => 'maisha_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'maisha_featured_aboutpage_one', array(
		'label'             => esc_html__( 'First Content Block', 'maisha' ),
		'section'           => 'maisha_theme_options_about',
		'priority'          => 10,
		'type'              => 'dropdown-pages',
	) );

	/* Front Page: Featured Page One */
	$wp_customize->add_setting( 'maisha_featured_aboutpage_two', array(
		'default'           => '',
		'sanitize_callback' => 'maisha_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'maisha_featured_aboutpage_two', array(
		'label'             => esc_html__( 'Second Content Block', 'maisha' ),
		'section'           => 'maisha_theme_options_about',
		'priority'          => 11,
		'type'              => 'dropdown-pages',
	) );

/**
* Adds the individual sections for projects page
*/
	$wp_customize->add_section( 'maisha_theme_options_projects', array(
		'title'    => esc_html__( 'Projects Page', 'maisha' ),
		'priority' => 36,
	) );

	/* Blog Layout */
	$wp_customize->add_setting( 'maisha_projects_layout', array(
		'default'           => 'top-header',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_projects_layout', array(
		'label'             => esc_html__( 'Projects Page Settings', 'maisha' ),
		'section'           => 'maisha_theme_options_projects',
		'settings'          => 'maisha_projects_layout',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'top-header'   => esc_html__( 'Top Content Block', 'maisha' ),
			'no-header'  => esc_html__( 'Without Top Content Block', 'maisha' ),
		)
	) );

/**
* Adds the individual sections for causes page
*/
	$wp_customize->add_section( 'maisha_theme_options_causes', array(
		'title'    => esc_html__( 'Causes Page', 'maisha' ),
		'priority' => 37,
	) );

	/* Blog Layout */
	$wp_customize->add_setting( 'maisha_causes_layout', array(
		'default'           => 'top-header-one',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_causes_layout', array(
		'label'             => esc_html__( 'Causes Page Settings', 'maisha' ),
		'section'           => 'maisha_theme_options_causes',
		'settings'          => 'maisha_causes_layout',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'top-header-one'   => esc_html__( 'Top Content Block', 'maisha' ),
			'no-header-one'  => esc_html__( 'Without Top Content Block', 'maisha' ),
		)
	) );

/**
* Adds the individual sections for projects page
*/
	$wp_customize->add_section( 'maisha_theme_options_stories', array(
		'title'    => esc_html__( 'Stories Page', 'maisha' ),
		'priority' => 38,
	) );

	/* Blog Layout */
	$wp_customize->add_setting( 'maisha_stories_layout', array(
		'default'           => 'top-header-two',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_stories_layout', array(
		'label'             => esc_html__( 'Stories Page Settings', 'maisha' ),
		'section'           => 'maisha_theme_options_stories',
		'settings'          => 'maisha_stories_layout',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'top-header-two'   => esc_html__( 'Top Content Block', 'maisha' ),
			'no-header-two'  => esc_html__( 'Without Top Content Block', 'maisha' ),
		)
	) );

/**
* Adds the individual sections for blog
*/
	$wp_customize->add_section( 'maisha_theme_options_blog', array(
		'title'    => esc_html__( 'Blog Page', 'maisha' ),
		'priority' => 39,
	) );

	/* Blog Layout */
	$wp_customize->add_setting( 'maisha_blog_layout', array(
		'default'           => 'sidebar-right',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_blog_layout', array(
		'label'             => esc_html__( 'Blog Layout', 'maisha' ),
		'section'           => 'maisha_theme_options_blog',
		'settings'          => 'maisha_blog_layout',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'full'   => esc_html__( 'Full Post Layout', 'maisha' ),
			'sidebar-right'  => esc_html__( 'Right Sidebar Layout', 'maisha' ),
			'sidebar-left'  => esc_html__( 'Left Sidebar Layout', 'maisha' ),
			'grid-right'  => esc_html__( 'Grid Layout + Right Sidebar', 'maisha' ),
			'grid-left'  => esc_html__( 'Grid Layout + Left Sidebar', 'maisha' ),
			'grid-full'  => esc_html__( 'Full Grid Layout', 'maisha' ),
			'list'  => esc_html__( 'List Layout', 'maisha' ),
		)
	) );

	/* Post Display */
	$wp_customize->add_setting( 'maisha_post_type', array(
		'default'           => 'full-lenght',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_post_type', array(
		'label'             => esc_html__( 'Post Display', 'maisha' ),
		'section'           => 'maisha_theme_options_blog',
		'settings'          => 'maisha_post_type',
		'priority'          => 2,
		'type'              => 'radio',
		'choices'           => array(
			'full-lenght'   => esc_html__( 'Full Lenght', 'maisha' ),
			'excerpt-lenght'  => esc_html__( 'Excerpt', 'maisha' ),
		)
	) );


	/* Post Settings */
	$wp_customize->add_setting( 'maisha_post_footer', array(
		'default'           => false,
		'sanitize_callback' => 'maisha_sanitize_checkbox',
	) );
	$wp_customize->add_control('maisha_post_footer', array(
				'label'      => esc_html__( 'Hide Post Meta', 'maisha' ),
				'section'    => 'maisha_theme_options_blog',
				'settings'   => 'maisha_post_footer',
				'type'		 => 'checkbox',
				'priority'	 => 3
		) );

	/* Single Post Layout */
	$wp_customize->add_setting( 'maisha_single_post_layout', array(
		'default'           => 'single-sidebar-right',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_single_post_layout', array(
		'label'             => esc_html__( 'Single Post Layout', 'maisha' ),
		'section'           => 'maisha_theme_options_blog',
		'settings'          => 'maisha_single_post_layout',
		'priority'          => 4,
		'type'              => 'radio',
		'choices'           => array(
			'single-full'   => esc_html__( 'Full Post Layout', 'maisha' ),
			'single-sidebar-right'  => esc_html__( 'Right Sidebar Layout', 'maisha' ),
			'single-sidebar-left'  => esc_html__( 'Left Sidebar Layout', 'maisha' ),
		)
	) );

	/* Related Post Settings */
	$wp_customize->add_setting( 'maisha_related_post', array(
		'default'           => false,
		'sanitize_callback' => 'maisha_sanitize_checkbox',
	) );
	$wp_customize->add_control('maisha_related_post', array(
				'label'      => esc_html__( 'Hide Related Post on Single Post', 'maisha' ),
				'section'    => 'maisha_theme_options_blog',
				'settings'   => 'maisha_related_post',
				'type'		 => 'checkbox',
				'priority'	 => 5
		) );

	/* Archive Layout */
	$wp_customize->add_setting( 'maisha_archive_layout', array(
		'default'           => 'single-sidebar-right',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_archive_layout', array(
		'label'             => esc_html__( 'Archive Layout', 'maisha' ),
		'section'           => 'maisha_theme_options_blog',
		'settings'          => 'maisha_archive_layout',
		'priority'          => 6,
		'type'              => 'radio',
		'choices'           => array(
			'archive-full'   => esc_html__( 'Full Post Layout', 'maisha' ),
			'archive-sidebar-right'  => esc_html__( 'Right Sidebar Layout', 'maisha' ),
			'archive-sidebar-left'  => esc_html__( 'Left Sidebar Layout', 'maisha' ),
			'archive-grid-right'  => esc_html__( 'Grid Layout + Right Sidebar', 'maisha' ),
			'archive-grid-left'  => esc_html__( 'Grid Layout + Left Sidebar', 'maisha' ),
			'archive-grid-full'  => esc_html__( 'Full Grid Layout', 'maisha' ),
			'archive-list'  => esc_html__( 'List Layout', 'maisha' ),
		)
	) );

/**
* Adds the individual sections for header
*/
	$wp_customize->add_section( 'maisha_theme_options_header', array(
		'title'    => esc_html__( 'Header Options', 'maisha' ),
		'priority' => 30,
	) );

	/* Header Layout */
	$wp_customize->add_setting( 'maisha_header_layout', array(
		'default'           => 'fixed-header',
		'sanitize_callback' => 'maisha_sanitize_choices',
	) );
	$wp_customize->add_control( 'maisha_header_layout', array(
		'label'             => esc_html__( 'Header Options', 'maisha' ),
		'section'           => 'maisha_theme_options_header',
		'settings'          => 'maisha_header_layout',
		'priority'          => 1,
		'type'              => 'radio',
		'choices'           => array(
			'fixed-header'   => esc_html__( 'Fixed Header', 'maisha' ),
			'standard-header'  => esc_html__( 'Standard Header', 'maisha' ),
			'alternative-header'  => esc_html__( 'Alternative Header', 'maisha' ),
		)
	) );

/**
* Social Menu Position
*/
	$wp_customize->add_section( 'maisha_social_menu_section' , array(
   		'title'    => esc_html__( 'Social Menu Position on Desktop', 'maisha' ),
   		'priority'   => 31,
	) );

	/* Custom CSS*/
	$wp_customize->add_setting( 'maisha_social_top', array(
		'default'           => '90',
		'sanitize_callback' => 'maisha_sanitize_text',
	) );
	$wp_customize->add_control( 'maisha_social_top', array(
		'label'             => esc_html__( 'Social Menu Position on Desktop', 'maisha' ),
		'section'           => 'maisha_social_menu_section',
		'settings'          => 'maisha_social_top',
		'type'		        => 'textarea',
		'priority'          => 1,
	) );

/**
* Search Bar
*/
	$wp_customize->add_section( 'maisha_search_bar_section' , array(
   		'title'    => esc_html__( 'Search Box', 'maisha' ),
   		'priority'   => 29,
	) );

	$wp_customize->add_setting( 'maisha_search_top', array(
		'default'           => false,
		'sanitize_callback' => 'maisha_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'maisha_search_top', array(
		'label'             => esc_html__( 'Hide Search Box', 'maisha' ),
		'section'           => 'maisha_search_bar_section',
		'settings'          => 'maisha_search_top',
		'type'		        => 'checkbox',
		'priority'          => 1,
	) );

/**
* Adds the individual sections for custom logo
*/
	$wp_customize->add_section( 'maisha_logo_section' , array(
	  'title'       => esc_html__( 'Logo', 'maisha' ),
	  'priority'    => 28,
	  'description' => esc_html__( 'Upload a logo to replace the default site name and description in the header', 'maisha' )
	) );
	$wp_customize->add_setting( 'maisha_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'maisha_logo', array(
		'label'    => esc_html__( 'Logo', 'maisha' ),
		'section'  => 'maisha_logo_section',
		'settings' => 'maisha_logo',
	) ) );

/**
	* Shop Sidebar
	*/
	$wp_customize->add_section( 'maisha_shop_section' , array(
	  'title'       => esc_html__( 'WooCommerce Options', 'maisha' ),
	  'priority'    => 40,
	  'description' => esc_html__( 'Hide sidebar on main and single product page', 'maisha' )
	) );
	$wp_customize->add_setting( 'maisha_shop_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'maisha_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'maisha_shop_sidebar', array(
		'label'             => esc_html__( 'Check this box if you want to hide sidebar on main product page', 'maisha' ),
		'section'           => 'maisha_shop_section',
		'settings'          => 'maisha_shop_sidebar',
		'type'		        => 'checkbox',
		'priority'          => 1,
	) );
	$wp_customize->add_setting( 'maisha_shop_single_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'maisha_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'maisha_shop_single_sidebar', array(
		'label'             => esc_html__( 'Check this box if you want to hide sidebar on single product page', 'maisha' ),
		'section'           => 'maisha_shop_section',
		'settings'          => 'maisha_shop_single_sidebar',
		'type'		        => 'checkbox',
		'priority'          => 2,
	) );

/**
* Custom CSS
*/
	$wp_customize->add_section( 'maisha_custom_css_section' , array(
   		'title'    => esc_html__( 'Custom CSS', 'maisha' ),
   		'description'=> 'Add your custom CSS which will overwrite the theme CSS',
   		'priority'   => 32,
	) );

	/* Custom CSS*/
	$wp_customize->add_setting( 'maisha_custom_css', array(
		'default'           => '',
		'sanitize_callback' => 'maisha_sanitize_text',
	) );
	$wp_customize->add_control( 'maisha_custom_css', array(
		'label'             => esc_html__( 'Custom CSS', 'maisha' ),
		'section'           => 'maisha_custom_css_section',
		'settings'          => 'maisha_custom_css',
		'type'		        => 'textarea',
		'priority'          => 1,
	) );

/**
* Custom Colors
*/
	$wp_customize->add_section( 'maisha_new_section_color_general' , array(
   		'title'      => esc_html__( 'Custom Colors', 'maisha' ),
   		'description'=> '',
   		'priority'   => 33,
	) );

	/* Colors General */
	$wp_customize->add_setting( 'maisha_button_colors', array(
		'default'           => '#f7931d',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_button_colors', array(
		'label'             => esc_html__( 'All Elements with Orange Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general',
		'settings'          => 'maisha_button_colors',
		'priority'          => 1,
	) ) );

	$wp_customize->add_setting( 'maisha_button_hover_colors', array(
		'default'           => '#f89e35',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_button_hover_colors', array(
		'label'             => esc_html__( 'Orange Button Hover Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general',
		'settings'          => 'maisha_button_hover_colors',
		'priority'          => 2,
	) ) );

	$wp_customize->add_setting( 'maisha_dark_button_colors', array(
		'default'           => '#333',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_dark_button_colors', array(
		'label'             => esc_html__( 'Dark Gray Background Elements', 'maisha' ),
		'section'           => 'maisha_new_section_color_general',
		'settings'          => 'maisha_dark_button_colors',
		'priority'          => 3,
	) ) );

	$wp_customize->add_setting( 'maisha_light_gray_colors', array(
		'default'           => '#f5f4f4',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_light_gray_colors', array(
		'label'             => esc_html__( 'Light Gray Background Elements', 'maisha' ),
		'section'           => 'maisha_new_section_color_general',
		'settings'          => 'maisha_light_gray_colors',
		'priority'          => 4,
	) ) );

	$wp_customize->add_setting( 'maisha_header_colors', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_header_colors', array(
		'label'             => esc_html__( 'White Header Background', 'maisha' ),
		'section'           => 'maisha_new_section_color_general',
		'settings'          => 'maisha_header_colors',
		'priority'          => 5,
	) ) );

	$wp_customize->add_setting( 'maisha_header_background_submenu_colors', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_header_background_submenu_colors', array(
		'label'             => esc_html__( 'Submenu Background Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general',
		'settings'          => 'maisha_header_background_submenu_colors',
		'priority'          => 6,
	) ) );

	$wp_customize->add_setting( 'maisha_header_font_colors', array(
		'default'           => '#333',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_header_font_colors', array(
		'label'             => esc_html__( 'Menu Text Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general',
		'settings'          => 'maisha_header_font_colors',
		'priority'          => 7,
	) ) );

	$wp_customize->add_setting( 'maisha_header_font_submenu_colors', array(
		'default'           => '#333',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_header_font_submenu_colors', array(
		'label'             => esc_html__( 'Submenu Text Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general',
		'settings'          => 'maisha_header_font_submenu_colors',
		'priority'          => 8,
	) ) );

	$wp_customize->add_setting( 'maisha_header_font_current_colors', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_header_font_current_colors', array(
		'label'             => esc_html__( 'Current Menu Item Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general',
		'settings'          => 'maisha_header_font_current_colors',
		'priority'          => 9,
	) ) );

	$wp_customize->add_setting( 'maisha_footer_font_colors', array(
		'default'           => '#b6b6b3',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_footer_font_colors', array(
		'label'             => esc_html__( 'Footer Text Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general',
		'settings'          => 'maisha_footer_font_colors',
		'priority'          => 10,
	) ) );

	$wp_customize->add_setting( 'maisha_button_font_colors', array(
		'default'           => '#333',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_button_font_colors', array(
		'label'             => esc_html__( 'Orange Button Text Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general',
		'settings'          => 'maisha_button_font_colors',
		'priority'          => 11,
	) ) );

	$wp_customize->add_setting( 'maisha_copyright_border_colors', array(
		'default'           => '#494949',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'maisha_copyright_border_colors', array(
		'label'             => esc_html__( 'Copyright Top Border Color', 'maisha' ),
		'section'           => 'maisha_new_section_color_general',
		'settings'          => 'maisha_copyright_border_colors',
		'priority'          => 12,
	) ) );

	/**
* Adds the individual sections for footer
*/
	$wp_customize->add_section( 'maisha_copyright_section' , array(
   		'title'    => esc_html__( 'Copyright Settings', 'maisha' ),
   		'description' => esc_html__( 'This is a settings section.', 'maisha' ),
   		'priority'   => 302,
	) );

	$wp_customize->add_setting( 'maisha_copyright', array(
		'default'           => esc_html__( 'Maisha Theme by Anariel Design. All rights reserved', 'maisha' ),
		'sanitize_callback' => 'maisha_sanitize_text',
	) );
	$wp_customize->add_control( 'maisha_copyright', array(
		'label'             => esc_html__( 'Copyright text', 'maisha' ),
		'section'           => 'maisha_copyright_section',
		'settings'          => 'maisha_copyright',
		'type'		        => 'text',
		'priority'          => 1,
	) );

	$wp_customize->add_setting( 'hide_copyright', array(
		'sanitize_callback' => 'maisha_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'hide_copyright', array(
		'label'             => esc_html__( 'Hide copyright text', 'maisha' ),
		'section'           => 'maisha_copyright_section',
		'settings'          => 'hide_copyright',
		'type'		        => 'checkbox',
		'priority'          => 1,
	) );

	/**
	 * Adds the individual sections for custom favicon
	 */
	$wp_customize->add_section( 'maisha_favicon_section' , array(
		'title'       => esc_html__( 'Favicon', 'maisha' ),
		'priority'    => 301,
		'description' => 'Upload a favicon',
	) );
	$wp_customize->add_setting( 'maisha_favicon', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'maisha_favicon', array(
		'label'    => esc_html__( 'Favicon', 'maisha' ),
		'section'  => 'maisha_favicon_section',
		'settings' => 'maisha_favicon',
	) ) );
}
add_action( 'customize_register', 'maisha_customize_register', 11 );

/**
 * Sanitization
 */
//Checkboxes
function maisha_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}
//Integers
function maisha_sanitize_int( $input ) {
	if( is_numeric( $input ) ) {
		return intval( $input );
	}
}
//Text
function maisha_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}
//No sanitize - empty function for options that do not require sanitization -> to bypass the Theme Check plugin
function maisha_no_sanitize( $input ) {
}

//Radio Buttons and Select Lists
function maisha_sanitize_choices( $input, $setting ) {
	global $wp_customize;

	$control = $wp_customize->get_control( $setting->id );

	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}

//Sanitize the dropdown pages.
function maisha_sanitize_dropdown_pages( $input ) {
	if ( is_numeric( $input ) ) {
		return intval( $input );
	}
}

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Maisha 1.0
 */
function maisha_customize_preview_js() {
	wp_enqueue_script( 'maisha-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'maisha_customize_preview_js' );