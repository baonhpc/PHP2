<?php $this->layout('Client/Components/Layout'); ?>

<?php
// Khởi tạo $firstSku
$firstSku = null;
if (!empty($productData['skus'])) {
  $firstSku = reset($productData['skus']);
}

// Khởi tạo mảng images
$images = [];
if ($firstSku && !empty($firstSku['images'])) {
  // Thêm ảnh từ SKU
  $images[] = $firstSku['images'];
}

// Thêm thumbnail của sản phẩm nếu có
if (!empty($productData['thumbnail'])) {
  if (!in_array($productData['thumbnail'], $images)) {
    $images[] = $productData['thumbnail'];
  }
}

?>

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
                  <span>Trang chủ</span>
                </a>
              </li>
              <li>
                <a href="">
                  <span>Sản phẩm</span>
                </a>
              </li>
              <li class="active">
                <span>
                  <span itemprop="name"><?= $productData['product_name'] ?></span>
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
                <?php if (!empty($images)): ?>
                  <div class="product-gallery__thumbs-container hidden-sm hidden-xs">
                    <div class="product-gallery__thumbs thumb-fix">
                      <?php foreach ($images as $index => $image): ?>
                        <div class="product-gallery__thumb <?= $index === 0 ? 'active' : '' ?>" id="imgg<?= $index + 1 ?>">
                          <a class="product-gallery__thumb-placeholder" href="javascript:void(0);"
                            data-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $image ?>"
                            data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $image ?>">
                            <img src="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $image ?>"
                              data-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $image ?>"
                              alt="<?= $productData['product_name'] ?>">
                          </a>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                  <div class="product-image-detail box__product-gallery scroll hidden-xs">
                    <ul id="sliderproduct" class="site-box-content slide_product">
                      <?php foreach ($images as $index => $image): ?>
                        <li class="product-gallery-item gallery-item <?= $index === 0 ? 'current' : '' ?>" id="imgg<?= $index + 1 ?>a">
                          <img class="product-image-feature"
                            src="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $image ?>"
                            alt="<?= $productData['product_name'] ?>">
                        </li>
                      <?php endforeach; ?>
                    </ul>
                    <div class="gallery-control">
                      <span class="gallery-prev"><i class="fa fa-angle-left"></i></span>
                      <span class="gallery-next"><i class="fa fa-angle-right"></i></span>
                    </div>
                  </div>
                <?php else: ?>
                  <div class="product-image-detail">
                    <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/no-image.jpg"
                      alt="No image available"
                      class="product-image-feature">
                  </div>
                <?php endif; ?>
              </div>
              <div class="product-gallery-slide">
                <div class="owl-carousel owl-theme owl-product-gallery-slide">
                  <div class=" item">
                    <div class="product-gallery__thumb  >
                      <a class=" product-gallery__thumb-placeholder" href="javascript:void(0);"
                      data-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[0] ?>" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[0] ?>">
                      <img src="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[0] ?>" data-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[0] ?>"
                        alt="<?= $productData['product_name'] ?>" grape="">
                      </a>
                    </div>
                  </div>
                  <div class="item">
                    <div class="product-gallery__thumb  >
                      <a class=" product-gallery__thumb-placeholder" href="javascript:void(0);"
                      data-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[1] ?>" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[1] ?>">
                      <img src="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[1] ?>" data-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[1] ?>"
                        alt="<?= $productData['product_name'] ?>" grape="">
                      </a>
                    </div>
                  </div>
                  <div class="item">
                    <div class="product-gallery__thumb  >
                      <a class=" product-gallery__thumb-placeholder" href="javascript:void(0);"
                      data-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[2] ?>" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[2] ?>">
                      <img src="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[2] ?>" data-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[2] ?>"
                        alt="<?= $productData['product_name'] ?>" grape="">
                      </a>
                    </div>
                  </div>
                  <div class="item">
                    <div class="product-gallery__thumb  >
                      <a class=" product-gallery__thumb-placeholder" href="javascript:void(0);"
                      data-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[3] ?>" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[3] ?>">
                      <img src="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[3] ?>" data-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[3] ?>"
                        alt="<?= $productData['product_name'] ?>" grape="">
                      </a>
                    </div>
                  </div>
                  <div class="item">
                    <div class="product-gallery__thumb  >
                      <a class=" product-gallery__thumb-placeholder" href="javascript:void(0);"
                      data-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[4] ?>" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[4] ?>">
                      <img src="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[4] ?>" data-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[4] ?>"
                        alt="<?= $productData['product_name'] ?>" grape="">
                      </a>
                    </div>
                  </div>
                  <div class="item">
                    <div class="product-gallery__thumb  " id="imgg1">
                      <a class="product-gallery__thumb-placeholder" href="javascript:void(0);"
                        data-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[5] ?>" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[5] ?>">
                        <img src="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[5] ?>" data-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[5] ?>"
                          alt="<?= $productData['product_name'] ?>" grape="">
                      </a>
                    </div>
                  </div>
                  <div class="item">
                    <div class="product-gallery__thumb  " id="imgg1">
                      <a class="product-gallery__thumb-placeholder" href="javascript:void(0);"
                        data-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[6] ?>" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[6] ?>">
                        <img src="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[6] ?>" data-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[6] ?>"
                          alt="<?= $productData['product_name'] ?>" grape="">
                      </a>
                    </div>
                  </div>
                  <div class="item">
                    <div class="product-gallery__thumb  " id="imgg1">
                      <a class="product-gallery__thumb-placeholder" href="javascript:void(0);"
                        data-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[7] ?>" data-zoom-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[7] ?>">
                        <img src="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[7] ?>" data-image="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $images[7] ?>"
                          alt="<?= $productData['product_name'] ?>" grape="">
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
                  <h1><?= $productData['product_name'] ?></h1>
                  <?php
                  ?>
                  <span id="pro_sku">SKU: <?= $firstSku['sku'] ?></span>
                </div>
                <div class="product-price" id="price-preview">
                  <?php if ($productData['discount'] > 0): ?>
                    <span class="pro-price"><?= number_format($firstSku['discounted_price'], 0, ',', '.') ?>₫</span>
                    <span class="pro-price-del" style="text-decoration: line-through;"><?= number_format($firstSku['original_price'], 0, ',', '.') ?>₫</span>
                  <?php else: ?>
                    <span class="pro-price"><?= number_format($firstSku['original_price'], 0, ',', '.') ?>₫</span>
                  <?php endif; ?>
                </div>

                <!-- Thêm mô tả ngắn vào đây -->
                <div class="product-short-description">
                  <?= $productData['short_description'] ?>
                </div>

                <form id="add-item-form" action="/cart/add" method="post" class="variants clearfix">
                  <div class="select-swatch clearfix">
                    <div id="variant-swatch-1" class="swatch clearfix" data-option="option2" data-option-index="1">


                      <div class="select-swap">
                        <?php foreach ($productData['skus'] as $sku): ?>
                          <?php foreach ($sku['options'] as $option): ?>
                            <div data-value="<?= $option['option_value'] ?>" class="n-sd swatch-element">
                              <input class="variant-1" id="swatch-1-<?= $option['option_value'] ?>"
                                type="radio" name="option2" value="<?= $option['option_value'] ?>">
                              <label for="swatch-1-<?= $option['option_value'] ?>" class="sd">
                                <span><?= $option['option_value'] ?></span>
                              </label>
                            </div>
                          <?php endforeach; ?>
                        <?php endforeach; ?>
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
                </form>
              </div>
            </div>
          </div>
          <!-- Thêm phần mô tả chi tiết -->
          <div class="product-description-wrapper" style="margin-top: 30px;">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="description-content">
                    <div class="title-bl">
                      <h2>Mô tả sản phẩm</h2>
                    </div>
                    <div class="description-productdetail">
                      <div class="description-productdetail__content" style="max-height: 600px; overflow: hidden; position: relative;" id="product-description">
                        <?php if (!empty($desc_specs['specifications'])): ?>
                          <div class="product-specifications">
                            <div class="specifications-header">
                              <h3>Thành phần thuốc</h3>
                            </div>
                            <div class="specifications-content" id="specContainer">
                              <?php
                              $specs = json_decode($desc_specs['specifications']);
                              if ($specs && is_array($specs)):
                                foreach ($specs as $index => $spec):
                              ?>
                                  <div class="table-row <?= $index >= 7 ? 'd-none' : '' ?>">
                                    <div class="table-row__title">
                                      <p><?= $spec->spec_name ?></p>
                                    </div>
                                    <div class="table-row__text">
                                      <p><?= $spec->spec_value ?></p>
                                    </div>
                                  </div>
                              <?php
                                endforeach;
                              endif;
                              ?>
                            </div>
                          </div>
                        <?php endif; ?>
                        <div class="product-description">
                          <?= $desc_specs['description'] ?>
                        </div>

                      </div>
                      <div class="view-more-description" style="text-align: center; margin-top: 20px;">
                        <button id="view-more-btn" class="view-more-btn" onclick="toggleDescription()">
                          <span>Xem thêm</span>
                          <i class="fa fa-angle-down"></i>
                        </button>
                      </div>
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



