<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>profile</title>

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <link rel="stylesheet" href="/assets/css/home.css">
</head>
<body>
<header class="header">
    <a href="" class="logo">nampox</a>
    <nav class="navbar">
        <a href="#" class="nav-link active" id="home-link">Trang chủ</a>
        <a href="#" class="nav-link" id="project-link">Dự án</a>
        <a href="#" class="nav-link" id="services-link">Services</a>
        <a href="#" class="nav-link" id="portfolio-link">Portfolio</a>
        <a href="#" class="nav-link" id="contact-link">Contact</a>
        @if (Route::has('login'))
            @auth
                <a href="{{ route('dashboard') }}" class="nav-link" id="dashboard-link">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="nav-link" id="login-link">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="nav-link" id="register-link">Register</a>
                @endif
            @endauth
        @endif
    </nav>
</header>
<script>
    $(document).ready(function () {
        function loadProducts() {
            $.ajax({
                url: 'http://nampox.local/api/products',
                type: 'GET',
                success: function (data) {
                    let productsHtml = data.map(product => `
                    <div class="swiper-slide text-center">
                        <a href="#" class="product-link" data-id="${product.id}">
                            <img src="${product.image}" alt="Ảnh sản phẩm" class="d-block w-100 img-fluid"
                                 style="height: 300px; object-fit: cover; object-position: center;">
                        </a>
                        <div class="product-info text-center mt-3">
                            <a class="product-title text-reset text-decoration-none"
                               aria-label="${product.name}"
                               title="${product.name}">
                               ${product.name}
                            </a>
                            <span class="product-price">
                                <span class="current-price">${Number(product.price).toLocaleString('vi-VN')}₫</span>
                            </span>
                        </div>
                    </div>
                `).join('');

                    $('.mySwiper2 .swiper-wrapper').html(productsHtml);
                    initSwipers();
                },
                error: function () {
                    console.error('Lỗi khi tải danh sách sản phẩm.');
                }
            });
        }

        function loadProductDetail(productId) {
            $.ajax({
                url: `/api/products/${productId}`,
                type: 'GET',
                success: function (data) {
                    $('#productDetailModal .modal-title').text(data.name);
                    $('#productDetailModal .image_product').attr('src', data.image);
                    $('#productDetailModal .description').text(data.description);
                    $('#productDetailModal .price').text(`Giá: ${data.price.toLocaleString('vi-VN')}₫`);
                    $('#productDetailModal').modal('show');
                },
                error: function () {
                    alert('Không thể tải thông tin sản phẩm.');
                }
            });
        }

        function initSwipers() {
            new Swiper('.mySwiper2', {
                slidesPerView: 5,
                spaceBetween: 30,
                freeMode: true,
                pagination: { el: '.swiper-pagination', clickable: true }
            });

            new Swiper('.mySwiper1', {
                slidesPerView: 1,
                spaceBetween: 1000,
                pagination: { el: '.swiper-pagination', dynamicBullets: true },
                navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
                effect: 'slide',
                autoplay: { delay: 4000, disableOnInteraction: false },
                loop: true
            });
        }

        $('.nav-link').click(function (e) {
            var linkId = $(this).attr('id');

            if (linkId === 'project-link') {
                e.preventDefault();
                loadProducts();
            }

            if (!['dashboard-link', 'login-link', 'register-link'].includes(linkId)) {
                e.preventDefault();
                var target = linkId.replace('-link', '');
                $('section').hide();
                $('a.nav-link').removeClass('active');
                $('#' + target).show();
                $(this).addClass('active');
            }
        });

        $(document).on('click', '.product-link', function (e) {
            e.preventDefault();
            loadProductDetail($(this).data('id'));
        });
    });

</script>
@include('frontend.user.home')
@include('frontend.user.project')
@include('frontend.user.services')
@include('frontend.user.portfolio')
@include('frontend.user.contact')
</body>
</html>
