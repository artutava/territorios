<?php
/**
 * Template: Single Território (CPT: territorio)
 * Arquivo: single-territorio.php
 *
 * - Breadcrumb: usa a imagem destacada como fundo (fallback para imagem default do template)
 * - Título: the_title()
 * - Resumo: excerpt (fallback para conteúdo resumido)
 * - Conteúdo: the_content()
 * - Região: pega a taxonomia "regiao" e monta breadcrumb/link
 *
 * @package Territorios
 */

get_header();

if (have_posts()) : while (have_posts()) : the_post();

  $post_id = get_the_ID();

  // Região (taxonomia: regiao) - pega a primeira (se houver)
  $regioes = get_the_terms($post_id, 'regiao');
  $regiao  = (!empty($regioes) && !is_wp_error($regioes)) ? $regioes[0] : null;

  $regiao_name = $regiao ? $regiao->name : 'Regiões';
  $regiao_link = $regiao ? get_term_link($regiao) : home_url('/regioes/');

  // Breadcrumb background: featured image (fallback -> imagem do template)
  $breadcrumb_bg = get_template_directory_uri() . '/assets/img/breadcrumb/vl-cause-singlebreadcrumb.png';
  if (has_post_thumbnail($post_id)) {
    $img = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full');
    if (!empty($img[0])) $breadcrumb_bg = $img[0];
  }

  // Resumo: excerpt ou fallback de conteúdo
  $resumo = '';
  if (has_excerpt($post_id)) {
    $resumo = get_the_excerpt($post_id);
  } else {
    $resumo = wp_trim_words(wp_strip_all_tags(get_the_content(null, false, $post_id)), 24, '...');
  }

