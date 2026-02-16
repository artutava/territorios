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


/**
 * -------------------------------------------------------
 * METABOX: Números do Território (CPT territorio)
 * -------------------------------------------------------
 */

add_action('add_meta_boxes', function () {
  add_meta_box(
    'territorio_numeros_meta',
    'Números do Território',
    'territorios_render_territorio_numeros_metabox',
    'territorio',
    'normal',
    'high'
  );
});

function territorios_render_territorio_numeros_metabox($post) {
  wp_nonce_field('territorios_numeros_save', 'territorios_numeros_nonce');

  // Defaults (iguais aos do template)
  $defaults = [
    1 => ['prefix' => '',  'number' => '232', 'suffix' => 'K',  'label' => 'Pessoas mobilizadas diretamente'],
    2 => ['prefix' => '+', 'number' => '40',  'suffix' => '',   'label' => 'Ações e articulações comunitárias'],
    3 => ['prefix' => '',  'number' => '50',  'suffix' => 'K',  'label' => 'Ciclos de formação previstos'],
    4 => ['prefix' => '',  'number' => '35',  'suffix' => 'K+', 'label' => 'Impacto estimado em rede'],
  ];

  $get = function($i, $key) use ($post, $defaults) {
    $meta_key = "territorio_counter_{$i}_{$key}";
    $val = get_post_meta($post->ID, $meta_key, true);
    if ($val === '' || $val === null) return $defaults[$i][$key];
    return $val;
  };

  ?>
  <style>
    .tc-grid { display:grid; grid-template-columns: 1fr 1fr; gap:16px; }
    .tc-card { border:1px solid #e5e7eb; border-radius:12px; padding:12px; background:#fff; }
    .tc-card h4 { margin:0 0 10px; font-size:14px; }
    .tc-row { display:grid; grid-template-columns: 90px 1fr 90px; gap:10px; align-items:center; margin-bottom:10px; }
    .tc-row label { font-size:12px; color:#374151; }
    .tc-row input { width:100%; }
    .tc-label { margin-top:8px; }
    .tc-label input { width:100%; }
    .tc-help { margin-top:10px; color:#6b7280; font-size:12px; }
    @media (max-width: 900px){ .tc-grid { grid-template-columns: 1fr; } }
  </style>

  <div class="tc-grid">
    <?php for ($i=1; $i<=4; $i++) : ?>
      <div class="tc-card">
        <h4>Contador <?php echo (int)$i; ?></h4>

        <div class="tc-row">
          <div>
            <label>Prefixo</label>
            <input
              type="text"
              name="territorio_counter_<?php echo (int)$i; ?>_prefix"
              value="<?php echo esc_attr($get($i,'prefix')); ?>"
              placeholder="+"
            >
          </div>

          <div>
            <label>Número</label>
            <input
              type="text"
              name="territorio_counter_<?php echo (int)$i; ?>_number"
              value="<?php echo esc_attr($get($i,'number')); ?>"
              placeholder="232"
            >
          </div>

          <div>
            <label>Sufixo</label>
            <input
              type="text"
              name="territorio_counter_<?php echo (int)$i; ?>_suffix"
              value="<?php echo esc_attr($get($i,'suffix')); ?>"
              placeholder="K / K+"
            >
          </div>
        </div>

        <div class="tc-label">
          <label>Texto abaixo</label>
          <input
            type="text"
            name="territorio_counter_<?php echo (int)$i; ?>_label"
            value="<?php echo esc_attr($get($i,'label')); ?>"
            placeholder="Pessoas mobilizadas diretamente"
          >
        </div>
      </div>
    <?php endfor; ?>
  </div>

  <p class="tc-help">
    Dica: use <strong>prefixo</strong> para “+”, <strong>sufixo</strong> para “K”, “K+”, “%”, etc. O campo <strong>número</strong> pode ser “232” ou “232.5” (texto livre).
  </p>
  <?php
}

add_action('save_post_territorio', function ($post_id) {
  if (!isset($_POST['territorios_numeros_nonce']) || !wp_verify_nonce($_POST['territorios_numeros_nonce'], 'territorios_numeros_save')) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!current_user_can('edit_post', $post_id)) return;

  // sanitização simples (texto)
  $sanitize = function($v){
    return sanitize_text_field(wp_unslash((string)$v));
  };

  for ($i=1; $i<=4; $i++) {
    foreach (['prefix','number','suffix','label'] as $key) {
      $field = "territorio_counter_{$i}_{$key}";
      $val = isset($_POST[$field]) ? $sanitize($_POST[$field]) : '';
      update_post_meta($post_id, $field, $val);
    }
  }
});


/**
 * -------------------------------------------------------
 * CPT: Biblioteca (itens) + Taxonomia: Categorias da Biblioteca
 * -------------------------------------------------------
 */
add_action('init', function () {

  // CPT: Itens da Biblioteca
  register_post_type('biblioteca_item', [
    'labels' => [
      'name'               => 'Biblioteca',
      'singular_name'      => 'Item da Biblioteca',
      'add_new_item'       => 'Adicionar novo item',
      'edit_item'          => 'Editar item',
      'new_item'           => 'Novo item',
      'view_item'          => 'Ver item',
      'search_items'       => 'Buscar itens',
      'not_found'          => 'Nenhum item encontrado',
      'menu_name'          => 'Biblioteca',
    ],
    'public'       => true,
    'show_in_rest' => true,
    'menu_icon'    => 'dashicons-book-alt',
    'supports'     => ['title', 'thumbnail'], // sem editor
    'has_archive'  => true,
    'rewrite'      => [
      'slug'       => 'biblioteca',
      'with_front' => false,
    ],
  ]);

  // Taxonomia: Categorias (para Biblioteca)
  register_taxonomy('biblioteca_categoria', ['biblioteca_item'], [
    'labels' => [
      'name'          => 'Categorias',
      'singular_name' => 'Categoria',
      'search_items'  => 'Buscar Categorias',
      'all_items'     => 'Todas as Categorias',
      'edit_item'     => 'Editar Categoria',
      'add_new_item'  => 'Adicionar Nova Categoria',
      'menu_name'     => 'Categorias',
    ],
    'public'            => true,
    'hierarchical'      => true, // como categorias
    'show_admin_column' => true,
    'show_in_rest'      => true,
    'rewrite'           => [
      'slug'       => 'biblioteca/categoria', // /biblioteca/categoria/xyz/
      'with_front' => false,
    ],
  ]);

});


/**
 * -------------------------------------------------------
 * ADMIN (Biblioteca): enqueue CSS/JS e metabox
 * -------------------------------------------------------
 */

// Reaproveita os MESMOS arquivos do material-admin (layout e wp.media)
add_action('admin_enqueue_scripts', function ($hook) {
  if ($hook !== 'post.php' && $hook !== 'post-new.php') return;

  $screen = get_current_screen();
  if (!$screen || $screen->post_type !== 'biblioteca_item') return;

  wp_enqueue_media();

  // Reusa os arquivos que você já criou
  wp_enqueue_style(
    'territorios-biblioteca-admin',
    get_template_directory_uri() . '/assets/admin/material-admin.css',
    [],
    '1.0.0'
  );

  wp_enqueue_script(
    'territorios-biblioteca-admin',
    get_template_directory_uri() . '/assets/admin/material-admin.js',
    ['jquery'],
    '1.0.0',
    true
  );

  // Capa padrão da biblioteca (pode ser a mesma do material)
  wp_localize_script('territorios-biblioteca-admin', 'TerritoriosMaterial', [
    'defaultCover' => get_template_directory_uri() . '/assets/img/service/file_tc.png',
  ]);
});


// Metabox da Biblioteca
add_action('add_meta_boxes', function () {

  add_meta_box(
    'biblioteca_meta',
    'Biblioteca (Arquivo)',
    'territorios_render_biblioteca_metabox_ui',
    'biblioteca_item',
    'normal',
    'high'
  );

  // limpa a tela um pouco
  remove_meta_box('slugdiv', 'biblioteca_item', 'normal');
  remove_meta_box('authordiv', 'biblioteca_item', 'normal');
  remove_meta_box('commentstatusdiv', 'biblioteca_item', 'normal');
  remove_meta_box('commentsdiv', 'biblioteca_item', 'normal');
});


// Render do metabox (capa + campos do arquivo)
function territorios_render_biblioteca_metabox_ui($post) {
  wp_nonce_field('territorios_biblioteca_save', 'territorios_biblioteca_nonce');

  $arquivo_url    = get_post_meta($post->ID, 'biblioteca_arquivo_url', true);
  $arquivo_upload = get_post_meta($post->ID, 'biblioteca_arquivo_upload', true);

  // capa (featured image) + fallback
  $default_cover = get_template_directory_uri() . '/assets/img/service/file_tc.png';
  $cover = $default_cover;

  if (has_post_thumbnail($post->ID)) {
    $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
    if (!empty($img[0])) $cover = $img[0];
  }
  ?>

  <div class="tm-material-editor">

    <div class="tm-left">
      <div class="tm-cover-card">
        <div class="tm-cover">
          <img id="tm-cover-img" src="<?php echo esc_url($cover); ?>" alt="Capa do item">
        </div>
        <div class="tm-cover-actions">
          <p class="tm-muted">Capa (opcional). Se não selecionar, usa a capa padrão.</p>
          <p class="tm-muted">Use “Imagem destacada” (na coluna direita do WordPress) para trocar.</p>
        </div>
      </div>
    </div>

    <div class="tm-right">

      <div class="tm-field">
        <label><strong>Arquivo (Upload)</strong></label>

        <div class="tm-row">
          <input
            type="url"
            name="biblioteca_arquivo_upload"
            id="arquivo_upload"
            value="<?php echo esc_attr($arquivo_upload); ?>"
            placeholder="Selecione um arquivo..."
            readonly
          >
          <button type="button" class="button button-primary" id="tm_pick_file">Escolher arquivo</button>
          <button type="button" class="button" id="tm_clear_file">Limpar</button>
        </div>

        <small class="tm-muted">Pode ser PDF, DOC, PPT, ZIP, etc. (o Media Library aceita).</small>
      </div>

      <div class="tm-field">
        <label><strong>Ou URL externa (alternativa)</strong></label>
        <input
          type="url"
          name="biblioteca_arquivo_url"
          id="arquivo_url"
          value="<?php echo esc_attr($arquivo_url); ?>"
          placeholder="https://.../arquivo.pdf"
        >
        <small class="tm-muted">Se tiver upload e URL, você pode priorizar upload no front-end.</small>
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


// Salvar meta do item da biblioteca
add_action('save_post_biblioteca_item', function ($post_id) {
  if (!isset($_POST['territorios_biblioteca_nonce']) || !wp_verify_nonce($_POST['territorios_biblioteca_nonce'], 'territorios_biblioteca_save')) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!current_user_can('edit_post', $post_id)) return;

  $arquivo_upload = isset($_POST['biblioteca_arquivo_upload']) ? esc_url_raw(trim($_POST['biblioteca_arquivo_upload'])) : '';
  $arquivo_url    = isset($_POST['biblioteca_arquivo_url']) ? esc_url_raw(trim($_POST['biblioteca_arquivo_url'])) : '';

  update_post_meta($post_id, 'biblioteca_arquivo_upload', $arquivo_upload);
  update_post_meta($post_id, 'biblioteca_arquivo_url', $arquivo_url);
});


/**
 * -------------------------------------------------------
 * CPT: Calendário (eventos)
 * -------------------------------------------------------
 */
add_action('init', function () {

  register_post_type('evento', [
    'labels' => [
      'name'          => 'Calendário',
      'singular_name' => 'Evento',
      'add_new_item'  => 'Adicionar novo Evento',
      'edit_item'     => 'Editar Evento',
      'menu_name'     => 'Calendário',
    ],
    'public'       => true,
    'show_in_rest' => true,
    'menu_icon'    => 'dashicons-calendar-alt',
    'supports'     => ['title', 'excerpt', 'thumbnail'], // sem editor (fica mais limpo)
    'has_archive'  => true,
    'rewrite'      => [
      'slug'       => 'calendario',
      'with_front' => false,
    ],
  ]);

});


/**
 * -------------------------------------------------------
 * Metabox: Dados do Evento (data/hora/local/território)
 * -------------------------------------------------------
 */
add_action('add_meta_boxes', function () {
  add_meta_box(
    'evento_dados_meta',
    'Dados do Evento',
    'territorios_render_evento_metabox',
    'evento',
    'normal',
    'high'
  );
});

function territorios_render_evento_metabox($post) {
  wp_nonce_field('territorios_evento_save', 'territorios_evento_nonce');

  $data        = get_post_meta($post->ID, 'evento_data', true);        // YYYY-MM-DD
  $hora_ini    = get_post_meta($post->ID, 'evento_hora_inicio', true); // HH:MM
  $hora_fim    = get_post_meta($post->ID, 'evento_hora_fim', true);    // HH:MM
  $local       = get_post_meta($post->ID, 'evento_local', true);
  $endereco    = get_post_meta($post->ID, 'evento_endereco', true);
  $territorio  = get_post_meta($post->ID, 'evento_territorio_id', true); // ID do post territorio (opcional)

  // lista de territórios para dropdown
  $territorios = get_posts([
    'post_type'      => 'territorio',
    'posts_per_page' => 200,
    'post_status'    => 'publish',
    'orderby'        => 'title',
    'order'          => 'ASC',
    'fields'         => 'ids',
  ]);
  ?>

  <style>
    .ev-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px}
    .ev-field label{display:block;font-weight:600;margin-bottom:6px}
    .ev-field input,.ev-field select{width:100%}
    .ev-wide{grid-column:1 / -1}
    @media(max-width:900px){.ev-grid{grid-template-columns:1fr}}
  </style>

  <div class="ev-grid">

    <div class="ev-field">
      <label>Data</label>
      <input type="date" name="evento_data" value="<?php echo esc_attr($data); ?>">
    </div>

    <div class="ev-field">
      <label>Horário</label>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
        <input type="time" name="evento_hora_inicio" value="<?php echo esc_attr($hora_ini); ?>" placeholder="09:00">
        <input type="time" name="evento_hora_fim" value="<?php echo esc_attr($hora_fim); ?>" placeholder="17:00">
      </div>
      <small style="color:#6b7280;">Se não quiser horário, pode deixar em branco.</small>
    </div>

    <div class="ev-field ev-wide">
      <label>Território (opcional)</label>
      <select name="evento_territorio_id">
        <option value="">— Evento geral (sem território) —</option>
        <?php foreach ($territorios as $tid) : ?>
          <option value="<?php echo (int) $tid; ?>" <?php selected((string)$territorio, (string)$tid); ?>>
            <?php echo esc_html(get_the_title($tid)); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <small style="color:#6b7280;">Se selecionar um Território, o evento aparece também na página dele.</small>
    </div>

    <div class="ev-field">
      <label>Local (nome do espaço)</label>
      <input type="text" name="evento_local" value="<?php echo esc_attr($local); ?>" placeholder="Centro de Formação XYZ">
    </div>

    <div class="ev-field">
      <label>Endereço</label>
      <input type="text" name="evento_endereco" value="<?php echo esc_attr($endereco); ?>" placeholder="Rua das Mangueiras, 300 – Codó/MA">
    </div>

  </div>

  <?php
}

add_action('save_post_evento', function ($post_id) {
  if (!isset($_POST['territorios_evento_nonce']) || !wp_verify_nonce($_POST['territorios_evento_nonce'], 'territorios_evento_save')) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!current_user_can('edit_post', $post_id)) return;

  $data     = isset($_POST['evento_data']) ? sanitize_text_field(wp_unslash($_POST['evento_data'])) : '';
  $ini      = isset($_POST['evento_hora_inicio']) ? sanitize_text_field(wp_unslash($_POST['evento_hora_inicio'])) : '';
  $fim      = isset($_POST['evento_hora_fim']) ? sanitize_text_field(wp_unslash($_POST['evento_hora_fim'])) : '';
  $local    = isset($_POST['evento_local']) ? sanitize_text_field(wp_unslash($_POST['evento_local'])) : '';
  $endereco = isset($_POST['evento_endereco']) ? sanitize_text_field(wp_unslash($_POST['evento_endereco'])) : '';

  $territorio_id = isset($_POST['evento_territorio_id']) ? (int) $_POST['evento_territorio_id'] : 0;
  if ($territorio_id < 1) $territorio_id = '';

  update_post_meta($post_id, 'evento_data', $data);
  update_post_meta($post_id, 'evento_hora_inicio', $ini);
  update_post_meta($post_id, 'evento_hora_fim', $fim);
  update_post_meta($post_id, 'evento_local', $local);
  update_post_meta($post_id, 'evento_endereco', $endereco);
  update_post_meta($post_id, 'evento_territorio_id', $territorio_id);

  // chave auxiliar para ordenar facilmente por data (e permitir orderby meta_value)
  update_post_meta($post_id, 'evento_data_ordenacao', $data);
});



