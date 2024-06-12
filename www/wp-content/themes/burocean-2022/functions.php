<?php
// Hack version wordpress
remove_action('wp_head','wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );

// Copyright admin
function remove_footer_admin(){
	echo 'Site by <a href="http://www.baptiste-julien.fr" target="_blank">Baptiste JULIEN</a>';
}
add_filter('admin_footer_text','remove_footer_admin');

// Supprimer barre wordpress
function my_function_admin_bar(){
    return false;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

/* Accents photos */
add_filter('sanitize_file_name', 'remove_accents');

// Ajouter menu admin
add_theme_support('nav_menus');
register_nav_menu('main','Navigation header');
register_nav_menu('top-menu','Navigation top menu');


// Gérer les images
add_theme_support('post-thumbnails');
add_image_size('slider', 1920, 750, true);
add_image_size('single', 800);
add_image_size('liste-cats', 415);

// Options
if( function_exists('acf_add_options_page') ) {
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title'    => 'Options',
			'menu_title'    => 'Options',
			'menu_slug'     => 'options-generales',
			'capability'    => 'edit_posts',
			'redirect'      => true
		));
	}
}

/* Ajout CSS */
function hbs_enqueue_styles() {
	
	wp_register_style( 'style-global', get_stylesheet_directory_uri() . '/assets/css/front.css');
	wp_enqueue_style('style-global');
	
}
add_action( 'wp_enqueue_scripts', 'hbs_enqueue_styles', 99 );

function theme_js(){
    
    wp_enqueue_script("jquery");
    
	wp_enqueue_script( 'modernizr-custom',
	get_template_directory_uri() . '/assets/js/modernizr-custom.js',
	array() );
	
	wp_enqueue_script( 'owl.carousel.min',
    get_template_directory_uri() . '/assets/js/owl.carousel.min.js',
    array() );
    
    if(is_front_page()) {
    	wp_enqueue_script( 'owl.carousel2.thumbs.min',
        get_template_directory_uri() . '/assets/js/owl.carousel2.thumbs.min.js',
        array() );
    }
	
	if(is_archive()) {
		wp_enqueue_script( 'masonry.pkgd.min',
		get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js',
		array() );
	}
	
	wp_enqueue_script( 'front',
	get_template_directory_uri() . '/assets/js/front.js',
	array() );
 
}
 
add_action( 'wp_footer', 'theme_js' );


// Post type gammes
add_action('init','gammes_init');
function gammes_init() {
	$labels = array(
		'name' => 'Gammes',
		'singular_name' => 'Gammes',
		'menu_name' => 'Gammes',
        'add_new' => 'Ajouter une gamme',
        'add_new_item' => 'Ajouter une nouvelle gamme',
        'edit_item' => 'Modifier une gamme',
        'new_item' => 'Nouvelle gamme',
        'view_item' => 'Voir la gamme',
        'search_items' => 'Rechercher une gamme',
        'not_found' =>  'Aucune gamme trouvée',
        'not_found_in_trash' => 'Aucune gamme dans la poubelle', 
        'parent_item_colon' => ''
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'rewrite' => array( 'slug' => 'gammes/%gammes-cats%' ),
		'menu_position' => 6,
		'publicly_queryable' => true,
		'supports' => array( 'title', 'editor', 'thumbnail'),
		'menu_icon' => 'dashicons-editor-table',
		'has_archive' => true
	); 
	register_post_type('gammes',$args);
	
}

add_action( 'init', 'create_taxonomy', 0 );
function create_taxonomy() {
	register_taxonomy( 'gammes-cats', array('gammes'), array (
		'hierarchical' => true, 
		'label' => __('Catégories gammes'),
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'gammes' )
	));
}

function wpa_course_post_link( $post_link, $id = 0 ){
    $post = get_post($id);  
    if ( is_object( $post ) ){
        $terms = wp_get_object_terms( $post->ID, 'gammes-cats' );
        if( $terms ){
            return str_replace( '%gammes-cats%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;  
}
add_filter( 'post_type_link', 'wpa_course_post_link', 1, 3 );


function excerpt($limit){
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...'; } else { $excerpt = implode(" ",$excerpt); }
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;
}

function shortcode_col_5($param, $content) {
 return '<div class="col-md-6">' . $content . '</div>';
}
add_shortcode('col_6', 'shortcode_col_5');

add_action( 'init', 'blockusers_init' );
function blockusers_init() {
    if ( is_admin() && ! current_user_can( 'administrator' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
        wp_redirect( home_url() );
        exit;
    }
}

// Fonction qui insere le lien vers le css qui surchargera celui d'origine
function custom_login_css()  {
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/style-login.css" />';
}
add_action('login_head', 'custom_login_css');

// Filtre qui permet de changer l'url du logo
function custom_url_login()  {
    return get_bloginfo( 'siteurl' ); // On retourne l'index du site
}
add_filter('login_headerurl', 'custom_url_login');

// Filtre qui permet de changer l'attribut title du logo
function custom_title_login($message) {
    return get_bloginfo('description'); // On retourne la description du site
}
add_filter('login_headertitle', 'custom_title_login');

//flush_rewrite_rules();

?>