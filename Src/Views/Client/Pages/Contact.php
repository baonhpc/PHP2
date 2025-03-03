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
            <span><span style="color: #777777">Liên hệ</span></span>
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>
<section>

  <div class="container">

    <div class="row">
      <div class="col-md-6 col-sm-12 col-xs-12 box-heading-contact">
        <div class="box-map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1025.6909825921396!2d106.6854739108858!3d10.782465761154615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f2e5ba4431f%3A0xa1e4cc4c30b79491!2zSOG6u20gMjMyIFbDtSBUaOG7iyBTw6F1LCBwaMaw4budbmcgNywgUXXhuq1uIDMsIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1566967773757!5m2!1svi!2s"
            width="100%" height="700" frameborder="0" style="border:0" allowfullscreen=""></iframe>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12  wrapbox-content-page-contact">
        <div class="header-page-contact clearfix">
          <h1>Liên hệ</h1>
        </div>
        <div class="box-info-contact">
          <ul class="list-info">
            <li>
              <p>Địa chỉ chúng tôi</p>
              <p><strong>232/6 đường Võ Thị Sáu, phường 7, quận 3, Tp. Hồ
                  Chí Minh.</strong></p>
            </li>
            <li>
              <p>Email chúng tôi</p>
              <p><strong>contact@aziworld.com</strong></p>
            </li>
            <li>
              <p>Điện thoại</p>
              <p><strong>+84 (028) 38800659</strong></p>
            </li>
            <li>
              <p>Thời gian làm việc</p>
              <p><strong>Thứ 2 đến Thứ 6 từ 8h đến 18h; Thứ 7 và Chủ nhật từ 9h30 đến 17h00 </strong></p>
            </li>
          </ul>
        </div>
        <div class="box-send-contact">
          <h2>Gửi thắc mắc cho chúng tôi</h2>
          <div id="col-left contactFormWrapper menuList-links">
            <div class="contact-form">
              <form id="contactForm">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="input-group">
                      <input type="text" class="form-control" id="name" placeholder="Tên của bạn">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <input type="email" class="form-control" id="email" placeholder="Email của bạn">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <input type="text" class="form-control" id="phone" placeholder="Số điện thoại của bạn">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <textarea class="form-control" id="message" placeholder="Nội dung"></textarea>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <button type="submit" class="button dark">Gửi cho chúng tôi</button>
                  </div>
                </div>
              </form>
              <p id="responseMessage"></p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $this->stop() ?>
<?php
$this->push('scripts')
?>
<script>
  $(document).ready(function() {
    $("#contactForm").submit(function(e) {
      e.preventDefault();

      $.ajax({
        url: "/contact/sendMail",
        type: "POST",
        data: {
          name: $("#name").val(),
          email: $("#email").val(),
          phone: $("#phone").val(),
          message: $("#message").val()
        },
        success: function(response) {
          let res = JSON.parse(response);
          $("#responseMessage").html(res.message).css("color", res.status === "success" ? "green" : "red");
          if (res.status === "success") {
            $("#contactForm")[0].reset();
          }
        },
        error: function() {
          $("#responseMessage").html("Lỗi hệ thống, vui lòng thử lại!").css("color", "red");
        }
      });
    });
  });
</script>

<?php
$this->end();
?>