// Post -> Território (opcional) via meta: post_territorio_id
add_action('add_meta_boxes', function () {
  add_meta_box(
    'tc_post_territorio',
    'Território (opcional)',
    'tc_post_territorio_metabox_cb',
    'post',
    'side',
    'default'
  );
});

function tc_post_territorio_metabox_cb($post) {
  wp_nonce_field('tc_post_territorio_save', 'tc_post_territorio_nonce');

  $selected = get_post_meta($post->ID, 'post_territorio_id', true);

  $territorios = get_posts([
    'post_type'      => 'territorio',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => 'title',
    'order'          => 'ASC',
    'fields'         => 'ids',
  ]);

  echo '<p style="margin:0 0 8px;">Selecione um território para vincular este post (ou deixe como Geral).</p>';

  echo '<select name="post_territorio_id" style="width:100%;">';
  echo '<option value="">— Geral (sem território) —</option>';

  foreach ($territorios as $tid) {
    printf(
      '<option value="%s" %s>%s</option>',
      esc_attr($tid),
      selected((string)$selected, (string)$tid, false),
      esc_html(get_the_title($tid))
    );
  }

  echo '</select>';
}

add_action('save_post_post', function ($post_id) {
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!isset($_POST['tc_post_territorio_nonce']) || !wp_verify_nonce($_POST['tc_post_territorio_nonce'], 'tc_post_territorio_save')) return;
  if (!current_user_can('edit_post', $post_id)) return;

  $val = isset($_POST['post_territorio_id']) ? sanitize_text_field($_POST['post_territorio_id']) : '';
  if ($val === '') {
    delete_post_meta($post_id, 'post_territorio_id');
  } else {
    update_post_meta($post_id, 'post_territorio_id', (int)$val);
  }
});