?>
  <!--===== BREADCRUMB AREA STARTS =======-->
  <section class="vl-breadcrumb" style="background-image: url(<?php echo esc_url($breadcrumb_bg); ?>);">
    <div class="container">
      <div class="row">
        <div class="col-xl-8">
          <div class="vl-breadcrumb-title">
            <div class="vl-breadcrumb-list">
              <span><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></span>
              <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>

              <span>
                <a class="" href="<?php echo esc_url(is_wp_error($regiao_link) ? home_url('/') : $regiao_link); ?>">
                  <?php echo esc_html($regiao_name); ?>
                </a>
              </span>
              <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>

              <span><a class="active" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
            </div>

            <h2 class="heading"><?php the_title(); ?></h2>

            <p class="vl-breadcrumb-list">
              <span><?php echo esc_html(wp_strip_all_tags($resumo)); ?></span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--===== BREADCRUMB AREA ENDS =======-->


  <!--===== HERO AREA STARTS =======-->
  <div class="vl-banner vl-banner-area-7 p-relative">
    <div class="vl-hero-bg-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-xl-7">
            <div class="vl-banner-6">
              <div class="vl-section-title vl-section-title-7">
                <h2 class="vl-title text-anime-style-3">Números do Território</h2>
                <p data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                  <?php echo esc_html(wp_strip_all_tags($resumo)); ?>
                </p>
              </div>
            </div>
          </div>

          <div class="col-xl-5">
            <?php
                $defaults = [
                1 => ['prefix' => '',  'number' => '232', 'suffix' => 'K',  'label' => 'Pessoas mobilizadas diretamente'],
                2 => ['prefix' => '+', 'number' => '40',  'suffix' => '',   'label' => 'Ações e articulações comunitárias'],
                3 => ['prefix' => '',  'number' => '50',  'suffix' => 'K',  'label' => 'Ciclos de formação previstos'],
                4 => ['prefix' => '',  'number' => '35',  'suffix' => 'K+', 'label' => 'Impacto estimado em rede'],
                ];

                $counters = [];
                for ($i=1; $i<=4; $i++) {
                $counters[$i] = [
                    'prefix' => get_post_meta($post_id, "territorio_counter_{$i}_prefix", true),
                    'number' => get_post_meta($post_id, "territorio_counter_{$i}_number", true),
                    'suffix' => get_post_meta($post_id, "territorio_counter_{$i}_suffix", true),
                    'label'  => get_post_meta($post_id, "territorio_counter_{$i}_label", true),
                ];

                // fallback se vazio
                foreach ($counters[$i] as $k => $v) {
                    if ($v === '' || $v === null) $counters[$i][$k] = $defaults[$i][$k];
                }
                }
                ?>

                <div class="vl-counter-wrap" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                <div class="row">
                    <?php for ($i=1; $i<=4; $i++) : ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="vl-wrp-counter">
                        <h4 class="title pb-18">
                            <?php if ($counters[$i]['prefix'] !== '') : ?>
                            <?php echo esc_html($counters[$i]['prefix']); ?>
                            <?php endif; ?>

                            <span class="counter"><?php echo esc_html($counters[$i]['number']); ?></span>

                            <?php if ($counters[$i]['suffix'] !== '') : ?>
                            <span><?php echo esc_html($counters[$i]['suffix']); ?></span>
                            <?php endif; ?>
                        </h4>
                        <p><?php echo esc_html($counters[$i]['label']); ?></p>
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>
                </div>

          </div>
        </div>

        <!-- Logos (mantido do template) -->
        <div class="swiper tp-brand-title-active">
          <div class="swiper-wrapper tp-slide-transtion">
            <div class="swiper-slide tp-brand-slide-element"><div class="tp-brand-title"><span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/brand/vl-brand-logo7.1.png'); ?>" alt=""></span></div></div>
            <div class="swiper-slide tp-brand-slide-element"><div class="tp-brand-title"><span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/brand/vl-brand-logo7.2.png'); ?>" alt=""></span></div></div>
            <div class="swiper-slide tp-brand-slide-element"><div class="tp-brand-title"><span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/brand/vl-brand-logo7.3.png'); ?>" alt=""></span></div></div>
            <div class="swiper-slide tp-brand-slide-element"><div class="tp-brand-title"><span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/brand/vl-brand-logo7.4.png'); ?>" alt=""></span></div></div>
            <div class="swiper-slide tp-brand-slide-element"><div class="tp-brand-title"><span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/brand/vl-brand-logo7.5.png'); ?>" alt=""></span></div></div>
            <div class="swiper-slide tp-brand-slide-element"><div class="tp-brand-title"><span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/brand/vl-brand-logo7.1.png'); ?>" alt=""></span></div></div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!--===== HERO AREA ENDS =======-->


  <!--===== Choose Area Start =======-->
  <section class="vl-choose-area-10 podcast-section">
    <div class="container">
      <div class="row align-items-center mb-40">
        <div class="col-lg-6">
          <div class="vl-choose-sec-title-10">
            <div class="vl-section-title-9">
              <h2 class="vl-title text-anime-style-3">Acesso Rápido</h2>
              <p>Acompanhe nossos registros dos eventos e oficinas de cuidado.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
          <a href="#galeria-section" class="vl-choose-icon-box-10 h-100 w-100 mb-3 px-2" style="text-decoration:none;">
            <div class="icon md-6">
              <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-choose-icon-10.1.svg'); ?>" alt=""></span>
            </div>
            <h2 class="title" style="text-align:center;">Galeria</h2>
          </a>
        </div>

        <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-duration="900" data-aos-delay="300">
          <a href="#material-section" class="vl-choose-icon-box-10 h-100 w-100 mb-3 px-2" style="text-decoration:none;">
            <div class="icon">
              <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-choose-icon-10.2.svg'); ?>" alt=""></span>
            </div>
            <h2 class="title center">Material Pedagógico</h2>
          </a>
        </div>

        <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
          <a href="#podcast-section" class="vl-choose-icon-box-10 h-100 w-100 mb-3 px-2" style="text-decoration:none;">
            <div class="icon">
              <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-choose-icon-10.3.svg'); ?>" alt=""></span>
            </div>
            <h2 class="title">Podcast</h2>
          </a>
        </div>

        <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
          <a href="#noticias-section" class="vl-choose-icon-box-10 h-100 w-100 mb-3 px-2" style="text-decoration:none;">
            <div class="icon">
              <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-choose-icon-10.4.svg'); ?>" alt=""></span>
            </div>
            <h2 class="title">Notícias Territoriais</h2>
          </a>
        </div>
      </div>

    </div>
  </section>


  <!--===== CONTEÚDO DO TERRITÓRIO (dinâmico) =======-->
<?php
// Conteúdo do Gutenberg (sem auto-imprimir), para checar se tem algo de verdade
$raw_content = get_the_content(null, false, $post_id);
$has_content = (trim(wp_strip_all_tags($raw_content)) !== '');
?>

