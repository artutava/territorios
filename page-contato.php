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
          <h2 class="heading">Contato</h2>
            <div class="vl-breadcrumb-list">
              <span><a href="page-index.html">Home</a></span>
              <span class="dvir"><i class="fa-solid fa-angle-right"></i></span>
              <span><a class="active" href="#">Contato</a></span>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--===== BREADCRUMB AREA ENDS =======-->



<!--===== CONTACT AREA STARTS =======-->
<section class="vl-contact-section-inner sp2">
  <div class="container">
    <div class="row flex-lg-row flex-column-reverse">

      <!--===== Icon AREA STARTS =======-->
<section class="vl-icon-box-inner pb-70">
  <div class="container">
    <div class="row">
      <!-- icon box -->
      <div class="col-xl-4 col-md-6 mb-30">
        <div class="iconbox">
          <div class="icon-box-flex">
            <div class="icon">
              <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-phone-icon1.1.svg" alt=""></span>
            </div>
            <div class="icon-content">
              <p class="para">Telefone</p>
              <h3 class="title">(61) 3329-4605</h3>
            </div>
          </div>
        </div>
      </div>
      <!-- icon box -->
      <div class="col-xl-4 col-md-6 mb-30">
        <div class="iconbox active">
          <div class="icon-box-flex">
            <div class="icon">
              <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-phone-icon1.2.svg" alt=""></span>
            </div>
            <div class="icon-content">
              <p class="para">E-mail</p>
              <h3 class="title">psat@fiocruz.br</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--===== Icon AREA ENDS =======-->


      <div class="col-xl-6 mb-30">
        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/about/vl-about-thum-inner-large-1.3.png" alt="">
      </div>
      <div class="col-xl-6 mb-30">
        <div class="vl-section-content ml-50">
          <div class="section-title">
            <h4 class="subtitle">Contate-nos</h4>
            <h2 class="title">Vamos Conversar? Seu Apoio Muda Histórias</h2>
            <p class="para pb-32">Tem alguma dúvida, sugestão ou quer saber como se engajar nas ações do projeto?</p>
          </div>

          <!-- form start -->
           <div class="vl-form-inner">
            <form action="#">
              <div class="row">
                <div class="col-lg-6">
                  <input type="text" placeholder="Primeiro Nome*"> 
                </div>
                <div class="col-lg-6">
                  <input type="text" placeholder="último Nome*"> 
                </div>
                <div class="col-lg-12">
                  <input type="email" placeholder="E-mail*"> 
                </div>
                <div class="col-lg-12">
                  <select class="nice-select wide vl-select">
                    <option data-display="Assunto">Outros</option>
                    <option value="1">Saúde</option>
                    <option value="2">Educação</option>
                    <option value="3">Acolhimento</option>
                    <option value="4">Voluntariado</option>
                    <option value="5">Social</option>
                  </select>
              </div>
              <div class="col-lg-12">
                <textarea name="message" id="message" placeholder="Como podemos te ajudar?*"></textarea>
              </div>
              <div class="col-lg-12">
                <div class="btn-area">
                  <button class="header-btn1">Enviar <span><i class="fa-solid fa-arrow-right"></i></span></button>
                </div>
              </div>
              </div>
            </form>
            
           </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--===== CONTACT AREA ENDS =======-->


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
