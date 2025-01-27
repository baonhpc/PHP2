<?php $this->layout('Client/Components/Layout'); ?>



<?php $this->start('main_content') ?>
<div class="container">
    <div class="row text-center py-3 pb-0">
        <!-- Dòng kết quả tìm kiếm -->
        <div class="search-result-count">
            <h1>335 kết quả tìm kiếm cho "lót chuột"</h1>
        </div>
        <!-- Thanh tìm kiếm -->
        <div class="search-bar-wrapper ">
            <div class="search-bar">
                <input type="text" id="search-input" placeholder="Tìm kiếm sản phẩm...">
                <span class="search-icon" onclick="searchProducts()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75L19.5 19.5M10.5 15.75a5.25 5.25 0 1 0 0-10.5 5.25 5.25 0 0 0 0 10.5z" />
                    </svg>
                </span>
            </div>
        </div>

    </div>

    <div class="container">




        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                <div class="product-block">
                    <div class="product-img fade-box">
                        <a href="/detail" title="Adidas EQT Cushion ADV" class="img-resize">
                            <img
                                src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/blob (1).jpg"
                                alt="Adidas EQT Cushion ADV" class="lazyloaded">
                            <img
                                src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/bigbb.png"
                                alt="Adidas EQT Cushion ADV" class="lazyloaded">
                        </a>

                    </div>
                    <div class="product-detail clearfix">
                        <div class="pro-text">
                            <a style=" color: black;
                                                          font-size: 14px;text-decoration: none;" href="/detail"
                                title="Adidas EQT Cushion ADV" inspiration pack>
                                Adidas EQT Cushion ADV "North America"
                            </a>
                        </div>
                        <div class="pro-price">
                            <p class="">7,000,000₫</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                <div class="product-block">
                    <div class="product-img fade-box">
                        <a href="/detail" title="Adidas EQT Cushion ADV" class="img-resize">
                            <img
                                src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/blob.jpg"
                                alt="Adidas EQT Cushion ADV" class="lazyloaded">
                            <img
                                src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/diabetna.png"
                                alt="Adidas EQT Cushion ADV" class="lazyloaded">
                        </a>

                    </div>
                    <div class="product-detail clearfix">
                        <div class="pro-text">
                            <a style=" color: black;
                                                          font-size: 14px;text-decoration: none;" href="/detail"
                                title="Adidas EQT Cushion ADV" inspiration pack>
                                Adidas EQT Cushion ADV "North America"
                            </a>
                        </div>
                        <div class="pro-price">
                            <p class="">7,000,000₫</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                <div class="product-block">
                    <div class="product-img fade-box">
                        <a href="/detail" title="Adidas EQT Cushion ADV" class="img-resize">
                            <img
                                src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/blob (2).jpg"
                                alt="Adidas EQT Cushion ADV" class="lazyloaded">
                            <img
                                src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/dizza.png"
                                alt="Adidas EQT Cushion ADV" class="lazyloaded">
                        </a>

                    </div>
                    <div class="product-detail clearfix">
                        <div class="pro-text">
                            <a style=" color: black;
                                                          font-size: 14px;text-decoration: none;" href="/detail"
                                title="Adidas EQT Cushion ADV" inspiration pack>
                                Adidas EQT Cushion ADV "North America"
                            </a>
                        </div>
                        <div class="pro-price">
                            <p class="">7,000,000₫</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                <div class="product-block">
                    <div class="product-img fade-box">
                        <a href="/detail" title="Adidas EQT Cushion ADV" class="img-resize">
                            <img
                                src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/blob (3).jpg"
                                alt="Adidas EQT Cushion ADV" class="lazyloaded">
                            <img
                                src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/nattoenzyn.png"
                                alt="Adidas EQT Cushion ADV" class="lazyloaded">
                        </a>

                    </div>
                    <div class="product-detail clearfix">
                        <div class="pro-text">
                            <a style=" color: black;
                                                        font-size: 14px;text-decoration: none;" href="/detail"
                                title="Adidas EQT Cushion ADV" inspiration pack>
                                Adidas EQT Cushion ADV "North America"
                            </a>
                        </div>
                        <div class="pro-price">
                            <p class="">7,000,000₫</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                <div class="product-block">
                    <div class="product-img fade-box">
                        <a href="/detail" title="Adidas EQT Cushion ADV" class="img-resize">
                            <img
                                src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/blob (4).jpg"
                                alt="Adidas EQT Cushion ADV" class="lazyloaded">
                            <img
                                src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/blob (4).jpg"
                                alt="Adidas EQT Cushion ADV" class="lazyloaded">
                        </a>

                    </div>
                    <div class="product-detail clearfix">
                        <div class="pro-text">
                            <a style=" color: black;
                                                      font-size: 14px;text-decoration: none;" href="/detail"
                                title="Adidas EQT Cushion ADV" inspiration pack>
                                Adidas EQT Cushion ADV "North America"
                            </a>
                        </div>
                        <div class="pro-price">
                            <p class="">7,000,000₫</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                <div class="product-block">
                    <div class="product-img fade-box">
                        <a href="/detail" title="Adidas EQT Cushion ADV" class="img-resize">
                            <img
                                src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/detail_2.png"
                                alt="Adidas EQT Cushion ADV" class="lazyloaded">
                            <img
                                src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/detail_3.png"
                                alt="Adidas EQT Cushion ADV" class="lazyloaded">
                        </a>

                    </div>
                    <div class="product-detail clearfix">
                        <div class="pro-text">
                            <a style=" color: black;
                                                    font-size: 14px;text-decoration: none;" href="/detail"
                                title="Adidas EQT Cushion ADV" inspiration pack>
                                Adidas EQT Cushion ADV "North America"
                            </a>
                        </div>
                        <div class="pro-price">
                            <p class="">7,000,000₫</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
<?php
$this->end();
?>