<?php if ($has_content) : ?>
  <section class="sp2">
    <div class="container">
      <div class="territorio-content">
        <?php
        // Imprime o conteúdo com os filtros do WP (Gutenberg, shortcodes, embeds, etc.)
        echo apply_filters('the_content', $raw_content);
        ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php
$materiais = new WP_Query([
  'post_type'      => 'material',
  'posts_per_page' => 50,
  'post_status'    => 'publish',
  'orderby'        => 'date',
  'order'          => 'DESC',
  'meta_query'     => [
    [
      'key'     => 'territorio_id',
      'value'   => (string) $post_id,
      'compare' => '=',
    ],
  ],
]);

if ($materiais->have_posts()) :
  $default_icon = get_template_directory_uri() . '/assets/img/service/file_tc.png';
?>

<div class="container mb-50" id="material-section">
  <div class="row align-items-center">
    <div class="col-lg-6">
      <div class="vl-work-content-6">
        <div class="vl-section-title-9">
          <h2 class="vl-title text-anime-style-3">Materiais Pedagógicos</h2>
          <p>Material educativo que reúne práticas tradicionais de cuidado, alimentação, rituais e saúde comunitária, produzidas por moradores dos territórios.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row row-cols-1 row-cols-md-2 g-4 mt-4">

    <?php while ($materiais->have_posts()) : $materiais->the_post(); ?>
      <?php
      $material_id = get_the_ID();

      // ✅ LINK DO ARQUIVO: prioriza upload, depois URL externa
      $file_url = trim((string) get_post_meta($material_id, 'arquivo_upload', true));
      if ($file_url === '') {
        $file_url = trim((string) get_post_meta($material_id, 'arquivo_url', true));
      }

      // Título e descrição
      $title = get_the_title($material_id);
      $desc  = has_excerpt($material_id)
        ? get_the_excerpt($material_id)
        : wp_trim_words(wp_strip_all_tags(get_the_content(null, false, $material_id)), 18, '...');

      // Thumb: featured image ou padrão
      $thumb_url = $default_icon;
      if (has_post_thumbnail($material_id)) {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id($material_id), 'thumbnail');
        if (!empty($img[0])) $thumb_url = $img[0];
      }

      $has_file = ($file_url !== '');
      ?>

      <div class="col">
        <div class="card border-0 shadow-sm p-3 d-flex flex-row align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <img
              src="<?php echo esc_url($thumb_url); ?>"
              class="rounded-3 me-3"
              width="84"
              height="84"
              style="object-fit: cover;"
              alt="<?php echo esc_attr($title); ?>"
              loading="lazy"
            >
            <div>
              <h6 class="mb-1"><?php echo esc_html($title); ?></h6>
              <small class="fs-sm text-muted"><?php echo esc_html($desc); ?></small>
            </div>
          </div>

          <?php if ($has_file) : ?>
            <a
              href="<?php echo esc_url($file_url); ?>"
              class="btn btn-icon btn-secondary ms-3 flex-shrink-0"
              aria-label="<?php echo esc_attr('Download ' . $title); ?>"
              download
              target="_blank"
              rel="noopener"
            >
              <i class="fa-solid fa-download"></i>
            </a>
          <?php else : ?>
            <button
              type="button"
              class="btn btn-icon btn-secondary ms-3 flex-shrink-0"
              aria-label="<?php echo esc_attr('Arquivo não disponível para ' . $title); ?>"
              disabled
              style="opacity:.5; cursor:not-allowed;"
              title="Arquivo não cadastrado"
            >
              <i class="fa-solid fa-download"></i>
            </button>
          <?php endif; ?>

        </div>
      </div>

    <?php endwhile; wp_reset_postdata(); ?>

  </div>
</div>

<?php endif; ?>