add_action('admin_enqueue_scripts', function ($hook) {

  // Só carrega no editor de post
  if (!in_array($hook, ['post.php', 'post-new.php'])) {
    return;
  }

  wp_enqueue_style(
    'territorios-admin',
    get_template_directory_uri() . '/assets/admin/admin.css',
    [],
    '1.0'
  );

  wp_enqueue_script(
    'territorios-admin-js',
    get_template_directory_uri() . '/assets/admin/admin.js',
    ['jquery'],
    '1.0',
    true
  );

});


/**
 * -------------------------------------------------------
 * CPT: Galerias
 * - Cada galeria pode ter várias imagens (meta: galeria_imagens[])
 * - Pode (ou não) estar ligada a um território (meta: galeria_territorio_id)
 * -------------------------------------------------------
 */
add_action('init', function () {

  register_post_type('galeria', [
    'labels' => [
      'name'          => 'Galerias',
      'singular_name' => 'Galeria',
      'add_new_item'  => 'Adicionar nova Galeria',
      'edit_item'     => 'Editar Galeria',
      'menu_name'     => 'Galerias',
    ],
    'public'       => true,
    'show_in_rest' => true,
    'menu_icon'    => 'dashicons-format-gallery',
    'supports'     => ['title', 'thumbnail'], // sem editor (limpo)
    'has_archive'  => true,
    'rewrite'      => [
      'slug'       => 'galerias',
      'with_front' => false,
    ],
  ]);

});


