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

<!--===== HERO AREA STARTS =======-->
<div class="vl-banner p-relative fix">
  <div class="slider-active-1">
    <!-- single slider -->
    <div class="vl-hero-slider vl-hero-bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/banner/vl-banner-1.1.png);">
          
      <div class="container">
        <div class="row">
          <div class="col-xl-7">
            <div class="vl-hero-section-title">
                <h5 class="vl-subtitle">Promoção da saúde valorizando saberes e territórios</h5>
                <h1 class="vl-title text-anime-style-3">Saúde, Sustentabilidade e Saberes Locais</h1>
                <p>Saiba como o projeto esta promovendo cuidado,
                  <br class="d-none d-xl-block">saúde e equidade nos territórios brasileiros.</p>
                  <h1 class="vl-title text-anime-style-3"> </h1>
                  <h1 class="vl-title text-anime-style-3"> </h1>
                <div class="vl-hero-btn">
                  <a href="contact.html" class="header-btn1">Saiba mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
                </div>
            </div>
          </div>
          <div class="col-lg-5"></div>
        </div>
      </div>
    </div>
  
    <!-- single slider -->
    <div class="vl-hero-slider vl-hero-bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/banner/vl-banner-1.2.png);">
    
      <div class="container">
        <div class="row">
          <div class="col-xl-7">
            <div class="vl-hero-section-title">
                <h5 class="vl-subtitle">Sustentabilidade que nasce do chão brasileiro
                </h5>
                <h1 class="vl-title text-anime-style-3">Saberes que curam, territórios que ensinam</h1>
                <p>Uma jornada pela saúde com raízes na diversidade brasileira.</p>
                <div class="vl-hero-btn">
                  <a href="contact.html" class="header-btn1">Saiba mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
                </div>
            </div>
          </div>
          <div class="col-lg-5"></div>
        </div>
      </div>
    </div>

    <!-- single slider -->
    <div class="vl-hero-slider vl-hero-bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/banner/vl-banner-1.3.png);">
    
      <div class="container">
        <div class="row">
          <div class="col-xl-7">
            <div class="vl-hero-section-title">
                <h5 class="vl-subtitle">Saúde com identidade e pertencimento</h5>
                <h1 class="vl-title text-anime-style-3">Equidade em saúde começa com escuta e acolhimento</h1>
                <p>Descubra como o projeto fortalece comunidades e práticas locais.</p>
                <div class="vl-hero-btn">
                  <a href="contact.html" class="header-btn1">Saiba mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
                </div>
            </div>
          </div>
          <div class="col-lg-5"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="vl-arrow">
    <span class="prev-arow"><i class="fa-solid fa-angle-right"></i></span>
    <span class="next-arow"><i class="fa-solid fa-angle-left"></i></span>
  </div>
</div>
<!--===== HERO AREA ENDS =======-->

<!--===== ABOUT AREA STARTS =======-->
<section class="vl-about-section sp2">
  <div class="container">
    <div class="row">
      <div class="col-xl-7">
        <div class="vl-about-content">
          <div class="vl-section-title-1">
            <h5 class="subtitle" data-aos="fade-right" data-aos-duration="800" data-aos-delay="300">Sobre nós</h5>
            <h2 class="title text-anime-style-3">Territórios que cuidam, saberes que transformam</h2>
            <p class="pb-32" data-aos="fade-right" data-aos-duration="800" data-aos-delay="300">Territórios de Cuidado é uma iniciativa da Fiocruz e do Ministério da Saúde que promove saúde, cultura e sustentabilidade valorizando os saberes locais e o protagonismo das comunidades.</p>
            <p class="pb-32" data-aos="fade-right" data-aos-duration="800" data-aos-delay="300">O projeto Territórios Saudáveis e Sustentáveis na Promoção do Cuidado, ou simplesmente Territórios de Cuidado, é uma parceria entre a Fiocruz e o Ministério da Saúde.</p> 
            <p class="pb-32" data-aos="fade-right" data-aos-duration="800" data-aos-delay="300">Nosso objetivo é desvelar as diversas ações de promoção da saúde que se caracterizam a partir da cultura e do modo de vida nos territórios. Promovendo formação-ação com uma abordagem intersetorial e interseccional para ampliar o debate e promoção da saúde, meio ambiente, cultura e participação social, sempre valorizando os saberes locais e o protagonismo das pessoas. 
            </p>
            <div class="btn-area">
              <a href="page-about.html" class="header-btn1">Ver mais<span><i class="fa-solid fa-arrow-right"></i></span></a>
            </div>
          </div>
          
        </div>
      </div>
      <div class="col-xl-4 col-md-6 mb-30">
        <div class="col-xl-2 col-md-6 mb-30">
          
        </div>
        <div class="vl-about-large-thumb reveal">
          <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/about/vl-about-1.1.png" alt="">
        </div>
      </div>
      
    </div>
  </div>
