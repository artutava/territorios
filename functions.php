<?php
/**
 * Territorios functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Territorios
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function territorios_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Territorios, use a find and replace
		* to change 'territorios' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'territorios', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'territorios' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'territorios_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}

add_action( 'after_setup_theme', 'territorios_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function territorios_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'territorios_content_width', 640 );
}
add_action( 'after_setup_theme', 'territorios_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function territorios_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'territorios' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'territorios' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'territorios_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function territorios_scripts() {
	wp_enqueue_style( 'territorios-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'territorios-style', 'rtl', 'replace' );

	wp_enqueue_script( 'territorios-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'territorios_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



add_action('init', function () {

  // CPT: Territórios
  register_post_type('territorio', [
    'labels' => [
      'name' => 'Territórios',
      'singular_name' => 'Território',
      'add_new_item' => 'Adicionar novo Território',
      'edit_item' => 'Editar Território',
    ],
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-location-alt',
    'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
    'show_in_rest' => true,
    'rewrite' => [
      'slug' => 'territorios',   // archive: /territorios/
      'with_front' => false,
    ],
  ]);

  // Taxonomia: Regiões (para Territórios)
  register_taxonomy('regiao', ['territorio'], [
    'labels' => [
      'name' => 'Regiões',
      'singular_name' => 'Região',
      'search_items' => 'Buscar Regiões',
      'all_items' => 'Todas as Regiões',
      'edit_item' => 'Editar Região',
      'add_new_item' => 'Adicionar Nova Região',
      'menu_name' => 'Regiões',
    ],
    'public' => true,
    'hierarchical' => true, // como categorias (pai/filho). Pode ser false se quiser “tags”
    'show_admin_column' => true,
    'show_in_rest' => true,
    'rewrite' => [
      'slug' => 'regioes',       // termos: /regioes/norte/
      'with_front' => false,
    ],
  ]);

});


add_action('init', function () {

  // CPT: Material
register_post_type('material', [
		'labels' => [
			'name'          => 'Materiais',
			'singular_name' => 'Material',
			'add_new_item'  => 'Adicionar novo Material',
			'edit_item'     => 'Editar Material',
		],
		'public'       => true,
		'show_in_rest' => true,
		'menu_icon'    => 'dashicons-media-document',
		'supports'     => ['title', 'thumbnail'], // sem editor
		'has_archive'  => true,
		'rewrite'      => [
			'slug'       => 'materiais',
			'with_front' => false,
		],
	]);

});



// Enqueue admin assets (somente na tela do CPT material)
add_action('admin_enqueue_scripts', function ($hook) {
	if ($hook !== 'post.php' && $hook !== 'post-new.php') return;

	$screen = get_current_screen();
	if (!$screen || $screen->post_type !== 'material') return;

	// habilita wp.media
	wp_enqueue_media();

	// CSS do metabox
	wp_enqueue_style(
		'territorios-material-admin',
		get_template_directory_uri() . '/assets/admin/material-admin.css',
		[],
		'1.0.0'
	);

	// JS do metabox
	wp_enqueue_script(
		'territorios-material-admin',
		get_template_directory_uri() . '/assets/admin/material-admin.js',
		['jquery'],
		'1.0.0',
		true
	);

	wp_localize_script('territorios-material-admin', 'TerritoriosMaterial', [
		'defaultCover' => get_template_directory_uri() . '/assets/img/service/file_tc.png',
	]);
});


// Metabox + limpeza de caixas desnecessárias
add_action('add_meta_boxes', function () {

	add_meta_box(
		'material_meta',
		'Material (Arquivo e Vínculo)',
		'territorios_render_material_metabox_ui',
		'material',
		'normal',
		'high'
	);

	// opcional: deixar a tela mais clean
	remove_meta_box('slugdiv', 'material', 'normal');
	remove_meta_box('authordiv', 'material', 'normal');
	remove_meta_box('commentstatusdiv', 'material', 'normal');
	remove_meta_box('commentsdiv', 'material', 'normal');
});


// Render do metabox (capa + campos)
function territorios_render_material_metabox_ui($post) {
	wp_nonce_field('territorios_material_meta_save', 'territorios_material_meta_nonce');

	$arquivo_url    = get_post_meta($post->ID, 'arquivo_url', true);
	$arquivo_upload = get_post_meta($post->ID, 'arquivo_upload', true);
	$territorio_id  = get_post_meta($post->ID, 'territorio_id', true);

	// capa (featured image) + fallback
	$default_cover = get_template_directory_uri() . '/assets/img/service/file_tc.png';
	$cover = $default_cover;

	if (has_post_thumbnail($post->ID)) {
		$img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
		if (!empty($img[0])) $cover = $img[0];
	}

	// lista de territórios
	$territorios = get_posts([
		'post_type'      => 'territorio',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => 'title',
		'order'          => 'ASC',
	]);

	?>
	<div class="tm-material-editor">

		<div class="tm-left">
			<div class="tm-cover-card">
				<div class="tm-cover">
					<img id="tm-cover-img" src="<?php echo esc_url($cover); ?>" alt="Capa do material">
				</div>
				<div class="tm-cover-actions">
					<p class="tm-muted">Capa (opcional). Se não selecionar, usa a capa padrão.</p>
					<p class="tm-muted">Use “Imagem destacada” (na coluna direita do WordPress) para trocar.</p>
				</div>
			</div>
		</div>

		<div class="tm-right">
			<div class="tm-field">
				<label><strong>Vincular ao Território</strong></label>
				<select name="territorio_id" id="territorio_id">
					<option value="">— Selecione um território —</option>
					<?php foreach ($territorios as $t) : ?>
						<option value="<?php echo esc_attr($t->ID); ?>" <?php selected((string)$territorio_id, (string)$t->ID); ?>>
							<?php echo esc_html($t->post_title); ?>
						</option>
					<?php endforeach; ?>
				</select>
				<small class="tm-muted">Esse material aparecerá automaticamente no single do território.</small>
			</div>

			<hr class="tm-hr">

			<div class="tm-field">
				<label><strong>Arquivo (Upload)</strong></label>

				<div class="tm-row">
					<input
						type="url"
						name="arquivo_upload"
						id="arquivo_upload"
						value="<?php echo esc_attr($arquivo_upload); ?>"
						placeholder="Selecione um arquivo..."
						readonly
					>
					<button type="button" class="button button-primary" id="tm_pick_file">Escolher arquivo</button>
					<button type="button" class="button" id="tm_clear_file">Limpar</button>
				</div>

				<small class="tm-muted">Recomendado: subir PDF na Biblioteca de Mídia e selecionar aqui.</small>
			</div>

			<div class="tm-field">
				<label><strong>Ou URL externa (alternativa)</strong></label>
				<input
					type="url"
					name="arquivo_url"
					id="arquivo_url"
					value="<?php echo esc_attr($arquivo_url); ?>"
					placeholder="https://.../arquivo.pdf"
				>
				<small class="tm-muted">Se tiver upload e URL, você pode priorizar o upload no front-end.</small>
			</div>

			<?php
			$final_link = $arquivo_upload ?: $arquivo_url;
			if (!empty($final_link)) :
			?>
				<div class="tm-preview">
					<strong>Link atual:</strong>
					<a href="<?php echo esc_url($final_link); ?>" target="_blank" rel="noopener">
						<?php echo esc_html($final_link); ?>
					</a>
				</div>
			<?php endif; ?>
		</div>

	</div>
	<?php
}


// Salvar meta do material
add_action('save_post_material', function ($post_id) {
	if (!isset($_POST['territorios_material_meta_nonce']) || !wp_verify_nonce($_POST['territorios_material_meta_nonce'], 'territorios_material_meta_save')) return;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if (!current_user_can('edit_post', $post_id)) return;

	$territorio_id  = isset($_POST['territorio_id']) ? (int) $_POST['territorio_id'] : 0;
	$arquivo_upload = isset($_POST['arquivo_upload']) ? esc_url_raw(trim($_POST['arquivo_upload'])) : '';
	$arquivo_url    = isset($_POST['arquivo_url']) ? esc_url_raw(trim($_POST['arquivo_url'])) : '';

	update_post_meta($post_id, 'territorio_id', $territorio_id);
	update_post_meta($post_id, 'arquivo_upload', $arquivo_upload);
	update_post_meta($post_id, 'arquivo_url', $arquivo_url);
});