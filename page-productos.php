<?php get_header(); ?>
    <main class="container row">
        <div class="filters  ">
            <ul class="is-list-less ">
                <li>
                    <h3 class="filters-title">Tipo de producto</h3>
                    <ul class="is-list-less category-product">
                        <li>
                            <input type="checkbox" id="check1"> <label for="check1">checkbox 1</label>
                        </li>
                        <li>
                            <input type="checkbox" id="check12"> <label for="check12">checkbox 1</label>
                        </li>
                        <li>
                            <input type="checkbox" id="check13"> <label for="check13">checkbox 1</label>
                        </li>
                    </ul>
                </li>
                <li>
                    <h3 class="filters-title">Tipo de producto</h3>
                    <ul class="is-list-less category-product">
                        <li>
                            <input type="checkbox" id="check1"> <label for="check1">checkbox 1</label>
                        </li>
                        <li>
                            <input type="checkbox" id="check12"> <label for="check12">checkbox 1</label>
                        </li>
                        <li>
                            <input type="checkbox" id="check13"> <label for="check13">checkbox 1</label>
                        </li>
                    </ul>
                </li>
                <li>
                    <h3 class="filters-title">Tipo de producto</h3>
                    <ul class="is-list-less category-product">
                        <li>
                            <input type="checkbox" id="check1"> <label for="check1">checkbox 1</label>
                        </li>
                        <li>
                            <input type="checkbox" id="check12"> <label for="check12">checkbox 1</label>
                        </li>
                        <li>
                            <input type="checkbox" id="check13"> <label for="check13">checkbox 1</label>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <section class="products row justify-center">
            <?php for ($i = 0; $i < 12; $i++): ?>
                <article class="col-16 col-m-5 col-l-4 Slide-products">
                    <figure>
                        <img src="https://lilipink.vteximg.com.br/arquivos/ids/169212-300-450/7179-2-1.jpg?v=636536965916770000"
                             alt="915-M-2-1" id="">
                    </figure>
                    <div class="row justify-between">
                        <h2><a href="">Camiseta Manga sisa</a></h2>
                        <a class="icon" href=""><i aria-hidden="true" class="fa fa-search-plus"></i></a>
                    </div>
                    <span>Ref. LE01-012</span>
                </article>
            <?php endfor; ?>
        </section>

    </main>
    <div class="modal justify-center align-item-center">
        <div class="modal-main">
            <span class="modal-close"></span>sa
            <section class="modal-content row ">
                <article class="modal-slide row">
                    <div class="modal-images">
                        <ul class="is-list-less ">
                            <li>
                                <img src="https://lilipink.vteximg.com.br/arquivos/ids/164876-1000-1500/LD03-002_negrorayasrojas-1.jpg?v=636464347894330000"
                                     alt="">
                            </li>
                            <li>
                                <img src="https://lilipink.vteximg.com.br/arquivos/ids/164880-300-450/LD03-002_negrorayasrojas-2.jpg?v=636464347944830000"
                                     alt="">
                            </li>
                        </ul>
                    </div>
                    <ul class="is-list-less modal-image">
                        <li >
                            <img width="380" src="https://lilipink.vteximg.com.br/arquivos/ids/164876-1000-1500/LD03-002_negrorayasrojas-1.jpg?v=636464347894330000"
                                 alt="">
                        </li>
                        <li>
                            <img class="imageZoom"  width="380" src="https://lilipink.vteximg.com.br/arquivos/ids/164880-300-450/LD03-002_negrorayasrojas-2.jpg?v=636464347944830000"
                                 alt="">
                        </li>
                    </ul>
                </article>
                <article class="modal-info">
                    <h2>CHAQUETA DEPORTIVA</h2>
                    <p class="ref">REF. LD03-002</p>
                    <h3>ESPECIFICACIONES</h3>
                    <p>
                        Chaqueta deportiva con capota, escogela con lineas blancas o rojas
                    </p>
                </article>
            </section>
        </div>
    </div>
<?php get_footer();
