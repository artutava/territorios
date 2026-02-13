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
            <!-- Contadores (placeholder): depois você pode trocar por campos custom -->
            <div class="vl-counter-wrap" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
              <div class="row">

                <div class="col-lg-6 col-md-6">
                  <div class="vl-wrp-counter">
                    <h4 class="title pb-18"><span class="counter">232</span><span>K</span></h4>
                    <p>Pessoas mobilizadas diretamente</p>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6">
                  <div class="vl-wrp-counter">
                    <h4 class="title pb-18">+ <span class="counter">40</span><span></span></h4>
                    <p>Ações e articulações comunitárias</p>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6">
                  <div class="vl-wrp-counter">
                    <h4 class="title pb-18"><span class="counter">50</span><span>K</span></h4>
                    <p>Ciclos de formação previstos</p>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6">
                  <div class="vl-wrp-counter">
                    <h4 class="title pb-18"><span class="counter">35</span><span>K+</span></h4>
                    <p>Impacto estimado em rede</p>
                  </div>
                </div>

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
            <a href="#" class="primary-btn-9">Ver mais Registros <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-up-arrow-9.1.svg'); ?>" alt=""></span></a>
          </div>
        </div>
      </div>

      <!-- Mantido como placeholder estático (você pode trocar depois por galeria real / ACF / CPT mídia) -->
      <div class="row">
        <div class="col-lg-6 col-md-6 mb-30">
          <div class="vl-single-box" data-aos="zoom-in-up" data-aos-duration="1000" data-aos-delay="300">
            <a href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vl-gallery-1.1.jpg'); ?>" data-lightbox="image-1">
              <img class="w-100" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vl-gallery-1.1.jpg'); ?>" alt="">
            </a>
            <a href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vl-gallery-1.1.jpg'); ?>" data-lightbox="image-1" class="search-ic search-ic-8">
              <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-gallery-search-1.1.svg'); ?>" alt=""></span>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-30">
          <div class="vl-single-box" data-aos="zoom-in-up" data-aos-duration="1100" data-aos-delay="300">
            <a href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vl-gallery-1.2.jpg'); ?>" data-lightbox="image-1">
              <img class="w-100" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vl-gallery-1.2.jpg'); ?>" alt="">
            </a>
            <a href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vl-gallery-1.2.jpg'); ?>" data-lightbox="image-1" class="search-ic search-ic-8">
              <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-gallery-search-1.1.svg'); ?>" alt=""></span>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-30">
          <div class="vl-single-box" data-aos="zoom-in-up" data-aos-duration="1200" data-aos-delay="300">
            <a href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vl-gallery-1.3.jpg'); ?>" data-lightbox="image-1">
              <img class="w-100" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vl-gallery-1.3.jpg'); ?>" alt="">
            </a>
            <a href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vl-gallery-1.3.jpg'); ?>" data-lightbox="image-1" class="search-ic search-ic-8">
              <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-gallery-search-1.1.svg'); ?>" alt=""></span>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-30">
          <div class="vl-single-box" data-aos="zoom-in-up" data-aos-duration="800" data-aos-delay="300">
            <a href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vl-gallery-thum-sm-3.1.jpg'); ?>" data-lightbox="image-1">
              <img class="w-100" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vl-gallery-thum-sm-3.1.jpg'); ?>" alt="">
            </a>
            <a href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vl-gallery-thum-sm-3.1.jpg'); ?>" data-lightbox="image-1" class="search-ic search-ic-8">
              <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-gallery-search-1.1.svg'); ?>" alt=""></span>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-30">
          <div class="vl-single-box" data-aos="zoom-in-up" data-aos-duration="800" data-aos-delay="300">
            <a href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vl-gallery-thum-sm-3.7.jpg'); ?>" data-lightbox="image-1">
              <img class="w-100" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vl-gallery-thum-sm-3.7.jpg'); ?>" alt="">
            </a>
            <a href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vl-gallery-thum-sm-3.7.jpg'); ?>" data-lightbox="image-1" class="search-ic search-ic-8">
              <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-gallery-search-1.1.svg'); ?>" alt=""></span>
            </a>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 mb-30">
          <div class="vl-single-box" data-aos="zoom-in-up" data-aos-duration="900" data-aos-delay="300">
            <a href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vl-gallery-thum-sm-3.8.jpg'); ?>" data-lightbox="image-1">
              <img class="w-100" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vl-gallery-thum-sm-3.8.jpg'); ?>" alt="">
            </a>
            <a href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vl-gallery-thum-sm-3.8.jpg'); ?>" data-lightbox="image-1" class="search-ic search-ic-8">
              <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-gallery-search-1.1.svg'); ?>" alt=""></span>
            </a>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!--===== Gallery AREA ENDS =======-->





  <!--===== PODCAST SECTION START =======-->
  <section id="podcast-section" class="sp2" style="padding:80px 0; background:#f9f9f9;">
    <div class="container">
      <div class="row align-items-center mb-5">
        <div class="col-xl-7 mx-auto text-center">
          <h2 class="vl-title text-anime-style-3" style="font-weight:700; margin-bottom:15px;">Podcast do Território</h2>
          <p style="font-size:18px; color:#444;">Escute vozes, histórias e reflexões que fortalecem saberes e resistências comunitárias.</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-7">
          <div style="border-radius:20px; overflow:hidden; background:#fff; padding:15px; box-shadow:0 4px 20px rgba(0,0,0,0.05);">
            <iframe style="border-radius:12px; margin-bottom:12px;" src="https://open.spotify.com/embed/show/6QyaRLzzNh8LjOYNJ2ey0E?utm_source=generator" width="100%" height="152" frameBorder="0" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
            <iframe style="border-radius:12px; margin-bottom:12px;" src="https://open.spotify.com/embed/episode/4MkPy99R1dR28XWw2BipBU?utm_source=generator" width="100%" height="152" frameBorder="0" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
            <iframe style="border-radius:12px;" src="https://open.spotify.com/embed/episode/6jNTEiV05IMyXuKiWpXKbo?utm_source=generator" width="100%" height="152" frameBorder="0" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--===== PODCAST SECTION END =======-->


  <!--===== EVENTS AREA STARTS (placeholder estático) =======-->
  <section id="eventos-section" class="vl-event-area sp1">
    <div class="container p-relative">
      <div class="row">
        <div class="col-xl-7">
          <div class="vl-section-title4 mb-60">
            <h2 class="title text-anime-style-3">Próximos Eventos no Território</h2>
            <p class="para" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
              Fique ligado no que acontece no Território mais próximo de você e marque presença nos nossos encontros
            </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div id="event4" class="owl-carousel owl-theme">

          <div class="vl-single-event4">
            <div class="thumb">
              <img class="w-100" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/event/vl-event-4.1.png'); ?>" alt="">
            </div>
            <div class="content">
              <div class="icon-flex">
                <div class="icon"><span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-event-clock4.1.svg'); ?>" alt=""></span></div>
                <div class="text"><a href="#" class="date">JAN 08, 2025</a> <br><span>( 11:00 AM )</span></div>
              </div>
              <a href="#" class="title">A Legacy of Love Senior Citizen Appreciation Day</a>
              <p class="para">This event is more than a gathering it’s a tribute to the resilience.</p>
              <a href="#" class="details">Events Details <span><i class="fa-solid fa-arrow-right"></i></span></a>
            </div>
          </div>

          <div class="vl-single-event4">
            <div class="thumb">
              <img class="w-100" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/event/vl-event-4.2.png'); ?>" alt="">
            </div>
            <div class="content">
              <div class="icon-flex">
                <div class="icon"><span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-event-clock4.1.svg'); ?>" alt=""></span></div>
                <div class="text"><a href="#" class="date">JAN 08, 2025</a> <br><span>( 11:00 AM )</span></div>
              </div>
              <a href="#" class="title">Seniors Making a Difference: A Community</a>
              <p class="para">Attendee will enjoy an evening filled heartfelt, inspiring speeches.</p>
              <a href="#" class="details">Events Details <span><i class="fa-solid fa-arrow-right"></i></span></a>
            </div>
          </div>

          <div class="vl-single-event4">
            <div class="thumb">
              <img class="w-100" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/event/vl-event-4.3.png'); ?>" alt="">
            </div>
            <div class="content">
              <div class="icon-flex">
                <div class="icon"><span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-event-clock4.1.svg'); ?>" alt=""></span></div>
                <div class="text"><a href="#" class="date">JAN 08, 2025</a> <br><span>( 11:00 AM )</span></div>
              </div>
              <a href="#" class="title">Echoes of Experience: A Senior Celebration Event</a>
              <p class="para">Together, let’s honor the silver stars among us, recognizing that their.</p>
              <a href="#" class="details">Events Details <span><i class="fa-solid fa-arrow-right"></i></span></a>
            </div>
          </div>

          <div class="vl-single-event4">
            <div class="thumb">
              <img class="w-100" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/event/vl-event-4.1.png'); ?>" alt="">
            </div>
            <div class="content">
              <div class="icon-flex">
                <div class="icon"><span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-event-clock4.1.svg'); ?>" alt=""></span></div>
                <div class="text"><a href="#" class="date">JAN 08, 2025</a> <br><span>( 11:00 AM )</span></div>
              </div>
              <a href="#" class="title">A Legacy of Love Senior Citizen Appreciation Day</a>
              <p class="para">This event is more than a gathering it’s a tribute to the resilience.</p>
              <a href="#" class="details">Events Details <span><i class="fa-solid fa-arrow-right"></i></span></a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!--===== EVENTS AREA ENDS =======-->


  <!--===== Blog AREA STARTS (placeholder estático) =======-->
  <section id="noticias-section" class="vl-blog4 sp2">
    <div class="container">
      <div class="row">
        <div class="col-xl-7">
          <div class="vl-section-title4 mb-30">
            <h2 class="title text-anime-style-3">Últimas Notícias do Território</h2>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <div class="single-blog mb-30">
            <div class="blog-thumb">
              <img class="w-100" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/blog/vl-blg-1.1.png'); ?>" alt="">
            </div>
            <div class="blog-content">
              <div class="meta-flex">
                <div class="single-meta-box">
                  <div class="icon"><span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-calender-wh-4.1.svg'); ?>" alt=""></span></div>
                  <a href="#" class="para">08 de Outubro de 2025</a>
                </div>
                <div class="single-meta-box">
                  <div class="icon"><span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-user-wh-4.2.svg'); ?>" alt=""></span></div>
                  <a href="#" class="para">Autor Território</a>
                </div>
              </div>
              <div class="content">
                <a href="#" class="title">Projeto promove olhar para a saúde no campo, floresta e águas no Maranhão</a>
                <a href="#" class="readmore">Leia mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-6 col-lg-6">
          <div class="vl-single-blog-item4 mb-30" data-aos="zoom-in-up" data-aos-duration="1200" data-aos-delay="300">
            <div class="meta-flex">
              <div class="single-meta-box">
                <div class="icon"><span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-calender-blck4.1.svg'); ?>" alt=""></span></div>
                <a href="#" class="para">08 de Outubro de 2025</a>
              </div>
              <div class="single-meta-box">
                <div class="icon"><span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-user-blck4.2.svg'); ?>" alt=""></span></div>
                <a href="#" class="para">Autor Território</a>
              </div>
            </div>
            <div class="content">
              <a href="#" class="title">Projeto promove olhar para a saúde no campo, floresta e águas no Maranhão</a>
              <p class="para">Com a finalidade de promover a formação de trabalhadores que lidam com o cuidado em saúde de populações nesses territórios, projeto 'Começo...</p>
              <a href="#" class="readmore">Ler mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
            </div>
          </div>

          <div class="vl-single-blog-item4 mb-30" data-aos="zoom-in-up" data-aos-duration="1200" data-aos-delay="300">
            <div class="meta-flex">
              <div class="single-meta-box">
                <div class="icon"><span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-calender-blck4.1.svg'); ?>" alt=""></span></div>
                <a href="#" class="para">08 de Outubro de 2025</a>
              </div>
              <div class="single-meta-box">
                <div class="icon"><span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/vl-user-blck4.2.svg'); ?>" alt=""></span></div>
                <a href="#" class="para">Autor Território</a>
              </div>
            </div>
            <div class="content">
              <a href="#" class="title">Projeto promove olhar para a saúde no campo, floresta e águas no Maranhão</a>
              <p class="para">Com a finalidade de promover a formação de trabalhadores que lidam com o cuidado em saúde de populações nesses territórios, projeto 'Começo...</p>
              <a href="#" class="readmore">Leia mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!--===== Blog AREA ENDS =======-->


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
