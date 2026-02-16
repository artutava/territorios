<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Territorios
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!--===== CSS LINK =======-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/plugins/aos.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/plugins/fontawesome.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/plugins/mobile.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/plugins/owlcarousel.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/plugins/sidebar.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/plugins/slick-slider.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/plugins/lightbox.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">
    <link rel="stylesheet" href="territoriosmap.css" id="stylesheet" />

     <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/brazilLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

	<?php wp_head(); ?>
</head>

<body class="homepage1-body">

<!--===== PRELOADER STARTS =======-->
  <div class="preloader">
    <div class="loading-container">
      <div class="loading"></div>
      <div id="loading-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/preloader/vl-preloader-1.1.png" alt=""></div>
    </div>
  </div>


<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'territorios' ); ?></a>

	<header id="masthead" class="site-header">
<!-- ===================== HEADER TOP AREA START =====================-->
  <div class="vl-header-top d-none d-lg-block">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="vl-header-top-content">
            <p>Está pronto para conhecer novos territórios? </p>
            <a href="#" class="top-contact">Contate-nos</a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="vl-header-top-icon">
            <div class="vl-header-top-icbox">
              <div class="top-icon">
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-top-ic-1.1.svg" alt=""></span>
              </div>
              <div class="top-content">
                <a href="mailto:info@disasterelief.com">psat@fiocruz.br</a>
              </div>
            </div>
  
            <div class="vl-header-top-icbox">
              <div class="top-icon">
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-top-ic-1.2.svg" alt=""></span>
              </div>
              <div class="top-content">
                <a href="tel:5551234567">(61) 3329-4605</a>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
 <!-- ===================== HEADER TOP AREA END =====================-->

  <!--=====HEADER START=======-->
   <header>
    <div class="header-area homepage1 header header-sticky d-none d-xl-block mt-16" id="header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="header-elements header-elements-1">
              <div class="site-logo">
                <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/vl-logo-1.1.png" alt=""></a>
              </div>
              <div class="main-menu">
                <ul>
                  
                  <li><a href="/about">O Projeto</a></li>
                  
                  <li><a href="#">Regiões  <i class="fa-solid fa-angle-down"></i></a>
                    <ul class="dropdown-padding">
                      <li><a href="/regioes/norte">Norte</a></li>
                      <li><a href="/regioes/nordeste">Nordeste</a></li>
                      <li><a href="/regioes/centro-oeste">Centro-Oeste</a></li>
                      <li><a href="/regioes/sudeste">Sudeste</a></li>
                      <li><a href="/regioes/sul">Sul</a></li>
                    </ul>
                  </li>
                  <li><a href="/galerias">Galeria</a></li>
                  <li><a href="/calendario">Calendário</a></li>
                  <li><a href="/noticias">Notícias</a></li>
                  <li><a href="/contato">Contato</a></li>
                  
                  
                </ul>
              </div>
              <div class="btn-area">
                <a href="/biblioteca" class="header-btn1">Biblioteca   <span><i class="fa-solid fa-arrow-right"></i></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   </header>
  <!--=====HEADER END =======-->

  <!--===== MOBILE HEADER STARTS =======-->
 <div class="mobile-header mobile-haeder1 d-block d-xl-none">
  <div class="container">
    <div class="col-12">
      <div class="mobile-header-elements">
        <div class="mobile-logo">
          <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/vl-logo-1.1.png" alt=""></a>
        </div>
        <div class="mobile-nav-icon dots-menu">
          <i class="fa-solid fa-bars"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="mobile-sidebar mobile-sidebar1">
  <div class="logosicon-area">
    <div class="logos">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/vl-footer-logo-1.1.png" alt="">
    </div>
    <div class="menu-close">
      <i class="fa-solid fa-xmark"></i>
    </div>
   </div>
  <div class="mobile-nav mobile-nav1">
    <ul class="mobile-nav-list nav-list1">
      <li><a href="/about">O Projeto</a></li>
      <li><a href="#">Regiões</a>
        <ul class="sub-menu">
          <li><a href="/regioes/norte">Norte</a></li>
          <li><a href="/regioes/nordeste">Nordeste</a></li>
          <li><a href="/regioes/centro-oeste">Centro-Oeste</a></li>
          <li><a href="/regioes/sudeste">Sudeste</a></li>
          <li><a href="/regioes/sul">Sul</a></li>
        </ul>
      </li>
      <li><a href="/galerias">Galeria</a></li>
      <li><a href="/calendario">Calendário</a></li>
      <li><a href="/noticias">Notícias</a></li>
      <li><a href="/contato">Contato</a></li>
    </ul>

    <div class="allmobilesection">
      <!-- btn -->
      <a href="/biblioteca"  class="header-mobile-btn1">Biblioteca <span><i class="fa-solid fa-arrow-right"></i></span></a>
      
      <div class="vl-mobile-contact1">
        <h3 class="title">Informações</h3>
        <div class="footer1-contact-info">
          <div class="contact-info-single">
            <div class="contact-info-icon">
              <i class="fa-solid fa-phone-volume"></i>
            </div>
            <div class="contact-info-text">
              <a href="tel:+3(924)4596512">
                (61) 3329-4605
                </a>
            </div>
          </div>

          <!-- single footer -->
          <div class="contact-info-single">
            <div class="contact-info-icon">
              <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="contact-info-text">
              <a href="mailto:info@example.com">psat@fiocruz.br</a>
            </div>
          </div>

          <div class="vl-mobile-contact1">
            <h3 class="title">Social Links</h3>
            <div class="social-links-mobile-menu">
              <ul>
                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
     </div>
  </div>
</div>
<!--===== MOBILE HEADER STARTS =======-->

	</header><!-- #masthead -->
