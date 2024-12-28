<?php
if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
    get_header( 'shop' ); // Utilise header-shop.php
} else {
    get_header(); // Utilise le header standard
}
?>

<main>
    <!-- Boucle WordPress -->
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_title('<h1>', '</h1>');
            the_content();
        endwhile;
    else :
        echo '<p>Aucun contenu trouvé.</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>