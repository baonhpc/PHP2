<?php $this->layout('Client/Components/Layout'); ?>



<?php $this->start('main_content') ?>
<!-- Insert nội dung vào đây -->

<!--Content-->
<div class="content">
  <section class="signup">
    <div class="container">
      <div class="signin-left">
        <div class="sign-title">
          <h1>Tạo tài khoản</h1>
        </div>
      </div>
      <div class="signin-right ">
        <form action="/register-action" class="login-form" id="registerForm" method="POST" onsubmit="return registerValidate()">
          <div class="firstname form-control1 ">
            <input type="email" placeholder="Email" class="login-form-input " name="email" id="email">
            <span class="text-danger email-required" style="display:none" id="email-required">Vui lòng điền Email *</span>
          </div>
          <div class="lastname form-control1">
            <input type="text" placeholder="Tên" class="login-form-input " name="firstname" id="firstname">
            <span class="text-danger username-required" style="display:none" id="firstname-required">Vui lòng điền Tên của bạn *</span>
          </div>
          <div class="birthday form-control1">
            <input type="text" placeholder="Họ" class="login-form-input " name="lastname" id="lastname">
            <span class="text-danger username-required" style="display:none" id="lastname-required">Vui lòng điền Họ của bạn *</span>
          </div>
          <div class="email form-control1">
            <input type="password" placeholder="Mật khẩu" class="login-form-input" name="password" id="password">
            <span class="text-danger password-required" style="display:none" id="password-required">Vui lòng điền mật khẩu *</span>
          </div>
          <div class="password form-control1">
            <input type="password" placeholder="Nhập lại mật khẩu" class="login-form-input" name="passwordhash" id="passwordhash">
            <span class="text-danger password-required" style="display:none" id="passwordhash-required">Vui lòng nhập lại mật khẩu *</span>
          </div>
          <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>

          <button type="submit" class="btn btn-secondary btn-lg" id="loginSubmit">Đăng ký</button>


          <div class="login-option-title mt-3">Hoặc đăng ký bằng</div>

          <a href="/login-google" class="d-inline-block mt-2">
            <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/Login/Googlebg.png"
              alt="Google Icon" class="google-icon" style="height: 50px;">
          </a>

          <div class="mt-3">
            <a href="/signin" class="text-dark text-decoration-none">
              <i class="fa fa-long-arrow-alt-right"></i> Bạn đã có tài khoản? Đăng nhập
            </a>
          </div>

          <div class="mt-3">
            <a href="/" class="text-muted text-decoration-none">
              <i class="fa fa-long-arrow-alt-left"></i> Quay lại trang chủ
            </a>
          </div>
        </form>


      </div>
    </div>
  </section>
</div>
<?php $this->stop() ?>
<?php
$this->push('scripts')
?>
<script src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/js/AuthValidation.js"></script>
<?php
$this->end();
?>