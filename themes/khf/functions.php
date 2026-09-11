<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'KHF_VERSION', wp_get_theme()->get( 'Version' ) ? wp_get_theme()->get( 'Version' ) : '1.0.0' );

function khf_setup() {
		if ( ! is_dir( get_theme_file_path( 'assets/languages' ) ) ) {
		return;
	}
	load_theme_textdomain( 'khf', get_theme_file_path( 'assets/languages' ) );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 90,
		'width'       => 430,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'custom-spacing' );
	add_theme_support( 'custom-line-height' );
	add_theme_support( 'custom-units' );
	add_theme_support( 'border-styles' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'editor-styles' );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'khf' ),
	) );
}
add_action( 'after_setup_theme', 'khf_setup' );

function khf_editor_styles() {
	add_editor_style( get_theme_file_uri( 'assets/css/editor.css' ) );
}
add_action( 'after_setup_theme', 'khf_editor_styles' );

function khf_assets() {
	$font_uri = get_theme_file_uri( 'assets/css/blocks.css' );
	wp_enqueue_style( 'khf-blocks', $font_uri, array(), KHF_VERSION, 'all' );
	wp_enqueue_script( 'khf-mobile-menu', get_theme_file_uri( 'assets/js/mobile-menu.js' ), array(), KHF_VERSION, true );
	wp_enqueue_script( 'khf-workshop-registration', get_theme_file_uri( 'assets/js/workshop-registration.js' ), array(), KHF_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'khf_assets' );

function khf_enqueue_block_editor_assets() {
	wp_enqueue_style( 'khf-editor', get_theme_file_uri( 'assets/css/editor.css' ), array(), KHF_VERSION );
}
add_action( 'enqueue_block_editor_assets', 'khf_enqueue_block_editor_assets' );

function khf_register_block_styles() {
	register_block_style( 'core/button', array(
		'name'        => 'seneca-filled',
		'label'       => __( 'Seneca Filled', 'khf' ),
		'isDefault'   => false,
		'className'   => 'is-style-seneca-filled',
	) );
	register_block_style( 'core/button', array(
		'name'        => 'wooded-outline',
		'label'       => __( 'Wooded Outline', 'khf' ),
		'isDefault'   => false,
		'className'   => 'is-style-wooded-outline',
	) );
	register_block_style( 'core/group', array(
		'name'        => 'wooded-section',
		'label'       => __( 'Wooded Section', 'khf' ),
		'isDefault'   => false,
		'className'   => 'is-style-wooded-section',
	) );
	register_block_style( 'core/group', array(
		'name'        => 'wampum-strip',
		'label'       => __( 'Wampum Strip', 'khf' ),
		'isDefault'   => false,
		'className'   => 'is-style-wampum-strip',
	) );
	register_block_style( 'core/separator', array(
		'name'        => 'eagle-feather',
		'label'       => __( 'Eagle Feather', 'khf' ),
		'isDefault'   => false,
		'className'   => 'is-style-eagle-feather',
	) );
	register_block_style( 'core/group', array(
		'name'        => 'tree-of-peace-divider',
		'label'       => __( 'Tree of Peace Divider', 'khf' ),
		'isDefault'   => false,
		'className'   => 'is-style-tree-of-peace-divider',
	) );
}
add_action( 'init', 'khf_register_block_styles' );

function khf_register_block_patterns() {
	if ( ! function_exists( 'register_block_pattern_category' ) ) {
		return;
	}

	register_block_pattern_category( 'khf', array(
		'label'       => __( 'Kinzua Heritage', 'khf' ),
		'description' => __( 'Patterns for the Kinzua Heritage Festival theme.', 'khf' ),
	) );

	register_block_pattern(
		'khf/wampum-divider',
		array(
			'title'       => __( 'Wampum Divider', 'khf' ),
			'categories'  => array( 'khf' ),
			'description' => __( 'A horizontal divider with interlocking Seneca wampum bead pattern.', 'khf' ),
			'content'     => '<!-- wp:group {"className":"is-style-wampum-strip"} --><div class="wp-block-group is-style-wampum-strip"></div><!-- /wp:group -->',
			'viewportWidth' => 1200,
		)
	);

	register_block_pattern(
		'khf/seneca-hero',
		array(
			'title'       => __( 'Seneca Hero', 'khf' ),
			'categories'  => array( 'khf', 'featured' ),
			'description' => __( 'Full-width hero with Tree of Peace watermark and festival call-to-action.', 'khf' ),
			'content'     => '<!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( 'assets/images/hero-placeholder.jpg' ) ) . '","overlayColor":"forest-green","align":"full","minHeight": 700,"contentPosition":"center center","className":"khf-hero"} --><div class="wp-block-cover alignfull is-position-center-center khf-hero" style="min-height:700px"><img class="wp-block-cover__image-background" src="' . esc_url( get_theme_file_uri( 'assets/images/hero-placeholder.jpg' ) ) . '" alt="" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":1,"align":"wide"} --><h1 class="alignwide">' . __( 'Kinzua Heritage Festival', 'khf' ) . '</h1><!-- /wp:heading --><!-- wp:paragraph {"align":"wide","fontSize":"regular"} --><p class="alignwide">' . __( 'Striving to keep the past alive. Aug 21–23, 2026 in Russell, PA.', 'khf' ) . '</p><!-- /wp:paragraph --></div></div><!-- /wp:cover -->',
		)
	);

	register_block_pattern(
		'khf/vendor-grid',
		array(
			'title'       => __( 'Vendor Card Grid', 'khf' ),
			'categories'  => array( 'khf', 'columns' ),
			'description' => __( 'A responsive grid of artisan/vendor category cards.', 'khf' ),
			'content'     => '<!-- wp:columns --><div class="wp-block-columns"><!-- wp:column --><div class="wp-block-column"><!-- wp:heading --><h3>' . __( 'Blacksmithing', 'khf' ) . '</h3><!-- /wp:heading --><!-- wp:image --><figure class="wp-block-image"><img src="' . esc_url( get_theme_file_uri( 'assets/images/patterns/eagle-feather.svg' ) ) . '" alt=""></figure><!-- /wp:image --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:heading --><h3>' . __( 'Pottery', 'khf' ) . '</h3><!-- /wp:heading --><!-- wp:image --><figure class="wp-block-image"><img src="' . esc_url( get_theme_file_uri( 'assets/images/patterns/eagle-feather.svg' ) ) . '" alt=""></figure><!-- /wp:image --></div><!-- /wp:column --></div><!-- /wp:columns -->',
		)
	);
}
add_action( 'init', 'khf_register_block_patterns' );

