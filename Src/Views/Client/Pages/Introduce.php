<?php $this->layout('Client/Components/Layout'); ?>



<?php $this->start('main_content') ?>
<!-- Insert nội dung vào đây -->

<!--Banner-->
<?php $this->insert('Client/Components/Banner'); ?>

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
            <span><span style="color: #777777">Giới thiệu</span></span>
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--List Prodct-->

<div class="container">

  <div class="row">
    <div class="col-md-3 d-none d-sm-block d-sm-none d-md-block">
      <div class="sidebar-page">
        <div class="group-menu">
          <div class="page_menu_title title_block">
            <h2>Danh mục trang</span></h2>
          </div>
          <div class="layered layered-category">
            <div class="layered-content">
              <ul class="menuList-links">
                <li class=""><a href="home.html" title="Trang chủ"><span>Trang chủ</span></a></li>
                <li class=""><a href="product.html" title="Bộ sưu tập"><span>Bộ sưu tập</span></a></li>
                <li class="has-submenu level0 ">
                  <a title="Sản phẩm">Sản phẩm <span class="icon-plus-submenu" data-toggle="collapse"
                      href="#collapseExample" role="button" aria-expanded="false"
                      aria-controls="collapseExample"></span></a>
                  <div class="collapse" id="collapseExample">
                    <div class="card card-body" style="border:0">
                      <ul class="menu-product">
                        <li><a href="detailproduct.html" title="Sản phẩm - Style 1">Sản phẩm - Style 1</a></li>
                        <li><a href="detailproduct.html" title="Sản phẩm - Style 2">Sản phẩm - Style 2</a></li>
                        <li><a href="detailproduct.html" title="Sản phẩm - Style 3">Sản phẩm - Style 3</a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="active"><a href="introduce.html" title="Giới thiệu"><span>Giới thiệu</span></a></li>
                <li class=""><a href="blog.html" title="Blog"><span>Blog</span></a></li>
                <li class=""><a href="contact.html" title="Liên hệ"><span>Liên hệ</span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="box_image visible-lg visible-md">
          <div class="banner">
            <a href="">
              <img class="img-resize" src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/images/OLC.jpg" alt="">
            </a>
          </div>
        </div>
      </div>

    </div>
    <div class="col-md-9 col-sm-12 col-xs-12">
      <div class="page-wrapper">
        <div class="heading-page">
          <h1>VỀ CHÚNG TÔI</h1>
        </div>
        <div class="wrapbox-content-page">
          <div class="content-page ">
            <p>Chuỗi nhà thuốc uy tín hàng đầu Việt Nam
              Với hơn 12 năm hoạt động, Pharmacity tự hào là người bạn đồng hành tin cậy của hàng triệu người dân Việt Nam trên hành trình nâng cao chất lượng sức khỏe. Hệ thống gần 1000 nhà thuốc đạt chuẩn GPP trên toàn quốc trải dài 40 tỉnh thành, cùng đội ngũ gần 5000 Dược sĩ, Pharmacity mang đến dịch vụ chăm sóc sức khỏe tận tâm và trải nghiệm mua sắm tiện lợi cho mọi khách hàng.</p>
            <h3>Sản phẩm chính hãng, giá tốt </h3>
            <p>Pharmacity cam kết cung cấp sản phẩm chính hãng, đa dạng từ thuốc cho các nhóm bệnh: Tiểu Đường, Huyết Áp, Mỡ Máu, Tiêu Hóa, Hô Hấp,… đến thực phẩm chức năng, sản phẩm chăm sóc sức khỏe, sắc đẹp, thiết bị y tế thuộc các thương hiệu hàng đầu thế giới như: Abbott, GSK, Sanofi, Astrazeneca, Pfizer, Mega Lifesciences, Goodlife, L’oreal, Durex,… và các thương hiệu uy tín tại Việt Nam như Dược Hậu Giang, Nam Hà,… Bên cạnh đó, chúng tôi luôn chú trọng bảo quản sản phẩm trong điều kiện tốt nhất, đảm bảo chất lượng đến tay người tiêu dùng.</p>
            <h3>Dược sĩ tận tâm, tư vấn chuyên nghiệp</h3>
            <p>Đội ngũ Dược sĩ Pharmacity được đào tạo bài bản, có chuyên môn cao và giàu kinh nghiệm. Luôn đặt lợi ích khách hàng lên hàng đầu, sẵn sàng tư vấn, giải đáp thắc mắc và hướng dẫn sử dụng sản phẩm hiệu quả, an toàn.</p>
            <h3>Mua sắm tiện lợi, giao hàng nhanh chóng</h3>
            <p>Thấu hiểu nhu cầu đa dạng của khách hàng, Pharmacity mang đến hệ thống mua sắm đa kênh vô cùng tiện lợi:</p>
            <ul style = "margin-left: 40px;">
              <li>Mua trực tiếp tại nhà thuốc: Hệ thống gần 1000 nhà thuốc Pharmacity trải dài 40 tỉnh thành.</li>
              <li>Mua hàng trực tuyến: Truy cập trang https://www.pharmacity.vn/ hoặc ứng dụng Pharmacity.</li>
              <li>Giao hàng siêu tốc: Giao hàng nhanh chóng trong vòng 2 giờ tại các thành phố lớn.</li>
              <li>Hợp tác với đối tác lớn, uy tín: Grab, Shopee, Lazada, Tiki…</li>
            </ul>
            <h3>Chính sách ưu đãi dành cho khách hàng thân thiết</h3>
            <p>Pharmacity triển khai chương trình P-Thành Viên hấp dẫn. Mỗi giao dịch mua sắm, khách hàng đều được tích điểm và có thể sử dụng điểm để trừ tiền cho các lần mua sau. Ngoài ra, Pharmacity luôn có các chương trình khuyến mãi, ưu đãi dành riêng cho khách hàng thân thiết.</p>
            <h3>Lựa chọn Pharmacity, lựa chọn an tâm cho sức khỏe bản thân và gia đình!</h3>
          </div>
        </div>
      </div>
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