</section>
<!--===== ABOUT AREA ENDS =======-->

<!--===== carrossel territórios =======-->
<section class="vl-event-area sp1">
  <div class="container p-relative">
    <div class="row">
      <div class="col-xl-7">
        <div class="vl-section-title4 mb-60">
          <h5 class="subtitle" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
            Acompanhe os territórios alcançados pelo projeto
          </h5>
          <h2 class="title text-anime-style-3">Territórios que Inspiram</h2>
          <p class="para" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
            Saberes locais, cultura viva e práticas de cuidado transformam comunidades em espaços de resistência, saúde e participação. Cada território revela formas únicas de promover equidade e bem viver.
          </p>
        </div>
      </div>
    </div>

    <div class="row">
      <div id="event4" class="owl-carousel owl-theme">

        <!-- Norte -->
        <div class="d-flex" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300" style="padding:0 6px;">
          <a
            href=""
            class="vl-choose-icon-box-10 w-100 d-flex flex-column justify-content-center align-items-center"
            style="text-decoration:none; min-height:200px;"
          >
            <div class="icon">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/NT.svg" alt="">
            </div>
            <h2 class="title" style="text-align:center;">Norte</h2>
          </a>
        </div>

        <!-- Nordeste -->
        <div class="d-flex" data-aos="fade-up" data-aos-duration="900" data-aos-delay="300" style="padding:0 6px;">
          <a
            href=""
            class="vl-choose-icon-box-10 w-100 d-flex flex-column justify-content-center align-items-center"
            style="text-decoration:none; min-height:200px;"
          >
            <div class="icon">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/NE.svg" alt="">
            </div>
            <h2 class="title" style="text-align:center;">Nordeste</h2>
          </a>
        </div>

        <!-- Centro-Oeste -->
        <div class="d-flex" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300" style="padding:0 6px;">
          <a
            href=""
            class="vl-choose-icon-box-10 w-100 d-flex flex-column justify-content-center align-items-center"
            style="text-decoration:none; min-height:200px;"
          >
            <div class="icon">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/CO.svg" alt="">
            </div>
            <h2 class="title" style="text-align:center;">Centro-Oeste</h2>
          </a>
        </div>

        <!-- Sudeste -->
        <div class="d-flex" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300" style="padding:0 6px;">
          <a
            href=""
            class="vl-choose-icon-box-10 w-100 d-flex flex-column justify-content-center align-items-center"
            style="text-decoration:none; min-height:200px;"
          >
            <div class="icon">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/SE.svg" alt="">
            </div>
            <h2 class="title" style="text-align:center;">Sudeste</h2>
          </a>
        </div>

        <!-- Sul -->
        <div class="d-flex" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300" style="padding:0 6px;">
          <a
            href=""
            class="vl-choose-icon-box-10 w-100 d-flex flex-column justify-content-center align-items-center"
            style="text-decoration:none; min-height:200px;"
          >
            <div class="icon">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/Sul.svg" alt="">
            </div>
            <h2 class="title" style="text-align:center;">Sul</h2>
          </a>
        </div>

      </div>
    </div>
  </div>
</section>

<!--===== EVENTS AREA ENDS =======-->

<!--===== Blog AREA START =======-->

<?php
$news = new WP_Query([
  'post_type'      => 'post',
  'post_status'    => 'publish',
  'posts_per_page' => 3,
  'orderby'        => 'date',
  'order'          => 'DESC',
]);

if ($news->have_posts()) :
?>