function khf_register_post_types() {
	$workshop_labels = array(
		'name'               => _x( 'Workshops', 'Post type general name', 'khf' ),
		'singular_name'      => _x( 'Workshop', 'Post type singular name', 'khf' ),
		'menu_name'          => _x( 'Workshops', 'Admin Menu text', 'khf' ),
		'name_admin_bar'     => _x( 'Workshop', 'Add New on Toolbar', 'khf' ),
		'add_new'            => __( 'Add New', 'khf' ),
		'add_new_item'       => __( 'Add New Workshop', 'khf' ),
		'edit_item'          => __( 'Edit Workshop', 'khf' ),
		'new_item'           => __( 'New Workshop', 'khf' ),
		'view_item'          => __( 'View Workshop', 'khf' ),
		'search_items'       => __( 'Search Workshops', 'khf' ),
		'not_found'          => __( 'No workshops found.', 'khf' ),
		'not_found_in_trash' => __( 'No workshops found in Trash.', 'khf' ),
	);
	$workshop_args = array(
		'labels'             => $workshop_labels,
		'public'             => true,
		'publicly_queryable'  => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'workshop' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'menu_icon'          => 'dashicons-book',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'author' ),
		'show_in_rest'       => true,
		'template'           => array( array( 'core/post-title', array( 'level' => 1 ) ), array( 'core/post-content' ) ),
		'template_lock'      => 'all',
	);

	register_post_type( 'workshop', $workshop_args );

	$event_labels = array(
		'name'               => _x( 'Events', 'Post type general name', 'khf' ),
		'singular_name'      => _x( 'Event', 'Post type singular name', 'khf' ),
		'menu_name'          => _x( 'Events', 'Admin Menu text', 'khf' ),
		'name_admin_bar'     => _x( 'Event', 'Add New on Toolbar', 'khf' ),
		'add_new'            => __( 'Add New', 'khf' ),
		'add_new_item'       => __( 'Add New Event', 'khf' ),
		'edit_item'          => __( 'Edit Event', 'khf' ),
		'new_item'           => __( 'New Event', 'khf' ),
		'view_item'          => __( 'View Event', 'khf' ),
		'search_items'       => __( 'Search Events', 'khf' ),
		'not_found'          => __( 'No events found.', 'khf' ),
		'not_found_in_trash' => __( 'No events found in Trash.', 'khf' ),
	);
	$event_args = array(
		'labels'             => $event_labels,
		'public'             => true,
		'publicly_queryable'  => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'event' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 21,
		'menu_icon'          => 'dashicons-calendar-alt',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'author' ),
		'show_in_rest'       => true,
		'template'           => array( array( 'core/post-title', array( 'level' => 1 ) ), array( 'core/post-content' ) ),
		'template_lock'      => 'all',
	);

	register_post_type( 'event', $event_args );
}
add_action( 'init', 'khf_register_post_types', 5 );

