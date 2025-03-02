<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/Styles/main.css">
    <link rel="stylesheet" href="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/plugins/animate/animate.min.css">
    <link rel="stylesheet" href="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/plugins/fontawesome/all.css">
    <link rel="stylesheet" href="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/plugins/webfonts/font.css">
    <link rel="stylesheet" href="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/css/owl.theme.default.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/css/style.css">

    <link rel="stylesheet" href="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/css/sign.css">
    <link rel="stylesheet" href="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/css/myaccount.css">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/plugins/uikit/uikit.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <title>Medical health care</title>

</head>

<body>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <div class="header">
        <a style="color: #ffffff;text-decoration: none;" href="/">MIỄN PHÍ VẬN CHUYỂN VỚI ĐƠN HÀNG NỘI THÀNH > 300K
            - ĐỔI TRẢ TRONG 30 NGÀY - ĐẢM BẢO CHẤT LƯỢNG</a>
    </div>

    <!--Navbar-->

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">

        <div class="container">
            <a class="navbar-brand" href="/">
                <img style="height: 80px" src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/logo.png" class="logo-top" alt="">
            </a>
            <div class="desk-menu collapse navbar-collapse justify-content-md-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item lisanpham">
                        <a class="nav-link" href="/list">SẢN PHẨM
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/introduce">GIỚI THIỆU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/blog">TIN TỨC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">LIÊN HỆ</a>
                    </li>
                </ul>
            </div>
            <div id="offcanvas-flip1" uk-offcanvas="flip: true; overlay: true">
                <div class="uk-offcanvas-bar" style="background: white;
        width: 100%;">

                    <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>
                    <h3 style="font-size: 14px;
          color: #272727;
          text-transform: uppercase;
          margin: 3px 0 30px 0;
          font-weight: 500; letter-spacing: 2px;">MENU</h3>
                    <div class="justify-content-md-center">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/">TRANG CHỦ</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="Product.html">BỘ SƯU TẬP</a>
                            </li> -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle aaaa" href="/list" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <p>SẢN PHẨM</p>
                                    <i class="fa fa-angle-double-right"></i>

                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="border:0;">
                                    <a class="dropdown-item" href="#" title="Sản phẩm - Style 1">Sản phẩm </a>
                                    <a class="dropdown-item" href="#" title="Sản phẩm - Style 2">Sản phẩm</a>
                                    <a class="dropdown-item" href="#" title="Sản phẩm - Style 3">Sản phẩm</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/introduce">GIỚI THIỆU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/blog">BLOG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contact">LIÊN HỆ</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
                <div class="uk-offcanvas-bar" style="    background: white;
            width: 350px;">

                    <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>

                    <h3 style="font-size: 14px;
                color: #272727;
                text-transform: uppercase;
                margin: 3px 0 30px 0;
                font-weight: 500; letter-spacing: 2px;">Tìm kiếm</h3>
                    <div class="search-box wpo-wrapper-search">
                        <form action="/search" class="searchform searchform-categoris ultimate-search" method="GET">
                            <div class="wpo-search-inner" style="display:inline">
                                <input required="" id="inputSearchAuto" name="search" maxlength="40" autocomplete="off"
                                    class="searchinput input-search search-input" type="text" size="20"
                                    placeholder="Tìm kiếm sản phẩm...">
                            </div>
                            <button type="submit" class="btn-search btn" id="search-header-btn">
                                <i style="font-weight:bold" class="fas fa-search"></i>
                            </button>
                        </form>
                        <div id="ajaxSearchResults" class="smart-search-wrapper ajaxSearchResults" style="display: none">
                            <div class="resultsContent"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->Insert('Client/Components/CartOppCanvas'); ?>


            <div class="icon-ol">
                <a style="color: #272727" href="<?= isset($_SESSION['user']) ? '/myaccount' : '/signin' ?>">
                    <i class="fas fa-user-alt"></i>
                </a>
                <a href="#" class="" uk-toggle="target: #offcanvas-flip">
                    <i class="fas fa-search" style="color: black"></i>
                </a>

                <a style="color: #272727" href="#" uk-toggle="target: #offcanvas-flip2">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <button class="navbar-toggler" type="button" uk-toggle="target: #offcanvas-flip1" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        </div>

    </nav>

    <div class="header-space"></div>
    <?= $this->section('additional_content') ?>
    <div class="page-wrapper">
        <?= $this->section('main_content') ?>
    </div>


    <footer class="main-footer">
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="footer-col footer-block">
                            <h4 class="footer-title">
                                Giới thiệu
                            </h4>
                            <div class="footer-content">
                                <p>Với hơn 12 năm hoạt động, Medical health care tự hào là người bạn đồng hành tin cậy của hàng triệu người dân Việt Nam trên hành trình nâng cao chất lượng sức khỏe. Hệ thống gần 1000 nhà thuốc đạt chuẩn GPP trên toàn quốc trải dài 40 tỉnh thành, cùng đội ngũ gần 5000 Dược sĩ, Medical health care mang đến dịch vụ chăm sóc sức khỏe tận tâm và trải nghiệm mua sắm tiện lợi cho mọi khách hàng</p>
                                <div class="logo-footer">
                                    <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/logo-bct.png" alt="Bộ Công Thương">
                                </div>
                                <div class="social-list">
                                    <a href="#" class="fab fa-facebook"></a>
                                    <a href="#" class="fab fa-google"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-youtube"></a>
                                    <a href="#" class="fab fa-skype"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="footer-col footer-link">
                            <h4 class="footer-title">
                                Doanh mục
                            </h4>
                            <div class="footer-content toggle-footer">
                                <ul>
                                    <li class="item">
                                        <a href="#" title="Tìm kiếm">Thuốc</a>
                                    </li>
                                    <li class="item">
                                        <a href="#" title="Giới thiệu">Chăm sóc cá nhân</a>
                                    </li>
                                    <li class="item">
                                        <a href="#" title="Chính sách đổi trả">Chăm sóc sắc đẹp</a>
                                    </li>
                                    <li class="item">
                                        <a href="#" title="Chính sách bảo mật">Chăm sóc sức khỏe</a>
                                    </li>
                                    <li class="item">
                                        <a href="#" title="Điều khoản dịch vụ">Thực phẩm chức năng</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="footer-col footer-block">
                            <h4 class="footer-title">
                                Thông tin liên hệ
                            </h4>
                            <div class="footer-content toggle-footer">
                                <ul>
                                    <li><span>Địa chỉ:</span> 248A Nơ Trang Long, Phường 12, Quận Bình Thạnh, Ho Chi Minh City, Vietnam</li>
                                    <li><span>Điện thoại:</span> 1800 6821</li>
                                    <li><span>Fax:</span> +84 (084) 5456683</li>
                                    <li><span>Mail:</span> contact@aziworld.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="footer-col footer-block">
                            <h4 class="footer-title">
                                FANPAGE
                            </h4>
                            <div class="footer-content">
                                <div id="fb-root">
                                    <div class="footer-static-content">
                                        <div class="fb-page" data-href="https://www.facebook.com/AziWorld-Viet-Nam-908555669481794/"
                                            data-tabs="timeline" data-width="" data-height="215" data-small-header="false"
                                            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                            <blockquote cite="https://www.facebook.com/AziWorld-Viet-Nam-908555669481794/"
                                                class="fb-xfbml-parse-ignore"><a
                                                    href="https://www.facebook.com/AziWorld-Viet-Nam-908555669481794/">Pharmarcity</a>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-footer--copyright">
            <div class="container">
                <hr>
                <div class="main-footer--border" style="text-align:center;padding-bottom: 15px;">
                    <p>Copyright © 2025 <a href="https://runner-inn.myharavan.com"> Medical health care</a>. <a target="_blank"
                            href="https://www.facebook.com/henrynguyen202">by Hoài Bão</a></p>
                </div>
            </div>
        </div>
    </footer>
    </div>

    <script async defer crossorigin="anonymous" src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/plugins/sdk.js"></script>
    <script src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/plugins/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/plugins/bootstrap/popper.min.js"></script>
    <script src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/plugins/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/js/home.js"></script>
    <script src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/js/script.js"></script>
    <script src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/plugins/uikit/uikit.min.js"></script>
    <script src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/plugins/uikit/uikit-icons.min.js"></script>

    <?php $this->insert('Notification') ?>
    <?= $this->section('scripts') ?>
</body>

</html>