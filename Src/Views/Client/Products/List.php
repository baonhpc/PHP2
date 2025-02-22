<?php $this->layout('Client/Components/Layout'); ?>



<?php $this->start('main_content') ?>
<!-- Insert nội dung vào đây -->

<!--Banner-->
<div>
  <div>
    <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/hero_1.jpg" alt="Products">
  </div>
</div>
<div class="breadcrumb-shop">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
        <ol class="breadcrumb breadcrumb-arrows">
          <li>
            <a href="index.html">
              <span>Trang chủ</span>
            </a>
          </li>
          <li>
            <span><span style="color: #777777">Tất cả sản phẩm</span></span>
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--List Prodct-->
<div class="container" style="margin-top: 50px;">
  <div class="row">
    <div class="col-md-3 col-sm-12 col-xs-12 sidebar-fix">
      <div class="wrap-filter">
        <div class="box_sidebar">
          <div class="block left-module">
            <div class=" filter_xs">
              <div class="group-menu">
                <div class="title_block d-block d-sm-none d-none d-sm-block d-md-none" data-toggle="collapse"
                  href="#collapseExample1" role="button" aria-expanded="false"
                  aria-controls="collapseExample1">
                  Danh mục sản phẩm
                  <span><i class="fa fa-angle-down" data-toggle="collapse"
                      href="#collapseExample1" role="button" aria-expanded="false"
                      aria-controls="collapseExample1"></i></span>
                </div>
              </div>
              <div class="layered">
                <p class="title_block d-block d-sm-none d-none d-sm-block d-md-none" data-toggle="collapse"
                  href="#collapseExample2" role="button" aria-expanded="false"
                  aria-controls="collapseExample2">
                  Bộ lọc sản phẩm
                  <span><i class="fa fa-angle-down" data-toggle="collapse"
                      href="#collapseExample2" role="button" aria-expanded="false"
                      aria-controls="collapseExample2"></i></span>
                </p>
                <div class="block_content collapse" id="collapseExample2">
                  <div class="group-filter" aria-expanded="true">
                    <div class="layered_subtitle dropdown-filter"><span>Giá sản phẩm</span><span
                        class="icon-control"><i class="fa fa-minus"></i></span></div>
                    <div class="layered-content bl-filter filter-price">
                      <ul class="check-box-list">
                        <li>
                          <input type="checkbox" id="p1">
                          <label for="p1">
                            <span>Dưới</span> 500,000₫
                          </label>
                        </li>
                        <li>
                          <input type="checkbox" id="p2">
                          <label for="p2">
                            500,000₫ - 1,000,000₫
                          </label>
                        </li>
                        <li>
                          <input type="checkbox" id="p3">
                          <label for="p3">
                            1,000,000₫ - 1,500,000₫
                          </label>
                        </li>
                        <li>
                          <input type="checkbox" id="p4">
                          <label for="p4">
                            2,000,000₫ - 5,000,000₫
                          </label>
                        </li>
                        <li>
                          <input type="checkbox" id="p5">
                          <label for="p5">
                            <span>Trên</span> 5,000,000₫
                          </label>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9 col-sm-12 col-xs-12">
      
      <div class="row">
        <?php if (!empty($data) && is_array($data)): ?>
          <?php foreach ($data as $product): ?>
            <?php
            $thumbnails = explode(',', $product['thumbnail']);
            $thumbnail = !empty($thumbnails[0]) ? $thumbnails[0] : 'default.jpg';
            $firstSku = reset($product['skus']);
            $secondImage = !empty($firstSku['images']) ? $firstSku['images'] : $thumbnail;
            $discountedPrice = !empty($firstSku['discounted_price']) ? number_format($firstSku['discounted_price'], 0, ',', '.') : 'Giá không có sẵn';
            ?>

            <div class="col-md-3 col-sm-6 col-xs-6 col-6">
              <div class="product-block">
                <div class="product-img fade-box">
                  <a href="/detail/<?= $product['product_id'] ?>"
                    title="<?= htmlspecialchars($product['product_name']) ?>" class="img-resize">
                    <img src="<?= $_ENV['APP_URL'] . '/public/Uploads/Products/' . $thumbnail ?>"
                      alt="<?= htmlspecialchars($product['product_name']) ?>" class="lazyloaded">
                    <img src="<?= $_ENV['APP_URL'] . '/public/Uploads/Products/' . $secondImage ?>"
                      alt="<?= htmlspecialchars($product['product_name']) ?>" class="lazyloaded">
                  </a>
                </div>
                <div class="product-detail clearfix">
                  <div class="pro-text">
                    <a style="color: black; font-size: 14px; text-decoration: none;"
                      href="/detail/<?= $product['product_id'] ?>">
                      <?= htmlspecialchars($product['product_name']); ?>
                    </a>
                  </div>
                  <div class="pro-price">
                    <p class=""><?= $discountedPrice; ?>₫</p>
                  </div>
                </div>
              </div>
            </div>

          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-center">Không có sản phẩm nào.</p>
        <?php endif; ?>
      </div>

      <!-- <div class="sortpagibar pagi clearfix text-center">
        <div id="pagination" class="clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <span class="page-node current">1</span>
            <a class="page-node" href="">2</a>
            <a class="next" href="">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" viewBox="0 0 31 10" style="enable-background:new 0 0 31 10; width: 31px; height: 10px;"
                xml:space="preserve">
                <polygon points="31,5 25,0 25,4 0,4 0,6 25,6 25,10 "></polygon>
              </svg> </a>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</div>

<?php $this->stop() ?>
<?php
$this->push('scripts')
?>
<?php
$this->end();
?>