<!--===== Galley AREA STARTS =======-->
<section class="vl-gallery-section sp2" id="galeria-section">
  <div class="vl-gallery-shape-7">
    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/shape/vl-gallery-hand-shape-7.1.svg'); ?>" alt="">
  </div>

  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="vl-work-content-6 mb-60">
          <div class="vl-section-title-9">
            <h2 class="vl-title text-anime-style-3">Galeria do Território</h2>
            <p>Acompanhe nossos registros dos eventos e oficinas de cuidado.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-60">
        <div class="vl-gallery-btn-9">
          <?php
            $territorio_id = get_the_ID();
            $galerias_url  = add_query_arg(
              'tab',
              get_post_field('post_name', $territorio_id),
              get_post_type_archive_link('galeria')
            );
          ?>
          <a href="<?php echo esc_url($galerias_url); ?>" class="primary-btn-9">
            Ver mais Registros <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-up-arrow-9.1.svg'); ?>" alt=""></span>
          </a>
        </div>
      </div>
    </div>

    <?php
      // Galerias do território (ordenadas por data DESC)
      $galerias = get_posts([
        'post_type'      => 'galeria',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'meta_query'     => [
          [
            'key'     => 'galeria_territorio_id',
            'value'   => (string) $territorio_id,
            'compare' => '=',
          ],
        ],
      ]);

      // Monta itens do grid (todas as fotos em sequência, agrupadas por galeria no lightbox)
      $items = [];
      foreach ($galerias as $g) {
        $ids = get_post_meta($g->ID, 'galeria_imagens', true);
        if (!is_array($ids)) $ids = [];
        $ids = array_values(array_filter(array_map('intval', $ids)));

        foreach ($ids as $att_id) {
          $full  = wp_get_attachment_image_url($att_id, 'full');
          $thumb = wp_get_attachment_image_url($att_id, 'large');
          if (!$thumb) $thumb = wp_get_attachment_image_url($att_id, 'full');
          if (!$full) continue;

          $items[] = [
            'full'         => $full,
            'thumb'        => $thumb,
            'lightbox_key' => 'galeria-' . (int) $g->ID,
          ];
        }
      }
    ?>

    <?php if (!empty($items)) : ?>
      <div class="row">
        <?php
          $aos = 900;
          foreach ($items as $item) :
            $aos = min(1300, $aos + 60);
        ?>
          <div class="col-lg-4 col-md-6 mb-30">
            <div class="vl-single-box" data-aos="zoom-in-up" data-aos-duration="<?php echo (int) $aos; ?>" data-aos-delay="300">
              <a href="<?php echo esc_url($item['full']); ?>" data-lightbox="<?php echo esc_attr($item['lightbox_key']); ?>">
                <img class="w-100" src="<?php echo esc_url($item['thumb']); ?>" alt="">
              </a>
              <a href="<?php echo esc_url($item['full']); ?>" data-lightbox="<?php echo esc_attr($item['lightbox_key']); ?>" class="search-ic search-ic-8">
                <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-gallery-search-1.1.svg'); ?>" alt=""></span>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else : ?>
      <div class="row">
        <div class="col-12">
          <p>Nenhuma imagem cadastrada para este território ainda.</p>
        </div>
      </div>
    <?php endif; ?>

  </div>
</section>
<!--===== Gallery AREA ENDS =======-->



<?php
$territorio_id = get_the_ID();

// 1) Episódios do território atual
$podcasts = get_posts([
  'post_type'      => 'podcast',
  'post_status'    => 'publish',
  'posts_per_page' => 3,
  'orderby'        => 'date',
  'order'          => 'DESC',
  'meta_query'     => [
    [
      'key'     => 'podcast_territorio_id',
      'value'   => (string) $territorio_id,
      'compare' => '=',
    ],
  ],
]);

// 2) Fallback: Geral (sem território)
if (empty($podcasts)) {
  $podcasts = get_posts([
    'post_type'      => 'podcast',
    'post_status'    => 'publish',
    'posts_per_page' => 3,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'meta_query'     => [
      'relation' => 'OR',
      ['key' => 'podcast_territorio_id', 'compare' => 'NOT EXISTS'],
      ['key' => 'podcast_territorio_id', 'value' => '', 'compare' => '='],
      ['key' => 'podcast_territorio_id', 'value' => 0, 'compare' => '='],
    ],
  ]);
}
?>

