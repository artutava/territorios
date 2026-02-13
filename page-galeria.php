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
<section class="vl-breadcrumb" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/breadcrumb/vl-gallery-breadcrumb.png);">
  <div class="container">
    <div class="row">
      <div class="col-xl-5">
        <div class="vl-breadcrumb-title">
          <h2 class="heading">Galeria</h2>
            <div class="vl-breadcrumb-list">
              <span><a href="page-index.html">Home</a></span>
              <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>
              <span><a class="active" href="#">Galeria</a></span>
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
      <h2 class="title">Entre luzes, gestos e afetos, o cuidado ganha forma.</h2>
       <p>Há gestos que não cabem em palavras.
        Há encontros que se revelam no silêncio de um olhar, no traço de uma dança, no brilho de uma manhã.
        Esta galeria é feita de instantes que resistem ao tempo — memórias que brotam do chão, do afeto, da luta.
        Cada fotografia é um testemunho do que pulsa: cuidado, comunidade, vida em movimento.
        Deixe que as imagens falem. Elas sabem contar o que não se escreve.              
        </p>
      </div>         
  </div>
</section>
<!--===== descrição AREA ENDS =======-->

<!--===== GALLERY AREA STARTS =======-->

      <section class="vl-gallery-section sp2">
         <div class="container">
            <div class="row">
               <!-- single gallery box -->
               <div class="col-lg-4 col-md-6 mb-30">
                  <div class="vl-single-box vl-single-box-inner-h420">
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.1.jpg" data-lightbox="image-1"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.1.jpg" alt=""></a>
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.1.jpg" data-lightbox="image-1" class="search-ic">
                     <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-gallery-search-1.1.svg" alt=""></span>
                     </a>
                  </div>
               </div>

               <!-- single gallery box -->
               <div class="col-lg-3 col-md-6 mb-30">
                  <div class="vl-single-box vl-single-box-inner-h420">
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.2.jpg" data-lightbox="image-1"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.2.jpg" alt=""></a>
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.2.jpg" data-lightbox="image-1" class="search-ic">
                     <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-gallery-search-1.1.svg" alt=""></span>
                     </a>
                  </div>
               </div>

               <!-- single gallery box -->
               <div class="col-lg-5 col-md-6 mb-30">
                  <div class="vl-single-box vl-single-box-inner-h420">
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.3.jpg" data-lightbox="image-1"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.3.jpg" alt=""></a>
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.3.jpg" data-lightbox="image-1" class="search-ic">
                     <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-gallery-search-1.1.svg" alt=""></span>
                     </a>
                  </div>
               </div>

               <!-- single gallery box -->
               <div class="col-lg-6 col-md-6 mb-30">
                  <div class="vl-single-box vl-single-box-inner-h420">
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.4.png" data-lightbox="image-1"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.4.png" alt=""></a>
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.4.png" data-lightbox="image-1" class="search-ic">
                     <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-gallery-search-1.1.svg" alt=""></span>
                     </a>
                  </div>
               </div>

               <!-- single gallery box -->
               <div class="col-lg-6 mb-30">
                  <div class="vl-single-box vl-single-box-inner-h420">
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-4.0.jpg" data-lightbox="image-1"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-4.0.jpg" alt=""></a>
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-4.0.jpg" data-lightbox="image-1" class="search-ic">
                     <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-gallery-search-1.1.svg" alt=""></span>
                     </a>
                  </div>
               </div>

               <!-- single gallery box -->
               <div class="col-lg-6 col-md-6">
                  <div class="row">
                      <div class="col-lg-6">
                        <!-- single gallery box -->
                        <div class="vl-single-box vl-single-box-inner-h250 mb-30">
                          <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.6.jpg" data-lightbox="image-1"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.6.jpg" alt=""></a>
                          <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-1.6.jpg" data-lightbox="image-1" class="search-ic">
                          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-gallery-search-1.1.svg" alt=""></span>
                          </a>
                        </div>
                        <!-- single gallery box -->
                        <div class="vl-single-box vl-single-box-inner-h250 mb-30">
                          <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-large-3.5.jpg" data-lightbox="image-1"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-large-3.5.jpg" alt=""></a>
                          <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-large-3.5.jpg" data-lightbox="image-1" class="search-ic">
                          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-gallery-search-1.1.svg" alt=""></span>
                          </a>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <!-- single gallery box -->
                        <div class="vl-single-box vl-single-box-inner-h530 mb-30">
                          <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.1.jpg" data-lightbox="image-1"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.1.jpg" alt=""></a>
                          <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.1.jpg" data-lightbox="image-1" class="search-ic">
                          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-gallery-search-1.1.svg" alt=""></span>
                          </a>
                        </div>
                      </div>
                  </div>

               </div>

               <!-- single gallery box -->
               <div class="col-lg-6 col-md-6">
                  <div class="row">
                    <div class="col-lg-12">
                      <!-- single gallery box -->
                      <div class="vl-single-box vl-single-box-inner-h250 mb-30">
                        <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.2.png" data-lightbox="image-1"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.2.png" alt=""></a>
                        <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.2.png" data-lightbox="image-1" class="search-ic">
                        <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-gallery-search-1.1.svg" alt=""></span>
                        </a>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <!-- single gallery box -->
                      <div class="vl-single-box vl-single-box-inner-h250 mb-30">
                        <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.3.png" data-lightbox="image-1"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.3.png" alt=""></a>
                        <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.3.png" data-lightbox="image-1" class="search-ic">
                        <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-gallery-search-1.1.svg" alt=""></span>
                        </a>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <!-- single gallery box -->
                      <div class="vl-single-box vl-single-box-inner-h250 mb-30">
                        <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.5.jpg" data-lightbox="image-1"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.5.jpg" alt=""></a>
                        <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.5.jpg" data-lightbox="image-1" class="search-ic">
                        <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-gallery-search-1.1.svg" alt=""></span>
                        </a>
                      </div>
                    </div>
                  </div>
                  
               </div>

               <!-- single gallery box -->
               <div class="col-lg-4 col-md-6">
                  <div class="vl-single-box vl-single-box-inner-h270 mb-30">
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.6.png" data-lightbox="image-1"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.6.png" alt=""></a>
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.6.png" data-lightbox="image-1" class="search-ic">
                     <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-gallery-search-1.1.svg" alt=""></span>
                     </a>
                  </div>
               </div>

               <!-- single gallery box -->
               <div class="col-lg-4 col-md-6">
                  <div class="vl-single-box vl-single-box-inner-h270 mb-30">
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.4.jpg" data-lightbox="image-1"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.4.jpg" alt=""></a>
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.4.jpg" data-lightbox="image-1" class="search-ic">
                     <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-gallery-search-1.1.svg" alt=""></span>
                     </a>
                  </div>
               </div>

               <!-- single gallery box -->
               <div class="col-lg-4 col-md-6">
                  <div class="vl-single-box vl-single-box-inner-h270 mb-30">
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.9.jpg" data-lightbox="image-1"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.9.jpg" alt=""></a>
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.9.jpg" data-lightbox="image-1" class="search-ic">
                     <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-gallery-search-1.1.svg" alt=""></span>
                     </a>
                  </div>
               </div>

               <!-- single gallery box -->
               <div class="col-lg-6 col-md-6">
                  <div class="vl-single-box vl-single-box-inner-h270 mb-30">
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.8.jpg" data-lightbox="image-1"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.8.jpg" alt=""></a>
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.8.jpg" data-lightbox="image-1" class="search-ic">
                     <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-gallery-search-1.1.svg" alt=""></span>
                     </a>
                  </div>
               </div>

               <!-- single gallery box -->
               <div class="col-lg-6 col-md-6">
                  <div class="vl-single-box vl-single-box-inner-h270 mb-30">
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.7.jpg" data-lightbox="image-1"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.7.jpg" alt=""></a>
                     <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/vl-gallery-thum-sm-3.7.jpg" data-lightbox="image-1" class="search-ic">
                     <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-gallery-search-1.1.svg" alt=""></span>
                     </a>
                  </div>
               </div>

            </div>

            <!-- pagination -->
            <div class="row">
                <div class="col-12 m-auto">
                  <div class="theme-pagination text-center mt-18">
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


<!--===== TEAM AREA ENDS =======-->

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
