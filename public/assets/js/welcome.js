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
