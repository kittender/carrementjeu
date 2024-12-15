<?php
define('THEME_ASSETS', get_template_directory_uri() . '/assets');

function carrement_nous_enqueue_styles() {
    wp_enqueue_style('fonts-style', get_template_directory_uri() . '/fonts.css', array(), '1.0', 'all');
    wp_enqueue_style('main-style', get_stylesheet_uri()); // Charge style.css
    wp_enqueue_style('responsive-style', get_template_directory_uri() . '/responsive.css', array(), '1.0', 'all');
    wp_enqueue_style('shop-style', get_template_directory_uri() . '/woocommerce.css', array(), '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'carrement_nous_enqueue_styles');

function carrement_nous_register_menus() {
    register_nav_menus(array(
        'primary-menu' => __('Menu principal', 'carrement-nous'),
        'footer-menu'  => __('Menu du pied de page', 'carrement-nous'),
    ));
}
add_action('after_setup_theme', 'carrement_nous_register_menus');

function carrement_nous_customize_register($wp_customize) {

    // Ajouter une section pour le carrousel
    $wp_customize->add_section('carousel_section', array(
        'title'    => __('Carrousel d\'Accueil', 'mytheme'),
        'priority' => 30,
    ));

    // Ajouter un paramètre pour chaque élément (exemple avec trois éléments)
    for ($i = 1; $i <= 10; $i++) {
        // Image
        $wp_customize->add_setting("carousel_image_$i", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "carousel_image_$i", array(
            'label'    => __("Image du Slide $i", 'carrement-nous'),
            'section'  => 'carousel_section',
            'settings' => "carousel_image_$i",
        )));

        // Lien
        $wp_customize->add_setting("carousel_link_$i", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url',
        ));

        $wp_customize->add_control("carousel_link_$i", array(
            'label'    => __("Lien du Slide $i", 'carrement-nous'),
            'section'  => 'carousel_section',
            'type'     => 'url',
        ));
    }
}

add_action('customize_register', 'carrement_nous_customize_register');

function carrement_nous_enqueue_scripts() {
    wp_enqueue_script(
        'carrement-nous-carrousel-js', // Identifiant unique
        get_template_directory_uri() . '/scripts/slideshow.js', // Chemin vers le fichier
        null, // Dépendances (optionnel, ici jQuery)
        null, // Version (optionnel)
        true // Charger dans le footer
    );
}
add_action('wp_enqueue_scripts', 'carrement_nous_enqueue_scripts');


function theme_setup() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_setup');

function add_four_pages_metabox() {
    add_meta_box(
        'four_pages_selector', // ID
        'Sélectionner 4 pages', // Titre
        'render_four_pages_metabox', // Fonction de rendu
        'page', // Écran
        'side', // Contexte
        'default' // Priorité
    );
}
add_action('add_meta_boxes', 'add_four_pages_metabox');

function render_four_pages_metabox($post) {
    // Récupérer les valeurs existantes
    $selected_pages = get_post_meta($post->ID, '_four_pages_ids', true);
    ?>

    <p>Saisissez les IDs des pages séparés par une virgule (exemple: 12,34,56,78).</p>
    <input type="text" name="four_pages_ids" value="<?php echo esc_attr($selected_pages); ?>" style="width: 100%;">
    <?php
}

// Sauvegarder les données lors de la mise à jour
function save_four_pages_meta($post_id) {
    if (array_key_exists('four_pages_ids', $_POST)) {
        update_post_meta($post_id, '_four_pages_ids', sanitize_text_field($_POST['four_pages_ids']));
    }
}
add_action('save_post', 'save_four_pages_meta');
?>