<?php if (!empty($podcasts)) : ?>
  <!--===== PODCAST SECTION START =======-->
  <section id="podcast-section" class="sp2" style="padding:80px 0; background:#f9f9f9;">
    <div class="container">

      <div class="row align-items-center mb-5">
        <div class="col-xl-7 mx-auto text-center">
          <h2 class="vl-title text-anime-style-3" style="font-weight:700; margin-bottom:15px;">
            Podcast do Território
          </h2>
          <p style="font-size:18px; color:#444;">
            Escute vozes, histórias e reflexões que fortalecem saberes e resistências comunitárias.
          </p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-7">
          <div style="border-radius:20px; overflow:hidden; background:#fff; padding:15px; box-shadow:0 4px 20px rgba(0,0,0,0.05);">

            <?php foreach ($podcasts as $p) : ?>
              <?php
                $spotify_url = get_post_meta($p->ID, 'podcast_spotify_url', true);
                $title = get_the_title($p->ID);
                $embed = function_exists('tc_spotify_embed_html') ? tc_spotify_embed_html($spotify_url) : '';
              ?>

              <?php if ($embed) : ?>
                <div style="margin-bottom:12px;">
                  <div style="font-weight:600; margin:0 0 8px; color:#111;">
                    
                  </div>
                  <?php echo $embed; ?>
                </div>
              <?php endif; ?>

            <?php endforeach; ?>

          </div>
        </div>
      </div>

    </div>
  </section>
  <!--===== PODCAST SECTION END =======-->
<?php endif; ?>


<?php
// Helpers
if (!function_exists('tc_mes_abrev_pt')) {
  function tc_mes_abrev_pt($m) {
    $map = ['JAN','FEV','MAR','ABR','MAI','JUN','JUL','AGO','SET','OUT','NOV','DEZ'];
    $idx = max(1, min(12, (int)$m)) - 1;
    return $map[$idx];
  }
}
if (!function_exists('tc_format_hora_pt')) {
  function tc_format_hora_pt($hhmm) {
    $hhmm = trim((string)$hhmm);
    if ($hhmm === '') return '';
    [$h,$min] = array_pad(explode(':', $hhmm), 2, '00');
    $h = (int)$h;
    $min = (int)$min;
    return $min === 0 ? "{$h}h" : "{$h}h" . str_pad((string)$min, 2, '0', STR_PAD_LEFT);
  }
}

// Contexto: se estiver no single-territorio, filtra (território atual + gerais)
// senão, mostra gerais (todos)
$current_territorio_id = (is_singular('territorio')) ? get_the_ID() : 0;
$today = date('Y-m-d');

$args = [
  'post_type'      => 'evento',
  'posts_per_page' => 10,
  'post_status'    => 'publish',
  'meta_key'       => 'evento_data_ordenacao',
  'orderby'        => 'meta_value',
  'order'          => 'ASC',
  'meta_query'     => [
    [
      'key'     => 'evento_data_ordenacao',
      'value'   => $today,
      'compare' => '>=',
      'type'    => 'DATE',
    ],
  ],
];

if ($current_territorio_id) {
  $args['meta_query'][] = [
    'relation' => 'OR',
    [
      'key'     => 'evento_territorio_id',
      'value'   => (string) $current_territorio_id,
      'compare' => '=',
    ],
    [
      'key'     => 'evento_territorio_id',
      'compare' => 'NOT EXISTS',
    ],
    [
      'key'     => 'evento_territorio_id',
      'value'   => '',
      'compare' => '=',
    ],
  ];
}

$eventos = new WP_Query($args);

if ($eventos->have_posts()) :
?>