/**
 * -------------------------------------------------------
 * ADMIN (Galeria): enqueue CSS/JS + wp.media
 * -------------------------------------------------------
 */
add_action('admin_enqueue_scripts', function ($hook) {
  if (!in_array($hook, ['post.php', 'post-new.php'])) return;

  $screen = get_current_screen();
  if (!$screen || $screen->post_type !== 'galeria') return;

  wp_enqueue_media();

  // opcional: reusar seu admin.css (se quiser)
  // wp_enqueue_style('territorios-admin', get_template_directory_uri().'/assets/admin/admin.css', [], '1.0');

  wp_enqueue_script(
    'territorios-galeria-admin',
    get_template_directory_uri() . '/assets/admin/galeria-admin.js',
    ['jquery'],
    '1.0.0',
    true
  );
});


/**
 * -------------------------------------------------------
 * Metabox: Dados da Galeria (território + múltiplas imagens)
 * -------------------------------------------------------
 */
add_action('add_meta_boxes', function () {
  add_meta_box(
    'galeria_meta',
    'Galeria (Imagens e Território)',
    'territorios_render_galeria_metabox',
    'galeria',
    'normal',
    'high'
  );

  // limpa tela
  remove_meta_box('slugdiv', 'galeria', 'normal');
  remove_meta_box('authordiv', 'galeria', 'normal');
  remove_meta_box('commentstatusdiv', 'galeria', 'normal');
  remove_meta_box('commentsdiv', 'galeria', 'normal');
});


