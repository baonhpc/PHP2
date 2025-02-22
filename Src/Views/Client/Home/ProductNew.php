<section>
    <div class="content">
        <div class="container">
            <div class="hot_sp">
                <h2 style="text-align:center;">
                    <a style="font-size: 28px;color: black;text-decoration: none" href="">Sản phẩm mới</a>
                </h2>
                <div class="view-all" style="text-align:center;">
                    <a style="color: black;text-decoration: none" href="/list">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container product" style="width: 100%;margin: auto;">
        <div class="owl-carousel owl-theme owl-product-setting">
            <?php if (!empty($LatestProduct) && is_array($LatestProduct)): ?>
                <?php foreach ($LatestProduct as $product): ?>
                    <?php
                    $thumbnails = explode(',', $product['thumbnail']);
                    $thumbnail = !empty($thumbnails[0]) ? $thumbnails[0] : 'default.jpg';
                    $secondImage = $product['skus'][array_key_first($product['skus'])]['images'] ?? $thumbnail;
                    ?>
                    
                    <div class="item">
                        <div class="">
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
                                        <?php if (!empty($product['skus'])): ?>
                                            <?php
                                            $firstSku = current($product['skus']);
                                            $discountedPrice = $firstSku['discounted_price'] ?? 0;
                                            ?>
                                            <p class=""><?= number_format($discountedPrice, 0, ',', '.'); ?>₫</p>
                                        <?php else: ?>
                                            <p class="">Giá không có sẵn</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Không có sản phẩm nào.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
