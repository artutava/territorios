<?php
/**
 * 404 Template
 * Arquivo: 404.php
 *
 * @package Territorios
 */

get_header();
?>

<!--===== BREADCRUMB / HERO 404 START =======-->
<section class="vl-breadcrumb" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/breadcrumb/vl-gallery-breadcrumb.png);">
  <div class="container">
    <div class="row">
      <div class="col-xl-8">
        <div class="vl-breadcrumb-title">
          <h2 class="heading">Página não encontrada</h2>
          <div class="vl-breadcrumb-list">
            <span><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></span>
            <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>
            <span><a class="active" href="#">Erro 404</a></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--===== BREADCRUMB / HERO 404 END =======-->

<!--===== 404 CONTENT START =======-->
<section class="sp2">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8 text-center">

        <div style="background:#fff; border-radius:18px; padding:42px 26px; box-shadow:0 10px 30px rgba(0,0,0,.06);">
          <div style="font-size:72px; font-weight:800; line-height:1; letter-spacing:-1px; margin-bottom:12px;">
            404
          </div>

          <h2 class="title text-anime-style-3" style="margin-bottom:10px;">
            Ops… essa página não existe.
          </h2>

          <p style="max-width:620px; margin:0 auto 22px; opacity:.85;">
            Pode ser que o link esteja incorreto, que o conteúdo tenha mudado de lugar, ou que a página tenha sido removida.
            Você pode voltar para a página inicial ou buscar o que precisa.
          </p>

          <!-- Busca -->
          <div class="row justify-content-center" style="margin-top:18px;">
            <div class="col-lg-8">
              <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" style="display:flex; gap:10px; align-items:center; justify-content:center; flex-wrap:wrap;">
                <input
                  type="search"
                  name="s"
                  placeholder="Buscar no site..."
                  value="<?php echo esc_attr(get_search_query()); ?>"
                  style="flex:1; min-width:240px; border:1px solid rgba(0,0,0,.12); border-radius:12px; padding:14px 14px;"
                >
                <button class="header-btn1" type="submit" style="border:0;">
                  Buscar <span><i class="fa-solid fa-magnifying-glass"></i></span>
                </button>
              </form>
            </div>
          </div>

          <!-- Botões -->
          <div class="btn-area w-100 d-flex justify-content-center" style="gap:12px; flex-wrap:wrap; margin-top:22px;">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="header-btn1">
              Voltar para Home <span><i class="fa-solid fa-house"></i></span>
            </a>

            <?php
              $galeria_url = get_post_type_archive_link('galeria');
              if ($galeria_url) :
            ?>
              <a href="<?php echo esc_url($galeria_url); ?>" class="header-btn1">
                Ver Galeria <span><i class="fa-solid fa-images"></i></span>
              </a>
            <?php endif; ?>
          </div>

          <!-- Links úteis -->
          <div style="margin-top:26px; opacity:.85;">
            <small>
              Links úteis:
              <a href="<?php echo esc_url(home_url('/territorios/')); ?>">Territórios</a>
              <?php if ($galeria_url) : ?>
                · <a href="<?php echo esc_url($galeria_url); ?>">Galerias</a>
              <?php endif; ?>
              · <a href="<?php echo esc_url(home_url('/contato/')); ?>">Contato</a>
            </small>
          </div>

        </div>

      </div>
    </div>
  </div>
</section>
<!--===== 404 CONTENT END =======-->

<?php get_footer(); ?>
