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
<section class="vl-breadcrumb" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/breadcrumb/vl-abuot-breadcrumb.png);">
  <div class="container">
    <div class="row">
      <div class="col-xl-5">
        <div class="vl-breadcrumb-title">
          <h2 class="heading">Notícias</h2>
            <div class="vl-breadcrumb-list">
              <span><a href="page-index.html">Home</a></span>
              <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>
              <span><a class="active" href="#">Notícias</a></span>
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
       <p>Nesta página, os relatos ganham corpo.
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
      <!-- single blog box -->
      <div class="col-xl-4 col-md-6">
        <div class="vl-single-blg-item mb-30">
          <div class="vl-blg-thumb">
            <a href="page-blog-single.html"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/vl-blg-1.1.png" alt=""></a>
          </div>

          <div class="vl-meta">
            <ul>
              <li><a href="page-blog-single.html"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-calender-1.1.svg" alt=""></span> 08 de Outubro de 2025</a></li>
              <li><a href="page-blog-single.html"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-user-1.1.svg" alt=""></span>Autor Território</a></li>
            </ul>
          </div>
          <div class="vl-blg-content">
            <h3 class="title"><a href="page-blog-single.html">Projeto promove olhar para a saúde no campo, floresta e águas no Maranhão</a></h3>
            <p>Com a finalidade de promover a formação de trabalhadores que lidam com o cuidado em saúde de populações nesses territórios, projeto 'Começo...</p>
            <a href="page-blog-single.html" class="read-more">Ler mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>

      <!-- single blog box -->
      <div class="col-xl-4 col-md-6">
        <div class="vl-single-blg-item mb-30">
          <div class="vl-blg-thumb">
            <a href="blog-single.html"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/vl-blg-1.1.png" alt=""></a>
          </div>

          <div class="vl-meta">
            <ul>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-calender-1.1.svg" alt=""></span> 08 de Outubro de 2025</a></li>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-user-1.1.svg" alt=""></span>Autor Território</a></li>
            </ul>
          </div>
          <div class="vl-blg-content">
            <h3 class="title"><a href="blog-single.html">Projeto promove olhar para a saúde no campo, floresta e águas no Maranhão</a></h3>
            <p>Com a finalidade de promover a formação de trabalhadores que lidam com o cuidado em saúde de populações nesses territórios, projeto 'Começo...</p>
            <a href="blog-single.html" class="read-more">Ler mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>

      <!-- single blog box -->
      <div class="col-xl-4 col-md-6">
        <div class="vl-single-blg-item mb-30">
          <div class="vl-blg-thumb">
            <a href="blog-single.html"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/vl-blg-1.1.png" alt=""></a>
          </div>

          <div class="vl-meta">
            <ul>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-calender-1.1.svg" alt=""></span> 08 de Outubro de 2025</a></li>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-user-1.1.svg" alt=""></span>Autor Território</a></li>
            </ul>
          </div>
          <div class="vl-blg-content">
            <h3 class="title"><a href="blog-single.html">Projeto promove olhar para a saúde no campo, floresta e águas no Maranhão</a></h3>
            <p>Com a finalidade de promover a formação de trabalhadores que lidam com o cuidado em saúde de populações nesses territórios, projeto 'Começo...</p>
            <a href="blog-single.html" class="read-more">Ler mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>

      <!-- single blog box -->
      <div class="col-xl-4 col-md-6">
        <div class="vl-single-blg-item mb-30">
          <div class="vl-blg-thumb">
            <a href="blog-single.html"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/vl-blg-1.1.png" alt=""></a>
          </div>

          <div class="vl-meta">
            <ul>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-calender-1.1.svg" alt=""></span> 08 de Outubro de 2025</a></li>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-user-1.1.svg" alt=""></span>Autor Território</a></li>
            </ul>
          </div>
          <div class="vl-blg-content">
            <h3 class="title"><a href="blog-single.html">Projeto promove olhar para a saúde no campo, floresta e águas no Maranhão</a></h3>
            <p>Com a finalidade de promover a formação de trabalhadores que lidam com o cuidado em saúde de populações nesses territórios, projeto 'Começo...</p>
            <a href="blog-single.html" class="read-more">Ler mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>

      <!-- single blog box -->
      <div class="col-xl-4 col-md-6">
        <div class="vl-single-blg-item mb-30">
          <div class="vl-blg-thumb">
            <a href="blog-single.html"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/vl-blg-1.1.png" alt=""></a>
          </div>

          <div class="vl-meta">
            <ul>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-calender-1.1.svg" alt=""></span> 08 de Outubro de 2025</a></li>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-user-1.1.svg" alt=""></span>Autor Território</a></li>
            </ul>
          </div>
          <div class="vl-blg-content">
            <h3 class="title"><a href="blog-single.html">Projeto promove olhar para a saúde no campo, floresta e águas no Maranhão</a></h3>
            <p>Com a finalidade de promover a formação de trabalhadores que lidam com o cuidado em saúde de populações nesses territórios, projeto 'Começo...</p>
            <a href="blog-single.html" class="read-more">Ler mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>

      <!-- single blog box -->
      <div class="col-xl-4 col-md-6">
        <div class="vl-single-blg-item mb-30">
          <div class="vl-blg-thumb">
            <a href="blog-single.html"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/vl-blg-1.1.png" alt=""></a>
          </div>

          <div class="vl-meta">
            <ul>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-calender-1.1.svg" alt=""></span> 08 de Outubro de 2025</a></li>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-user-1.1.svg" alt=""></span>Autor Território</a></li>
            </ul>
          </div>
          <div class="vl-blg-content">
            <h3 class="title"><a href="blog-single.html">Projeto promove olhar para a saúde no campo, floresta e águas no Maranhão</a></h3>
            <p>Com a finalidade de promover a formação de trabalhadores que lidam com o cuidado em saúde de populações nesses territórios, projeto 'Começo...</p>
            <a href="blog-single.html" class="read-more">Ler mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>

      <!-- single blog box -->
      <div class="col-xl-4 col-md-6">
        <div class="vl-single-blg-item mb-30">
          <div class="vl-blg-thumb">
            <a href="blog-single.html"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/vl-blg-1.1.png" alt=""></a>
          </div>

          <div class="vl-meta">
            <ul>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-calender-1.1.svg" alt=""></span> 08 de Outubro de 2025</a></li>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-user-1.1.svg" alt=""></span>Autor Território</a></li>
            </ul>
          </div>
          <div class="vl-blg-content">
            <h3 class="title"><a href="blog-single.html">Projeto promove olhar para a saúde no campo, floresta e águas no Maranhão</a></h3>
            <p>Com a finalidade de promover a formação de trabalhadores que lidam com o cuidado em saúde de populações nesses territórios, projeto 'Começo...</p>
            <a href="blog-single.html" class="read-more">Ler mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>

      <!-- single blog box -->
      <div class="col-xl-4 col-md-6">
        <div class="vl-single-blg-item mb-30">
          <div class="vl-blg-thumb">
            <a href="blog-single.html"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/vl-blg-1.1.png" alt=""></a>
          </div>

          <div class="vl-meta">
            <ul>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-calender-1.1.svg" alt=""></span> 08 de Outubro de 2025</a></li>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-user-1.1.svg" alt=""></span>Autor Território</a></li>
            </ul>
          </div>
          <div class="vl-blg-content">
            <h3 class="title"><a href="blog-single.html">Projeto promove olhar para a saúde no campo, floresta e águas no Maranhão</a></h3>
            <p>Com a finalidade de promover a formação de trabalhadores que lidam com o cuidado em saúde de populações nesses territórios, projeto 'Começo...</p>
            <a href="blog-single.html" class="read-more">Ler mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>

      <!-- single blog box -->
      <div class="col-xl-4 col-md-6">
        <div class="vl-single-blg-item mb-30">
          <div class="vl-blg-thumb">
            <a href="blog-single.html"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/vl-blg-1.1.png" alt=""></a>
          </div>

          <div class="vl-meta">
            <ul>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-calender-1.1.svg" alt=""></span> 08 de Outubro de 2025</a></li>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-user-1.1.svg" alt=""></span>Autor Território</a></li>
            </ul>
          </div>
          <div class="vl-blg-content">
            <h3 class="title"><a href="blog-single.html">Projeto promove olhar para a saúde no campo, floresta e águas no Maranhão</a></h3>
            <p>Com a finalidade de promover a formação de trabalhadores que lidam com o cuidado em saúde de populações nesses territórios, projeto 'Começo...</p>
            <a href="blog-single.html" class="read-more">Ler mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>

      <!-- single blog box -->
      <div class="col-xl-4 col-md-6">
        <div class="vl-single-blg-item mb-30">
          <div class="vl-blg-thumb">
            <a href="blog-single.html"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/vl-blg-1.1.png" alt=""></a>
          </div>

          <div class="vl-meta">
            <ul>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-calender-1.1.svg" alt=""></span> 08 de Outubro de 2025</a></li>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-user-1.1.svg" alt=""></span>Autor Território</a></li>
            </ul>
          </div>
          <div class="vl-blg-content">
            <h3 class="title"><a href="blog-single.html">Projeto promove olhar para a saúde no campo, floresta e águas no Maranhão</a></h3>
            <p>Com a finalidade de promover a formação de trabalhadores que lidam com o cuidado em saúde de populações nesses territórios, projeto 'Começo...</p>
            <a href="blog-single.html" class="read-more">Ler mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>

      <!-- single blog box -->
      <div class="col-xl-4 col-md-6">
        <div class="vl-single-blg-item mb-30">
          <div class="vl-blg-thumb">
            <a href="blog-single.html"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/vl-blg-1.1.png" alt=""></a>
          </div>

          <div class="vl-meta">
            <ul>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-calender-1.1.svg" alt=""></span> 08 de Outubro de 2025</a></li>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-user-1.1.svg" alt=""></span>Autor Território</a></li>
            </ul>
          </div>
          <div class="vl-blg-content">
            <h3 class="title"><a href="blog-single.html">Projeto promove olhar para a saúde no campo, floresta e águas no Maranhão</a></h3>
            <p>Com a finalidade de promover a formação de trabalhadores que lidam com o cuidado em saúde de populações nesses territórios, projeto 'Começo...</p>
            <a href="blog-single.html" class="read-more">Ler mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>

      <!-- single blog box -->
      <div class="col-xl-4 col-md-6">
        <div class="vl-single-blg-item mb-30">
          <div class="vl-blg-thumb">
            <a href="blog-single.html"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/vl-blg-1.1.png" alt=""></a>
          </div>

          <div class="vl-meta">
            <ul>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-calender-1.1.svg" alt=""></span> 08 de Outubro de 2025</a></li>
              <li><a href="#"><span class="top-minus"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-user-1.1.svg" alt=""></span>Autor Território</a></li>
            </ul>
          </div>
          <div class="vl-blg-content">
            <h3 class="title"><a href="blog-single.html">Projeto promove olhar para a saúde no campo, floresta e águas no Maranhão</a></h3>
            <p>Com a finalidade de promover a formação de trabalhadores que lidam com o cuidado em saúde de populações nesses territórios, projeto 'Começo...</p>
            <a href="blog-single.html" class="read-more">Ler mais <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>

      

      

    </div>

      <!-- pagination -->
      <div class="row">
          <div class="col-12 m-auto">
             <div class="theme-pagination thme-pagination-mt text-center mt-18">
                <ul>
                  <li><a href="#"><i class="fa-solid fa-angle-left"></i></a></li>
                  <li><a class="active" href="#">01</a></li>
                  <li><a href="#">02</a></li>
                  <li>...</li>
                  <li><a href="#">12</a></li>
                  <li><a href="#"><i class="fa-solid fa-angle-right"></i></a></li>
                </ul>
             </div>
         </div>
      </div>
  </div>
</section>

<!--===== BLOG AREA ENDS =======-->




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
