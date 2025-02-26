<?php $this->layout('Client/Components/Layout');

$this->start('main_content');
?>
<section class="account">
    <div class="container-fluid">
        <div class="row g-0">
        <?php $this->Insert('Client/UserProfile/Particals/Sidebar'); ?>


            <div class="col-lg-9">
                <div class="change-password" style="padding-left: 80px;">
                    <div class="change-password-title">
                        <p>THAY ĐỔI MẬT KHẨU</p>
                    </div>
                    <div class="change-password-form">
                        <form method="POST" action="/change-user-password" id="changePasswordForm">
                            <input type="hidden" name="method" value="POST">
                            <div class="form-group">
                                <label for="currentPassword" class="form-label">Mật khẩu hiện tại</label>
                                <input type="password" id="currentPassword" name="currentPassword" class="form-control form-control-lg">
                                <div id="currentPassword-error" class="text-danger mt-1"></div>
                            </div>

                            <div class="form-group">
                                <label for="newPassword" class="form-label">Mật khẩu mới</label>
                                <input type="password" id="newPassword" name="newPassword" class="form-control form-control-lg">
                                <div id="newPassword-error" class="text-danger mt-1"></div>
                            </div>

                            <div class="form-group">
                                <label for="confirmPassword" class="form-label">Xác nhận mật khẩu mới</label>
                                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control form-control-lg">
                                <div id="confirmPassword-error" class="text-danger mt-1"></div>
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" name="submit" class="btn btn-success btn-lg">
                                    Đổi mật khẩu
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->stop()
?>

<?php
$this->push('scripts')
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('changePasswordForm');
    const currentPassword = document.getElementById('currentPassword');
    const newPassword = document.getElementById('newPassword');
    const confirmPassword = document.getElementById('confirmPassword');

    // Hàm hiển thị lỗi
    function showError(element, message) {
        const errorDiv = document.getElementById(element.id + '-error');
        errorDiv.textContent = message;
        errorDiv.style.display = 'block';
    }

    // Hàm ẩn lỗi
    function hideError(element) {
        const errorDiv = document.getElementById(element.id + '-error');
        errorDiv.textContent = '';
        errorDiv.style.display = 'none';
    }

    // Xử lý khi nhập liệu
    currentPassword.addEventListener('input', function() {
        if (this.value.trim() !== '') {
            hideError(this);
        }
    });

    newPassword.addEventListener('input', function() {
        if (this.value.trim() !== '') {
            hideError(this);
        }
        // Kiểm tra lại confirm password nếu đã nhập
        if (confirmPassword.value.trim() !== '') {
            if (this.value === confirmPassword.value) {
                hideError(confirmPassword);
            } else {
                showError(confirmPassword, 'Mật khẩu xác nhận không khớp *');
            }
        }
    });

    confirmPassword.addEventListener('input', function() {
        if (this.value.trim() !== '') {
            if (this.value === newPassword.value) {
                hideError(this);
            } else {
                showError(this, 'Mật khẩu xác nhận không khớp *');
            }
        }
    });

    // Xử lý khi submit form
    form.addEventListener('submit', function(e) {
        let isValid = true;

        // Kiểm tra mật khẩu hiện tại
        if (currentPassword.value.trim() === '') {
            showError(currentPassword, 'Mật khẩu hiện tại không được để trống *');
            isValid = false;
        }

        // Kiểm tra mật khẩu mới
        if (newPassword.value.trim() === '') {
            showError(newPassword, 'Mật khẩu mới không được để trống *');
            isValid = false;
        } else if (newPassword.value.length < 6) {
            showError(newPassword, 'Mật khẩu mới phải có ít nhất 6 ký tự *');
            isValid = false;
        }

        // Kiểm tra xác nhận mật khẩu
        if (confirmPassword.value.trim() === '') {
            showError(confirmPassword, 'Xác nhận mật khẩu không được để trống *');
            isValid = false;
        } else if (confirmPassword.value !== newPassword.value) {
            showError(confirmPassword, 'Mật khẩu xác nhận không khớp *');
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault(); // Chỉ prevent khi có lỗi
        }
    });
});
</script>
<?php
$this->end();
?>