<section class="vl-singlevent-iner" id="eventos-section">
  <div class="container">

    <!-- TÍTULO (SÓ APARECE SE TIVER EVENTO) -->
    <div class="row align-items-center mt-5">
      <div class="col-lg-6">
        <div class="vl-work-content-6">
          <div class="vl-section-title-9 mb-5">
            <h2 class="vl-title text-anime-style-3">Agenda do Território</h2>
            <p>
              Acompanhe oficinas, encontros e ações comunitárias.
              Participe das atividades e fortaleça as redes de cuidado no território.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="row">

      <?php while ($eventos->have_posts()) : $eventos->the_post(); ?>
        <?php
        $eid      = get_the_ID();
        $data     = get_post_meta($eid, 'evento_data', true);
        $ini      = get_post_meta($eid, 'evento_hora_inicio', true);
        $fim      = get_post_meta($eid, 'evento_hora_fim', true);
        $local    = get_post_meta($eid, 'evento_local', true);
        $endereco = get_post_meta($eid, 'evento_endereco', true);
        $tid      = get_post_meta($eid, 'evento_territorio_id', true);

        $ts = $data ? strtotime($data) : false;
        $day  = $ts ? date('d', $ts) : '--';
        $mon  = $ts ? tc_mes_abrev_pt(date('n', $ts)) : '--';
        $year = $ts ? date('Y', $ts) : '----';

        $hini = tc_format_hora_pt($ini);
        $hfim = tc_format_hora_pt($fim);
        $hora_txt = ($hini && $hfim) ? "{$hini} - {$hfim}" : ($hini ?: $hfim);

        $territorio_suffix = '';
        if (!empty($tid)) {
          $t_title = get_the_title((int)$tid);
          if ($t_title) $territorio_suffix = '  ' . $t_title;
        }

        $addr = trim($local . ($local && $endereco ? ', ' : '') . $endereco);
        ?>

        <div class="col-lg-12 mb-50">
          <div class="event-bg-flex active">

            <div class="event-date col-lg-1">
              <h3 class="title"><?php echo esc_html($day); ?></h3>
              <p class="year">
                <?php echo esc_html($mon); ?>
                <br class="d-none d-xl-block">
                <?php echo esc_html($year); ?>
              </p>
            </div>

            <div class="event-content">

              <?php if ($hora_txt) : ?>
                <div class="event-meta">
                  <p class="para">
                    <span><i class="fa-regular fa-clock"></i></span>
                    <?php echo esc_html($hora_txt); ?>
                  </p>
                </div>
              <?php endif; ?>

              <!-- SEM LINK -->
              <div class="title">
                <?php echo esc_html(get_the_title()); ?>
                <?php if ($territorio_suffix) : ?>
                  <br class="d-none d-xl-block">-<?php echo esc_html($territorio_suffix); ?>
                <?php endif; ?>
              </div>

              <?php if ($addr) : ?>
                <p class="para">
                  <span><i class="fa-solid fa-location-dot"></i></span>
                  <?php echo esc_html($addr); ?>
                </p>
              <?php endif; ?>

            </div>
          </div>
        </div>

      <?php endwhile; wp_reset_postdata(); ?>

    </div>
  </div>
</section>

<?php endif; ?>



 <?php
// Contexto: estamos num território?
$current_territorio_id = (is_singular('territorio')) ? get_the_ID() : 0;

$news_args = [
  'post_type'      => 'post',
  'post_status'    => 'publish',
  'posts_per_page' => 3,
  'orderby'        => 'date',
  'order'          => 'DESC',
];

if ($current_territorio_id) {
  // Território atual OU post geral
  $news_args['meta_query'] = [
    'relation' => 'OR',
    [
      'key'     => 'post_territorio_id',
      'value'   => (string) $current_territorio_id,
      'compare' => '=',
    ],
    [
      'key'     => 'post_territorio_id',
      'compare' => 'NOT EXISTS',
    ],
    [
      'key'     => 'post_territorio_id',
      'value'   => '',
      'compare' => '=',
    ],
  ];
} else {
  // Fora de um território: somente posts gerais (opcional)
  $news_args['meta_query'] = [
    'relation' => 'OR',
    [
      'key'     => 'post_territorio_id',
      'compare' => 'NOT EXISTS',
    ],
    [
      'key'     => 'post_territorio_id',
      'value'   => '',
      'compare' => '=',
    ],
  ];
}

$news = new WP_Query($news_args);

if ($news->have_posts()) :
  $fallback_img = get_template_directory_uri() . '/assets/img/blog/vl-blg-1.1.png';
?>