function khf_register_taxonomies() {
	$workshop_cat_labels = array(
		'name'              => _x( 'Workshop Categories', 'taxonomy general name', 'khf' ),
		'singular_name'     => _x( 'Workshop Category', 'taxonomy singular name', 'khf' ),
		'search_items'      => __( 'Search Workshop Categories', 'khf' ),
		'all_items'         => __( 'All Workshop Categories', 'khf' ),
		'edit_item'         => __( 'Edit Workshop Category', 'khf' ),
		'add_new_item'      => __( 'Add New Workshop Category', 'khf' ),
		'menu_name'         => __( 'Categories', 'khf' ),
	);
	register_taxonomy( 'workshop_category', array( 'workshop' ), array(
		'hierarchical'      => true,
		'labels'            => $workshop_cat_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'workshop-category' ),
		'show_in_rest'      => true,
	) );

	$event_type_labels = array(
		'name'              => _x( 'Event Types', 'taxonomy general name', 'khf' ),
		'singular_name'     => _x( 'Event Type', 'taxonomy singular name', 'khf' ),
		'search_items'      => __( 'Search Event Types', 'khf' ),
		'all_items'         => __( 'All Event Types', 'khf' ),
		'edit_item'         => __( 'Edit Event Type', 'khf' ),
		'add_new_item'      => __( 'Add New Event Type', 'khf' ),
		'menu_name'         => __( 'Types', 'khf' ),
	);
	register_taxonomy( 'event_type', array( 'event' ), array(
		'hierarchical'      => true,
		'labels'            => $event_type_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'event-type' ),
		'show_in_rest'      => true,
	) );
}
add_action( 'init', 'khf_register_taxonomies' );

/* SVGs are inline only to prevent XSS; no media library uploads. */

