<?php $this->layout('Client/Components/Layout'); ?>



<?php $this->start('main_content') ?>
<!-- Insert nội dung vào đây -->

<!--Content-->
<div class="content">
  <section class="signin ">
    <div class="container">
      <div class="signin-left">
        <div class="sign-title">
          <h1>Đăng nhập</h1>
        </div>
      </div>
      <div class="signin-right " id="a-sign">
        <form action="/user-login" method="post" class="login-form" id="loginForm">
          <div class="username form-control1 ">
            <input type="text" placeholder="Địa chỉ Email" class="login-form-input " name="email" id="email">
            <span class="text-danger email-required" style="display:none" id="email-required">Vui lòng điền Email *</span>
          </div>
          <div class="password form-control1">
          <input type="password" placeholder="Mật khẩu" class="login-form-input" name="password" id="password">
          <span class="text-danger password-required" style="display:none" id="password-required">Vui lòng điền mật khẩu *</span>


          </div>

          <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
          <div class="submit">
          <button class="btn btn-secondary" id="loginSubmit">Đăng nhập</button>
            <div class="forgetpassword">
              <a href=/forgot-password id="quenmk">Quên mật khẩu?</a> hoặc <a href="/signup">Đăng kí</a>
            </div>

          </div>

        </form>
      </div>
      <div class="signin-right " id="b-sign">
        <form action="">
          <div class="username form-control1 ">
            <h2>Phục hồi mật khẩu</h2>
          </div>
          <div class="password form-control1">
            <input type="text" id="password" placeholder="Mật khẩu">
          </div>

          <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
          <div class="submit">
            <input class="btn" type="submit" value="Gửi">
            <div class="forgetpassword">
              <a href="" id="huy">Hủy</a>
            </div>

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