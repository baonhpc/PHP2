<?php $this->layout('Client/Components/Layout'); ?>

<?php $this->start('main_content') ?>
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
        <div class="card-body">
            <h2 class="text-center mb-4">Quên mật khẩu</h2>
            <form action="/send-mail" method="post" class="mail-form" id="loginForm">
                <div class="mb-3">
                    <label for="email" class="form-label">Địa chỉ Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email của bạn">
                    <span class="text-danger d-none" id="email-required">Vui lòng điền Email *</span>
                </div>

                <button type="submit" class="btn btn-primary w-100">Gửi mail</button>
            </form>

            <p class="text-center mt-3">
                Chưa có tài khoản? <a href="/signup" class="text-decoration-none fw-bold">Đăng ký ngay</a>
            </p>
        </div>
    </div>
</div>
<?php $this->stop() ?>

<?php $this->push('scripts') ?>
<script src="<?=$_ENV['APP_URL']?>/public/Assets/Client/js/ResetValidation.js"></script>
<?php $this->end(); ?>
