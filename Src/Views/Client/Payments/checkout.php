<?php $this->layout('Client/Components/Layout'); ?>

<?php $this->start('main_content') ?>
<!-- Insert nội dung vào đây -->

<section>
    <div class="payment__section">
        <div class="payment__section__left">
            <div class="payment__section__left-text">
                <div class="payment__section__left-ttlh">
                    <h3>Thông tin liên hệ</h3>
                </div>


                <div class="form-group">
                    <label for="fullname" class="form-label">Tên đầy đủ</label>
                    <input form="paymentForm" type="text" id="fullname" name="fullname" class="form-control form-control-lg"
                        value="<?= isset($_SESSION['user']['fullname']) ? htmlspecialchars($_SESSION['user']['fullname']) : '' ?>"
                        placeholder="Ex: NguyenVanA, ....">
                    <span class="text-danger" style="display:none" id="fullname-required">* Vui lòng nhập tên</span>
                </div>

                <div class="">
                    <label for="van_chuyen">Phương thức vận chuyển</label>
                    <select id="van_chuyen" name="shipping_method" class="form-select cnvc " aria-label="Default select example" form="paymentForm">
                        <option value="none">Chọn phương thức vận chuyển</option>
                        <option class="option" value="home">Giao hàng tận nhà <span class="icon">&#128663;</span></option>
                        <option class="option" value="store">Nhận hàng tại cửa hàng<span class="icon">&#127970;</span></option>
                    </select>
                    <span class="text-danger" style="display:none" id="method_required">* Vui lòng chọn phương thức vận chuyển</span>
                </div>


                <!-- <div class="form-group">
                        <input type="email" class="form-control cnvc " id="exampleInputEmail" name="email"
                            placeholder="Email" required>
                    </div>

                    <div class="payment__section__container">
                        <input class="payment__section__checkbox" type="checkbox" id="newsletter" />
                        <label for="newsletter">Gửi cho tôi tin tức và ưu đãi qua email</label>
                    </div> -->




                <!-- thêm địa chỉ -->



                
                <div class="addressUser" id="addressUser" style="display:none;">

                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog width-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fw-bold" id="staticBackdropLabel">THÊM ĐỊA CHỈ
                                    </h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="addressForm" method="post" action="/insert-address">
                                        <input type="hidden" name="method" value="POST">
                                        <div class="form-group text-start">
                                            <label for="" class="form-label">Tỉnh/thành</label>
                                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="city" id="city">
                                                <option>Chọn tỉnh thành</option>

                                            </select>
                                        </div>
                                        <div class="form-group text-start">
                                            <label for="" class="form-label">Quận/Hyện</label>
                                            <select class="form-select form-select-lg mb-3" name="district" aria-label=".form-select-lg example" id="district">
                                                <option>Chọn Quận/Huyện</option>
                                            </select>
                                        </div>
                                        <div class="form-group text-start">
                                            <label for="" class="form-label">Phường/xã</label>
                                            <select class="form-select form-select-lg mb-3" id="wards" name="ward" aria-label=".form-select-lg example" id="ward">
                                                <option>Phường/xã</option>

                                            </select>
                                        </div>
                                        <div class="form-group text-start">
                                            <label for="" class="form-label">Địa chỉ chi tiết</label>
                                            <input type="text" class="form-control p-3" name="address" id="address">
                                        </div>
                                        <div class="form-group text-start">
                                            <label for="" class="form-label">Số điện thoại của địa chỉ này</label>
                                            <input type="text" class="form-control p-3" name="phone" id="phone">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" form="addressForm" name="submit">Lưu địa chỉ</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <h4 class="address__name d-flex gap-1  align-items-center justified-content-between">
                        <div>Địa chỉ</div>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="border: none; ">
                            <a href="#" class="text-decoration-none" class="modal-dialog modal-dialog-scrollable">
                                THÊM ĐỊA CHỈ
                            </a>
                        </button>
                    </h4>
                    <?php foreach ($addressUser as $item): ?>
                        <div class="border-bottom">
                            <label class="w-100"
                                data-province_name="<?= $item['province_name'] ?>"
                                data-district_name="<?= $item['district_name'] ?>">
                                <input form="paymentForm" type="radio" class="address my-3" name="address_id" id="userAddress" value="<?= $item['id'] ?>">
                                <p>SĐT: <?= $item['phone'] ?></p>
                                <p><?= $item['address'] . ', ' . $item['ward_name'] . ', ' . $item['district_name'] . ', ' . $item['province_name'] ?></p>
                            </label>
                        </div>
                    <?php endforeach; ?>

                    <span class="text-danger" id="address-required" style="display: none;">* Vui lòng chọn địa chỉ cần giao</span>
                </div>
              


                <div class="atStore" id="atStore" style="display:none;">

                    <div>
                        <p>Nhận tại chi nhánh TP Cần Thơ:</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.4204309707616!2d105.75564711161697!3d9.9820867732995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08906415c355f%3A0x416815a99ebd841e!2sFPT%20Polytechnic%20College!5e0!3m2!1sen!2s!4v1732997578750!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>




           
                <!-- Phương thức thanh toán -->
                <div class="payment-methods">
                    <h3>Phương thức thanh toán</h3>
                    <select class="cnvc" name="payment-method" id="paymentMethodSelect" form="paymentForm">
                        <option value="cash" selected>Tiền mặt khi nhận hàng</option>
                        <option value="international">Thanh toán quốc tế <i class="fab fa-cc-visa"></i> <i
                                class="fab fa-cc-mastercard"></i></option>
                        <option value="vnpay">Thanh toán VNPay</option>
                    </select>

                </div>


                <form class="mt-3" action="/proceed-checkout" method="POST" id="paymentForm" name="paymentForm">
                    <button type="submit" class="button_thanhtoan">THANH TOÁN NGAY</button>
                </form>


            </div>
        </div>





        <style>
            .bold-button {
                background-color: #007bff !important;
                color: white !important;
            }

            .col-12.mb-30 {
                margin-top: 20px;
            }

            .col-12.mb-30 select {
                width: 100%;
                padding: 12px;
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-size: 14px;
                background-color: #fff;
            }

            .col-12.mb-30 select:focus {
                border-color: #007bff;
                outline: none;
                box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
            }

            /* Ẩn cả hai form mặc định */
            /*.col-12.mb-30,
            .atStore {
                display: none;
            }*/

            .atStore {
                margin-top: 20px;
                padding: 15px;
                border: 1px solid #eee;
                border-radius: 8px;
            }

            .atStore p {
                font-weight: bold;
                margin-bottom: 15px;
                color: #333;
            }

            .atStore iframe {
                max-width: 100%;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
        </style>



        <div class="payment__section__right">
            <div class="payment__section__right-ttlh">
                <?php
                $totalPrice = 0; // Tổng tiền tất cả sản phẩm
                foreach ($data as $item):
                    $totalPrice += $item['total_price'];
                ?>
                    <div class="payment__section__container">
                        <div class="payment__section__right-img" style="position: relative;">
                            <div class="payment__section__right-circle"><span><?= $item['quantity']; ?></span></div>
                            <img src="<?= $_ENV['APP_URL'] ?>/public/Uploads/Products/<?= $item['product_images']; ?>" alt="<?= $item['product_name']; ?>" style="object-fit:cover; width:100%; height:100%">
                        </div>
                        <div class="payment__section__right-description">
                            <p class="clamp-text"><?= $item['product_name']; ?></p>
                            <p class="clamp-text">SKU: <?= $item['product_sku'];  ?></p>
                            <!-- <div class="cart__product-description">
                                <ul class="cart__product-description-fix">
                                    <li>SKU: <?= $item['product_sku']; ?></li>
                                    <li>Giá: <?= number_format($item['product_price'], 0, ',', '.'); ?> ₫</li>
                                </ul>
                            </div> -->
                        </div>
                        <div class="payment__section__right-pcire">
                            <p><?= number_format($item['total_price'], 0, ',', '.'); ?> ₫</p>
                        </div>
                    </div>
                <?php endforeach;
                $shippingFee = isset($shippingFee) ? $shippingFee : 0;
                $totalPriceWithShipping = $totalPrice + $shippingFee; ?>


                <div class="order-summary">
                    <div class="totals">
                        <p>Vận chuyển: <span id="shippingFee">MIỄN PHÍ</span></p>
                        <h3>Tổng: <span id="price"><?= number_format($totalPriceWithShipping, 0, ',', '.'); ?></span> </h3>
                        <input form="paymentForm" type="hidden" name="totalPrice" value="<?= $totalPriceWithShipping ?>">
                        <p>Phương thức thanh toán: Tiền mặt</p>
                    </div>
                </div>
                <div class="alert alert-danger" role="alert" style="display:none;">

                </div>
            </div>
        </div>
    </div>
</section>



<?php $this->stop() ?>

<?php $this->push('scripts') ?>

 <!-- <script src="/public/assets/client/js/checkoutAjax.js"></script> -->
 <script>
    $(document).ready(function() {
        // Xử lý khi chọn phương thức thanh toán
        $('#paymentMethodSelect').on('change', function() {
            let selectedMethod = $(this).val();
            if (selectedMethod === 'cash') {
                // Hiển thị địa chỉ nếu chọn thanh toán khi nhận hàng
                $('#addressUser').show();
            } else {
                // Ẩn địa chỉ với các phương thức thanh toán khác
                $('#addressUser').hide();
            }
        });

        // Kích hoạt sự kiện change khi trang load để hiển thị địa chỉ nếu mặc định là cash
        $('#paymentMethodSelect').trigger('change');

        // Giữ lại code xử lý địa chỉ cũ
        $('#selectAddress').on('change', function() {
            let selectedOption = $(this).find(':selected');
            let address = selectedOption.data('address');
            let phone = selectedOption.data('phone');
            let province = selectedOption.data('province');
            let district = selectedOption.data('district');
            let ward = selectedOption.data('ward');


            $('#province').val(province);
            $('#district').val(district);
            $('#ward').val(ward);
            $('#address').val(address);
            $('#phone').val(phone);
        });
        
        $('#paymentForm').on('submit', function() {
            $("input[readonly]").removeAttr("readonly");
        });
    });
</script>
<script>
    $(() => {
        $.ajax({
            type: "GET",
            url: "/api/tinh-thanh",
            success: function(response) {
            console.log(response);
            
                let data = response.data
                data.forEach(element => {
                    $('select[name="city"]').append(`<option value="${element.ProvinceName}|${element.ProvinceID}" data-province-id="${element.ProvinceID}">${element.ProvinceName}</option>`);
                });
            },
            error: function(xhr) {
                console.error('Lỗi', xhr.responseText);
            }
        });
        $('select[name="city"]').on('change', function() {
            let provinceId = $(this).find(':selected').data('province-id');

            $('select[name="district"]').empty().append('<option value="">Chọn quận/huyện</option>');

            if (!provinceId) {
                console.log('Không tìm thấy Province ID');
                return;
            }

            $.ajax({
                type: "GET",
                url: "/api/quan-huyen",
                data: {
                    id: provinceId
                },
                success: function(response) {
                    let districts = response.data;
                    console.log(districts);

                    districts.forEach(element => {
                        $('select[name="district"]').append(
                            `<option value="${element.DistrictName}|${element.DistrictID}" data-district-id="${element.DistrictID}">${element.DistrictName}</option>`
                        );
                    });
                },
                error: function(xhr) {
                    console.error('Lỗi khi lấy danh sách quận/huyện:', xhr.responseText);
                }
            });
        });


        $('select[name="district"]').on('change', function() {
            let districtId = $(this).find(':selected').data('district-id'); // Lấy ID quận/huyện

            $('select[name="ward"]').empty().append('<option value="">Chọn Phường/Xã</option>');

            if (!districtId) {
                console.log('Không tìm thấy district ID');
                return;
            }

            $.ajax({
                type: "GET",
                url: "/api/phuong-xa",
                data: {
                    id: districtId
                },
                success: function(response) {
                    let wards = response.data;
                    console.log(wards);

                    wards.forEach(element => {
                        $('select[name="ward"]').append(
                            `<option value="${element.WardName}|${element.WardCode}" data-ward-id="${element.WardCode}">${element.WardName}</option>`
                        );
                    });
                },
                error: function(xhr) {
                    console.error('Lỗi khi lấy danh sách phường/xã:', xhr.responseText);
                }
            });
        });

    });
</script>
<?php $this->end(); ?>