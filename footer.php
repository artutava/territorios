<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Territorios
 */

?>

<!--===== FOOTER AREA STARTS =======-->
<footer class="vl-footer-bg-1">
  <div class="container">
    <div class="row">
      <div class="col-xl-3 col-md-6">
        <div class="vl-footer-widget-1 mb-30">
          <div class="vl-footer-logo">
            <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/vl-footer-logo-1.1.png" alt=""></a>
          </div>
          <div class="vl-footer-content">
            <p>Saúde, Sustentabilidade e Saberes Locais em Ação </p>
          </div>
          <div class="vl-footer-social-1">
            <ul>
              <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="vl-footer-widget-2 pl-90 mb-30">
          <h3 class="title">Links Rápidos</h3>
          <div class="vl-footer-menu">
            <ul>
              <li><a href="/about">O Projeto</a></li>
              <li><a href="/calendario">Calendário</a></li>
              <li><a href="/noticias">Notícias</a></li>
              
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="vl-footer-widget-2 pl-30 mb-30">
          <h3 class="title">Territórios</h3>
          <div class="vl-footer-menu">
            <ul>
              <li><a href="#">Cachoeira</a></li>
              <li><a href="#">Mossoró</a></li>
              <li><a href="#">Codó</a></li>
              <li><a href="#">Ilha de Marajó</a></li>
              <li><a href="#">Marabá</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="vl-footer-widget-3 mb-30">
          <h3 class="title">Contato</h3>
          <!-- single box -->
            <div class="vl-footer-icon-list">
              <div class="vl-footer-icon">
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-footer-ic-1.1.svg" alt=""></span>
              </div>
              <div class="vl-footer-text">
                <a href="mailto:support@charity.com">psat@fiocruz.br</a>
              </div>
            </div>

            <!-- single box -->
            <div class="vl-footer-icon-list">
              <div class="vl-footer-icon">
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vl-footer-2.1.svg" alt=""></span>
              </div>
              <div class="vl-footer-text">
                <a href="tel:1234567890">(61) 3329-4605</a>
              </div>
            </div>
          </div>
      </div>
    </div>  

     <div class="vl-copyright copyright-border-1">
        <div class="row">
          <div class="col-md-6">
            <p class="vl-copyright-text">© 2025 Territórios de Cuidado. All Rights Reserved.</p>
          </div>
          <div class="col-md-6">
            <div class="vl-copyright-menu">
              <ul>
                <li><a href="#">Política de Privacidade</a></li>
                <li><a href="#">Termos & Condições</a></li>
              </ul>
            </div>
          </div>
        </div>
     </div>
  </div>
</footer>
<!--===== FOOTER AREA ENDS =======-->

<!--===== Scroll Top =======-->
<div class="paginacontainer">
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
  </div>