<section class="vl-blg sp2" id="noticias-section">
  <div class="container">
     <div class="row align-items-center mb-60">
        <div class="col-lg-12">
           <div class="vl-work-content-6">
            <div class="vl-section-title-1 mb-60 text-center">
              <h5 class="subtitle" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">Últimas Notícias</h5>
              <h2 class="title text-anime-style-3">Histórias de cuidado e força</h2>
              <p data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                Uma coleção de experiências potentes de quem viu seu território envolvido em saberes, redes de proteção e ações de promoção da saúde e participação social.
                <br class="d-none d-xl-block">Aqui, cada relato constrói equidade a partir da comunidade.
              </p>
            </div>
           </div>
        </div>
     </div>

     <div class="row">
        <?php
          $fallback = get_template_directory_uri() . '/assets/img/blog/vl-blg-1.1.png';

          while ($news->have_posts()) : $news->the_post();

            $pid = get_the_ID();

            $img = has_post_thumbnail($pid)
              ? get_the_post_thumbnail_url($pid, 'large')
              : $fallback;

            $day  = get_the_date('d', $pid);
            $mon  = get_the_date('M', $pid); // Jan, Feb, etc (igual seu template)

            $author = get_the_author();

            $excerpt = has_excerpt($pid)
              ? get_the_excerpt($pid)
              : wp_trim_words(wp_strip_all_tags(get_the_content(null, false, $pid)), 18, '...');

            $link = get_permalink($pid);
        ?>

        <!-- single blog box -->
        <div class="col-xl-4 col-md-6 mb-30">
           <div class="vl-single-blg-item vl-single-blg-item-6" data-aos="fade-right" data-aos-duration="800" data-aos-delay="300">
              <div class="vl-blg-thumb vl-blg-thumb-7">
                 <a href="<?php echo esc_url($link); ?>">
                   <img class="w-100" src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr(get_the_title($pid)); ?>">
                 </a>
                 <div class="vl-blog-date-7">
                    <span><?php echo esc_html($day); ?> <br> <cite><?php echo esc_html($mon); ?></cite></span>
                 </div>
              </div>

              <div class="vl-blg-content vl-blg-content-6">
                 <div class="vl-meta">
                    <ul>
                       <li>
                         <a href="#">
                           <span>
                             <img style="width: 30px; height: 30px;" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icons/vl-user-6.1.svg" alt="">
                           </span>
                           <?php echo esc_html($author); ?>
                         </a>
                       </li>
                    </ul>
                 </div>

                 <h3 class="title">
                   <a href="<?php echo esc_url($link); ?>"><?php echo esc_html(get_the_title($pid)); ?></a>
                 </h3>

                 <p><?php echo esc_html($excerpt); ?></p>

                 <a href="<?php echo esc_url($link); ?>" class="read-more">
                   Ler mais <span><i class="fa-solid fa-arrow-right"></i></span>
                 </a>
              </div>
           </div>
        </div>
        <!-- single blog end -->

        <?php endwhile; wp_reset_postdata(); ?>
     </div>

  </div>
</section>


<?php endif; ?>
<!--===== Blog AREA END =======-->

<!--===== MAP AREA START =======-->
<section class="vl-blg sp2 map-section">
  <div class="container">
     <div class="row align-items-center mb-60">
        <div class="col-lg-12">
           <div class="vl-work-content-6">
            <div class="vl-section-title-1 mb-60 text-center">
              <h5 class="subtitle sub-color2" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">Alcance</h5>
              <h2 class="title text-anime-style-3">Conheça nossos territórios</h2>
              <p data-aos="fade-up" data-aos-duration="800" data-aos-delay="300"> 
                Conheça os 15 territórios de cuidado que integram o nosso projeto. Saiba onde estamos atuando, quais ações estão em andamento e as redes locais envolvidas.
              </p>
            </div>
           </div>
        </div>
     </div>
   
  </div>
   
      <div class="container overflow-hidden">
        <div id="chartdiv"></div>
      </div>
    
</section>
<!--===== MAP AREA END =======-->

