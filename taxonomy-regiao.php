<?php
/**
 * Template: Taxonomia Regiões (taxonomia: regiao)
 * Arquivo: taxonomy-regiao.php
 *
 * Mostra:
 * - Título = nome do termo (região)
 * - Descrição = descrição do termo
 * - Cards/carrossel = Territórios (CPT: territorio) filtrados por essa região
 *
 * @package Territorios
 */

get_header();

// Termo atual (região)
$term = get_queried_object();
$term_name = (!empty($term) && !empty($term->name)) ? $term->name : '';
$term_desc_plain = (!empty($term)) ? wp_strip_all_tags( term_description($term) ) : '';
$term_link = (!empty($term)) ? get_term_link($term) : home_url('/');

// Query de territórios desta região
$paged = max(1, (int) get_query_var('paged'), (int) get_query_var('page'));

$territorios = new WP_Query([
  'post_type'      => 'territorio',
  'posts_per_page' => 12,
  'paged'          => $paged,
  'tax_query'      => [
    [
      'taxonomy' => 'regiao',
      'field'    => 'term_id',
      'terms'    => !empty($term->term_id) ? (int) $term->term_id : 0,
    ]
  ],
]);
?>

<!--===== BREADCRUMB AREA STARTS =======-->
<section class="vl-breadcrumb" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/assets/img/breadcrumb/vl-cause-singlebreadcrumb_region_1.png' ); ?>);">
  <div class="container">
    <div class="row">
      <div class="col-xl-8">
        <div class="vl-breadcrumb-title">
          <div class="vl-breadcrumb-list">
            <span><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a></span>
            <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>
            <span>
              <a class="active" href="<?php echo esc_url( is_wp_error($term_link) ? home_url('/') : $term_link ); ?>">
                <?php echo esc_html($term_name); ?>
              </a>
            </span>
          </div>

          <h2 class="heading"><?php echo esc_html($term_name); ?></h2>

          <p class="vl-breadcrumb-list">
            <span>
              <?php echo $term_desc_plain ? esc_html($term_desc_plain) : ''; ?>
            </span>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!--===== BREADCRUMB AREA ENDS =======-->


<section class="vl-event-area sp1">
  <div class="container p-relative">
    <div class="row">
      <div class="col-xl-7">
        <div class="vl-section-title4 mb-60">
          <h5 class="subtitle" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
            Acompanhe os territórios alcançados pelo projeto
          </h5>

          <h2 class="title text-anime-style-3">
            Territórios que Inspiram
          </h2>

          <p class="para" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
            Saberes locais, cultura viva e práticas de cuidado transformam comunidades em espaços de resistência, saúde e participação.
            Cada território revela formas únicas de promover equidade e bem viver.
          </p>
        </div>
      </div>
    </div>

    <div class="row">
      <?php if ($territorios->have_posts()) : ?>
        <div id="event4" class="owl-carousel owl-theme">

          <?php while ($territorios->have_posts()) : $territorios->the_post(); ?>

            <div class="vl-single-event4">
              <div class="thumb">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('large', ['class' => 'w-100', 'alt' => get_the_title()]); ?>
                <?php else : ?>
                  <img class="w-100" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/event/vl-event-4.1.png' ); ?>" alt="">
                <?php endif; ?>
              </div>

              <div class="content">
                <div class="vl-cause-content">

                  <div class="icon">
                    <span>
                      <a href="<?php the_permalink(); ?>" class="icon">
                        <?php
                        // Se você tiver um meta "ufs" (ex: "MA / PI"), mostra.
                        // Caso não exista, mostra a Região.
                        $ufs = get_post_meta(get_the_ID(), 'ufs', true);
                        echo esc_html($ufs ? $ufs : $term_name);
                        ?>
                      </a>
                    </span>
                  </div>

                  <h3 class="title">
                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                  </h3>

                  <p class="para">
                    <?php
                    if (has_excerpt()) {
                      echo esc_html(get_the_excerpt());
                    } else {
                      echo esc_html( wp_trim_words( wp_strip_all_tags(get_the_content()), 22, '...' ) );
                    }
                    ?>
                  </p>

                  <a href="<?php the_permalink(); ?>" class="details">
                    Veja mais<span><i class="fa-solid fa-arrow-right"></i></span>
                  </a>

                </div>
              </div>
            </div>

          <?php endwhile; wp_reset_postdata(); ?>

        </div>
      <?php else : ?>
        <div class="col-12">
          <p>Nenhum território encontrado para esta região.</p>
        </div>
      <?php endif; ?>
    </div>

    <?php if ($territorios->max_num_pages > 1) : ?>
      <div class="row mt-30">
        <div class="col-12">
          <?php
          // Paginação (opcional). Se seu carrossel tiver tudo em uma página, pode remover.
          echo paginate_links([
            'total'   => $territorios->max_num_pages,
            'current' => $paged,
            'type'    => 'list',
          ]);
          ?>
        </div>
      </div>
    <?php endif; ?>

  </div>
</section>


<!--===== CTA AREA STARTS =======-->
<section class="vl-cta">
  <div class="container">
    <div class="vl-cta-bg" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/assets/img/cta/vl-cta-1.1.png' ); ?>);">
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
get_footer();
