<div class="content">
    <div class="container">
        <div class="hot_sp" style="padding-bottom: 10px;">
            <h2 style="text-align:center;padding-top: 10px">
                <a style="font-size: 28px;color: black;text-decoration: none" href="">Sản phẩm bán chạy</a>
            </h2>
            <div class="view-all" style="text-align:center;padding-top: -10px;">
                <a style="color: black;text-decoration: none" href="/list">Tất cả sản phẩm</a>
            </div>
        </div>
    </div>

    <div class="container" style="padding-bottom: 50px;">
        <div class="row">
            <?php
            if (!empty($dataProduct) && is_array($dataProduct)):
                $counter = 0;
                foreach ($dataProduct as $product):
                    if ($counter >= 4) break;
                    $thumbnails = explode(',', $product['thumbnail']);
                    $thumbnail = !empty($thumbnails[0]) ? $thumbnails[0] : 'default.jpg';
            ?>
                    <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                        <div class="product-block">
                            <div class="product-img fade-box">
                                <a href="/detail/<?= $product['product_id'] ?>" title="<?= htmlspecialchars($product['product_name']) ?>" class="img-resize">
                                    <img src="<?= $_ENV['APP_URL'] . '/public/Uploads/Products/' . $product['thumbnail'] ?>"
                                        alt="<?= htmlspecialchars($product['product_name']) ?>"
                                        class="lazyloaded first-img">

                                    <?php
                                    $secondImage = $product['skus'][array_key_first($product['skus'])]['images'] ?? $product['thumbnail'];
                                    ?>

                                    <img src="<?= $_ENV['APP_URL'] . '/public/Uploads/Products/' . $secondImage ?>"
                                        alt="<?= htmlspecialchars($product['product_name']) ?>"
                                        class="lazyloaded second-img">
                                </a>

                            </div>
                            <div class="product-detail clearfix">
                                <div class="pro-text">
                                    <a style="color: black; font-size: 14px; text-decoration: none;" href="/detail/<?= $product['product_id'] ?>">
                                        <?= htmlspecialchars($product['product_name']); ?>
                                    </a>
                                </div>
                                <div class="pro-price">
                                    <?php if (!empty($product['skus'])): ?>
                                        <?php
                                        $firstSku = current($product['skus']);
                                        $discountedPrice = $firstSku['discounted_price'] ?? 0;
                                        ?>
                                        <p class="product-price">
                                            <?= number_format($discountedPrice, 0, ',', '.'); ?>đ
                                        </p>
                                    <?php else: ?>
                                        <p class="product-price">Giá không có sẵn</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                    $counter++;
                endforeach;
            else:
                echo "<p class='text-center'>Không có sản phẩm nào.</p>";
            endif;
            ?>
        </div>
    </div>

</div>