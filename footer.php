<?php $datos = get_option('settings_theme');?>
<footer>
    <section class="Footer-content">
        <div class="row container-less justify-between ">
            <article class="col-16 col-m-8 Footer-links is-text-center">
                <h3>enlaces de interés</h3>
                <ul class="is-list-less">
                    <li><a href="">Sobre Nosotros</a></li>
                    <li><a href="">Preguntas Frecuentes</a></li>
                    <li><a href="">Condiciones y Restricciones</a></li>
                    <li><a href="">Ventas al por mayor</a></li>
                    <li><strong><?php echo  $datos['phone']?></strong></li>
                </ul>
            </article>
            <article class="col-16 col-m-8 Newsletter">
                <h3 class="is-text-center">Recibe las mejores <br> promociones en tu e-mail</h3>
                <form action="">
                    <div class="Newsletter-content">
                        <input type="text" placeholder="E-MAIL">
                        <button type="submit">Enviar</button>
                    </div>
                    <p><input id="check" type="checkbox"><label for="check">Acepto política de privacidad</label></p>
                </form>
                <p class="is-text-center">O en nuestras redes sociales</p>
                <ul class="is-list-less row justify-center Footer-social">
                    <li><a href="<?php echo  $datos['face']?>"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="<?php echo  $datos['ins']?>"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </article>
        </div>
    </section>

    <section class="row justify-center Footer-foot">
        <div class="col-10 is-text-center">
            <p><?php echo  $datos['copy1']?> </p>
            <p><?php echo  $datos['copy2']?></p>
        </div>
    </section>
</footer>
<div class="modal justify-center align-item-center">
  <div class="modal-main">
    <span class="modal-close"></span>
    <section class="modal-content row ">
      <article class="modal-slide row">
        <div class="modal-images">
          <ul class="is-list-less " id="modalThumb">
          </ul>
        </div>
        <ul class="is-list-less modal-image" id="modalImage">
        </ul>
      </article>
      <article class="modal-info">
        <h2 id="titleProduct"></h2>
        <p id="priceProduct" class="ref">$49.000</p>
          <i>REF: <span id="refProduct"></span></i>
        <h3>ESPECIFICACIONES</h3>
        <div id="contentProduct"></div>
        <form action="<?php echo($_SERVER["PHP_SELF"]);?>" method="post">
          <button class="modal-infoWishlist  ">
            <input name="wishProduct" id="wishProduct" type="hidden" value="">
            <div class="">
              <img src="<?php bloginfo( 'template_url' ) ?>/public/images/wishLilipink.png">
            </div>
            <span  class="wlBtnText">Enviar a la lista de deseos</span>
          </button>
        </form>
      </article>
    </section>
  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
