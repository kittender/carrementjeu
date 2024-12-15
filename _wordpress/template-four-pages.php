<?php
/*
Template Name: Afficher 4 Pages
*/
get_header();
?>


<main class="cj-carrement">
        <?php
        // Récupération des ID des 4 pages sélectionnées
        $pages_ids = get_post_meta(get_the_ID(), '_four_pages_ids', true);

        if (!empty($pages_ids)) :
            $pages_ids = explode(',', $pages_ids); // Convertir les ID en tableau
            $args = [
                'post_type' => 'page',
                'post__in' => $pages_ids,
                'orderby' => 'post__in', // Maintenir l'ordre des ID
            ];
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
        ?>
    <article id="post-<?php the_ID(); ?>" class="cj-article">
        <h3 class="cj-hometitle"><span class="zindex"><?php the_title(); ?></span></h3>
        <?php the_content(); ?>
        <?php if (has_post_thumbnail()) { ?>
        <figure class="cj-article-image">
            <?php the_post_thumbnail('full'); // Taille de l'image (ex. : 'thumbnail', 'medium', 'large', 'full'). ?>
        </figure>
        <?php } ?>
    </article>
    <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>Aucune page sélectionnée ou disponible.</p>';
        endif;
    else :
        echo '<p>Aucune page sélectionnée.</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>
