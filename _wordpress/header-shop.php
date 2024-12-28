<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="cj-header">
    <h1 class="aria"><?php bloginfo('name'); ?></h1>
    <h2 class="aria"><?php bloginfo('description'); ?></h2>

    <img class="cj-logo" src="<?php echo THEME_ASSETS; ?>/images/header-logo.png" alt="Carrément Jeu, plus que des jeux !">
    <img class="cj-logo-mobile" src="<?php echo THEME_ASSETS; ?>/images/header-logo-mobile.png" alt="Carrément Jeu, plus que des jeux !">
    <img class="cj-logo-mini" src="<?php echo THEME_ASSETS; ?>/images/header-logo-mini.png" alt="Carrément Jeu, plus que des jeux !">

    <div class="cj-mif">
        <img src="<?php echo THEME_ASSETS; ?>/icons/icon-mif.png" title="Made In France" alt="Logo MIF">
        <p>Conçu et Fabriqué en France</p>
    </div>
    <a href="<?php echo wc_get_cart_url(); ?>" class="cj-cart">
        <img src="<?php echo THEME_ASSETS; ?>/icons/icon-shop-cart.png" alt="🛒">
        <label>Panier</label>
        <span class="cj-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    </a>
</header>

<nav class="cj-menu">
    <ul class="cj-socials">
        <li><a href="#"><img src="<?php echo THEME_ASSETS; ?>/icons/icon-social-contact.png" title="Contact" alt="Envoyez-nous un message"></a></li>
        <li><a href="#"><img src="<?php echo THEME_ASSETS; ?>/icons/icon-social-instagram.png" title="Instagram" alt="Notre compte Instagram"></a></li>
        <li><a href="#"><img src="<?php echo THEME_ASSETS; ?>/icons/icon-social-facebook.png" title="Facebook" alt="Notre page Facebook"></a></li>
    </ul>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary-menu',     // Identifiant défini dans register_nav_menus
        'container'      => false,              // Balise conteneur (par ex. <nav>)
        'menu_class'     => 'cj-navigation',    // Classe CSS pour le menu <ul>
        'fallback_cb'     => function() {
            echo '<p>Aucun menu n\'est assigné à cet emplacement.</p>';
        },
        'items_wrap'     => '<ul id="%1$s" class="cj-navigation">%3$s <span class="cj-ani"></span></ul>',
    ));
    ?>
</nav>

<nav class="cj-shophead">
    <img width="32" height="32" src="<?php echo THEME_ASSETS; ?>/icons/shop.png" />
    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">Nos produits</a>

    <?php
    $categories = get_terms( array(
        'taxonomy'   => 'product_cat', // Taxonomie des catégories produits WooCommerce
        'hide_empty' => true,          // Masquer les catégories sans produits
    ) );

    if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
        echo '<ul class="cj-shophead-categories">';
        foreach ( $categories as $category ) {
            echo '<li><a href="' . esc_url( get_term_link( $category ) ) . '">' . esc_html( $category->name ) . '</a></li>';
        }
        echo '</ul>';
    }
    ?>


    <div class="cj-shophead-user">
    <?php if ( is_user_logged_in() ) : ?>
        <img width="32" height="32" src="<?php echo THEME_ASSETS; ?>/icons/account.png" />
        <a class="cj-shophead-link" href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>">Compte client</a>
    <?php else : ?>
        <img width="32" height="32" src="<?php echo THEME_ASSETS; ?>/icons/account.png" />
        <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>">Se connecter</a>
    <?php endif; ?>
    </div>
</nav>