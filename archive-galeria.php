<?php
/**
 * Archive Galerias
 * URL: /galerias/
 *
 * @package Territorios
 */
get_header();

// aba atual (slug do território) ou "geral"
$tab = isset($_GET['tab']) ? sanitize_text_field(wp_unslash($_GET['tab'])) : 'geral';

// lista de territórios (abas)
$territorios = get_posts([
  'post_type'      => 'territorio',
  'post_status'    => 'publish',
  'posts_per_page' => -1,
  'orderby'        => 'title',
  'order'          => 'ASC',
]);

// resolver território da aba
$territorio_id = 0;
$tab_label = 'Geral';

if ($tab !== 'geral') {
  foreach ($territorios as $t) {
    if ($t->post_name === $tab) {
      $territorio_id = (int) $t->ID;
      $tab_label = $t->post_title;
      break;
    }
  }
  if (!$territorio_id) {
    $tab = 'geral';
    $tab_label = 'Geral';
  }
}

// query de galerias por aba
$args = [
  'post_type'      => 'galeria',
  'post_status'    => 'publish',
  'posts_per_page' => -1,
  'orderby'        => 'date',
  'order'          => 'DESC',
];

if ($tab === 'geral') {
  // gerais = sem meta ou meta vazio
  $args['meta_query'] = [
    'relation' => 'OR',
    [
      'key'     => 'galeria_territorio_id',
      'compare' => 'NOT EXISTS',
    ],
    [
      'key'     => 'galeria_territorio_id',
      'value'   => '',
      'compare' => '=',
    ],
    [
      'key'     => 'galeria_territorio_id',
      'value'   => 0,
      'compare' => '=',
    ],
  ];
} else {
  $args['meta_query'] = [
    [
      'key'     => 'galeria_territorio_id',
      'value'   => $territorio_id,
      'compare' => '=',
    ],
  ];
}

$galerias = get_posts($args);

// helper: pega imagens da galeria
$galeria_get_images = function($galeria_id) {
  $ids = get_post_meta($galeria_id, 'galeria_imagens', true);
  if (!is_array($ids)) $ids = [];
  $ids = array_values(array_filter(array_map('intval', $ids)));

  $out = [];
  foreach ($ids as $att_id) {
    $full  = wp_get_attachment_image_url($att_id, 'full');
    $thumb = wp_get_attachment_image_url($att_id, 'large');
    if (!$thumb) $thumb = wp_get_attachment_image_url($att_id, 'full');
    if (!$full || !$thumb) continue;

    $out[] = [
      'att_id' => $att_id,
      'full'   => $full,
      'thumb'  => $thumb,
      'alt'    => get_post_meta($att_id, '_wp_attachment_image_alt', true),
    ];
  }
  return $out;
};

?>

<!--===== BREADCRUMB AREA STARTS =======-->
<section class="vl-breadcrumb" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/breadcrumb/vl-gallery-breadcrumb.png);">
  <div class="container">
    <div class="row">
      <div class="col-xl-6">
        <div class="vl-breadcrumb-title">
          <h2 class="heading">Galeria</h2>
          <div class="vl-breadcrumb-list">
            <span><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></span>
            <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>
            <span><a href="<?php echo esc_url(get_post_type_archive_link('galeria')); ?>">Galeria</a></span>
            <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>
            <span><a class="active" href="<?php echo esc_url(($tab === 'geral') ? get_post_type_archive_link('galeria') : add_query_arg('tab', $tab, get_post_type_archive_link('galeria'))); ?>">
              <?php echo esc_html($tab_label); ?>
            </a></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--===== BREADCRUMB AREA ENDS =======-->

<!--===== descrição AREA STARTS =======-->
<section class="vl-about5 sp2">
  <div class="container">
    <div class="vl-section-title-1">
      <h2 class="title">Entre luzes, gestos e afetos, o cuidado ganha forma.</h2>
      <p>
        Há gestos que não cabem em palavras.
        Há encontros que se revelam no silêncio de um olhar, no traço de uma dança, no brilho de uma manhã.
        Esta galeria é feita de instantes que resistem ao tempo — memórias que brotam do chão, do afeto, da luta.
        Cada fotografia é um testemunho do que pulsa: cuidado, comunidade, vida em movimento.
        Deixe que as imagens falem. Elas sabem contar o que não se escreve.
      </p>
    </div>
  </div>
</section>
<!--===== descrição AREA ENDS =======-->

