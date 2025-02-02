<section class="project" id="project"  style="display: none;">
    <div class="header swiper mySwiper1" style="padding: 20px 20%">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img class="w-100" src="./assets/img/welcome/project/cover1.png" alt=""></div>
                <div class="swiper-slide"><img class="w-100" src="./assets/img/welcome/project/cover2.png" alt=""></div>
                <div class="swiper-slide"><img class="w-100" src="./assets/img/welcome/project/cover3.png" alt=""></div>
            </div>
            <div class="swiper-pagination"></div>
    </div>
    <div class="section_product_hot mt-3">
        <div class="contain">
            <div class="text-center">
                <h2>
                    <a href="" class="text-reset text-decoration-none">Sản phẩm hot</a>
                </h2>
            </div>
            <div class="product-host w-100 mt-4" style="height: 400px;padding: 0 5%;">
                <div class="swiper mySwiper2 mt-4">
                    <div class="swiper-wrapper" style="height: 400px;">
                        <div class="swiper-slide text-center">
                            <a href="">
                                <img src="https://product.hstatic.net/1000333436/product/txvn25_6e73bac970a64f8190b4c971df1d3f14_grande.jpg"
                                     alt="Ảnh sản phẩm"
                                     class="d-block w-100 img-fluid"
                                     style="height: 300px; object-fit: cover; object-position: center;">
                            </a>
                            <div class="product-info text-center mt-3">
                                <a href="" class="product-title a text-reset text-decoration-none" aria-label="Áo vest đỏ đô pastel - AV415" title="Áo vest đỏ đô pastel - AV415">Áo vest đỏ đô pastel - AV415</a>
                                <span class="product-price">
                                    <span class="current-price">3,100,000₫</span>
                                </span>
                            </div>
                        </div>
                        <div class="swiper-slide text-center">
                            <a href="">
                                <img src="https://product.hstatic.net/1000333436/product/txvn21_ad8dd802391c4e15916a6c8286124e16_grande.jpg"
                                     alt="Ảnh sản phẩm"
                                     class="d-block w-100 img-fluid"
                                     style="height: 300px; object-fit: cover; object-position: center;">
                            </a>
                            <div class="product-action clearfix">
                                <div class="group_action"></div>
                            </div>
                        </div>
                        <div class="swiper-slide text-center">
                            <a href="">
                                <img src="https://product.hstatic.net/1000333436/product/txv209csv_7bdb27289fb8443f98bbfb9a09891b30_grande.jpg"
                                     alt="Ảnh sản phẩm"
                                     class="d-block w-100 img-fluid"
                                     style="height: 300px; object-fit: cover; object-position: center;">
                            </a>
                            <div class="product-action clearfix">
                                <div class="group_action"></div>
                            </div>
                        </div>
                        <div class="swiper-slide text-center">
                            <a href="">
                                <img src="https://product.hstatic.net/1000333436/product/416_a07c6467cc7147a5ab84cba3a247575b_grande.jpg"
                                     alt="Ảnh sản phẩm"
                                     class="d-block w-100 img-fluid"
                                     style="height: 300px; object-fit: cover; object-position: center;">
                            </a>
                            <div class="product-action clearfix">
                                <div class="group_action"></div>
                            </div>
                        </div>
                        <div class="swiper-slide text-center">
                            <a href="">
                                <img src="https://product.hstatic.net/1000333436/product/314cq_c61ea6d3072f4d0bb1685babe2b6526c_grande.jpg"
                                     alt="Ảnh sản phẩm"
                                     class="d-block w-100 img-fluid"
                                     style="height: 300px; object-fit: cover; object-position: center;">
                            </a>
                            <div class="product-action clearfix">
                                <div class="group_action"></div>
                            </div>
                        </div>
                        <div class="swiper-slide text-center">
                            <a href="">
                                <img src="https://product.hstatic.net/1000333436/product/394_47aa91918fae465ea7fbd65babcbe469_grande.jpg"
                                     alt="Ảnh sản phẩm"
                                     class="d-block w-100 img-fluid"
                                     style="height: 300px; object-fit: cover; object-position: center;">
                            </a>
                            <div class="product-action clearfix">
                                <div class="group_action"></div>
                            </div>
                        </div>
                        <div class="swiper-slide text-center">
                            <a href="">
                                <img src="https://product.hstatic.net/1000333436/product/344_2e330be03eba4db29b3e735efa79f755_grande.jpg"
                                     alt="Ảnh sản phẩm"
                                     class="d-block w-100 img-fluid"
                                     style="height: 300px; object-fit: cover; object-position: center;">
                            </a>
                            <div class="product-action clearfix">
                                <div class="group_action"></div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
        // Khởi tạo Swiper
        var swiper1 = new Swiper('.mySwiper1', {
            slidesPerView: 1,
            spaceBetween: 1000,
            pagination: {
                el: '.swiper-pagination',
                dynamicBullets: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            effect: 'slide',
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            loop: true,
        });
        var swiper2 = new Swiper('.mySwiper2', {
            slidesPerView: 5, // Hiện 3 slide một lần
            spaceBetween: 30, // Khoảng cách giữa các slide
            freeMode: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
</script>
<style>
    .product-title {
        position: relative;
        display: inline-block;
    }
    .product-title::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 0%;
        height: 2px;
        background-color: #ffffff;
        transition: width .5s ease-in-out;
    }
    .product-title:hover::after {
        width: 100%;
    }
    .product-title::after {
        transition: width .5s ease-in-out;
    }
    .product-info a{
        text-transform: uppercase;
        display: inline-block;
        text-align: center;
        margin-bottom: 15px;
        position: relative;
    }
    .current-price{
        margin-right: 10px;
        color: red;
    }
</style>
