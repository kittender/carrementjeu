<footer class="cj-footer">
    <nav>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'footer-menu',     // Identifiant défini dans register_nav_menus
            'container'      => false,              // Balise conteneur (par ex. <nav>)
            'menu_class'     => 'cj-navigation',    // Classe CSS pour le menu <ul>
            'fallback_cb'     => function() {
                echo '<p>Aucun menu n\'est assigné à cet emplacement.</p>';
            },
            'items_wrap'     => '<ul id="%1$s" class="cj-footer-links">%3$s</ul>',
        ));
        ?>
        <ul class="cj-socials-footer">
            <li><a href="#"><img src="<?php echo THEME_ASSETS; ?>/icons/icon-social-contact.png" title="Contact" alt="Envoyez-nous un message"></a></li>
            <li><a href="#"><img src="<?php echo THEME_ASSETS; ?>/icons/icon-social-instagram.png" title="Instagram" alt="Notre compte Instagram"></a></li>
            <li><a href="#"><img src="<?php echo THEME_ASSETS; ?>/icons/icon-social-facebook.png" title="Facebook" alt="Notre page Facebook"></a></li>
        </ul>
    </nav>
    <p class="cj-credits"><a href="/wp-admin" target="_blank" rel="noopener" class="nolink"><?php bloginfo('name'); ?></a>. Tous droits réservés. &copy; <?php echo date('Y'); ?></p>
</footer>

<?php wp_footer(); ?>
</body>
</html>
