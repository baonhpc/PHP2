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
            <!-- Cột trái - Hình ảnh -->
            <div class="col-md-7 col-sm-12 col-xs-12">
              <div class="product-gallery">
                <div class="product-gallery__thumbs-container hidden-sm hidden-xs">
                  <div class="product-gallery__thumbs thumb-fix">
                    <?php
                    $thumbnail = explode(',', $productData['thumbnail']);
                    ?>
                    <?php foreach ($thumbnail as $image): ?>
                      <div class="product-gallery__thumb">
                        <a class="product-gallery__thumb-placeholder" href="javascript:void(0);"
                          onclick="changeImage1('<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $image ?>')">
                          <img src="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $image ?>" alt="">
                        </a>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
                <div class="product-image-detail box__product-gallery scroll hidden-xs">
                  <div class="product-gallery-item gallery-item current">
                    <img id="mainImage" class="product-image-feature"
                      src="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $thumbnail[0] ?>" alt="">
                  </div>
                </div>
              </div>
            </div>

            <!-- Cột phải - Thông tin sản phẩm -->
            <div class="col-md-5 col-sm-12 col-xs-12 product-content-desc" id="detail-product">
              <div class="product-title">
                <h1><?= $productData['product_name'] ?></h1>
                <?php $firstSku = reset($productData['skus']); ?>
                <span id="pro_sku">SKU: <?= $firstSku['sku'] ?></span>
              </div>

              <div class="product-price" id="price-preview">
                <span id="old-price-<?= $productData['product_id'] ?>" class="pro-price-del">
                  <?= isset($firstSku['original_price']) ? number_format($firstSku['original_price']) : 'Giá liên hệ' ?> đ
                </span>
                <span id="current-price-<?= $productData['product_id'] ?>" class="pro-price">
                  <?= isset($firstSku['discounted_price']) ? number_format($firstSku['discounted_price']) : 'Giá liên hệ' ?> đ
                </span>
              </div>

              <div class="product-description">
                <?= $productData['short_description'] ?>
              </div>

              <!-- Phần chọn SKU -->
              <div class="select-swatch clearfix">
                <div class="product__info__buy row">
                  <?php foreach ($productData['skus'] as $index => $sku): ?>
                    <div class="col-4 p-1">
                      <div class="sku-option-card <?= $sku['quantity'] > 0 ? '' : 'disabled' ?>">
                        <label class="sku-option-label">
                          <?php if ($sku['quantity'] > 0): ?>
                            <input form="add-to-cart"
                              type="radio"
                              class="sku-radio"
                              value="<?= $sku['sku_id'] ?>"
                              name="sku_options"
                              data-price="<?= $sku['discounted_price'] ?>"
                              data-old-price="<?= $sku['original_price'] ?>"
                              onclick="onSkuSelect(this)"
                              <?= $index === 0 ? 'checked' : '' ?>>

                            <div class="sku-option-content">
                              <?php foreach ($sku['options'] as $option): ?>
                                <div class="sku-option-item">
                                  <span class="option-name"><?= htmlspecialchars($option['option_name']) ?>:</span>
                                  <span class="option-value"><?= htmlspecialchars($option['option_value']) ?></span>
                                </div>
                              <?php endforeach; ?>
                            </div>
                          <?php else: ?>
                            <div class="out-of-stock-label">Hết hàng</div>
                          <?php endif; ?>
                        </label>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>

              <!-- Phần chọn số lượng -->
              <div class="selector-actions">
                <div class="quantity-area clearfix">
                  <input type="button" value="-" onclick="decrementProduct()" class="qty-btn">
                  <input id="quantityProduct" value="1" min="1" class="quantity-selector">
                  <input type="button" value="+" onclick="incrementProduct()" class="qty-btn">
                </div>
              </div>

              <!-- Form thêm vào giỏ hàng -->
              <div class="wrap-addcart clearfix">
                <form id="add-to-cart" action="/add-to-cart" method="post">
                  <input type="hidden" id="quantityInput" name="quantity" value="1">
                  <input type="hidden" name="product_id" value="<?= $productData['product_id'] ?>">
                  <button type="submit" class="button btn-addtocart addtocart-modal" name="add-to-cart">
                    Thêm vào giỏ
                  </button>
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
  function onSkuSelect(element) {
    const price = element.getAttribute('data-price');
    const oldPrice = element.getAttribute('data-old-price');

    document.getElementById('current-price-<?= $productData['product_id'] ?>').textContent =
      new Intl.NumberFormat('vi-VN').format(price) + ' đ';
    document.getElementById('old-price-<?= $productData['product_id'] ?>').textContent =
      new Intl.NumberFormat('vi-VN').format(oldPrice) + ' đ';
  }

  function decrementProduct() {
    const input = document.getElementById('quantityProduct');
    const hiddenInput = document.getElementById('quantityInput');
    if (parseInt(input.value) > 1) {
      input.value = parseInt(input.value) - 1;
      hiddenInput.value = input.value;
    }
  }

  function incrementProduct() {
    const input = document.getElementById('quantityProduct');
    const hiddenInput = document.getElementById('quantityInput');
    input.value = parseInt(input.value) + 1;
    hiddenInput.value = input.value;
  }

  function changeImage1(imageUrl) {
    document.getElementById('mainImage').src = imageUrl;
  }

  function toggleDescription() {
    const descriptionContent = document.getElementById('product-description');
    const viewMoreBtn = document.getElementById('view-more-btn');
    const btnText = viewMoreBtn.querySelector('span');
    const btnIcon = viewMoreBtn.querySelector('i');

    if (descriptionContent.style.maxHeight === '600px') {
      descriptionContent.style.maxHeight = 'none';
      btnText.textContent = 'Thu gọn';
      btnIcon.classList.remove('fa-angle-down');
      btnIcon.classList.add('fa-angle-up');
    } else {
      descriptionContent.style.maxHeight = '600px';
      btnText.textContent = 'Xem thêm';
      btnIcon.classList.remove('fa-angle-up');
      btnIcon.classList.add('fa-angle-down');
    }
  }
</script>

<?php
$this->end();
?>