function territorios_render_galeria_metabox($post) {
  wp_nonce_field('territorios_galeria_save', 'territorios_galeria_nonce');

  $territorio_id = get_post_meta($post->ID, 'galeria_territorio_id', true);
  $imagens       = get_post_meta($post->ID, 'galeria_imagens', true);
  if (!is_array($imagens)) $imagens = [];

  $territorios = get_posts([
    'post_type'      => 'territorio',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => 'title',
    'order'          => 'ASC',
    'fields'         => 'ids',
  ]);

  ?>
  <style>
    .tg-wrap{display:grid;grid-template-columns: 1fr;gap:14px}
    .tg-field label{display:block;font-weight:600;margin:0 0 6px}
    .tg-field select{width:100%}
    .tg-actions{display:flex;gap:10px;flex-wrap:wrap;margin-top:8px}
    .tg-grid{display:grid;grid-template-columns: repeat(6, 1fr);gap:10px;margin-top:10px}
    .tg-thumb{position:relative;border:1px solid #e5e7eb;border-radius:10px;overflow:hidden;background:#fff}
    .tg-thumb img{width:100%;height:90px;object-fit:cover;display:block}
    .tg-remove{position:absolute;top:6px;right:6px;background:#111827;color:#fff;border:0;border-radius:999px;padding:2px 7px;cursor:pointer;font-size:12px}
    .tg-help{color:#6b7280;font-size:12px;margin:6px 0 0}
    @media(max-width:1100px){.tg-grid{grid-template-columns: repeat(4, 1fr)}}
    @media(max-width:782px){.tg-grid{grid-template-columns: repeat(3, 1fr)}}
  </style>

  <div class="tg-wrap">

    <div class="tg-field">
      <label>Território (opcional)</label>
      <select name="galeria_territorio_id">
        <option value="">— Geral (sem território) —</option>
        <?php foreach ($territorios as $tid): ?>
          <option value="<?php echo (int)$tid; ?>" <?php selected((string)$territorio_id, (string)$tid); ?>>
            <?php echo esc_html(get_the_title($tid)); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <p class="tg-help">Se não selecionar, esta galeria aparece na aba <strong>Geral</strong>.</p>
    </div>

    <div class="tg-field">
      <label>Imagens da galeria</label>

      <input type="hidden" id="galeria_imagens" name="galeria_imagens" value="<?php echo esc_attr(implode(',', array_map('intval', $imagens))); ?>">

      <div class="tg-actions">
        <button type="button" class="button button-primary" id="tg_add_images">Adicionar / Selecionar imagens</button>
        <button type="button" class="button" id="tg_clear_images">Limpar</button>
      </div>

      <div class="tg-grid" id="tg_preview">
        <?php foreach ($imagens as $att_id): ?>
          <?php
            $src = wp_get_attachment_image_url((int)$att_id, 'thumbnail');
            if (!$src) continue;
          ?>
          <div class="tg-thumb" data-id="<?php echo (int)$att_id; ?>">
            <img src="<?php echo esc_url($src); ?>" alt="">
            <button type="button" class="tg-remove" title="Remover">×</button>
          </div>
        <?php endforeach; ?>
      </div>

      <p class="tg-help">Dica: você pode selecionar várias imagens de uma vez na Biblioteca de Mídia.</p>
    </div>

  </div>
  <?php
}


add_action('save_post_galeria', function ($post_id) {
  if (!isset($_POST['territorios_galeria_nonce']) || !wp_verify_nonce($_POST['territorios_galeria_nonce'], 'territorios_galeria_save')) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!current_user_can('edit_post', $post_id)) return;

  $territorio_id = isset($_POST['galeria_territorio_id']) ? (int) $_POST['galeria_territorio_id'] : 0;
  if ($territorio_id < 1) $territorio_id = '';
  update_post_meta($post_id, 'galeria_territorio_id', $territorio_id);

  // imagens (CSV -> array int)
  $csv = isset($_POST['galeria_imagens']) ? sanitize_text_field(wp_unslash($_POST['galeria_imagens'])) : '';
  $ids = array_filter(array_map('intval', explode(',', $csv)));
  update_post_meta($post_id, 'galeria_imagens', $ids);
});


add_action('template_redirect', function () {
    if (is_singular('galeria')) {

        $galeria_id = get_queried_object_id();
        $territorio_id = (int) get_post_meta($galeria_id, 'galeria_territorio_id', true);

        // default: geral
        $url = get_post_type_archive_link('galeria');

        // se tiver território, redireciona pra aba correta
        if ($territorio_id > 0) {
            $territorio = get_post($territorio_id);
            if ($territorio && $territorio->post_status === 'publish') {
                $url = add_query_arg('tab', $territorio->post_name, $url);
            }
        }

        wp_redirect($url, 301);
        exit;
    }
});


/**
 * -------------------------------------------------------
 * CPT: Podcast (episódios)
 * -------------------------------------------------------
 */
add_action('init', function () {

  register_post_type('podcast', [
    'labels' => [
      'name'          => 'Podcast',
      'singular_name' => 'Episódio',
      'add_new_item'  => 'Adicionar novo Episódio',
      'edit_item'     => 'Editar Episódio',
      'menu_name'     => 'Podcast',
    ],
    'public'       => true,
    'show_in_rest' => true,
    'menu_icon'    => 'dashicons-microphone',
    'supports'     => ['title', 'excerpt', 'thumbnail'],
    'has_archive'  => true,
    'rewrite'      => [
      'slug'       => 'podcast',
      'with_front' => false,
    ],
  ]);

});


/**
 * -------------------------------------------------------
 * Metabox: Dados do Episódio (Spotify + Território)
 * Meta keys:
 * - podcast_spotify_url
 * - podcast_territorio_id (opcional; vazio = Geral)
 * -------------------------------------------------------
 */
add_action('add_meta_boxes', function () {
  add_meta_box(
    'podcast_dados_meta',
    'Dados do Episódio',
    'territorios_render_podcast_metabox',
    'podcast',
    'normal',
    'high'
  );
});

function territorios_render_podcast_metabox($post) {
  wp_nonce_field('territorios_podcast_save', 'territorios_podcast_nonce');

  $spotify_url = get_post_meta($post->ID, 'podcast_spotify_url', true);
  $territorio  = get_post_meta($post->ID, 'podcast_territorio_id', true);

  $territorios = get_posts([
    'post_type'      => 'territorio',
    'posts_per_page' => 200,
    'post_status'    => 'publish',
    'orderby'        => 'title',
    'order'          => 'ASC',
    'fields'         => 'ids',
  ]);
  ?>
  <style>
    .pc-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px}
    .pc-field label{display:block;font-weight:600;margin-bottom:6px}
    .pc-field input,.pc-field select{width:100%}
    .pc-wide{grid-column:1 / -1}
    @media(max-width:900px){.pc-grid{grid-template-columns:1fr}}
  </style>

  <div class="pc-grid">

    <div class="pc-field pc-wide">
      <label>Link do Spotify (episódio ou show)</label>
      <input
        type="url"
        name="podcast_spotify_url"
        value="<?php echo esc_attr($spotify_url); ?>"
        placeholder="https://open.spotify.com/episode/... ou https://open.spotify.com/show/..."
      >
      <small style="color:#6b7280;">
        Cole a URL normal do Spotify. No front-end você pode usar o helper <code>tc_spotify_embed_html()</code>.
      </small>
    </div>

    <div class="pc-field pc-wide">
      <label>Território (opcional)</label>
      <select name="podcast_territorio_id">
        <option value="">— Geral (sem território) —</option>
        <?php foreach ($territorios as $tid) : ?>
          <option value="<?php echo (int)$tid; ?>" <?php selected((string)$territorio, (string)$tid); ?>>
            <?php echo esc_html(get_the_title($tid)); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <small style="color:#6b7280;">
        Se selecionar, este episódio aparece na página daquele território. Se não selecionar, é “Geral”.
      </small>
    </div>

  </div>
  <?php
}

add_action('save_post_podcast', function ($post_id) {
  if (!isset($_POST['territorios_podcast_nonce']) || !wp_verify_nonce($_POST['territorios_podcast_nonce'], 'territorios_podcast_save')) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!current_user_can('edit_post', $post_id)) return;

  $spotify_url = isset($_POST['podcast_spotify_url'])
    ? esc_url_raw(trim(wp_unslash($_POST['podcast_spotify_url'])))
    : '';

  $territorio_id = isset($_POST['podcast_territorio_id']) ? (int) $_POST['podcast_territorio_id'] : 0;

  // salva URL (se vazia, remove)
  if ($spotify_url === '') {
    delete_post_meta($post_id, 'podcast_spotify_url');
  } else {
    update_post_meta($post_id, 'podcast_spotify_url', $spotify_url);
  }

  // território (se vazio/0, remove pra virar "Geral")
  if ($territorio_id < 1) {
    delete_post_meta($post_id, 'podcast_territorio_id');
  } else {
    update_post_meta($post_id, 'podcast_territorio_id', $territorio_id);
  }
});


