<?php $this->layout('Client/Components/Layout'); ?>



<?php $this->start('main_content') ?>
<!-- Insert nội dung vào đây -->


<!--  detail product -->
<main class="">

  <div id="product" class="productDetail-page">

    <!--  menu header seo -->
    <div class="breadcrumb-shop">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
            <ol class="breadcrumb breadcrumb-arrows">
              <li>
                <a href="home.html">
                  <span">Trang chủ</span>
                </a>
              </li>
              <li>
                <a href="">
                  <span>Sản phẩm</span>
                </a>
              </li>
              <li class="active">
                <span>
                  <span itemprop="name">Tràng phục linh</span>
                </span>
                <meta itemprop="position" content="3">
              </li>

            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- detail product chính -->
    <div class="container">
      <div class="row product-detail-wrapper">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="row product-detail-main pr_style_01">
            <div class="col-md-7 col-sm-12 col-xs-12">
              <div class="product-gallery">
                <div class="product-gallery__thumbs-container hidden-sm
                    hidden-xs">
                  <div class="product-gallery__thumbs thumb-fix">

                    <div class="product-gallery__thumb  active" id="imgg1">
                      <a class="product-gallery__thumb-placeholder" href="javascript:void(0);"
                        data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_2.png" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_2.png">
                        <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_2.png" data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_2.png"
                          alt="Nike Air Max 90 Essential" grape="">
                      </a>
                    </div>

                    <div class="product-gallery__thumb " id="imgg2">
                      <a class="product-gallery__thumb-placeholder" href="javascript:void(0);"
                        data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_3.png" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_3.png">
                        <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_3.png" data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_3.png"
                          alt="Nike Air Max 90 Essential" grape="">
                      </a>
                    </div>

                    <div class="product-gallery__thumb " id="imgg3">
                      <a class="product-gallery__thumb-placeholder" href="javascript:void(0);"
                        data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_4.png" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_4.png">
                        <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_4.png" data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_4.png"
                          alt="Nike Air Max 90 Essential" grape="">
                      </a>
                    </div>

                    <div class="product-gallery__thumb " id="imgg4">
                      <a class="product-gallery__thumb-placeholder" href="javascript:void(0);"
                        data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_1.png" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_1.png">
                        <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_1.png" data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_1.png"
                          alt="Nike Air Max 90 Essential" grape="">
                      </a>
                    </div>
                  </div>
                </div>
                <div class="product-image-detail box__product-gallery
                    scroll hidden-xs">
                  <ul id="sliderproduct" class="site-box-content
                      slide_product">

                    <li class="product-gallery-item gallery-item
                        current " id="imgg1a">
                      <img class="product-image-feature " src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_2.png"
                        alt="Nike Air Max 90 Essential" grape="">
                    </li>

                    <li class="product-gallery-item gallery-item " id="imgg2a">
                      <img class="product-image-feature" src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_3.png"
                        alt="Nike Air Max 90 Essential" grape="">
                    </li>

                    <li class="product-gallery-item gallery-item " id="imgg3a">
                      <img class="product-image-feature" src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_4.png"
                        alt="Nike Air Max 90 Essential" grape="">
                    </li>

                    <li class="product-gallery-item gallery-ite " id="imgg4a">
                      <img class="product-image-feature" src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_1.png"
                        alt="Nike Air Max 90 Essential" grape="">
                    </li>

                
                  </ul>
                  <div class="product-image__button">
                    <div id="product-zoom-in" class="product-zoom
                        icon-pr-fix" aria-label="Zoom in" title="Zoom in">
                      <span class="zoom-in" aria-hidden="true">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36 36" style="enable-background:new 0 0 36 36; width:
                            30px; height: 30px;" xml:space="preserve">
                          <polyline points="6,14 9,11 14,16 16,14 11,9
                              14,6 6,6">
                          </polyline>
                          <polyline points="22,6 25,9 20,14 22,16 27,11
                              30,14 30,6">
                          </polyline>
                          <polyline points="30,22 27,25 22,20 20,22
                              25,27 22,30 30,30">
                          </polyline>
                          <polyline points="14,30 11,27 16,22 14,20 9,25
                              6,22 6,30">
                          </polyline>
                        </svg>
                      </span>
                    </div>
                    <div class="gallery-index icon-pr-fix"><span class="current">1</span>
                      / <span class="total">8</span></div>
                  </div>
                </div>
              </div>
              <div class="product-gallery-slide">
                <div class="owl-carousel owl-theme owl-product-gallery-slide"">
                    <div class=" item">
                  <div class="product-gallery__thumb  >
                      <a class=" product-gallery__thumb-placeholder" href="javascript:void(0);"
                    data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_2.png" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_2.png">
                    <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_2.png" data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_2.png"
                      alt="Nike Air Max 90 Essential" grape="">
                    </a>
                  </div>
                </div>
                <div class="item">
                  <div class="product-gallery__thumb  >
                      <a class=" product-gallery__thumb-placeholder" href="javascript:void(0);"
                    data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_4.png" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_4.png">
                    <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_4.png" data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_4.png"
                      alt="Nike Air Max 90 Essential" grape="">
                    </a>
                  </div>
                </div>
                <div class="item">
                  <div class="product-gallery__thumb  >
                      <a class=" product-gallery__thumb-placeholder" href="javascript:void(0);"
                    data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/3.jpg" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/3.jpg">
                    <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/3.jpg" data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/3.jpg"
                      alt="Nike Air Max 90 Essential" grape="">
                    </a>
                  </div>
                </div>
                <div class="item">
                  <div class="product-gallery__thumb  >
                      <a class=" product-gallery__thumb-placeholder" href="javascript:void(0);"
                    data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_1.png" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_1.png">
                    <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_1.png" data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_1.png"
                      alt="Nike Air Max 90 Essential" grape="">
                    </a>
                  </div>
                </div>
                <div class="item">
                  <div class="product-gallery__thumb  >
                      <a class=" product-gallery__thumb-placeholder" href="javascript:void(0);"
                    data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_3.png" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_3.png">
                    <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_3.png" data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_3.png"
                      alt="Nike Air Max 90 Essential" grape="">
                    </a>
                  </div>
                </div>
                <div class="item">
                  <div class="product-gallery__thumb  " id="imgg1">
                    <a class="product-gallery__thumb-placeholder" href="javascript:void(0);"
                      data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/6.jpg" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/6.jpg">
                      <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/6.jpg" data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/6.jpg"
                        alt="Nike Air Max 90 Essential" grape="">
                    </a>
                  </div>
                </div>
                <div class="item">
                  <div class="product-gallery__thumb  " id="imgg1">
                    <a class="product-gallery__thumb-placeholder" href="javascript:void(0);"
                      data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/7.jpg" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/7.jpg">
                      <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/7.jpg" data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/7.jpg"
                        alt="Nike Air Max 90 Essential" grape="">
                    </a>
                  </div>
                </div>
                <div class="item">
                  <div class="product-gallery__thumb  " id="imgg1">
                    <a class="product-gallery__thumb-placeholder" href="javascript:void(0);"
                      data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/8.jpg" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/8.jpg">
                      <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/8.jpg" data-image="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/8.jpg"
                        alt="Nike Air Max 90 Essential" grape="">
                    </a>
                  </div>
                </div>

              </div>
            </div>
            <!-- Flickity HTML init -->

            <!-- <div id="product-zoom-in" class="product-zoom icon-pr-fix
                  hidden-md hidden-sm" style="padding-top:2rem;"
                  aria-label="Zoom in" title="Zoom in">
                  <span class="zoom-in" aria-hidden="true">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                      y="0px"
                      viewBox="0 0 36 36"
                      style="enable-background:new 0 0 36 36; width: 40px;
                      height: 40px;"
                      xml:space="preserve">
                      <polyline points="6,14 9,11 14,16 16,14 11,9 14,6
                        6,6">
                      </polyline>
                      <polyline points="22,6 25,9 20,14 22,16 27,11 30,14
                        30,6">
                      </polyline>
                      <polyline points="30,22 27,25 22,20 20,22 25,27
                        22,30 30,30">
                      </polyline>
                      <polyline points="14,30 11,27 16,22 14,20 9,25 6,22
                        6,30">
                      </polyline>
                    </svg>
                  </span>
                </div> -->
          </div>
          <div class="col-md-5 col-sm-12 col-xs-12
                product-content-desc" id="detail-product">
            <div class="product-content-desc-1">
              <div class="product-title">
                <h1>Viên uống Thái Minh Tràng Phục Linh Plus hỗ trợ ngăn ngừa hội chứng ruột kích thích (2 vỉ x 10 viên)</h1>
                <span id="pro_sku">SKU: S-0015-1</span>
              </div>
              <div class="product-price" id="price-preview"><span class="pro-price">800,000₫</span></div>
              <form id="add-item-form" action="/cart/add" method="post" class="variants clearfix">
                <!-- <div class="select clearfix">
                  <div class="selector-wrapper"><label for="product-select-option-0">Màu sắc</label><span
                      class="custom-dropdown custom-dropdown--white"><select class="single-option-selector
                            custom-dropdown__select
                            custom-dropdown__select--white" data-option="option1" id="product-select-option-0">
                        <option value="Tím">Tím</option>
                        <option value="Xanh">Xanh</option>
                      </select></span></div>
                  <div class="selector-wrapper"><label for="product-select-option-1">Kích thước</label><span
                      class="custom-dropdown custom-dropdown--white"><select class="single-option-selector
                            custom-dropdown__select
                            custom-dropdown__select--white" data-option="option2" id="product-select-option-1">
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="35">35</option>
                      </select></span></div><select id="product-select" name="id" style="display:none;">

                    <option value="1040377813">Tím / 36 - 4,800,000₫</option>
                    <option value="1040377814">Tím / 37 - 4,800,000₫</option>
                    <option value="1040377815">Tím / 38 - 4,800,000₫</option>
                    <option value="1040409049">Xanh / 35 - 4,800,000₫</option>
                    <option value="1040409050">Xanh / 36 - 4,800,000₫</option>
                    <option value="1040409053">Xanh / 37 - 4,800,000₫</option>
                    <option value="1040409054">Xanh / 38 - 4,800,000₫</option>
                  </select>
                </div> -->
                <div class="select-swatch clearfix">
                  <div id="variant-swatch-1" class="swatch clearfix" data-option="option2" data-option-index="1">


                    <div class="select-swap">
                      <div data-value="36" class="n-sd swatch-element
                            36">
                        <input class="variant-1" id="swatch-1-36" type="radio" name="option2" value="36"
                          data-vhandle="36" checked="">

                        <label for="swatch-1-36" class="sd">
                          <span>500g</span>
                        </label>

                      </div>
                      <div data-value="37" class="n-sd swatch-element
                            37">
                        <input class="variant-1" id="swatch-1-37" type="radio" name="option2" value="37"
                          data-vhandle="37">

                        <label for="swatch-1-37">
                          <span>350g</span>
                        </label>

                      </div>

                    </div>
                  </div>
                </div>
                <div class="selector-actions">
                  <div class="quantity-area clearfix">
                    <input type="button" value="-" onclick="minusQuantity()" class="qty-btn">
                    <input type="text" id="quantity" name="quantity" value="1" min="1" class="quantity-selector">
                    <input type="button" value="+" onclick="plusQuantity()" class="qty-btn">
                  </div>
                  <div class="wrap-addcart clearfix">
                    <div class="row-flex">
                      <button type="button" class="button btn-addtocart addtocart-modal">Thêm
                        vào</button>
                      <button type="button" class="buy-now button" style="display: block;">Mua
                        ngay</button>

                    </div>



                  </div>
                </div>
                <!--<div class="product-action-bottom visible-xs">
                      <div class="input-bottom">
                        <input id="quan-input" type="number" value="1" min="1">
                      </div>
                      <button type="button" id="add-to-cartbottom"
                        class="add-to-cartProduct add-cart-bottom button addtocart-modal" name="add">Thêm vào
                        giỏ</button>
                    </div>-->
              </form>
              <div class="product-description">
                <div class="title-bl">
                  <h2>Mô tả</h2>
                </div>
                <div class="description-content">
                  <div class="description-productdetail">
                    <p><span>
                        Thực phẩm bảo vệ sức khỏe Tràng Phục Linh Plus
                      </span><br><br></p>
                    <ul>
                      <li>
                        Danh mục Thực phẩm chức năng Nhóm dạ dày
                      </li>
                      <li>
                        Công dụng
                        Giúp cân bằng hệ khuẩn có ích đường ruột,
                        tăng cường sức đề kháng
                        tái tạo niêm mạc đại tràng và tăng cường sức khỏe hệ tiêu hóa.
                        Giúp giảm các cảm giác căng thẳng, stress gây co thắt đại tràng. Hỗ trợ ngăn ngừa hội chứng ruột kích thích, viêm đại tràng cấp và mãn tính, đi ngoài nhiều lần, phân sống.

                      </li>
                      <li>
                        Quy cách
                        Hộp 2 vỉ x 10 viên
                      </li>
                      <li> Lưu ý
                        Sản phẩm này không phải là thuốc, không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ tờ hướng dẫn sử dụng trước khi dùng. </li>

                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="list-productRelated clearfix">
          <div class="heading-title text-center">
            <h2>Sản phẩm liên quan</h2>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                <div class="product-block">
                  <div class="product-img fade-box">
                    <a href="#" title="Adidas EQT Cushion ADV" class="img-resize">
                      <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/blob.jpg"
                        alt="Adidas EQT Cushion ADV" class="lazyloaded">
                      <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/blob.jpg" alt="Adidas EQT Cushion ADV" class="lazyloaded">
                    </a>

                  </div>
                  <div class="product-detail clearfix">
                    <div class="pro-text">
                      <a style="color: black;
                            font-size: 14px;text-decoration: none;" href="#" title="Adidas EQT Cushion ADV" inspiration
                        pack>
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
                    <a href="#" title="Adidas Nmd R1" class="img-resize">
                      <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/blob.jpg" alt="Adidas Nmd R1"
                        class="lazyloaded">
                      <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/blob.jpg" alt="Adidas Nmd R1" class="lazyloaded">
                    </a>

                  </div>
                  <div class="product-detail clearfix">
                    <div class="pro-text">
                      <a style="color: black;
                            font-size: 14px;text-decoration: none;" title="Adidas Nmd R1" href="">
                        Adidas Nmd R1 "Villa Exclusive"
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
                    <a href="#" title="Adidas PW Solar HU NMD" class="img-resize">
                      <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/blob.jpg"
                        alt="Adidas PW Solar HU NMD" class="lazyloaded">
                      <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/blob.jpg" alt="Adidas PW Solar HU NMD" class="lazyloaded">
                    </a>

                  </div>
                  <div class="product-detail clearfix">
                    <div class="pro-text">
                      <a style="color: black;
                            font-size: 14px;text-decoration: none;" href="#" title="Adidas PW Solar HU NMD" inspiration
                        pack>
                        Adidas PW Solar HU NMD "Inspiration Pack"
                      </a>
                    </div>
                    <div class="pro-price">
                      <p class="">5,000,000₫</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                <div class="product-block">
                  <div class="product-img fade-box">
                    <a href="#" title="Adidas Ultraboost W" class="img-resize">
                      <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/blob.jpg"
                        alt="Adidas Ultraboost W" class="lazyloaded">
                      <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/pharma/blob.jpg" alt="Adidas Ultraboost W" class="lazyloaded">
                    </a>

                  </div>
                  <div class="product-detail clearfix">
                    <div class="pro-text">
                      <a style="color: black;
                            font-size: 14px;text-decoration: none;" href="#" title="Adidas Ultraboost W" inspiration
                        pack>
                        Adidas Ultraboost W
                      </a>
                    </div>
                    <div class="pro-price">
                      <p class="">5,300,000₫</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>


  <!-- show zoom detail product -->
  <!-- zoom -->
  <div class="product-zoom11">
    <div class="product-zom">
      <div class="divclose">
        <i class="fa fa-times-circle"></i>
      </div>
      <div class="owl-carousel owl-theme owl-product1">

        <div class="item"><img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_2.png" alt="">
        </div>
        <div class="item"><img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_4.png" alt="">
        </div>
        </div>
        <div class="item"><img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_1.png" alt="">
        </div>
        <div class="item"><img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/detailproduct/detail_3.png" alt="">
        </div>
      </div>
    </div>
  </div>

</main>
<?php $this->stop() ?>
<?php
$this->push('scripts')
?>
<?php
$this->end();
?>