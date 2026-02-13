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
<section class="vl-breadcrumb" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/breadcrumb/vl-event-breadcrumb.png);">
  <div class="container">
    <div class="row">
      <div class="col-xl-5">
        <div class="vl-breadcrumb-title">
          <h2 class="heading">Calendário</h2>
            <div class="vl-breadcrumb-list">
              <span><a href="page-index.html">Home</a></span>
              <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>
              <span><a class="active" href="#">Calendário</a></span>
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
       <p>Esta página reúne os momentos em que corpos, ideias e afetos se encontram.
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
      <!-- single event item -->
      <div class="col-lg-12 mb-50">
        <div class="event-bg-flex active">
          <div class="event-date col-lg-1">
            <h3 class="title">01</h3>
            <p class="year">JAN <br class="d-none d-xl-block"> 2025</p>
          </div>
          <div class="event-content">
            <div class="event-meta">
              <p class="para"><span><i class="fa-regular fa-clock"></i></span>  9h - 17h</p>
            </div>
            <a href="page-event-single.html" class="title">Oficina de Formação em Promoção da Saúde <br class="d-none d-xl-block">- Território Maranhão</br></a>
            <p class="para"><span><i class="fa-solid fa-location-dot"></i></span>  Centro de Formação XYZ, Rua das Mangueiras , 300 – Codó/MA</p>
          </div>
        </div>
      </div>

       <!-- single event item -->
       <div class="col-lg-12 mb-50">
        <div class="event-bg-flex active">
          <div class="event-date col-lg-1">
            <h3 class="title">01</h3>
            <p class="year">JAN <br class="d-none d-xl-block"> 2025</p>
          </div>
          <div class="event-content">
            <div class="event-meta">
              <p class="para"><span><i class="fa-regular fa-clock"></i> 9h - 17h</p>
            </div>
            <a href="page-event-single.html" class="title">Workshop FioCruz Brasília</a>
            <p class="para"><span><i class="fa-solid fa-location-dot"></i></span> Avenida L3 Norte, s/n, <br class="d-none d-xl-block"> Campus Universitário Darcy Ribeiro, Gleba A, Brasília </p>
          </div>
        </div>
      </div>

       <!-- single event item -->
       <div class="col-lg-12 mb-50">
        <div class="event-bg-flex active">
          <div class="event-date col-lg-1">
            <h3 class="title">01</h3>
            <p class="year">JAN <br class="d-none d-xl-block"> 2025</p>
          </div>
          <div class="event-content">
            <div class="event-meta">
              <p class="para"><span><i class="fa-regular fa-clock"></i></span>  9h - 17h</p>
            </div>
            <a href="page-event-single.html" class="title">Workshop FioCruz Brasília</a>
            <p class="para"><span><i class="fa-solid fa-location-dot"></i></span>  Avenida L3 Norte, s/n, <br class="d-none d-xl-block"> Campus Universitário Darcy Ribeiro, Gleba A, Brasília </p> 
          </div>
        </div>
      </div>

       <!-- single event item -->
       <div class="col-lg-12 mb-50">
        <div class="event-bg-flex active">
          <div class="event-date col-lg-1">
            <h3 class="title">01</h3>
            <p class="year">JAN <br class="d-none d-xl-block"> 2025</p>
          </div>
          <div class="event-content">
            <div class="event-meta">
              <p class="para"><span><i class="fa-regular fa-clock"></i>  9h - 17h</p>
            </div>
            <a href="page-event-single.html" class="title">Workshop FioCruz Brasília</a>
            <p class="para"><span><i class="fa-solid fa-location-dot"></i></span>  Avenida L3 Norte, s/n, <br class="d-none d-xl-block"> Campus Universitário Darcy Ribeiro, Gleba A, Brasília </p>
          </div>
        </div>
      </div>

       <!-- single event item -->
       <div class="col-lg-12 mb-50">
        <div class="event-bg-flex active">
          <div class="event-date col-lg-1">
            <h3 class="title">01</h3>
            <p class="year">JAN <br class="d-none d-xl-block"> 2025</p>
          </div>
          <div class="event-content">
            <div class="event-meta">
              <p class="para"><span><i class="fa-regular fa-clock"></i>  9h - 17h</p>
            </div>
            <a href="page-event-single.html" class="title">Workshop FioCruz Brasília</a>
            <p class="para"><span><i class="fa-solid fa-location-dot"></i></span>  Avenida L3 Norte, s/n, <br class="d-none d-xl-block"> Campus Universitário Darcy Ribeiro, Gleba A, Brasília </p>
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