<!--===== GALLERY AREA STARTS =======-->
<section class="vl-gallery-section sp2">
  <div class="container">

    <!-- Abas -->
    <div class="row">
      <div class="col-12">
        <div class="vl-tabs-wrap mb-30">
          <ul class="nav nav-tabs" style="flex-wrap:wrap; gap:8px;">
            <li class="nav-item">
              <a class="nav-link <?php echo ($tab === 'geral') ? 'active' : ''; ?>"
                 href="<?php echo esc_url(get_post_type_archive_link('galeria')); ?>">
                 Geral
              </a>
            </li>

            <?php foreach ($territorios as $t): ?>
              <?php
                $is_active = ($tab === $t->post_name);
                $url = add_query_arg('tab', $t->post_name, get_post_type_archive_link('galeria'));
              ?>
              <li class="nav-item">
                <a class="nav-link <?php echo $is_active ? 'active' : ''; ?>"
                   href="<?php echo esc_url($url); ?>">
                  <?php echo esc_html($t->post_title); ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>

    <!-- Accordion (um item por galeria) -->
    <div class="row">
      <div class="col-12">

        <?php if (!empty($galerias)) : ?>

          <div class="accordion" id="galeriasAccordion">

            <?php foreach ($galerias as $index => $g) : ?>
              <?php
                $images = $galeria_get_images($g->ID);
                if (empty($images)) continue;

                $acc_item_id = 'galeriaAccItem-' . (int)$g->ID;
                $acc_collapse_id = 'galeriaCollapse-' . (int)$g->ID;

                // você pediu “já expandido”: então todos abertos
                $is_open = true;

                // Se quiser só o primeiro aberto, troque por:
                // $is_open = ($index === 0);

                $btn_class = $is_open ? '' : 'collapsed';
                $collapse_class = $is_open ? 'accordion-collapse collapse show' : 'accordion-collapse collapse';
                $aria_expanded = $is_open ? 'true' : 'false';

                $title = get_the_title($g->ID);
              ?>

              <div class="accordion-item" id="<?php echo esc_attr($acc_item_id); ?>" style="border-radius:14px; overflow:hidden; margin-bottom:14px;">
                <h2 class="accordion-header" id="<?php echo esc_attr('heading-' . $g->ID); ?>">
                  <button class="accordion-button <?php echo esc_attr($btn_class); ?>"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#<?php echo esc_attr($acc_collapse_id); ?>"
                          aria-expanded="<?php echo esc_attr($aria_expanded); ?>"
                          aria-controls="<?php echo esc_attr($acc_collapse_id); ?>">
                    <?php echo esc_html($title); ?>
                  </button>
                </h2>

                <div id="<?php echo esc_attr($acc_collapse_id); ?>"
                     class="<?php echo esc_attr($collapse_class); ?>"
                     aria-labelledby="<?php echo esc_attr('heading-' . $g->ID); ?>"
                     >

                  <div class="accordion-body">
                    <div class="row">
                      <?php foreach ($images as $img) : ?>
                        <?php
                          $alt = $img['alt'] ? $img['alt'] : $title;
                        ?>
                        <div class="col-lg-4 col-md-6 mb-30">
                          <div class="vl-single-box vl-single-box-inner-h420">
                            <a href="<?php echo esc_url($img['full']); ?>"
                               data-lightbox="<?php echo esc_attr('galeria-' . (int)$g->ID); ?>"
                               data-title="<?php echo esc_attr($title); ?>">
                              <img class="w-100" src="<?php echo esc_url($img['thumb']); ?>" alt="<?php echo esc_attr($alt); ?>">
                            </a>

                            <a href="<?php echo esc_url($img['full']); ?>"
                               data-lightbox="<?php echo esc_attr('galeria-' . (int)$g->ID); ?>"
                               data-title="<?php echo esc_attr($title); ?>"
                               class="search-ic">
                              <span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icons/vl-gallery-search-1.1.svg" alt=""></span>
                            </a>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>

                </div>
              </div>

            <?php endforeach; ?>

          </div>

        <?php else : ?>
          <p>Nenhuma galeria encontrada para esta aba.</p>
        <?php endif; ?>

      </div>
    </div>

  </div>
</section>
<!--===== GALLERY AREA ENDS =======-->

<!--===== CTA AREA STARTS =======-->
<section class="vl-cta">
  <div class="container">
    <div class="vl-cta-bg" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/cta/vl-cta-1.1.png);">
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
                  <button class="header-btn1">Enviar <span><i class="fa-solid fa-arrow-right"></i></span></button>
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

<?php get_footer(); ?>