<!--===== Blog AREA STARTS =======-->
<section id="noticias-section" class="vl-blog4 sp2">
  <div class="container">

    <div class="row">
      <div class="col-xl-7">
        <div class="vl-section-title4 mb-30">
          <h2 class="title text-anime-style-3">
            <?php echo $current_territorio_id ? 'Últimas Notícias do Território' : 'Últimas Notícias'; ?>
          </h2>
        </div>
      </div>
    </div>

    <div class="row">
      <?php
      $i = 0;
      $posts_data = [];

      while ($news->have_posts()) : $news->the_post();
        $i++;
        $pid = get_the_ID();

        $img = has_post_thumbnail($pid)
          ? get_the_post_thumbnail_url($pid, 'large')
          : $fallback_img;

        $date = get_the_date('d \d\e F \d\e Y', $pid);
        $author = get_the_author();
        $title = get_the_title();
        $link  = get_permalink($pid);

        $excerpt = has_excerpt($pid)
          ? get_the_excerpt($pid)
          : wp_trim_words(wp_strip_all_tags(get_the_content(null, false, $pid)), 22, '...');

        $posts_data[] = compact('img','date','author','title','link','excerpt');
      endwhile;
      wp_reset_postdata();

      // Garantir 3 itens (se tiver menos, só renderiza o que tem)
      ?>

      <?php if (!empty($posts_data[0])) : ?>
        <div class="col-xl-6 col-lg-6">
          <div class="single-blog mb-30">
            <div class="blog-thumb">
              <img class="w-100" src="<?php echo esc_url($posts_data[0]['img']); ?>" alt="<?php echo esc_attr($posts_data[0]['title']); ?>">
            </div>

            <div class="blog-content">
              <div class="meta-flex">
                <div class="single-meta-box">
                  <div class="icon">
                    <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-calender-wh-4.1.svg'); ?>" alt=""></span>
                  </div>
                  <span class="para"><?php echo esc_html($posts_data[0]['date']); ?></span>
                </div>

                <div class="single-meta-box">
                  <div class="icon">
                    <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-user-wh-4.2.svg'); ?>" alt=""></span>
                  </div>
                  <span class="para"><?php echo esc_html($posts_data[0]['author']); ?></span>
                </div>
              </div>

              <div class="content">
                <a href="<?php echo esc_url($posts_data[0]['link']); ?>" class="title"><?php echo esc_html($posts_data[0]['title']); ?></a>
                <a href="<?php echo esc_url($posts_data[0]['link']); ?>" class="readmore">Leia mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <div class="col-xl-6 col-lg-6">
        <?php for ($k = 1; $k <= 2; $k++) : ?>
          <?php if (empty($posts_data[$k])) continue; ?>

          <div class="vl-single-blog-item4 mb-30" data-aos="zoom-in-up" data-aos-duration="1200" data-aos-delay="300">
            <div class="meta-flex">
              <div class="single-meta-box">
                <div class="icon">
                  <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-calender-blck4.1.svg'); ?>" alt=""></span>
                </div>
                <span class="para"><?php echo esc_html($posts_data[$k]['date']); ?></span>
              </div>

              <div class="single-meta-box">
                <div class="icon">
                  <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-user-blck4.2.svg'); ?>" alt=""></span>
                </div>
                <span class="para"><?php echo esc_html($posts_data[$k]['author']); ?></span>
              </div>
            </div>

            <div class="content">
              <a href="<?php echo esc_url($posts_data[$k]['link']); ?>" class="title"><?php echo esc_html($posts_data[$k]['title']); ?></a>
              <p class="para"><?php echo esc_html($posts_data[$k]['excerpt']); ?></p>
              <a href="<?php echo esc_url($posts_data[$k]['link']); ?>" class="readmore">Leia mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
            </div>
          </div>

        <?php endfor; ?>
      </div>

    </div>
  </div>
</section>
<!--===== Blog AREA ENDS =======-->

<?php endif; ?>



  <!--===== CTA AREA STARTS =======-->
  <section class="vl-cta">
    <div class="container">
      <div class="vl-cta-bg" style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/assets/img/cta/vl-cta-1.1.png'); ?>);">
        <div class="row">
          <div class="col-lg-12">
            <div class="vl-cta-content text-center">
              <h2 class="title text-anime-style-3">Sua ajuda fortalece territórios</h2>
              <p data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">
                Cada gesto de solidariedade apoia comunidades que enfrentam desafios e desastres, valorizando seus saberes,
                <br class="d-none d-xl-block">modos de vida e redes de cuidado. Com sua contribuição, promovemos saúde, equidade e participação social nos territórios.
              </p>
              <div class="vl-cta-form text-center mx-auto" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">
                <form action="#">
                  <input type="email" placeholder="Digite seu e-mail...">
                  <div class="btn-area vl-cta-btn1">
                    <button class="header-btn1" type="submit">Enviar <span><i class="fa-solid fa-arrow-right"></i></span></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--===== CTA AREA ENDS =======-->

<?php
endwhile; endif;

get_footer();