/**
 * -------------------------------------------------------
 * Helper: gerar embed do Spotify a partir da URL
 * - tenta oEmbed do WP
 * - fallback para iframe /embed
 * -------------------------------------------------------
 */
function tc_spotify_embed_html($spotify_url) {
  $spotify_url = trim((string)$spotify_url);
  if ($spotify_url === '') return '';

  // 1) tenta oEmbed do WP (se o provider estiver habilitado no seu WP)
  $html = wp_oembed_get($spotify_url, ['height' => 152, 'width' => '100%']);
  if ($html) return $html;

  // 2) fallback: montar embed url
  $embed = '';

  if (preg_match('~open\.spotify\.com/(episode|show)/([a-zA-Z0-9]+)~', $spotify_url, $m)) {
    $type = $m[1];
    $id   = $m[2];
    $embed = "https://open.spotify.com/embed/{$type}/{$id}";
  }

  if (!$embed) return '';

  // sanitiza iframe
  return wp_kses(
    '<iframe style="border-radius:12px;" src="' . esc_url($embed) . '" width="100%" height="152" frameborder="0" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>',
    [
      'iframe' => [
        'style' => true,
        'src' => true,
        'width' => true,
        'height' => true,
        'frameborder' => true,
        'allow' => true,
        'loading' => true,
      ]
    ]
  );
}


