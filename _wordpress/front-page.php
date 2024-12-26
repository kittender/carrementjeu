<?php get_header(); ?>

<p class="cj-slogan"><span class="aria">Notre slogan: </span><?php bloginfo('description'); ?></p>

<main>
    <h3 class="aria">Notre actualité</h3>
    <nav class="cj-slideshow" title="Carrousel de nouveautés">
        <button class="cj-slidebtn --previous"><span class="aria">Nouveauté précédente</span></button>
        <button class="cj-slidebtn --next"><span class="aria">Nouveauté suivante</span></button>
        <?php for ($i = 1; $i <= 10; $i++) :
            $image = get_theme_mod("carousel_image_$i");
            $link = get_theme_mod("carousel_link_$i");
            if ($image) : ?>
                <a href="<?php if ($link): echo esc_url($link); else: echo '#'; endif; ?>" class="cj-slide">
                    <img src="<?php echo esc_url($image); ?>" alt="Nouveauté n°<?php echo $i; ?>">
                </a>
            <?php endif;
        endfor; ?>
    </nav>

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
        <h3 class="cj-hometitle"><?php the_title(); ?></h3>
            <article class="cj-article">
                <?php the_content(); ?>
            </article>
        <?php endwhile;
    else : ?>
        <p>Aucun contenu disponible pour l'instant.</p>
    <?php endif; ?>

    <nav class="cj-squares">
        <?php
        // Récupérer toutes les catégories de produits
        $categories = get_terms(array(
            'taxonomy'   => 'product_cat',  // Taxonomie des catégories WooCommerce
            'hide_empty' => true,          // Cacher les catégories vides
        ));

        // Parcourir et afficher les catégories
        if (!empty($categories) && !is_wp_error($categories)) {
            foreach ($categories as $category) {
                echo '<a href="' . esc_url(get_term_link($category)) . '" class="cj-square">';
                    echo '<span class="cj-square-txt">';
                        echo '<span class="cj-square-title">';
                        echo esc_html($category->name); // Nom de la catégorie
                        echo '</span>';
                        echo '<span class="cj-square-sub">' . $category->count . ' produits</span>'; // Compte des produits
                    echo '</span>';
                echo '</a>';
            }
        } else {
            echo '<p>Aucune catégorie trouvée.</p>';
        }
        ?>
    </nav>
</main>

<?php get_footer(); ?>