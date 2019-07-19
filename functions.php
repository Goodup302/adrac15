<?php
function wpm_enqueue_styles(){
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css');
}
add_action( 'wp_enqueue_scripts', 'wpm_enqueue_styles', 11);

// Register Custom Post Type

add_action('init', function() {

    register_post_type( 'gallery', [
        'label'                 => __( 'Galerie Photo'),
        'labels'                => [
            'name'                  => _x( 'Galerie Photo', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Galerie Photo', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'Galerie Photo', 'text_domain' ),
            'name_admin_bar'        => __( 'Galerie Photo', 'text_domain' ),
//            'archives'              => __( 'Item Archives', 'text_domain' ),
//            'attributes'            => __( 'Item Attributes', 'text_domain' ),
//            'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
//            'all_items'             => __( 'All Items', 'text_domain' ),
//            'add_new_item'          => __( 'Add New Item', 'text_domain' ),
//            'add_new'               => __( 'Add New', 'text_domain' ),
//            'new_item'              => __( 'New Item', 'text_domain' ),
//            'edit_item'             => __( 'Edit Item', 'text_domain' ),
//            'update_item'           => __( 'Update Item', 'text_domain' ),
//            'view_item'             => __( 'View Item', 'text_domain' ),
//            'view_items'            => __( 'View Items', 'text_domain' ),
//            'search_items'          => __( 'Search Item', 'text_domain' ),
//            'not_found'             => __( 'Not found', 'text_domain' ),
//            'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
//            'featured_image'        => __( 'Featured Image', 'text_domain' ),
//            'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
//            'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
//            'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
//            'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
//            'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
//            'items_list'            => __( 'Items list', 'text_domain' ),
//            'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
//            'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
        ],
        //'supports'              => false,
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
//        'can_export'            => true,
//        'has_archive'           => true,
//        'exclude_from_search'   => false,
//        'publicly_queryable'    => true,
//        'capability_type'       => 'page',
        'menu_icon' => 'dashicons-format-gallery',
    ]);

//    register_post_type( 'event', [
//        'label'                 => __('Post Type9'),
//        'description'           => __('Post Type Description'),
//        'labels'                => $labels,
//        'supports'              => false,
//        'taxonomies'            => array( 'category', 'post_tag' ),
//        'hierarchical'          => false,
//        'public'                => true,
//        'show_ui'               => true,
//        'show_in_menu'          => true,
//        'menu_position'         => 5,
//        'show_in_admin_bar'     => true,
//        'show_in_nav_menus'     => true,
//        'can_export'            => true,
//        'has_archive'           => true,
//        'exclude_from_search'   => false,
//        'publicly_queryable'    => true,
//        'capability_type'       => 'page',
//    ]);

}, 0);


/**
 * Return header featured image
 */
function futurio_header_thumb_img( $img = 'full' ) {
    global $post;

    if ( is_404() ) {
        return;
    }

    if ( get_theme_mod( 'single_featured_image', 'full' ) == 'full' && has_post_thumbnail( $post->ID ) && futurio_get_meta( 'disable_featured_image' ) != 'disable' ) {
        ?>
        <div class="full-head-img container-fluid" style="background-image: url( <?php echo esc_url( get_the_post_thumbnail_url( $post->ID, $img ) ) ?> )">
            <?php if ( get_theme_mod( 'single_title_position', 'full' ) == 'full' ) { ?>
                <?php futurio_header_title() ?>
            <?php } ?>
        </div>
        <?php
    } elseif ( get_theme_mod( 'single_featured_image', 'full' ) == 'full' && !has_post_thumbnail( $post->ID ) && futurio_get_meta( 'disable_featured_image' ) != 'disable' && futurio_get_meta( 'disable_title' ) != 'disable' ) {
        ?>
        <div class="full-head-img container-fluid">
            <?php if ( get_theme_mod( 'single_title_position', 'full' ) == 'full' ) { ?>
                <?php futurio_header_title() ?>
            <?php } ?>
        </div>
        <?php
    } elseif ( get_theme_mod( 'single_title_position', 'full' ) == 'full' && futurio_get_meta( 'disable_title' ) != 'disable' ) {
        ?>
        <div class="full-head-img container-fluid">
            <?php if ( get_theme_mod( 'single_title_position', 'full' ) == 'full' ) { ?>
                <?php futurio_header_title() ?>
            <?php } ?>
        </div>
        <?php
    }
}