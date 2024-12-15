<?php get_header(); ?>

<main class="cj-single">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1><?php the_title(); ?></h1>
                <div class=cj-single-content>
                    <?php the_content(); ?>
                </div>
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full'); // Taille de l'image (ex. : 'thumbnail', 'medium', 'large', 'full').
                }
                ?>
            </article>
    <?php
        endwhile;
    else :
            echo '<p>Aucun contenu trouvé.</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>