/**
 * -------------------------------------------------------
 * Podcast: bloquear SINGLE
 * - Se acessar /podcast/slug/, redireciona para o território vinculado
 * - Se não tiver território, cai para home (ou ajuste para onde quiser)
 * - Também marca como noindex/nofollow
 * -------------------------------------------------------
 */

// 1) Redirecionar single podcast -> território
add_action('template_redirect', function () {
  if (!is_singular('podcast')) return;

  $podcast_id = get_queried_object_id();
  $territorio_id = (int) get_post_meta($podcast_id, 'podcast_territorio_id', true);

  // destino padrão (ajuste se preferir: archive de territórios, página /podcast/, etc)
  $dest = home_url('/');

  // se tem território válido, vai pro single do território
  if ($territorio_id > 0) {
    $t = get_post($territorio_id);
    if ($t && $t->post_type === 'territorio' && $t->post_status === 'publish') {
      $dest = get_permalink($territorio_id);
    }
  }

  // Use 302 para não “cravar” cache/SEO do single.
  // Se você tem certeza absoluta que nunca vai existir single podcast, pode trocar para 301.
  wp_safe_redirect($dest, 302);
  exit;
}, 1);

// 2) Marcar como "noindex" caso alguém acesse o single
add_filter('wp_robots', function ($robots) {
  if (is_singular('podcast')) {
    $robots['noindex'] = true;
    $robots['nofollow'] = true;
    $robots['noarchive'] = true;
  }
  return $robots;
});
