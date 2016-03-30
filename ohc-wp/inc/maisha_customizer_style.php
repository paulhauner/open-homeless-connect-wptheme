<?php
//////////////////////////////////////////////////////////////////
// Customizer - Add CSS
//////////////////////////////////////////////////////////////////
function maisha_customizer_css() {
	?>
	<style type="text/css">

		button,input[type="button"], input[type="reset"], input[type="submit"], .widget_calendar tbody a, .page-template-projects-page .columns hr, .page-template-causes-page .columns hr, .page-template-stories-page .columns hr, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widget_price_filter .ui-slider .ui-slider-range { background-color:<?php echo get_theme_mod( 'maisha_button_colors' ); ?>; }
		
		.social-navigation, .sidebar .widget .give-submit-button-wrap input[type="submit"], .button, .tribe-events-loop .type-tribe_events.tribe-events-last, #tribe-events .tribe-events-button, #tribe-events .tribe-events-button:hover, #tribe_events_filters_wrapper input[type=submit], .tribe-events-button, .tribe-events-button.tribe-active:hover, .tribe-events-button.tribe-inactive, .tribe-events-button:hover, .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-], .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]>a, #tribe-events-content .tribe-events-calendar td.tribe-events-present.mobile-active:hover, .tribe-events-calendar td.tribe-events-present.mobile-active, .tribe-events-calendar td.tribe-events-present.mobile-active div[id*=tribe-events-daynum-], .tribe-events-calendar td.tribe-events-present.mobile-active div[id*=tribe-events-daynum-] a, .widget.buddypress #bp-login-widget-form #bp-login-widget-submit, .woocommerce span.onsale, .search-toggle { background:<?php echo get_theme_mod( 'maisha_button_colors' ); ?>; }
		
		.social-navigation, .sidebar .widget .give-submit-button-wrap input[type="submit"], .button, .tribe-events-loop .type-tribe_events.tribe-events-last, #tribe-events .tribe-events-button, #tribe-events .tribe-events-button:hover, #tribe_events_filters_wrapper input[type=submit], .tribe-events-button, .tribe-events-button.tribe-active:hover, .tribe-events-button.tribe-inactive, .tribe-events-button:hover, .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-], .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]>a,#tribe-events-content .tribe-events-calendar td.tribe-events-present.mobile-active:hover, .tribe-events-calendar td.tribe-events-present.mobile-active, .tribe-events-calendar td.tribe-events-present.mobile-active div[id*=tribe-events-daynum-], .tribe-events-calendar td.tribe-events-present.mobile-active div[id*=tribe-events-daynum-] a, .widget.buddypress #bp-login-widget-form #bp-login-widget-submit, .woocommerce span.onsale, .content-caption .button, button, input[type="button"], input[type="reset"], input[type="submit"], .widget_calendar tbody a, .page-template-projects-page .columns hr, .page-template-causes-page .columns hr, .page-template-stories-page .columns hr, .block-two-content .button, button,input[type="button"], input[type="reset"], input[type="submit"], .widget_calendar tbody a, .page-template-projects-page .columns hr, .page-template-causes-page .columns hr, .page-template-stories-page .columns hr { color:<?php echo get_theme_mod( 'maisha_button_font_colors' ); ?>; }
		
		.tribe-events-button, .tribe-events-button:hover { background:<?php echo get_theme_mod( 'maisha_button_colors' ); ?>!important; }
		
		.navigation-main a:hover, .color, .cd-panel-content a,.page-template-staff-page .column ul a,.page-template-full-bg-page .aboutpage ul a, .woocommerce ul.products li.product .price,.woocommerce span.amount,.woocommerce .woocommerce-message:before { color: <?php echo get_theme_mod( 'maisha_button_colors' ); ?>; }
		
		blockquote { border-left-color: <?php echo get_theme_mod( 'maisha_button_colors' ); ?>; }
		
		.block-four .post .entry-title { border-bottom-color: <?php echo get_theme_mod( 'maisha_button_colors' ); ?>; }
		
		.woocommerce .woocommerce-message { border-top-color: <?php echo get_theme_mod( 'maisha_button_colors' ); ?>; }
			
		.page-template-front-page-one .soliloquy-theme-karisma .soliloquy-caption-inside a, .page-template-front-page-one .soliloquy-theme-karisma .soliloquy-caption-inside .soliloquy-fc-title-link, .page-template-front-page-one .soliloquy-theme-karisma.soliloquy-caption-inside .soliloquy-fc-read-more,.single-product p.price { color: <?php echo get_theme_mod( 'maisha_button_colors' ); ?>!important; }
		
		.button:hover { background:<?php echo get_theme_mod( 'maisha_button_hover_colors' ); ?>; }
		
		.pagination .prev,.pagination .next,.tagcloud a,.sticky-post,.page-links a,.cd-panel-container,.aboutpage .cd-fixed-bg-one,.aboutpage .cd-fixed-bg-one.withoutimg, .woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content { background-color:<?php echo get_theme_mod( 'maisha_dark_button_colors' ); ?>; }
		
		.news .entry-content a.more-link,.news .entry-content a.button,.block-two,.overlay,.info_pic,.info_details .button,.tribe-events-read-more,#tribe-bar-form .tribe-bar-submit input[type=submit],#buddypress div.generic-button a,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.comment-list .reply a, .footer { background:<?php echo get_theme_mod( 'maisha_dark_button_colors' ); ?>; }
		
		@media screen and (max-width: 48.75em) {
			.content-caption { background:<?php echo get_theme_mod( 'maisha_dark_button_colors' ); ?>; }
			}
			
		.main-small-navigation div, .pagination { background-color:<?php echo get_theme_mod( 'maisha_light_gray_colors' ); ?>; }
		
		.sidebar .widget input[type="submit"],.sidebar .widget,.page-template-about-page .columns .entry-content,.info,body.page-template-full-width-page,.page-template-events-page-php,.page.page-template-full-width-page div.give-form-wrap,.page.page-template-staff-page .columns .entry-content,.tribe-events-back,.tribe-events-day .tribe-events-day-time-slot h5,.page-template-buddypress-php,.page-template-forum-php,.page-template-404-php,#buddypress #search-groups-form input[type=submit],#buddypress #members-dir-search input[type=submit],#buddypress div.item-list-tabs ul li.last select,input#bbp_search_submit,.woocommerce .page-title,.woocommerce .page-description,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,form.wpcf7-form,.page-template-projects-page .fourcolumn:hover,.page-template-causes-page .fourcolumn:hover,.page-template-stories-page .fourcolumn:hover,.page-template-stories-page a.more-link,blockquote, .buddypress, .bbpress { background:<?php echo get_theme_mod( 'maisha_light_gray_colors' ); ?>; }
		
		.site-header, .headerblock, .menu-toggle, .headerblock.standard, .headerblock.alternative, .headerblock.standard .site-header, .headerblock.alternative .site-header { background:<?php echo get_theme_mod( 'maisha_header_colors' ); ?>; }
		
		.navigation-main a, .navigation-main ul li.menu-item-has-children > a:after { color:<?php echo get_theme_mod( 'maisha_header_font_colors' ); ?>; }
		
		.navigation-main ul ul a, .navigation-main ul ul ul a { color:<?php echo get_theme_mod( 'maisha_header_font_submenu_colors' ); ?>; }
		
		.navigation-main li li.current_page_item > a, .navigation-main li li.current-menu-item > a, .navigation-main ul ul { background-color:<?php echo get_theme_mod( 'maisha_header_background_submenu_colors' ); ?>; }
		
		.navigation-main .current_page_item > a, .navigation-main .current-menu-item > a, .navigation-main .current_page_ancestor > a { color:<?php echo get_theme_mod( 'maisha_header_font_current_colors' ); ?>; }
		
		.footer a, .footer .widget, .copyright { color:<?php echo get_theme_mod( 'maisha_footer_font_colors' ); ?>; }
		
		.copyright { border-top-color: <?php echo get_theme_mod( 'maisha_copyright_border_colors' ); ?>; }
		
		@media screen and (min-width: 59.6875em) {
		.social-navigation { top:<?php echo get_theme_mod( 'maisha_social_top' ); ?>px; }
		}

		<?php if(get_theme_mod( 'maisha_custom_css' )) : ?>
		<?php echo wp_kses( get_theme_mod( 'maisha_custom_css' ), '' ); ?>
		<?php endif; ?>
		
		<?php if(get_theme_mod( 'maisha_shop_sidebar' )) : ?>
		.archive.woocommerce .widget-area {
			display: none;
		}
		.archive.woocommerce .footer .widget-area {
			display: block;
		}
		.archive.woocommerce div#content {
			width: 100%;
			float: none;
			margin-right: 0;
		}
		<?php endif; ?>
		
		<?php if(get_theme_mod( 'maisha_shop_single_sidebar' )) : ?>
		.single.woocommerce .widget-area {
			display: none;
		}
		.single.woocommerce .footer .widget-area {
			display: block;
		}
		.single.woocommerce div#content {
			width: 100%;
			float: none;
			margin-right: 0;
		}
		<?php endif; ?>

	</style>
	<?php
}
add_action( 'wp_head', 'maisha_customizer_css' );
?>