<!--===== COUNTER AREA STARTS =======-->
<section class="vl-counter5 sp2">
  <div class="container">
    <div class="row">
      <div class="col-xl-5">
          <div class="vl-counter-content">
            <div class="vl-section-title5">
              <h5 class="subtitle" data-aos="zoom-in-up" data-aos-duration="1200" data-aos-delay="300">Alcance do cuidado</h5>
              <h1 class="title text-anime-style-3">Números do Projeto</h1>
              <p class="para" data-aos="zoom-in-up" data-aos-duration="1200" data-aos-delay="300">Territórios de Cuidado une saúde, cultura, meio ambiente e participação social para transformar comunidades.</p>
              </div>
          </div>
      </div>
      <div class="col-xl-6 mb-10" data-aos="zoom-in-up" data-aos-duration="1200" data-aos-delay="300">
        <div class="row">
          <div class="col-xl-6 col-md-6">
            <!-- single counter box -->
            <div class="single-counter-box">
              <h3 class="title">+ <span class="title counter">15</span></h3>
              <span class="pt-20">Territórios nas regiões do Brasil</span>
            </div>
          </div>
          <div class="col-xl-6 col-md-6">
            <!-- single counter box -->
            <div class="single-counter-box active">
              <h3 class="title">+ <span class="title counter">9</span> mil</h3>
              <span class="pt-20">Pessoas mobilizadas diretamente</span>
            </div>
          </div>
          <div class="col-xl-6 col-md-6">
            <!-- single counter box -->
            <div class="single-counter-box">
              <h3 class="title">+ <span class="title counter">100</span> mil</h3>
              <span class="pt-20">Alcançadas mobilizadas diretamente </span>
            </div>
          </div>
          <div class="col-xl-6 col-md-6">
            <!-- single counter box -->
            <div class="single-counter-box">
              <h3 class="title">+ <span class="title counter">3</span></h3>
              <span class="pt-20">Ciclos de formação previstos</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--===== COUNTER AREA ENDS =======-->

<?php
// ===== Próximos Eventos (HOME) =====

// "hoje" respeitando timezone do WordPress
$today = wp_date('Y-m-d');

// Query: próximos eventos (independente de território)
// - tenta filtrar por evento_data_ordenacao
// - se alguns posts não tiverem evento_data_ordenacao, ainda assim eles aparecem via fallback (evento_data)
// Observação: se TODOS os seus eventos têm evento_data_ordenacao preenchido, melhor ainda.
$eventos = new WP_Query([
  'post_type'      => 'evento',
  'post_status'    => 'publish',
  'posts_per_page' => 3,
  'orderby'        => 'meta_value',
  'meta_key'       => 'evento_data_ordenacao',
  'order'          => 'ASC',
  'meta_query'     => [
    'relation' => 'OR',
    [
      'key'     => 'evento_data_ordenacao',
      'value'   => $today,
      'compare' => '>=',
      'type'    => 'DATE',
    ],
    [
      'key'     => 'evento_data',
      'value'   => $today,
      'compare' => '>=',
      'type'    => 'DATE',
    ],
  ],
]);

// Helpers (se já existirem em outro lugar, não redeclara)
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
?>