function khf_schema_meta_tags() {
	if ( ! is_front_page() && ! is_home() && ! is_singular() ) {
		return;
	}

	$schema = array(
		'@context' => 'https://schema.org',
		'@type'    => 'Organization',
		'name'     => get_bloginfo( 'name', 'display' ),
		'url'      => home_url(),
		'logo'     => get_site_icon_url(),
		'contactPoint' => array(
			array(
				'@type'       => 'ContactPoint',
				'telephone'   => khf_get_contact_phone(),
				'contactType' => 'Customer Service',
				'areaServed'  => 'US',
			),
		),
		'sameAs' => array(
			'https://www.facebook.com/KinzuaHeritageFestival',
		),
	);
	?><script type="application/ld+json">
<?php echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT ); ?>
</script>
	<?php

	if ( is_front_page() || is_home() ) {
		$event_schema = array(
			'@context' => 'https://schema.org',
			'@type'    => 'Event',
			'name'     => 'Kinzua Heritage Festival 2026',
			'startDate' => '2026-08-21',
			'endDate' => '2026-08-23',
			'eventAttendanceMode' => 'https://schema.org/OfflineEventAttendanceMode',
			'eventStatus' => 'https://schema.org/EventScheduled',
			'location' => array(
				'@type' => 'Place',
				'name' => 'Kinzua Heritage Festival Grounds',
				'address' => array(
					'@type' => 'PostalAddress',
					'streetAddress' => '4047 Fox Hill Road',
					'addressLocality' => 'Russell',
					'addressRegion' => 'PA',
					'postalCode' => '16345',
					'addressCountry' => 'US',
				),
			),
			'organizer' => array(
				'@type' => 'Organization',
				'name' => get_bloginfo( 'name', 'display' ),
				'url' => home_url(),
			),
			'description' => 'The 22nd Annual Kinzua Heritage Festival — Aug 21-23, 2026 in Russell, PA. Arts, music, workshops, and artisan crafts.',
		);
		?><script type="application/ld+json">
<?php echo wp_json_encode( $event_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT ); ?>
</script>
		<?php
	}

	$description = get_bloginfo( 'description', 'display' );
	if ( is_singular() ) {
		$description = get_the_excerpt() ?: $description;
	}
	$image = get_site_icon_url();
	if ( has_post_thumbnail() ) {
		$image = get_the_post_thumbnail_url( null, 'large' );
	}
	?>
	<meta name="description" content="<?php echo esc_attr( $description ); ?>">
	<meta property="og:title" content="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
	<meta property="og:type" content="<?php echo is_singular() ? 'article' : 'website'; ?>">
	<meta property="og:url" content="<?php echo esc_url( home_url( $_SERVER['REQUEST_URI'] ?? '' ) ); ?>">
	<meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
	<meta property="og:image" content="<?php echo esc_url( $image ); ?>">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
	<meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
	<meta name="twitter:image" content="<?php echo esc_url( $image ); ?>">
	<?php
}
add_action( 'wp_head', 'khf_schema_meta_tags', 10 );

function khf_body_classes( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'khf-front';
	}
	if ( is_singular( array( 'workshop', 'event' ) ) ) {
		$classes[] = 'khf-dynamic';
	}
	return $classes;
}
add_filter( 'body_class', 'khf_body_classes' );

function khf_content_width() {
	if ( ! isset( $content_width ) ) {
		$content_width = 1200;
	}
}
add_action( 'after_setup_theme', 'khf_content_width' );

function khf_xml_sitemap() {
	$urls = array(
		array( 'url' => home_url( '/' ), 'freq' => 'monthly', 'priority' => '1.0' ),
		array( 'url' => home_url( '/workshop' ), 'freq' => 'monthly', 'priority' => '0.9' ),
		array( 'url' => home_url( '/events' ), 'freq' => 'monthly', 'priority' => '0.9' ),
		array( 'url' => home_url( '/venue' ), 'freq' => 'monthly', 'priority' => '0.8' ),
		array( 'url' => home_url( '/contact' ), 'freq' => 'monthly', 'priority' => '0.8' ),
		array( 'url' => home_url( '/vendor-signup' ), 'freq' => 'monthly', 'priority' => '0.8' ),
		array( 'url' => home_url( '/privacy' ), 'freq' => 'yearly', 'priority' => '0.5' ),
		array( 'url' => home_url( '/terms' ), 'freq' => 'yearly', 'priority' => '0.5' ),
	);

	header( 'Content-Type: application/xml; charset=utf-8' );
	echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
	foreach ( $urls as $item ) {
		echo "  <url>\n";
		echo "    <loc>" . esc_url( $item['url'] ) . "</loc>\n";
		echo "    <lastmod>" . gmdate( 'Y-m-d' ) . "</lastmod>\n";
		echo "    <changefreq>" . esc_html( $item['freq'] ) . "</changefreq>\n";
		echo "    <priority>" . esc_html( $item['priority'] ) . "</priority>\n";
		echo "  </url>\n";
	}
	echo '</urlset>';
	exit;
}
add_action( 'do_sitemap', 'khf_xml_sitemap' );