</div> 

 <script>
      am5.ready(function () {
        const root = am5.Root.new("chartdiv");
        root.setThemes([am5themes_Animated.new(root)]);

        const chart = root.container.children.push(
          am5map.MapChart.new(root, {
            panX: "none",
            panY: "none",
            wheelX: "none",
            wheelY: "none",
            pinchZoom: false,
            projection: am5map.geoMercator(),
          })
        );

        const brazilSeries = chart.series.push(
          am5map.MapPolygonSeries.new(root, {
            geoJSON: am5geodata_brazilLow,
          })
        );

        const statesData = {
          "BR-PA": { name: "Pará" },
          "BR-MA": { name: "Maranhão" },
          "BR-PI": { name: "Piauí" },
          "BR-RN": { name: "Rio Grande do Norte" },
          "BR-CE": { name: "Ceará" },
          "BR-PB": { name: "Paraíba" },
          "BR-BA": { name: "Bahia" },
          "BR-TO": { name: "Tocantins" },
        };

        brazilSeries.mapPolygons.template.setAll({
          interactive: false,
          fill: am5.color(0xdddddd),
          templateField: "polygonSettings",
        });

        brazilSeries.mapPolygons.each((polygon) => {
          const id = polygon.dataItem.get("id");
          if (statesData[id]) {
            polygon.set("interactive", true);
            polygon.states.create("hover", {
              fill: am5.color("#357a3a"),
            });
          }
        });

        brazilSeries.mapPolygons.template.states.create("hover", {
          fill: am5.color("#357a3a"),
        });

        brazilSeries.data.setAll(
          Object.entries(statesData).map(([id, state]) => ({
            id,
            name: state.name,
            polygonSettings: {
              fill: am5.color("#469B49"),
            },
          }))
        );

        const pointSeries = chart.series.push(
          am5map.MapPointSeries.new(root, {})
        );

        pointSeries.bullets.push(function () {
          const wrapper = document.createElement("div");
          wrapper.className = "pulse-wrapper";

          const ring = document.createElement("div");
          ring.className = "pulse-ring";
          wrapper.appendChild(ring);

          const container = am5.Container.new(root, {
            width: 18,
            height: 18,
            centerX: am5.p50,
            centerY: am5.p50,
            tooltipY: 0,
          });

          const circle = am5.Circle.new(root, {
            radius: 6,
            fill: am5.color("#FFC107"),
            tooltipHTML: "{tooltipHTML}",
            cursorOverStyle: "pointer",
            interactive: true,
            strokeOpacity: 0,
            strokeWidth: 2,
            stroke: am5.color("#FFC107"),
          });

          // Animate "scale" to create pulse effect
          circle.animate({
            key: "scale",
            from: 1,
            to: 1.6,
            duration: 3000,
            loops: Infinity,
            easing: am5.ease.yoyo(am5.ease.cubic), // 👈 back-and-forth
          });

          // ✅ Verifica se o tooltip já está criado antes de manipular
          root.events.once("frameended", function () {
            const tooltip = circle.getTooltip();
            if (tooltip) {
              tooltip.get("background").setAll({
                fillOpacity: 0,
                strokeOpacity: 0,
              });
            }
          });

          container.children.push(circle);

          // ✅ Protege o acesso ao native DOM
          setTimeout(() => {
            if (circle._display && circle._display._native) {
              circle._display._native.appendChild(wrapper);
            }
          }, 0);

          return am5.Bullet.new(root, {
            sprite: container,
          });
        });

        const pointsData = [
          {
            id: "ponto1",
            coordinates: [-49.5, -1.0],
            title: "Breves",
            states: ["PA"],
            body: `
        Anajás; Bagre;
        Curralinho; Gurupá;
        Melgaço; Muaná; Oeiras
        do Pará; Portel; e São
        Sebastião da Boa Vista.`,
          },
          {
            id: "ponto2",
            coordinates: [-43.5, -4.7],
            title: "Codó",
            states: ["MA", "PI"],
            body: `
        <strong>MA</strong> Alcântara, Aldeias Altas, Barreirinhas, Caxias, Chapadinha, Coroatá, Dom Pedro, Itapecuru, Santo Antônio dos Lopes, Parnarama, Pedreiras, São Luís<br><br>
        <strong>PI</strong> José de Freitas, Piripiri, Teresina, União`,
          },
          {
            id: "ponto3",
            coordinates: [-37.34, -5.19],
            title: "Mossoró",
            states: ["RN", "CE", "PB"],
            body: `
        <strong>RN</strong> Açu, Apodi, Baraúna, Caraúba, Governador Dix-Sept, Grossos, Ipanguaçu, Macau, Natal, Umarizal, Upanema<br><br>
        <strong>CE</strong> Aracati, Fortim, Icapuí, Russas<br><br>
        <strong>PB</strong> Cajazeirinhas, Cajazeiras, Catolé do Rocha, Pombal`,
          },
          {
            id: "ponto4",
            coordinates: [-38.96, -12.6],
            title: "Cachoeira",
            states: ["BA"],
            body: `
        Alagoinhas, Cruz das Almas, Feira de Santana, Itacaré, Maragogipe, São Felix, Salinas da Margarida, Santo Amaro, Santo Estêvão, São Sebastião do Passé, Simões Filho`,
          },
          {
            id: "ponto5",
            coordinates: [-49.12, -5.37],
            title: "Marabá",
            states: ["PA", "TO", "MA"],
            body: `
        <strong>MA</strong> Açailândia, Buritirana, Estreito, Imperatriz, Montes Altos, São Francisco do Brejão<br><br>
        <strong>PA</strong> Dom Eliseu, Parauapebas, Rondon do Pará, Ulianópolis<br><br>
        <strong>TO</strong> Araguatins, Praia Norte, Sítio Novo do Tocantins`,
          },
        ];

        const tooltipFromPoint = (point) => {
          const badges = point.states
            .map(
              (sigla) => `<span class="badge badge-warning m-1">${sigla}</span>`
            )
            .join("");
          return `
      <div class="tooltip-card">
        <div style="font-weight: bold; font-size: 18px; margin-bottom: 6px;">
          ${point.title} ${badges}
        </div>
        <div>${point.body}</div>
      </div>
    `;
        };

        pointSeries.data.setAll(
          pointsData.map((p) => ({
            id: p.id,
            geometry: { type: "Point", coordinates: p.coordinates },
            tooltipHTML: tooltipFromPoint(p),
          }))
        );
      });
    </script>


<!--===== JS SCRIPT LINK =======-->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/jquery-3.7.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/fontawesome.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/aos.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/counter.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/sidebar.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/magnific-popup.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/mobilemenu.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/owlcarousel.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/swiper-bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/nice-select.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/jquery.counterup.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/waypoints.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/slick-slider.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/circle-progress.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/gsap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/ScrollTrigger.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/Splitetext.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/lightbox.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/circle-progress.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>




</body>
</html>

