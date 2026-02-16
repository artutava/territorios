<?php
/**
 * Template: Lista de Notícias (Blog)
 * Use como home.php (recomendado) OU archive.php (genérico).
 *
 * @package Territorios
 */

get_header();

// paginação (WP usa "paged" em arquivos)
$paged = max(1, (int) get_query_var('paged'));

// query de posts (posts normais)
$q = new WP_Query([
  'post_type'           => 'post',
  'post_status'         => 'publish',
  'posts_per_page'      => 9, // 3 colunas x 3 linhas
  'paged'               => $paged,
  'ignore_sticky_posts' => true,
]);
?>

<!--===== BREADCRUMB AREA STARTS =======-->
<section class="vl-breadcrumb" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/breadcrumb/vl-abuot-breadcrumb.png);">
  <div class="container">
    <div class="row">
      <div class="col-xl-5">
        <div class="vl-breadcrumb-title">
          <h2 class="heading">Notícias</h2>
          <div class="vl-breadcrumb-list">
            <span><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></span>
            <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>
            <span><a class="active" href="<?php echo esc_url(get_post_type_archive_link('post') ?: home_url('/')); ?>">Notícias</a></span>
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
      <h2 class="title">Entre palavras e caminhos, o território se comunica.</h2>
      <p>
        Nesta página, os relatos ganham corpo.
        São histórias que caminham com os pés no chão e o coração aberto — narrativas que revelam o pulsar coletivo, os gestos de resistência, os encontros que transformam.
        Cada notícia é um fragmento vivo do que se constrói com afeto, luta e memória.
        Aqui, o cuidado não é apenas contado: ele se espalha, se compartilha, se fortalece.
      </p>
    </div>
  </div>
</section>
<!--===== descrição AREA ENDS =======-->

<!--===== BLOG AREA STARTS =======-->
<section class="vl-blog-inner sp2">
  <div class="container">
    <div class="row">

      <?php if ($q->have_posts()) : ?>
        <?php while ($q->have_posts()) : $q->the_post(); ?>
          <?php
            $post_id = get_the_ID();

            // imagem (featured) com fallback opcional (se você quiser)
            $thumb_url = get_the_post_thumbnail_url($post_id, 'large');
            if (!$thumb_url) {
              $thumb_url = get_template_directory_uri() . '/assets/img/blog/vl-blg-1.1.png';
            }

            $date = get_the_date('d \d\e F \d\e Y');
            $author = get_the_author();

            // excerpt (se não tiver, cria)
            $excerpt = has_excerpt($post_id)
              ? get_the_excerpt($post_id)
              : wp_trim_words(wp_strip_all_tags(get_the_content(null, false, $post_id)), 20, '...');
          ?>
          <div class="col-xl-4 col-md-6">
            <div class="vl-single-blg-item mb-30">
              <div class="vl-blg-thumb">
                <a href="<?php the_permalink(); ?>">
                  <img class="w-100" src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                </a>
              </div>

              <div class="vl-meta">
                <ul>
                  <li>
                    <a href="<?php the_permalink(); ?>">
                      <span class="top-minus">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icons/vl-calender-1.1.svg" alt="">
                      </span>
                      <?php echo esc_html($date); ?>
                    </a>
                  </li>
                  <li>
                    <a href="<?php the_permalink(); ?>">
                      <span class="top-minus">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icons/vl-user-1.1.svg" alt="">
                      </span>
                      <?php echo esc_html($author); ?>
                    </a>
                  </li>
                </ul>
              </div>

              <div class="vl-blg-content">
                <h3 class="title">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <p><?php echo esc_html($excerpt); ?></p>
                <a href="<?php the_permalink(); ?>" class="read-more">
                  Ler mais <span><i class="fa-solid fa-arrow-right"></i></span>
                </a>
              </div>
            </div>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>

      <?php else : ?>
        <div class="col-12">
          <p>Nenhuma notícia publicada ainda.</p>
        </div>
      <?php endif; ?>

    </div>

    <!-- pagination -->
    <?php if ($q->max_num_pages > 1) : ?>
      <?php
        $big = 999999999;
        $links = paginate_links([
          'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
          'format'    => '?paged=%#%',
          'current'   => $paged,
          'total'     => (int) $q->max_num_pages,
          'type'      => 'array',
          'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
          'next_text' => '<i class="fa-solid fa-angle-right"></i>',
        ]);
      ?>

      <?php if (is_array($links)) : ?>
        <div class="row">
          <div class="col-12 m-auto">
            <div class="theme-pagination thme-pagination-mt text-center mt-18">
              <ul>
                <?php foreach ($links as $link) : ?>
                  <li><?php echo $link; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endif; ?>

  </div>
</section>
<!--===== BLOG AREA ENDS =======-->

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
              <br class="d-none d-xl-block">
              modos de vida e redes de cuidado. Com sua contribuição, promovemos saúde, equidade e participação social nos territórios.
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
