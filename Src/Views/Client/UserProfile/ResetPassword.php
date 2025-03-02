<?php $this->layout('Client/Components/Layout'); ?>

<?php $this->start('main_content') ?>
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
        <div class="card-body">
            <h2 class="text-center mb-4">Quên mật khẩu</h2>
            <form action="/reset-password/<?=$token?>" method="post" class="reset-form" id="reset-form">
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu mới</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu mới">
                    <span class="text-danger d-none" id="password-required">Vui lòng điền mật khẩu *</span>
                </div>

                <div class="mb-3">
                    <label for="password-verify" class="form-label">Nhập lại mật khẩu mới</label>
                    <input type="password" class="form-control" name="password-verify" id="password-verify" placeholder="Xác nhận mật khẩu mới">
                    <span class="text-danger d-none" id="password-verify-required">Vui lòng nhập lại mật khẩu *</span>
                    <span class="text-danger d-none" id="password-false">Mật khẩu mới không khớp *</span>
                </div>

                <button type="submit" class="btn btn-primary w-100">Gửi đổi mật khẩu</button>
            </form>
        </div>
    </div>
</div>
<?php $this->stop() ?>

<?php $this->push('scripts') ?>
<script src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/js/ResetValidation.js"></script>
<?php $this->end(); ?>
