<?php
// add support to featured image
add_theme_support( 'post-thumbnails' );

// add a custom logo suport
function mytheme_setup() {
    add_theme_support('custom-logo', array(
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	));
}

add_action('after_setup_theme', 'mytheme_setup');

// Add NaviWalker Suport
function register_navwalker(){
	require_once get_template_directory() . '/includes/wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'Bootstrap 4 Starter' ),
) );


//adicionar tipo de posts para o slider
// Register Custom Post Type
function custom_post_slide() {

	$labels = array(
		'name'                  => _x( 'Slide', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Slides', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Slides', 'text_domain' ),
		'name_admin_bar'        => __( 'Slides', 'text_domain' ),
		'archives'              => __( 'Categoria', 'text_domain' ),
		'attributes'            => __( 'Atributos do Item', 'text_domain' ),
		'parent_item_colon'     => __( 'Item Pai:', 'text_domain' ),
		'all_items'             => __( 'Todos os Itens', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar Novo Item', 'text_domain' ),
		'add_new'               => __( 'Adicionar Novo', 'text_domain' ),
		'new_item'              => __( 'Novo Item', 'text_domain' ),
		'edit_item'             => __( 'Editar Item', 'text_domain' ),
		'update_item'           => __( 'Atualizar Item', 'text_domain' ),
		'view_item'             => __( 'Ver Item', 'text_domain' ),
		'view_items'            => __( 'Ver Itens', 'text_domain' ),
		'search_items'          => __( 'Buscar Item', 'text_domain' ),
		'not_found'             => __( 'Não Encontrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Não Encontrado Trash', 'text_domain' ),
		'featured_image'        => __( 'Imagem', 'text_domain' ),
		'set_featured_image'    => __( 'Escolher Imagem', 'text_domain' ),
		'remove_featured_image' => __( 'Remover Imagem', 'text_domain' ),
		'use_featured_image'    => __( 'Usar Como Imagem', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir no Item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Enviar par este item', 'text_domain' ),
		'items_list'            => __( 'Listar Itens', 'text_domain' ),
		'items_list_navigation' => __( 'Navegar pelos Itens', 'text_domain' ),
		'filter_items_list'     => __( 'Filterar na Lista de Itens', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Slides', 'text_domain' ),
		'description'           => __( 'Insira o slides de cada categoria!', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-images-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'post_slide', $args );

}
add_action( 'init', 'custom_post_slide', 0 );

function new_excerpt_length($length) {
	return 10;
}
add_filter('excerpt_length', 'new_excerpt_length');
	
// Changing excerpt more
function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Register Theme Features
function custom_theme_features()  {

	// Add theme support for Post Formats
	add_theme_support( 'post-formats', array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat' ) );
}
add_action( 'after_setup_theme', 'custom_theme_features' );