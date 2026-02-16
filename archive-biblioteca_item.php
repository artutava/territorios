<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Territorios
 */

get_header();
?>

<!--===== BREADCRUMB AREA STARTS =======-->
<section class="vl-breadcrumb" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/breadcrumb/vl-libary.png);">
  <div class="container">
    <div class="row">
      <div class="col-xl-8">
        <div class="vl-breadcrumb-title">
          <div class="vl-breadcrumb-list">
            <span><a href="page-index.html">Home</a></span>
            <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>
            <span><a class="active" href="#">Biblioteca</a></span>
          </div>
          <h2 class="heading">Biblioteca</h2>
          <p class="vl-breadcrumb-list">
            <span>Território de águas e saberes, onde a vida pulsa em equilíbrio com a natureza.</span>
          </p>  
            
        </div>
      </div>
    </div>
  </div>
</section>
<!--===== BREADCRUMB AREA ENDS =======-->

<!--===== ABOUT AREA STARTS =======-->
<section class="vl-about5 sp2">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-6">
        <div class="vl-about-content">
          <div class="vl-section-title-1 mb-20">
            <p>A Biblioteca dos Territórios de Cuidado é um espaço de encontro entre memórias, práticas e conhecimentos que emergem dos modos de vida nos territórios. Aqui, o cuidado se revela em palavras, imagens e sons que narram experiências de resistência, saúde, cultura e bem viver.
              Neste território digital, você encontrará materiais produzidos por comunidades, pesquisadores, educadores e agentes de saúde que atuam na promoção do cuidado com base nos saberes locais. São cartilhas, vídeos, relatos, estudos e registros que fortalecem a formação-ação e ampliam o diálogo entre políticas públicas e práticas ancestrais.
              A cada conteúdo compartilhado, reafirmamos que o cuidado não se limita ao acesso aos serviços, mas se expressa também nos rituais, nas artes, na alimentação e nas relações que sustentam a vida. A Biblioteca é, portanto, um convite à escuta, à valorização da diversidade e à construção coletiva de territórios mais saudáveis e sustentáveis.
              
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--===== ABOUT AREA ENDS =======-->

<?php
/**
 * Loop da Biblioteca separado por categoria (taxonomy: biblioteca_categoria)
 * CPT: biblioteca_item
 * Meta: biblioteca_arquivo_upload (prioritário) e biblioteca_arquivo_url (fallback)
 * Capa: featured image (se tiver) senão capa padrão
 */

$default_icon = get_template_directory_uri() . '/assets/img/service/file_tc.png';

// Pega todas as categorias da biblioteca (inclui vazias? aqui só as que tem posts)
$cats = get_terms([
  'taxonomy'   => 'biblioteca_categoria',
  'hide_empty' => true,
  'orderby'    => 'name',
  'order'      => 'ASC',
]);

if (!is_wp_error($cats) && !empty($cats)) :
?>

<?php foreach ($cats as $cat) : ?>

  <?php
  // Query dos itens desta categoria
  $itens = new WP_Query([
    'post_type'      => 'biblioteca_item',
    'posts_per_page' => 200,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'tax_query'      => [
      [
        'taxonomy' => 'biblioteca_categoria',
        'field'    => 'term_id',
        'terms'    => $cat->term_id,
      ],
    ],
  ]);

  if (!$itens->have_posts()) {
    wp_reset_postdata();
    continue;
  }

  $cat_title = $cat->name;
  $cat_desc  = trim((string) $cat->description);
  ?>

  <!--===== libary cartilha starts =======-->
  <div class="container mb-50">

    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="vl-work-content-6">
          <div class="vl-section-title-9">
            <h2 class="vl-title text-anime-style-3"><?php echo esc_html($cat_title); ?></h2>
            <?php if ($cat_desc !== '') : ?>
              <p><?php echo esc_html($cat_desc); ?></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4 mt-4">

      <?php while ($itens->have_posts()) : $itens->the_post(); ?>
        <?php
        $item_id = get_the_ID();

        // Link do arquivo: upload primeiro, depois URL externa
        $file_url = trim((string) get_post_meta($item_id, 'biblioteca_arquivo_upload', true));
        if ($file_url === '') {
          $file_url = trim((string) get_post_meta($item_id, 'biblioteca_arquivo_url', true));
        }

        // Thumb: featured image ou padrão
        $thumb_url = $default_icon;
        if (has_post_thumbnail($item_id)) {
          $img = wp_get_attachment_image_src(get_post_thumbnail_id($item_id), 'thumbnail');
          if (!empty($img[0])) $thumb_url = $img[0];
        }

        $title = get_the_title($item_id);

        // Descrição curta: usa excerpt se existir (mesmo sem editor), senão tenta usar descrição do termo? (aqui fica vazio)
        $desc = has_excerpt($item_id) ? get_the_excerpt($item_id) : '';

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
                <?php if ($desc !== '') : ?>
                  <small class="fs-sm text-muted"><?php echo esc_html($desc); ?></small>
                <?php endif; ?>
              </div>
            </div>

            <?php if ($has_file) : ?>
              <a
                href="<?php echo esc_url($file_url); ?>"
                download
                target="_blank"
                rel="noopener"
                class="btn btn-icon btn-secondary ms-3 flex-shrink-0"
                aria-label="<?php echo esc_attr('Download ' . $title); ?>"
              >
                <i class="fa-solid fa-download"></i>
              </a>
            <?php else : ?>
              <button
                type="button"
                class="btn btn-icon btn-secondary ms-3 flex-shrink-0"
                aria-label="<?php echo esc_attr('Arquivo não disponível: ' . $title); ?>"
                disabled
                style="opacity:.5; cursor:not-allowed;"
                title="Arquivo não cadastrado"
              >
                <i class="fa-solid fa-download"></i>
              </button>
            <?php endif; ?>
          </div>
        </div>
      <?php endwhile; ?>

    </div>
  </div>
  <!--===== libary cartilha ends =======-->

  <?php wp_reset_postdata(); ?>

<?php endforeach; ?>

<?php endif; ?>


<!--===== CTA AREA STARTS =======-->
<section class="vl-cta">
  <div class="container">
    <div class="vl-cta-bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/cta/vl-cta-1.1.png);">
      <div class="row">
        <div class="col-lg-12">
          <div class="vl-cta-content text-center">
            <h2 class="title text-anime-style-3">Sua ajuda fortalece territórios</h2>
            <p  data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">Cada gesto de solidariedade apoia comunidades que enfrentam desafios e desastres, valorizando seus saberes, <br class="d-none d-xl-block">modos de vida e redes de cuidado. Com sua contribuição, promovemos saúde, equidade e participação social nos territórios.</p>
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

<?php
get_footer();
