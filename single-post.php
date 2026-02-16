<?php
/**
 * Single Post (Blog)
 *
 * @package Territorios
 */

get_header();

if (have_posts()) :
  while (have_posts()) : the_post();

    $post_id = get_the_ID();

    // Breadcrumb background (mantém o do template; se quiser pode trocar por featured depois)
    $breadcrumb_bg = get_template_directory_uri() . '/assets/img/breadcrumb/vl-abuot-breadcrumb.png';

    // Resumo: usa excerpt; se não tiver, usa um trim do conteúdo
    $resumo = has_excerpt($post_id)
      ? get_the_excerpt($post_id)
      : wp_trim_words(wp_strip_all_tags(get_the_content(null, false, $post_id)), 28, '...');

    // Thumbnail do post (se não tiver, usa a imagem do template)
    $thumb_url = get_the_post_thumbnail_url($post_id, 'full');
    if (!$thumb_url) {
      $thumb_url = get_template_directory_uri() . '/assets/img/blog/vl-blog-large-thumb-1.1.png';
    }

    // Categorias (pega a primeira)
    $cats = get_the_category($post_id);
    $cat_name = (!empty($cats) && !is_wp_error($cats)) ? $cats[0]->name : '';
    $cat_link = (!empty($cats) && !is_wp_error($cats)) ? get_category_link($cats[0]->term_id) : '';

    // Link da página de notícias (se você tiver uma página setada como "Posts page", usa ela)
    $posts_page_id = (int) get_option('page_for_posts');
    $news_url = $posts_page_id ? get_permalink($posts_page_id) : home_url('/');

    // Ícones do template
    $icon_user = get_template_directory_uri() . '/assets/img/icons/vl-user-6.1.svg';
    $icon_cal  = get_template_directory_uri() . '/assets/img/icons/vl-calender-1.1.svg';
    $icon_tag  = get_template_directory_uri() . '/assets/img/icons/vl-tags.svg';

    // Data
    $date_label = get_the_date('d/m/Y', $post_id);
    $more_day   = get_the_date('d', $post_id);
    $more_mon   = get_the_date('M', $post_id); // "Jan", "Feb"... (padrão do WP em inglês)
    // Se quiser mês em PT-BR, você pode usar date_i18n com locale pt_BR
    $more_mon_pt = date_i18n('M', get_post_timestamp($post_id)); // respeita locale do WP

    ?>

    <!--===== BREADCRUMB AREA STARTS =======-->
    <section class="vl-breadcrumb" style="background-image: url(<?php echo esc_url($breadcrumb_bg); ?>);">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="vl-breadcrumb-title">
              <div class="vl-breadcrumb-list">
                <span><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></span>
                <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>

                <span><a href="<?php echo esc_url($news_url); ?>">Notícias</a></span>
                <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>

                <span><a class="active" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
              </div>

              <h3 class="heading-small"><?php the_title(); ?></h3>

              <?php if (!empty($resumo)) : ?>
                <p class="vl-breadcrumb-list">
                  <span><?php echo esc_html($resumo); ?></span>
                </p>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!--===== BREADCRUMB AREA ENDS =======-->


    <!-- sidebar area start -->
    <div class="vl-sidebar-area sp2">
      <div class="container">
        <div class="row">

          <div class="col-xl-12 mx-auto">
            <div class="vl-event-content-area">

              <div class="vl-large-thumb">
                <img class="w-100" src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr(get_the_title($post_id)); ?>">
              </div>

              <div class="vl-blog-meta-box mt-32">
                <ul>

                  <li>
                    <a href="#">
                      <span>
                        <img style="width: 30px; height: 30px;" src="<?php echo esc_url($icon_user); ?>" alt="">
                      </span>
                      <?php echo esc_html(get_the_author()); ?>
                    </a>
                  </li>

                  <li>
                    <a href="#">
                      <span class="icon">
                        <img class="mt-4-" src="<?php echo esc_url($icon_cal); ?>" alt="">
                      </span>
                      <?php echo esc_html($date_label); ?>
                    </a>
                  </li>

                  <?php if (!empty($cat_name) && !empty($cat_link) && !is_wp_error($cat_link)) : ?>
                    <li>
                      <a href="<?php echo esc_url($cat_link); ?>">
                        <span class="icon">
                          <img class="mt-4-" src="<?php echo esc_url($icon_tag); ?>" alt="">
                        </span>
                        <?php echo esc_html($cat_name); ?>
                      </a>
                    </li>
                  <?php endif; ?>

                </ul>
              </div>

              <div class="event-content-area">
                <?php the_content(); ?>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- sidebar area end -->


    <?php
    // ======= MAIS NOTÍCIAS (3 posts) =======
    $related_args = [
      'post_type'           => 'post',
      'posts_per_page'      => 3,
      'post_status'         => 'publish',
      'post__not_in'        => [$post_id],
      'ignore_sticky_posts' => true,
    ];

    // Se tiver categoria, tenta puxar da mesma categoria primeiro
    if (!empty($cats) && !is_wp_error($cats)) {
      $related_args['category__in'] = [$cats[0]->term_id];
    }

    $more_posts = new WP_Query($related_args);
    ?>

    <?php if ($more_posts->have_posts()) : ?>
      <section class="vl-singlevent-iner pb-50">
        <div class="container">

          <div class="row">
            <div class="col-lg-12 mx-auto">
              <div class="more-title mb-60">
                <h2 class="title">Mais Notícias</h2>
              </div>
            </div>
          </div>

          <div class="row">

            <?php while ($more_posts->have_posts()) : $more_posts->the_post();
              $rid = get_the_ID();
              $rthumb = get_the_post_thumbnail_url($rid, 'large');
              if (!$rthumb) {
                $rthumb = get_template_directory_uri() . '/assets/img/blog/vl-blg-1.1.png';
              }
              $rdate_day = get_the_date('d', $rid);
              $rdate_mon = date_i18n('M', get_post_timestamp($rid));
              $rexcerpt  = has_excerpt($rid) ? get_the_excerpt($rid) : wp_trim_words(wp_strip_all_tags(get_the_content(null, false, $rid)), 18, '...');
              ?>

              <div class="col-xl-4 col-md-6 mb-30">
                <div class="vl-single-blg-item vl-single-blg-item-6" data-aos="fade-right" data-aos-duration="800" data-aos-delay="300">
                  <div class="vl-blg-thumb vl-blg-thumb-7">
                    <a href="<?php the_permalink(); ?>">
                      <img class="w-100" src="<?php echo esc_url($rthumb); ?>" alt="<?php echo esc_attr(get_the_title($rid)); ?>">
                    </a>

                    <div class="vl-blog-date-7">
                      <span><?php echo esc_html($rdate_day); ?> <br> <cite><?php echo esc_html($rdate_mon); ?></cite></span>
                    </div>
                  </div>

                  <div class="vl-blg-content vl-blg-content-6">
                    <div class="vl-meta">
                      <ul>
                        <li>
                          <a href="#">
                            <span>
                              <img style="width: 30px; height: 30px;" src="<?php echo esc_url($icon_user); ?>" alt="">
                            </span>
                            <?php echo esc_html(get_the_author()); ?>
                          </a>
                        </li>
                      </ul>
                    </div>

                    <h3 class="title">
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>

                    <p><?php echo esc_html($rexcerpt); ?></p>

                    <a href="<?php the_permalink(); ?>" class="read-more">
                      Ler mais <span><i class="fa-solid fa-arrow-right"></i></span>
                    </a>
                  </div>
                </div>
              </div>

            <?php endwhile; wp_reset_postdata(); ?>

          </div>
        </div>
      </section>
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
  endwhile;
endif;

get_footer();