function khf_query_vars( $vars ) {
	$vars[] = 'sitemap';
	return $vars;
}
add_filter( 'query_vars', 'khf_query_vars' );

function khf_sitemap_redirect() {
	if ( get_query_var( 'sitemap' ) === 'xml' ) {
		khf_xml_sitemap();
	}
}
add_action( 'template_redirect', 'khf_sitemap_redirect' );

function khf_robots_txt_content() {
	ob_start();
	?>
User-agent: *
Disallow: /wp-admin/
Disallow: /wp-includes/
Allow: /wp-admin/admin-ajax.php
Allow: /wp-content/uploads/

Sitemap: <?php echo esc_url( home_url( 'sitemap.xml' ) ); ?>
	<?php
	return ob_get_clean();
}

add_filter( 'robots_txt', 'khf_robots_txt_content' );

function khf_init_vendor_signup_form() {
	add_action( 'admin_post_nopriv_khf_vendor_signup', 'khf_handle_vendor_signup' );
	add_action( 'admin_post_khf_vendor_signup', 'khf_handle_vendor_signup' );
}
add_action( 'init', 'khf_init_vendor_signup_form' );

function khf_handle_vendor_signup() {
	if ( ! isset( $_POST['khf_vendor_signup_nonce'] ) || ! wp_verify_nonce( $_POST['khf_vendor_signup_nonce'], 'khf_vendor_signup' ) ) {
		wp_safe_redirect( home_url( '/vendor-signup/?error=security' ) );
		exit;
	}

	$vendor_name   = isset( $_POST['vendor_name'] ) ? sanitize_text_field( $_POST['vendor_name'] ) : '';
	$contact_name  = isset( $_POST['contact_name'] ) ? sanitize_text_field( $_POST['contact_name'] ) : '';
	$vendor_email  = isset( $_POST['vendor_email'] ) ? sanitize_email( $_POST['vendor_email'] ) : '';
	$vendor_phone  = isset( $_POST['vendor_phone'] ) ? sanitize_text_field( $_POST['vendor_phone'] ) : '';
	$booth_size    = isset( $_POST['booth_size'] ) ? sanitize_text_field( $_POST['booth_size'] ) : '';
	$vendor_website = isset( $_POST['vendor_website'] ) ? esc_url_raw( $_POST['vendor_website'] ) : '';
	$vendor_comments = isset( $_POST['vendor_comments'] ) ? sanitize_textarea_field( $_POST['vendor_comments'] ) : '';
	$categories    = isset( $_POST['categories'] ) && is_array( $_POST['categories'] ) ? array_map( 'sanitize_text_field', $_POST['categories'] ) : array();

	if ( empty( $vendor_name ) || empty( $contact_name ) || empty( $vendor_email ) || empty( $vendor_phone ) ) {
		wp_safe_redirect( home_url( '/vendor-signup/?error=required' ) );
		exit;
	}

	$to      = khf_get_vendor_email();
	$subject = 'New Vendor Application - ' . $vendor_name;
	$message  = "Vendor/Business Name: " . $vendor_name . "\n";
	$message .= "Contact Name: " . $contact_name . "\n";
	$message .= "Email: " . $vendor_email . "\n";
	$message .= "Phone: " . $vendor_phone . "\n";
	$message .= "Booth Size: " . $booth_size . "\n";
	$message .= "Website/Social: " . $vendor_website . "\n";
	$message .= "Product Categories: " . implode( ', ', $categories ) . "\n";
	$message .= "Questions/Comments: " . $vendor_comments . "\n";

	$headers = array( 'Content-Type: text/plain; charset=UTF-8' );

	wp_mail( $to, $subject, $message, $headers );

	$redirect_url = home_url( '/vendor-signup/?submitted=true' );
	wp_safe_redirect( $redirect_url );
	exit;
}