</main>

<?php $this->stop() ?>
<?php
$this->push('scripts')
?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Toggle Description
    const content = document.getElementById('product-description');
    const viewMoreBtn = document.querySelector('.view-more-description');

    if (content && content.scrollHeight <= 600) {
      viewMoreBtn.style.display = 'none';
    }

    window.toggleDescription = function() {
      if (!content) return;

      const button = document.getElementById('view-more-btn');
      const buttonText = button.querySelector('span');

      if (content.classList.contains('expanded')) {
        content.classList.remove('expanded');
        content.style.maxHeight = '600px';
        buttonText.textContent = 'Xem thêm';
        button.classList.remove('expanded');
        content.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      } else {
        content.classList.add('expanded');
        content.style.maxHeight = content.scrollHeight + 'px';
        buttonText.textContent = 'Thu gọn';
        button.classList.add('expanded');
      }
    };

    // Quantity Handler
    const quantityInput = document.getElementById('quantity');
    if (!quantityInput) return;

    const maxQuantity = parseInt(quantityInput.getAttribute('max')) || 999;

    window.minusQuantity = function() {
      let currentQty = parseInt(quantityInput.value);
      if (currentQty > 1) {
        quantityInput.value = currentQty - 1;
      }
    };

    window.plusQuantity = function() {
      let currentQty = parseInt(quantityInput.value);
      if (currentQty < maxQuantity) {
        quantityInput.value = currentQty + 1;
      }
    };

    // Xử lý input trực tiếp
    quantityInput.addEventListener('change', function() {
      let value = parseInt(this.value);
      if (isNaN(value) || value < 1) {
        value = 1;
      } else if (value > maxQuantity) {
        value = maxQuantity;
      }
      this.value = value;
    });

    // Khởi tạo giá trị ban đầu
    quantityInput.value = quantityInput.value || "1";
  });
</script>
<?php
$this->end();
?>