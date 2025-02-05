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

        if (!['dashboard-link', 'register-link'].includes(linkId)) {
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
function register(event) {
    event.preventDefault(); // Ngăn chặn hành động mặc định của form

    // Lấy giá trị từ form
    const name = document.getElementById('registerName').value;
    const username = document.getElementById('registerUsername').value;
    const email = document.getElementById('registerEmail').value;
    const password = document.getElementById('registerPassword').value;
    const repeatPassword = document.getElementById('registerRepeatPassword').value;

    // Kiểm tra mật khẩu
    if (password !== repeatPassword) {
        alert('Mật khẩu và nhập lại mật khẩu không khớp!');
        return;
    }

    // Tạo đối tượng dữ liệu để gửi đi
    const requestData = {
        name: name,
        username: username,
        email: email,
        password: password,
        password_confirmation: repeatPassword, // Sử dụng biến đã kiểm tra
    };

    // Gửi POST request đến API
    fetch('http://nampox.local/api/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(requestData),
    })
        .then(response => {
            return response.text().then(text => {
                // In ra phản hồi trước khi phân tích
                console.log("Phản hồi từ server:", text);
                if (!response.ok) {
                    throw new Error(text || 'Có lỗi xảy ra trong quá trình đăng ký!');
                }
                return JSON.parse(text); // Phân tích JSON sau khi in ra
            });
        })
        .then(data => {
            // Xử lý dữ liệu đáp ứng từ API
            console.log(data);
            alert('Đăng ký thành công!');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Đăng ký không thành công. Vui lòng kiểm tra lại! ' + error.message);
        });
}
