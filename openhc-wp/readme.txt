= Maisha =

* by Anariel Design, http://www.anarieldesign.com

- this theme is based on Twenty Fifteen: https://wordpress.org/themes/twentyfifteen
License: Distributed under the terms of the GNU GPL
Copyright: Automattic, automattic.com

Maisha is distributed under the terms of the GNU GPL

1.2.4 - March 5,2016

- fix for the footer on the shop page. Changes inside the “inc” folder - maisha_customizer_style.php file

1.2.3 - January 29,2016

- fix for the drop down menu - accessibility. Changes inside the style.css file

1.2.2 - December 6,2015

-added WooCommerce Options inside the Customizer to be able to choose to have sidebar on WooCommerce shop and single product page. Changes inside the functions.php and style.css and “inc” folder customizer.php,veggie_customizer_style.css files. Removed woocommerce.php file.

Version 1.2.1 - October 30 2015.
1. new page template “Default Page without Featured Image” - inside the “page-templates” folder added default-one-page.php file
2. inside the style.css added:
.page-template-default-one-page .default-page .site-content {
	padding-top: 4%;
}

Version 1.2 - October 19 2015.
Removed the max,min width and height for the logo. If you are using fixed or standard header please upload logo 61px heigh. This way the header will look best. For the alternative header you can upload image in any size you want.
1. style.css - small change for the footer color text (accessibility-ready) and different changes for the header layouts
2. small changes inside the header.php and header-custom.php file

Version 1.1 - September 9 2015.
1. style.css - small fix for the search input text color.
Added: 
.search-box [type="search"]:focus {
	color: #fff;
}
2. fix for the Deprecating PHP4 style constructors in WordPress 4.3

Version 1.0.9 - August 13 2015.
1. small fix for the Post Display - Excerpt on the single post. Added content-single.php file and small fix inside the single.php file

Version 1.0.8 - August 10 2015.
1. small fix for the full grid archive layout inside the archive.php file
2. content-third-block.php changed - Front Page - Third Content Block - if you don’t upload featured image on the left the child pages will fill the full width content.

Version 1.0.7 - August 4 2015.
1. small fixes inside style.css and css/editor-style.css files for the fixed header on the smaller devices

Version 1.0.6 - August 2 2015.
1. small changes inside style.css, header.php, header-custom.php, footer.php and js/navigation.js files - accessibility fixes
2. small fix inside the functions.php file:
instead of:
wp_enqueue_script( 'maisha-search', get_template_directory_uri() . '/js/search.js', array(), '1.0', true );
added:
wp_enqueue_script( 'maisha-search', get_template_directory_uri() . '/js/search.js', array( 'jquery' ), '1.0', true );

Version 1.0.5 - July 19 2015.
1. inside page.php, content-quote.php, content-grid-page.php, content-front-secondblock.php, content-front-page.php, content-about-secondblock.php, content-about-page.php, full-width-page.php, basic-page.php : 
<?php $image_url = wp_get_attachment_image_src($image_id,’small);?> changed with <?php $image_url = wp_get_attachment_image_src($image_id,’full’);   ?>

2. small changes inside the header.php, header-custom.php and style.css files - better styled search block

3. small fix inside the inc/maisha_custmoizer_style.php for the social menu on small devices

Version 1.0.4 - July 10 2015.
1. fix for widget call (from WordPress 4.3) inside the inc folder widgets.php file - fix for Use parent::__construct() instead of $this->WP_Widget().

2. added new feature inside the Customizer - you can choose to display excerpt or full length for your post

3. added new page template - “Basic Page” - you can use this template if you want to create pages using page builder like free Page Builder by SiteOrigin

Version 1.0.3 - June 29, 2015
- small changes inside the inc/widgets.php, content-front-secondblock.php and style.css files: 1. fix for the Maisha custom recent post widgets if you add widget title
       2. if you add more content for the second block on the front page background will adapt with the height
       3. search box z-index fix if your fixed header is higher
Version 1.0.2 - June 19, 2015
- added search box option. Changes are done inside the header.php, header-custom.php, inl/customizer.php, inc/maisha_customizer_style.php, functions.php and js/search.js (new file)
- added styles inside the style.css file
Version 1.0.1 - June 08, 2015
- inside the “header-custom.php” file we changed this line:
  echo '<h1>'.get_page($blog_page_id)->post_title.'</h1>';
  with:
  echo '<h1>'.get_post(($blog_page_id))->post_title.'</h1>';
-inside the style.css we added this:
@media screen and (max-width: 59.6875em) {
.page-template-full-width-page .cd-fixed-bg {
min-height: 300px;
}
}
@media screen and (max-width: 48.75em) {
.page-template-full-width-page .cd-fixed-bg {
min-height: 200px;
}
}