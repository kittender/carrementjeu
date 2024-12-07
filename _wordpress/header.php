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
    <a href="#" class="cj-cart">
        <img src="<?php echo THEME_ASSETS; ?>/icons/icon-shop-cart.png" alt="Chariot de magasin">
        <label>Panier</label>
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

<p class="cj-slogan"><span class="aria">Notre slogan: </span><?php bloginfo('description'); ?></p>
