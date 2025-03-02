<div id="offcanvas-flip2" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar" style="    background: white;
            width: 350px;">

        <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>

        <h3 style="font-size: 14px;
                color: #272727;
                text-transform: uppercase;
                margin: 3px 0 30px 0;
                font-weight: 500; letter-spacing: 2px;">Giỏ hàng</h3>
        <div class="site-nav-container-last" style="color:#272727">
            <div class="cart-view clearfix">
                <table id="cart-view">
                    <?php foreach ($cartItems as $cart): ?>
                        <tbody>
                            <tr class="item_1">
                                <td class="img"><a href="" title="Nike Air Max 90 Essential &quot;Grape&quot;"><img
                                            src="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $cart['product_images'] ?>" alt="<?= htmlspecialchars($cart['product_sku']) ?>"></a></td>
                                <td>
                                    <a class="pro-title-view" style="color: #272727" href=""><?= htmlspecialchars($cart['product_name'] . '' . $cart['product_sku']) ?></a>
                                    <span class="pro-quantity-view"><?= htmlspecialchars($cart['quantity']) ?></span>
                                    <span class="pro-price-view"><?= number_format($cart['discounted_price'], 0, ',', '.') ?>₫</span>
                                    <span class="remove_link remove-cart">
                                        <form action="/delete-cart-item" method="post" class="delete-form">
                                            <input type="hidden" name="id" value="<?= htmlspecialchars($cart['cart_id']) ?>">
                                            <input type="hidden" name="method" value="POST">
                                            <button name="delete-cart-item">
                                                <i style="color: #272727;" class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
                <span class="line"></span>
                <table class="table-total">
                    <tbody>
                        <tr>
                            <?php $total = array_sum(array_column($cartItems, 'total_price'));
                            ?>
                            <td class="text-left">TỔNG TIỀN:</td>

                            <td class="text-right" id="total-view-cart"> <?= number_format($total, 0, ',', '.') ?>₫</td>
                        </tr>
                        <tr>
                            <td class="distance-td"><a href="/cart" class="linktocart button dark">Xem giỏ hàng</a></td>
                            <td><a href="/checkout" class="linktocheckout button dark">Thanh toán</a></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>