function khf_init_contact_form() {
	add_action( 'admin_post_nopriv_khf_contact', 'khf_handle_contact_form' );
	add_action( 'admin_post_khf_contact', 'khf_handle_contact_form' );
}
add_action( 'init', 'khf_init_contact_form' );

function khf_handle_contact_form() {
	if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'khf_contact_form' ) ) {
		wp_safe_redirect( home_url( '/contact/?error=security' ) );
		exit;
	}

	$name    = sanitize_text_field( $_POST['khf_name'] ?? '' );
	$email   = sanitize_email( $_POST['khf_email'] ?? '' );
	$subject = sanitize_text_field( $_POST['khf_subject'] ?? '' );
	$phone   = isset( $_POST['khf_phone'] ) ? sanitize_text_field( $_POST['khf_phone'] ) : '';
	$type    = sanitize_text_field( $_POST['khf_inquiry_type'] ?? '' );
	$message = sanitize_textarea_field( $_POST['khf_message'] ?? '' );

	if ( empty( $name ) || empty( $email ) || empty( $subject ) || empty( $message ) ) {
		wp_safe_redirect( home_url( '/contact/?error=required' ) );
		exit;
	}

	$to      = khf_get_contact_email();
	$full_subject = '[KHF Contact] ' . $subject . ' (' . $type . ')';
	$body    = "Name: {$name}\n";
	$body   .= "Email: {$email}\n";
	$body   .= "Phone: {$phone}\n";
	$body   .= "Inquiry Type: {$type}\n";
	$body   .= "Message:\n{$message}\n";

	$headers = array( 'Content-Type: text/plain; charset=UTF-8' );

	wp_mail( $to, $full_subject, $body, $headers );

	$redirect_url = home_url( '/contact/?submitted=true' );
	wp_safe_redirect( $redirect_url );
	exit;
}

function khf_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'khf_contact_info', array(
		'title'    => __( 'Contact Information', 'khf' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'khf_paypal_email', array(
		'default'           => 'kinzuaheritage@gmail.com',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'khf_paypal_email', array(
		'label'    => __( 'PayPal Business Email', 'khf' ),
		'section'  => 'khf_contact_info',
		'type'     => 'email',
	) );

	$wp_customize->add_setting( 'khf_vendor_email', array(
		'default'           => 'kinzuaheritage@gmail.com',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'khf_vendor_email', array(
		'label'    => __( 'Vendor Signup Email', 'khf' ),
		'section'  => 'khf_contact_info',
		'type'     => 'email',
	) );

	$wp_customize->add_setting( 'khf_contact_email', array(
		'default'           => 'kinzuaheritage@gmail.com',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'khf_contact_email', array(
		'label'    => __( 'Contact Form Recipient Email', 'khf' ),
		'section'  => 'khf_contact_info',
		'type'     => 'email',
	) );

	$wp_customize->add_setting( 'khf_contact_phone', array(
		'default'           => '+18146882345',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'khf_contact_phone', array(
		'label'    => __( 'Contact Phone', 'khf' ),
		'section'  => 'khf_contact_info',
		'type'     => 'text',
	) );
}
add_action( 'customize_register', 'khf_customize_register' );

function khf_get_paypal_email() {
	return get_theme_mod( 'khf_paypal_email', 'kinzuaheritage@gmail.com' );
}

function khf_get_vendor_email() {
	return get_theme_mod( 'khf_vendor_email', 'kinzuaheritage@gmail.com' );
}

function khf_get_contact_email() {
	return get_theme_mod( 'khf_contact_email', 'kinzuaheritage@gmail.com' );
}

function khf_get_contact_phone() {
	return get_theme_mod( 'khf_contact_phone', '+18146882345' );
}

function khf_sanitize_contact_phone( $phone ) {
	return preg_replace( '/[^0-9\+\-\s\(\)]/', '', $phone );
}
