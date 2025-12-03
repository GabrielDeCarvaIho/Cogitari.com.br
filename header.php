<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COGITARI | Portal de Notícias</title>
    
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <?php
    // Verifica se estamos na página de autenticação
    $is_auth_page = is_page_template('page-auth.php');
    ?>

    <header class="site-header">
        <div class="nav-container">
            <div class="logo-area">
                <a href="<?php echo home_url(); ?>" style="display:flex; gap:10px; align-items:center;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cogitarilogo.png" alt="Icone Cogitari" class="logo-img-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cogitariwordmark.png" alt="Cogitari" class="logo-img-text"> 
                </a>
            </div>

            <?php if ( ! $is_auth_page ) : ?>
            <nav class="main-menu">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => '',
                    'fallback_cb'    => '__return_false', 
                    'items_wrap'     => '<ul>%3$s</ul>',
                ) );
                ?>
                <?php if ( ! has_nav_menu( 'primary' ) ) : ?>
                <ul>
                    <li><a href="<?php echo home_url(); ?>">Home</a></li>
                    <li><a href="#">Inteligência Artificial</a></li>
                    <li><a href="#">Automação</a></li>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Ferramentas</a></li>
                </ul>
                <?php endif; ?>
            </nav>
            <?php endif; ?>

            <div class="header-actions">
                <?php if ( ! $is_auth_page ) : ?>
                    <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                        <input type="search" class="search-input" placeholder="Buscar..." value="<?php echo get_search_query(); ?>" name="s">
                        <button type="submit" class="search-btn"><i class="ph ph-magnifying-glass" style="font-size: 20px;"></i></button>
                    </form>
                <?php endif; ?>

                <?php if ( is_user_logged_in() ) : ?>
                    <a href="<?php echo admin_url(); ?>" class="btn-gradient" style="padding: 8px 24px; font-size: 0.9rem;">Painel</a>
                <?php else : ?>
                    <?php if ( $is_auth_page ) : ?>
                        <a href="<?php echo home_url(); ?>" class="btn-gradient" style="padding: 8px 24px; font-size: 0.9rem;">Home</a>
                    <?php else : ?>
                        <a href="<?php echo site_url('/entrar'); ?>" class="btn-gradient" style="padding: 8px 24px; font-size: 0.9rem;">Entrar</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <?php if ( ! $is_auth_page ) : ?>
    <div class="ads-wrapper">
        <span class="ads-label">Publicidade</span>
        <div class="banner-placeholder glass-hover-effect">Banner 970x90 - Anúncio Horizontal</div>
    </div>
    <?php endif; ?>