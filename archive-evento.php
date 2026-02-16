<?php
/**
 * Archive template for Eventos (Calendário)
 *
 * @package Territorios
 */

get_header();

// Paginação
$paged = max(1, (int) get_query_var('paged'));

// Query: eventos futuros + passados (todos), ordenado pela data meta
$eventos = new WP_Query([
  'post_type'      => 'evento',
  'post_status'    => 'publish',
  'posts_per_page' => 10,
  'paged'          => $paged,
  'meta_key'       => 'evento_data_ordenacao',
  'orderby'        => 'meta_value',
  'order'          => 'DESC', // mais recentes primeiro (troque pra ASC se quiser próximos primeiro)
]);
?>

<!--===== BREADCRUMB AREA STARTS =======-->
<section class="vl-breadcrumb" style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/assets/img/breadcrumb/vl-event-breadcrumb.png'); ?>);">
  <div class="container">
    <div class="row">
      <div class="col-xl-5">
        <div class="vl-breadcrumb-title">
          <h2 class="heading">Calendário</h2>
          <div class="vl-breadcrumb-list">
            <span><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></span>
            <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>
            <span><a class="active" href="<?php echo esc_url(get_post_type_archive_link('evento')); ?>">Calendário</a></span>
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
      <h2 class="title">Entre passos e partilhas, o território se movimenta.</h2>
      <p>
        Esta página reúne os momentos em que corpos, ideias e afetos se encontram.
        São rodas, caminhadas, oficinas, celebrações — espaços onde o cuidado se faz presença viva.
        Cada evento é uma oportunidade de fortalecer vínculos, trocar saberes e construir caminhos coletivos.
        Aqui, o tempo pulsa em comunidade. E cada encontro é uma semente lançada no chão fértil da transformação.
      </p>
    </div>
  </div>
</section>
<!--===== descrição AREA ENDS =======-->

<section class="vl-singlevent-iner">
  <div class="container">
    <div class="row">

      <?php if ($eventos->have_posts()) : ?>
        <?php while ($eventos->have_posts()) : $eventos->the_post(); ?>
          <?php
            $event_id   = get_the_ID();

            $data       = get_post_meta($event_id, 'evento_data', true); // YYYY-MM-DD
            $hora_ini   = get_post_meta($event_id, 'evento_hora_inicio', true);
            $hora_fim   = get_post_meta($event_id, 'evento_hora_fim', true);
            $local      = get_post_meta($event_id, 'evento_local', true);
            $endereco   = get_post_meta($event_id, 'evento_endereco', true);
            $territorio = get_post_meta($event_id, 'evento_territorio_id', true);

            // Data formatada
            $day  = '';
            $mon  = '';
            $year = '';

            if (!empty($data)) {
              $ts = strtotime($data);
              if ($ts) {
                $day  = date('d', $ts);
                $year = date('Y', $ts);

                // mês abreviado em PT-BR
                $months = ['JAN','FEV','MAR','ABR','MAI','JUN','JUL','AGO','SET','OUT','NOV','DEZ'];
                $mindex = (int) date('n', $ts) - 1;
                $mon = $months[$mindex] ?? '';
              }
            }

            // Horário
            $time_str = '';
            if (!empty($hora_ini) && !empty($hora_fim)) {
              $time_str = $hora_ini . ' - ' . $hora_fim;
            } elseif (!empty($hora_ini)) {
              $time_str = $hora_ini;
            } elseif (!empty($hora_fim)) {
              $time_str = $hora_fim;
            }

            // Sufixo do título com território (opcional)
            $territorio_title = '';
            if (!empty($territorio)) {
              $t_title = get_the_title((int)$territorio);
              if (!empty($t_title)) $territorio_title = $t_title;
            }

            // Linha de localização
            $location_parts = [];
            if (!empty($local)) $location_parts[] = $local;
            if (!empty($endereco)) $location_parts[] = $endereco;
            $location_str = implode(', ', $location_parts);
          ?>

          <div class="col-lg-12 mb-50">
            <div class="event-bg-flex active">
              <div class="event-date col-lg-1">
                <h3 class="title"><?php echo esc_html($day ?: '—'); ?></h3>
                <p class="year">
                  <?php echo esc_html($mon ?: ''); ?>
                  <br class="d-none d-xl-block">
                  <?php echo esc_html($year ?: ''); ?>
                </p>
              </div>

              <div class="event-content">
                <?php if (!empty($time_str)) : ?>
                  <div class="event-meta">
                    <p class="para"><span><i class="fa-regular fa-clock"></i></span> <?php echo esc_html($time_str); ?></p>
                  </div>
                <?php endif; ?>

                <div class="title">
                  <?php echo esc_html(get_the_title()); ?>
                  <?php if (!empty($territorio_title)) : ?>
                    <br class="d-none d-xl-block">- <?php echo esc_html($territorio_title); ?>
                  <?php endif; ?>
                </div>

                <?php if (!empty($location_str)) : ?>
                  <p class="para"><span><i class="fa-solid fa-location-dot"></i></span> <?php echo esc_html($location_str); ?></p>
                <?php endif; ?>

                <?php
                  // (Opcional) Excerpt/descrição curta se você estiver usando excerpt no evento
                  $ex = get_the_excerpt();
                  if (!empty($ex)) :
                ?>
                  <p class="para"><?php echo esc_html($ex); ?></p>
                <?php endif; ?>

              </div>
            </div>
          </div>

        <?php endwhile; wp_reset_postdata(); ?>

        <!-- pagination -->
        <?php
          $big = 999999999;
          $pagination = paginate_links([
            'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'    => '?paged=%#%',
            'current'   => $paged,
            'total'     => (int) $eventos->max_num_pages,
            'type'      => 'array',
            'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
            'next_text' => '<i class="fa-solid fa-angle-right"></i>',
          ]);
        ?>

        <?php if (!empty($pagination)) : ?>
          <div class="row">
            <div class="col-12 m-auto">
              <div class="theme-pagination thme-pagination-mt text-center mt-18">
                <ul>
                  <?php foreach ($pagination as $link) : ?>
                    <li><?php echo $link; ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        <?php endif; ?>

      <?php else : ?>
        <div class="col-lg-12">
          <p class="para">Ainda não há eventos cadastrados.</p>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>

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
