<section class="login" id="login" style="display: none;">
    <div class="home-content mx-auto col-md-3">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form>
                    <div class="text-center mb-2">
                        <p class="m-0">Đăng nhập với:</p>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                            <i class='bx bxl-facebook'></i>
                        </button>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                            <i class='bx bxl-google'></i>
                        </button>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                            <i class='bx bxl-twitter'></i>
                        </button>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                            <i class='bx bxl-github'></i>
                        </button>
                    </div>

                    <p class="text-center mb-2">Hoặc:</p>

                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="loginName" class="form-control" placeholder="Email hoặc tên tài khoản"/>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" id="loginPassword" class="form-control" placeholder="Mật khẩu" />
                    </div>

                    <!-- 2 column grid layout -->
                    <div class="row mb-4">
                        <div class="col-md-6 d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-3 mb-md-0">
                                <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                <label class="form-check-label" for="loginCheck"> Lưu mật khẩu </label>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-center">
                            <!-- Simple link -->
                            <a href="#!">Quên mật khẩu?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4 w-100">Đăng nhập</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Không có tài khoản? <a href="#!" id="registerLink">Đăng ký</a></p>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <form id="registerForm" onsubmit="register(event)">
                    @csrf
                    <div class="text-center mb-3">
                        <p class="m-0">Sign up with:</p>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                            <i class='bx bxl-facebook'></i>
                        </button>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                            <i class='bx bxl-google'></i>
                        </button>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                            <i class='bx bxl-twitter'></i>
                        </button>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                            <i class='bx bxl-github'></i>
                        </button>
                    </div>

                    <p class="text-center">hoặc:</p>

                    <!-- Name input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="registerName" class="form-control" placeholder="Họ tên" />
                    </div>

                    <!-- Username input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="registerUsername" class="form-control" placeholder="Tên đăng nhập" />
                    </div>

                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="registerEmail" class="form-control" placeholder="Email" />
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" id="registerPassword" class="form-control" placeholder="Mật khẩu" />
                    </div>

                    <!-- Repeat Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" id="registerRepeatPassword" class="form-control" placeholder="Nhập lại mật khẩu" />
                    </div>

                    <!-- Checkbox -->
                    <div class="form-check d-flex justify-content-center mb-4">
                        <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked />
                        <label class="form-check-label" for="registerCheck">
                            Tôi đã đọc và đồng ý với các điều khoản
                        </label>
                    </div>

                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-3 w-100">Đăng ký</button>

                    <!-- Nút quay lại đăng nhập -->
                    <div class="text-center">
                        <p><a href="#" id="backToLoginLink">Quay lại đăng nhập</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('registerLink').addEventListener('click', function() {
        // Chuyển đổi giữa các tab
        document.getElementById('pills-login').classList.remove('show', 'active');
        document.getElementById('pills-register').classList.add('show', 'active');
    });

    document.getElementById('backToLoginLink').addEventListener('click', function() {
        // Chuyển về tab đăng nhập
        document.getElementById('pills-register').classList.remove('show', 'active');
        document.getElementById('pills-login').classList.add('show', 'active');
    });
</script>
