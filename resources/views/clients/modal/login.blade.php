<div class="modalControllers">
    <div class="modal__bodys">
        <div class="auth-form">
            <form action="" class="login-form">
                @csrf
                <div class="auth-form-header">
                    <h3 class="auth-form-heading">Đăng nhập</h3>
                    <span class="auth-form_switch-btn">Đăng ký</span>
                </div>
                <div class="auth-form-body-list">
                    <div class="auth-form-body-item">
                        <input type="text"  class="auth-form-body-item-input username" placeholder="Tên tài khoản của bạn">
                        <p id="error_username"></p>
                    </div>
                    <div class="auth-form-body-item">
                        <input type="password"  class="auth-form-body-item-input password" placeholder="Mật khẩu">
                        <p id="error_password"></p>
                    </div>
                </div>
                <div class="auth-form-aside">
                    <a href="" class="auth-form-forget active">Quên mật khẩu</a>
                    <span class="auth-form__help-separate"></span>
                    <a href="" class="auth-form-helper">Cần trợ giúp</a>
                </div>
                <div class="auth-form__controls">
                    <button class="auth-form__controls-btn-back" id="btnClose">TRỞ LẠI</button>
                    <button class="auth-form__controls-btn-login btn-submit-js ">ĐĂNG NHẬP</button>
                </div>
            </form>

            <form action="" class="register-form">
                @csrf
                <div class="auth-form-header">
                    <h3 class="auth-form-heading">Đăng kí</h3>
                    <span class="auth-form_switch-btn">Đăng Nhập</span>
                </div>
                <div class="auth-form-body-list">
                    <div class="auth-form-body-item">
                        <input type="text"  class="auth-form-body-item-input username" placeholder="Nhập tên tài khoản">
                        <p id="error_username-register"></p>
                    </div>
                    <div class="auth-form-body-item">
                        <input type="password"  class="auth-form-body-item-input password" placeholder="Mật khẩu">
                        <p id="error_password-register"></p>
                    </div>
                    <div class="auth-form-body-item">
                        <input type="password"  class="auth-form-body-item-input password" placeholder="Nhập lại mật khẩu">
                        <p id="error_repassword-register"></p>
                    </div>
                </div>
                <div class="auth-form-aside">
                    <a href="" class="auth-form-forget active">Quên mật khẩu</a>
                    <span class="auth-form__help-separate"></span>
                    <a href="" class="auth-form-helper">Cần trợ giúp</a>
                </div>
                <div class="auth-form__controls">
                    <button class="auth-form__controls-btn-back" id="btnClose-Register">TRỞ LẠI</button>
                    <button class="auth-form__controls-btn-login btn-submit-js ">ĐĂNG KÝ</button>
                </div>

            </form>
        </div>
    </div>
</div>
