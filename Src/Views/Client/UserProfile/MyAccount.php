<?php $this->layout('Client/Components/Layout'); ?>


<?php $this->start('main_content') ?>
<!-- Insert nội dung vào đây -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="<?= $_ENV['APP_URL'] ?>/public/Assets/General/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
<link href="<?= $_ENV['APP_URL'] ?>/public/Assets/General/css/style.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Global Stylesheets Bundle-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Container-->
                <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                    <!--begin::Post-->
                    <div class="content flex-row-fluid" id="kt_content">
                        <!--begin::Navbar-->
                        <?php $this->insert('Client/UserProfile/Particals/Sidebar'); ?>
                        <!--end::Navbar-->
                        <!--begin::Basic info-->
                        <div class="card mb-5 mb-xl-10">
                            <!--begin::Card header-->
                            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                                data-bs-target="#kt_account_profile_details" aria-expanded="true"
                                aria-controls="kt_account_profile_details">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">Thông tin cá nhân</h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--begin::Card header-->
                            <!--begin::Content-->
                            <div id="kt_account_profile_details" class="collapse show">
                                <!--begin::Form-->
                                <form id="kt_account_profile_details_form" class="form">
                                    <!--begin::Card body-->
                                    <div class="card-body border-top p-9">
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-bold fs-6">Ảnh đại diện</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                                    style="background-image: url(<?= $_ENV['APP_URL'] ?>/public/Assets/General/media/avatars/blank.png)">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url(<?= $_ENV['APP_URL'] ?>/public/Assets/General/media/avatars/150-26.jpg)">
                                                    </div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Label-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="Remove avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Remove-->
                                                </div>
                                                <!--end::Image input-->
                                                <!--begin::Hint-->
                                                <div class="form-text">Chỉ cho phép cái loại file: png, jpg, jpeg.</div>
                                                <!--end::Hint-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Tên đầy đủ</label>

                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-12 fv-row">
                                                        <input type="text" name="lname"
                                                            class="form-control form-control-lg form-control-solid"
                                                            placeholder="Last name" value="Smith" />
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                                <span class="required">Tên</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                    title="Phone number must be active"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="tel" name="phone"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="Phone number" value="Tên của bạn" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                                <span class="required">Họ</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                    title="Phone number must be active"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="tel" name="phone"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="Phone number" value=" của bạn" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                                <span class="required">Số điện thoại liên hệ (Phải là số điện thoại zalo )</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                    title="Phone number must be active"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="tel" name="phone"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="Phone number" value="044 3276 454 935" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card body-->
                                    <!--begin::Actions-->
                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <button type="submit" class="btn btn-primary"
                                            id="kt_account_profile_details_submit">Lưu thay đổi</button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Basic info-->
                        <!--begin::Sign-in Method-->
                        <div id="change-method" class="card mb-5 mb-xl-10">
                            <!--begin::Card header-->
                            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                                data-bs-target="#kt_account_signin_method">
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">Phương thức đăng nhập</h3>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Content-->
                            <div id="kt_account_signin_method" class="collapse show">
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Email Address-->
                                    <div class="d-flex flex-wrap align-items-center">
                                        <!--begin::Label-->
                                        <div id="kt_signin_email">
                                            <div class="fs-6 fw-bolder mb-1">Địa chỉ email</div>
                                            <div class="fw-bold text-gray-600">support@keenthemes.com</div>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Edit-->
                                        <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                            <!--begin::Form-->
                                            <form id="kt_signin_change_email" class="form" novalidate="novalidate">
                                                <div class="row mb-6">
                                                    <div class="col-lg-6 mb-4 mb-lg-0">
                                                        <div class="fv-row mb-0">
                                                            <label for="emailaddress"
                                                                class="form-label fs-6 fw-bolder mb-3">Enter New Email
                                                                Address</label>
                                                            <input type="email"
                                                                class="form-control form-control-lg form-control-solid"
                                                                id="emailaddress" placeholder="Email Address"
                                                                name="emailaddress" value="support@keenthemes.com" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="fv-row mb-0">
                                                            <label for="confirmemailpassword"
                                                                class="form-label fs-6 fw-bolder mb-3">Confirm
                                                                Password</label>
                                                            <input type="password"
                                                                class="form-control form-control-lg form-control-solid"
                                                                name="confirmemailpassword" id="confirmemailpassword" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <button id="kt_signin_submit" type="button"
                                                        class="btn btn-primary me-2 px-6">Update Email</button>
                                                    <button id="kt_signin_cancel" type="button"
                                                        class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                                </div>
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Edit-->
                                        <!--begin::Action-->
                                        <div id="kt_signin_email_button" class="ms-auto">
                                            <button class="btn btn-light btn-active-light-primary">Change Email</button>
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Email Address-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed my-6"></div>
                                    <!--end::Separator-->
                                    <!--begin::Password-->
                                    <div class="d-flex flex-wrap align-items-center mb-10">
                                        <!--begin::Label-->
                                        <div id="kt_signin_password">
                                            <div class="fs-6 fw-bolder mb-1">Mật khẩu</div>
                                            <div class="fw-bold text-gray-600">************</div>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Edit-->
                                        <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                                            <!--begin::Form-->
                                            <form id="kt_signin_change_password" class="form" novalidate="novalidate">
                                                <div class="row mb-1">
                                                    <div class="col-lg-4">
                                                        <div class="fv-row mb-0">
                                                            <label for="currentpassword"
                                                                class="form-label fs-6 fw-bolder mb-3">Current
                                                                Password</label>
                                                            <input type="password"
                                                                class="form-control form-control-lg form-control-solid"
                                                                name="currentpassword" id="currentpassword" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="fv-row mb-0">
                                                            <label for="newpassword"
                                                                class="form-label fs-6 fw-bolder mb-3">New
                                                                Password</label>
                                                            <input type="password"
                                                                class="form-control form-control-lg form-control-solid"
                                                                name="newpassword" id="newpassword" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="fv-row mb-0">
                                                            <label for="confirmpassword"
                                                                class="form-label fs-6 fw-bolder mb-3">Confirm New
                                                                Password</label>
                                                            <input type="password"
                                                                class="form-control form-control-lg form-control-solid"
                                                                name="confirmpassword" id="confirmpassword" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-text mb-5">Password must be at least 8 character and
                                                    contain symbols</div>
                                                <div class="d-flex">
                                                    <button id="kt_password_submit" type="button"
                                                        class="btn btn-primary me-2 px-6">Update Password</button>
                                                    <button id="kt_password_cancel" type="button"
                                                        class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                                </div>
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Edit-->
                                        <!--begin::Action-->
                                        <div id="kt_signin_password_button" class="ms-auto">
                                            <button class="btn btn-light btn-active-light-primary">Reset
                                                Password</button>
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Content-->
                        </div>
                    </div>
                    <script>
                        var hostUrl = "<?= $_ENV['APP_URL'] ?>/public/Assets/General/";
                    </script>
                    <!--begin::Javascript-->
                    <!--begin::Global Javascript Bundle(used by all pages)-->
                    <script src="<?= $_ENV['APP_URL'] ?>/public/Assets/General/plugins/global/plugins.bundle.js"></script>
                    <script src="<?= $_ENV['APP_URL'] ?>/public/Assets/General/js/scripts.bundle.js"></script>
                    <!--end::Global Javascript Bundle-->
                    <!--begin::Page Custom Javascript(used by this page)-->
                    <script src="<?= $_ENV['APP_URL'] ?>/public/Assets/General/js/custom/account/settings/signin-methods.js"></script>
                    <script src="<?= $_ENV['APP_URL'] ?>/public/Assets/General/js/custom/account/settings/profile-details.js"></script>
                    <script src="<?= $_ENV['APP_URL'] ?>/public/Assets/General/js/custom/account/settings/deactivate-account.js"></script>
                    <script src="<?= $_ENV['APP_URL'] ?>/public/Assets/General/js/custom/modals/two-factor-authentication.js"></script>
                    <script src="<?= $_ENV['APP_URL'] ?>/public/Assets/General/js/custom/widgets.js"></script>
                    <script src="<?= $_ENV['APP_URL'] ?>/public/Assets/General/js/custom/apps/chat/chat.js"></script>
                    <script src="<?= $_ENV['APP_URL'] ?>/public/Assets/General/js/custom/modals/create-app.js"></script>
                    <script src="<?= $_ENV['APP_URL'] ?>/public/Assets/General/js/custom/modals/upgrade-plan.js"></script>
                    <!--end::Page Custom Javascript-->
                    <!--end::Javascript-->
                </div>
            </div>
        </div>
    </div>
</body>
<!--end::Body-->

</html>
<?php $this->stop() ?>
<?php
$this->push('scripts')
?>
<?php
$this->end();
?>