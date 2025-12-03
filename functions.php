<?php
// Configurações do Tema Cogitari

function cogitari_theme_setup() {
    // Título da aba
    add_theme_support( 'title-tag' );

    // Imagens de destaque
    add_theme_support( 'post-thumbnails' );

    // Menu
    register_nav_menus( array(
        'primary' => __( 'Menu Principal', 'cogitari' ),
    ) );
}
add_action( 'after_setup_theme', 'cogitari_theme_setup' );

// Remove a barra admin do topo (para design limpo)
add_filter('show_admin_bar', '__return_false');
?>