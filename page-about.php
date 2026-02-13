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
          <h2 class="heading">O Projeto</h2>
            <div class="vl-breadcrumb-list">
              <span><a href="page-index.html">Home</a></span>
              <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>
              <span><a class="active" href="#">O Projeto</a></span>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--===== BREADCRUMB AREA ENDS =======-->


<!--===== ABOUT AREA STARTS =======-->
<section class="vl-about5 sp2">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6">
        <div class="vl-about-content">
          <div class="vl-section-title-1 mb-50">
            <h5 class="subtitle">Sobre Nós</h5>
            <h2 class="title">Promoção da saúde valorizando saberes e territórios</h2>
            <p>O projeto Territórios Saudáveis e Sustentáveis na Promoção do Cuidado, ou simplesmente Territórios de Cuidado, é uma parceria entre a Fiocruz e o Ministério da Saúde.
              Nosso objetivo é desvelar as diversas ações de promoção da saúde que se caracterizam a partir da cultura e do modo de vida nos territórios. Promovendo formação-ação com uma abordagem intersetorial e interseccional para ampliar o debate e promoção da saúde, meio ambiente, cultura e participação social, sempre valorizando os saberes locais e o protagonismo das pessoas.
            </p>
            <p class="para">Nosso objetivo é desvelar as diversas ações de promoção da saúde que se caracterizam a partir da cultura e do modo de vida nos territórios. Promovendo formação-ação com uma abordagem intersetorial e interseccional para ampliar o debate e promoção da saúde, meio ambiente, cultura e participação social, sempre valorizando os saberes locais e o protagonismo das pessoas.</p>
          </div>

          
        </div>
      </div>
      <div class="col-xl-6 col-lg-6">
        <div class="vl-about-content2 ml-20">
          <!-- thumbnail -->
           <div class="large-thumb mb-20">
            <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/about/vl-about-thum-inner-large-1.3.png" alt="">
           </div>
           <!-- content -->
            
        </div>
      </div>
    </div>
  </div>
</section>
<!--===== ABOUT AREA ENDS =======-->


<!--===== VISSION AREA STARTS =======-->
<section class="vl-about-vission-bg sp2">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6">
        <div class="vl-vission-content">
          <div class="vl-section-title-1">
            <h2 class="title">O que queremos alcançar?</h2>
          </div>

          <div class="vl-vission-tab2">
            <div class="row">
              <div class="col-xl-12">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Formação-ação</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Comunicação social </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Rede sociotécnica</button>
                  </li>
                </ul>
              </div>
            </div>
            
            <div class="row">
              <div class="col-xl-12">
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                    <p class="para">Realizamos processos de formação voltados para os movimentos sociais por meio de uma abordagem intersetorial e interseccional que prioriza estratégias participativas e educativas para desenvolver ações locais de promoção da saúde, valorizando assim os saberes populares. </p>
                    
                  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <p class="para">Promovemos o debate da comunicação e informação sobre a perspectiva de promoção da saúde nos territórios, incentivando a produção de conteúdos a partir das iniciativas locais. Além de produzirmos conteúdos pedagógicos e informativos que ajudam a divulgar essas boas práticas e ampliar o debate sobre saúde, cuidado e equidade. </p>
                  </div>
                  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                    <p class="para">Estamos construindo uma plataforma virtual colaborativa que vai conectar pessoas, territórios e saberes. Nela será possível acessar dados, compartilhar experiências e encontrar ferramentas úteis para mobilização e promoção da saúde. </p>
                  </div>
                </div>
              </div>
            </div>
            
          </div>

        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-4">
        <div class="vission-thumb">
          <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/about/vl-vission2.png" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<!--===== VISSION AREA ENDS =======-->

<!--===== COUNTER AREA STARTS =======-->
<section class="vl-counter5 sp2">
  <div class="container">
    <div class="row">
      <div class="col-xl-6">
          <div class="vl-counter-content mb-30">
            <div class="vl-section-title5">
              <h5 class="subtitle" data-aos="zoom-in-up" data-aos-duration="1200" data-aos-delay="300">Alcance do cuidado</h5>
              <h1 class="title text-anime-style-3">Números <br> do Projeto</h1>
              <p class="para" data-aos="zoom-in-up" data-aos-duration="1200" data-aos-delay="300">Mais que números, o Territórios de Cuidado revela histórias vivas. Já são dezenas de territórios mobilizados, centenas de pessoas formadas e múltiplas ações que integram saúde, cultura, meio ambiente e participação social. Cada dado representa o protagonismo de quem cuida e transforma seu lugar.</p>
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

<!--===== BRAND AREA STARTS =======-->
<div class="container">
  <div class="row">
    <div class="row align-items-center">
      <div class="col-lg-6">
         <div class="vl-work-content-6 mb-30">
            <div class="vl-section-title-9">
               <h2 class="vl-title text-anime-style-3">Parceiros</h2>
               <p>Contamos com o apoio de movimentos sociais, universidades, secretarias estaduais e municipais, além de lideranças comunitárias e organizações locais.</p>
            </div>
         </div>
      </div>
   </div>
    <div id="vl-brand-active4" class="owl-carousel owl-theme mt-20">
      <div class="single-brand-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/brand-logo-4.1.svg" alt="">
      </div>

      <div class="single-brand-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/brand-logo-4.2.svg" alt="">
      </div>

      <div class="single-brand-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/brand-logo-4.3.svg" alt="">
      </div>

      <div class="single-brand-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/brand-logo-4.4.svg" alt="">
      </div>

    </div>
  </div>
</div>
<!--===== BRAND AREA ENDS =======-->

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
