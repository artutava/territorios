<?php
/**
 * Search Results Template
 * Arquivo: search.php
 *
 * @package Territorios
 */

get_header();

$q = get_search_query();

// BG do breadcrumb (pode trocar)
$breadcrumb_bg = get_template_directory_uri() . '/assets/img/breadcrumb/vl-gallery-breadcrumb.png';
?>

<!--===== BREADCRUMB AREA STARTS =======-->
<section class="vl-breadcrumb" style="background-image: url(<?php echo esc_url($breadcrumb_bg); ?>);">
  <div class="container">
    <div class="row">
      <div class="col-xl-8">
        <div class="vl-breadcrumb-title">
          <h2 class="heading">Resultados da busca</h2>
          <div class="vl-breadcrumb-list">
            <span><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></span>
            <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>
            <span><a class="active" href="#"><?php echo $q ? 'Busca: ' . esc_html($q) : 'Busca'; ?></a></span>
          </div>
          <?php if ($q) : ?>
            <p class="vl-breadcrumb-list"><span>Você pesquisou por: <strong><?php echo esc_html($q); ?></strong></span></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!--===== BREADCRUMB AREA ENDS =======-->

<section class="sp2 mb-5">
  <div class="container mb-5 pd-5">

    <!-- Barra de busca -->
    <div class="row justify-content-center mb-40">
      <div class="col-lg-8">
        <div style="background:#fff; border-radius:18px; padding:18px; box-shadow:0 10px 30px rgba(0,0,0,.06);">
          <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" style="display:flex; gap:10px; align-items:center; flex-wrap:wrap;">
            <input
              type="search"
              name="s"
              placeholder="Buscar no site..."
              value="<?php echo esc_attr($q); ?>"
              style="flex:1; min-width:240px; border:1px solid rgba(0,0,0,.12); border-radius:12px; padding:14px 14px;"
            >
            <button class="header-btn1" type="submit" style="border:0;">
              Buscar <span><i class="fa-solid fa-magnifying-glass"></i></span>
            </button>
          </form>
        </div>
      </div>
    </div>

    <?php if (have_posts()) : ?>

      <!-- Contagem -->
      <div class="row mb-30">
        <div class="col-12 text-center">
          <p style="opacity:.85; margin:0;">
            <?php global $wp_query; ?>
            Encontramos <strong><?php echo (int) $wp_query->found_posts; ?></strong> resultado(s).
          </p>
        </div>
      </div>

      <!-- Lista -->
      <div class="row ">
        <?php while (have_posts()) : the_post(); ?>
          <?php
            $pid = get_the_ID();

            $thumb = has_post_thumbnail($pid)
              ? get_the_post_thumbnail_url($pid, 'large')
              : (get_template_directory_uri() . '/assets/img/blog/vl-blg-1.1.png');

            $type_obj = get_post_type_object(get_post_type($pid));
            $type_label = $type_obj && !empty($type_obj->labels->singular_name) ? $type_obj->labels->singular_name : 'Conteúdo';

            $excerpt = has_excerpt($pid)
              ? get_the_excerpt($pid)
              : wp_trim_words(wp_strip_all_tags(get_the_content(null, false, $pid)), 24, '...');
          ?>
          <div class="col-xl-4 col-md-6 mb-30">
            <div class="vl-single-blg-item vl-single-blg-item-6" data-aos="fade-right" data-aos-duration="800" data-aos-delay="200">
              <div class="vl-blg-thumb vl-blg-thumb-7">
                <a href="<?php the_permalink(); ?>">
                  <img class="w-100" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                </a>

                <div class="vl-blog-date-7">
                  <span>
                    <?php echo esc_html(get_the_date('d')); ?>
                    <br>
                    <cite><?php echo esc_html(mb_strtoupper(get_the_date('M'))); ?></cite>
                  </span>
                </div>
              </div>

              <div class="vl-blg-content vl-blg-content-6">
                <div class="vl-meta">
                  <ul>
                    <li>
                      <a href="<?php the_permalink(); ?>">
                        <span>
                          <img style="width:30px; height:30px;" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icons/vl-user-6.1.svg" alt="">
                        </span>
                        <?php echo esc_html($type_label); ?>
                      </a>
                    </li>
                  </ul>
                </div>

                <h3 class="title">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h3>

                <p><?php echo esc_html($excerpt); ?></p>

                <a href="<?php the_permalink(); ?>" class="read-more">
                  Ler mais <span><i class="fa-solid fa-arrow-right"></i></span>
                </a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>

      <!-- Paginação -->
      <div class="row mt-20">
        <div class="col-12">
          <div class="d-flex justify-content-center">
            <?php
              echo paginate_links([
                'total'   => $wp_query->max_num_pages,
                'current' => max(1, get_query_var('paged')),
                'prev_text' => '&laquo;',
                'next_text' => '&raquo;',
                'type'    => 'list',
              ]);
            ?>
          </div>
        </div>
      </div>

      <style>
        /* deixa a paginate_links em estilo mais “botão” sem depender do Bootstrap */
        .page-numbers { list-style:none; padding:0; margin:0; display:flex; gap:8px; flex-wrap:wrap; justify-content:center; }
        .page-numbers li { margin:0; }
        .page-numbers a, .page-numbers span{
          display:inline-flex;
          align-items:center;
          justify-content:center;
          min-width:44px;
          height:44px;
          padding:0 14px;
          border-radius:12px;
          border:1px solid rgba(0,0,0,.12);
          background:#fff;
          text-decoration:none;
        }
        .page-numbers .current{
          border-color: rgba(0,0,0,.0);
          box-shadow:0 10px 30px rgba(0,0,0,.06);
          font-weight:700;
        }
      </style>

    <?php else : ?>

      <!-- Nenhum resultado -->
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <div style="background:#fff; border-radius:18px; padding:34px 22px; box-shadow:0 10px 30px rgba(0,0,0,.06);">
            <h2 class="title text-anime-style-3" style="margin-bottom:10px;">Nenhum resultado encontrado</h2>
            <p style="opacity:.85; margin-bottom:18px;">
              Não encontramos nada para <strong><?php echo esc_html($q); ?></strong>.
              Tente uma busca diferente.
            </p>
            <div class="btn-area w-100 d-flex justify-content-center">
              <a href="<?php echo esc_url(home_url('/')); ?>" class="header-btn1">
                Voltar para Home <span><i class="fa-solid fa-house"></i></span>
              </a>
            </div>
          </div>
        </div>
      </div>

    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>