<!--===== Event AREA STARTS =======-->
<section class="vl-blog sp2" id="eventos-section">
  <div class="container">
    <div class="row">
      <div class="col-xl-5 mb-4">
        <div class="vl-blog-lar-thumb-bg" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/blog/vl-blog-larg-thmb.png);">
          <div class="vl-section-title-1">
            <h5 class="subtitle" data-aos="fade-right" data-aos-duration="800" data-aos-delay="300">Fique ligado no nosso calendário</h5>
            <h2 class="title text-anime-style-3">Próximos Eventos</h2>
            <p class="pb-32" data-aos="fade-right" data-aos-duration="800" data-aos-delay="300">
              Confira os próximos eventos, encontros e atividades promovidas pelo projeto. Participe e fortaleça essa rede de cuidado.
            </p>
            <div class="btn-area" data-aos="fade-right" data-aos-duration="800" data-aos-delay="300">
              <a href="<?php echo esc_url(get_post_type_archive_link('evento')); ?>" class="header-btn1">
                Ver mais <span><i class="fa-solid fa-arrow-right"></i></span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-7 col-lg-6" data-aos="zoom-in-up" data-aos-duration="1000" data-aos-delay="300">

        <?php if ($eventos->have_posts()) : ?>
          <?php while ($eventos->have_posts()) : $eventos->the_post(); ?>
            <?php
              $eid      = get_the_ID();

              // pega data (prioriza ordenacao, senão evento_data)
              $data = get_post_meta($eid, 'evento_data_ordenacao', true);
              if (!$data) $data = get_post_meta($eid, 'evento_data', true);

              $ini      = get_post_meta($eid, 'evento_hora_inicio', true);
              $fim      = get_post_meta($eid, 'evento_hora_fim', true);
              $local    = get_post_meta($eid, 'evento_local', true);
              $endereco = get_post_meta($eid, 'evento_endereco', true);

              $ts = $data ? strtotime($data) : false;
              $day  = $ts ? date('d', $ts) : '--';
              $mon  = $ts ? tc_mes_abrev_pt(date('n', $ts)) : '--';
              $year = $ts ? date('Y', $ts) : '----';

              $hini = tc_format_hora_pt($ini);
              $hfim = tc_format_hora_pt($fim);
              $hora_txt = ($hini && $hfim) ? "{$hini} - {$hfim}" : ($hini ?: $hfim);

              $addr = trim($local . ($local && $endereco ? ', ' : '') . $endereco);
            ?>

            <!-- single event item -->
            <div class="col-lg-12 mb-20">
              <div class="event-bg-flex">
                <div class="event-date">
                  <h3 class="title"><?php echo esc_html($day); ?></h3>
                  <p class="year"><?php echo esc_html($mon); ?> <br class="d-none d-xl-block"> <?php echo esc_html($year); ?></p>
                </div>
                <div class="event-content col-lg-9 mx-4">
                  <?php if ($hora_txt) : ?>
                    <div class="event-meta-home">
                      <p class="para"><span><i class="fa-regular fa-clock"></i></span> <?php echo esc_html($hora_txt); ?></p>
                    </div>
                  <?php endif; ?>

                  <!-- sem link -->
                  <span class="title"><?php echo esc_html(get_the_title()); ?></span>

                  <?php if ($addr) : ?>
                    <p class="para"><span><i class="fa-solid fa-location-dot"></i></span> <?php echo esc_html($addr); ?></p>
                  <?php endif; ?>
                </div>
              </div>
            </div>

          <?php endwhile; wp_reset_postdata(); ?>
        <?php else : ?>
          <div class="col-lg-12">
            <p style="opacity:.75; margin:0;">Nenhum evento futuro cadastrado no momento.</p>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>
</section>
<!--===== Event AREA ENDS =======-->


<!--===== Gallery AREA STARTS =======-->
<section id="gallery" class="vl-gallery3 sp2">
  <div class="container">
    <div class="row">
      <div class="col-xl-3 col-md-6 order-1 order-md-1 order-xl-1">
        <div class="vl-gallery-sm-thumb mb-30 reveal">
          <a class="gallery-popup-link" href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.1.jpg"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.1.jpg" alt=""></a>
        </div>
        <div class="vl-gallery-sm-thumb mb-30 reveal">
          <a class="gallery-popup-link" href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.2.jpg"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.2.jpg" alt=""></a>
        </div>
      </div>
      <div class="col-xl-6 order-xl-2">
        <div class="vl-gallery-content">
          <div class="vl-section-title3 text-center" >
            <h4 class="subtitle" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">Nossa Galeria</h4>
            <h2 class="title text-anime-style-3">Visualize registros dos nossos territórios</h2>
            <div class="vl-gallery-large-thumb reveal mb-30">
              <a class="gallery-popup-link" href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.3.jpg"> <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.3.jpg" alt=""></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 order-xl-3">
        <div class="vl-gallery-sm-thumb mb-30 reveal">
            <a class="gallery-popup-link" href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.1.jpg"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.1.jpg" alt=""></a>
        </div>
        <div class="vl-gallery-sm-thumb mb-30 reveal">
          <a class="gallery-popup-link" href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.7.jpg"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.7.jpg" alt=""></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--===== Gallery AREA ENDS =======-->

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
