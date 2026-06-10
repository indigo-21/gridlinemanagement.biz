<!-- Footer  -->
<?php if ($_REQUEST['page'] != 'our-essence') { ?>
  <div class="section z-index">
    <div class="container">
      <div class="tekup-cta-wrap" style="background:#7C6041">
        <div class="tekup-cta-content center">
          <h2>Let's talk about your projects.</h2>
          <p></p>
          <div class="tekup-extra-mt">
            <a class='tekup-default-btn tekup-white-btn' href='./?page=contact-us'>Contact Us <i
                class="ri-arrow-right-up-line"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<footer class="tekup-footer-section dark-bg extra-minus-margin">
  <div class="container">
    <div class="tekup-footer-top extra-padding">
      <div class="row">
        <div class="col-xl-4 col-lg-12">
          <div class="tekup-footer-textarea light-color">
            <a href='./'>
              <h1 class="logo-text mb-2">Corlev Consulting</h1>
            </a>
            <p>We drive business transformation through comprehensive solutions that optimize processes, strengthen
              operations, and generate sustainable growth.</p>
            <div class="tekup-footer-info">
              <ul>
                <li><a href="mailto:info@corlevconsulting.com"><i class="ri-mail-fill"></i>info@corlevconsulting.com</a>
                </li>
                <li class="text-white" style="padding-left:0px;"><i class="fa fa-map-pin"></i> 1303 Greene Avenue, Suite 400 <br>
                  Westmount, Quebec <br>
                  Canada, H3Z2A7</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xl-3 offset-xl-1 col-md-4">
          <div class="tekup-footer-menu light-color">
            <div class="tekup-footer-title light-color">
              <h5>Quick Links</h5>
            </div>
            <ul>
              <?php foreach ($navLinks as $nav): ?>
                <li><a href='./?page=<?= $nav['url'] ?>'><?= $nav['name'] ?> </a></li>
              <?php endforeach; ?>

            </ul>
          </div>
        </div>
        <div class="col-xl-4 col-md-4">
          <div class="tekup-footer-menu light-color extar-margin">
            <div class="tekup-footer-title light-color">
              <h5>Services</h5>
            </div>
            <ul>
              <?php foreach ($services as $service): ?>
                <li><a href="./?page=how-we-drive&service=<?= $service['link']; ?>"><?= $service['title'] ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="tekup-footer-bottom">
      <div class="row">
        <div class="col-md-6">
          <div class="tekup-copywright light-color right">
            <p> &copy; <?php echo date('Y'); ?> Corlev Consulting. All rights reserved.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-bottom-center modal-lg">
        <div class="modal-content ">
            <div class="background-modal"></div>
            <div class="modal-body td-flex flex-column align-items-center">
                <div class="modal-body-content ">
                    <div class="d-inline-block ">
                        <img src="./assets/images/cookie2.png" class="w-75 d-flex flex-column align-items-center mx-auto   " alt="">

                        <h3 class="modal-title text-color-primary counter-one__text" id="exampleModalLabel">
                            COOKIES
                        </h3>
                    </div>

                    <hr>

                    <p class="text-justify mb-4">
                       Cookies allow us to improve your experience by providing you with relevant content and analyzing our visits. Learn how we use cookies or adjust your preferences. 
                    </p>
                    <div class="d-flex flex-row align-items-center gap-2 mt-5">
                        <button type="button" class="vl-btn3 w-50" id="acceptCookies" data-bs-dismiss="modal">
                            Accept
                        </button>
                        <div class="mx-auto">

                            <div class=" ">
                                <a href="./?page=cookies-policy" class=" d-inline-block" id="clickModal">Cookies Policy</a>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>



<!-- scripts -->
<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/menu/menu.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/countdown.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/skill-bar.js"></script>
<script src="assets/js/slick-animation.min.js"></script>
<script src="assets/js/faq.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/tabs-slider.js"></script>
<script src="assets/js/product-increment.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3&amp;key=AIzaSyArZVfNvjnLNwJZlLJKuOiWHZ6vtQzzb1Y"></script>

<script src="assets/js/app.js"></script>

<script>
  $(document).ready(function () {
    generate();
  })

  let captcha;

  function generate() {

    document.getElementById("submit").value = "";

    captchaInput = document.getElementById("captchandler");
    let uniquechar = "";

    const randomchar =
      "ABCDEFGHiJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz123456789";

    for (let i = 1; i < 7; i++) {
      uniquechar += randomchar.charAt(
        Math.random() * randomchar.length)
    }
    console.log(uniquechar)
    captchaInput.value = uniquechar;

  }

document.addEventListener("DOMContentLoaded", function () {
    if (!localStorage.getItem('cookies')) {
        let modalEl = document.getElementById('exampleModal1');
        let cookieModal = new bootstrap.Modal(modalEl);
        cookieModal.show();
    }

    document.getElementById('acceptCookies')?.addEventListener('click', function () {
        localStorage.setItem('cookies', 'accepted');
    });
});

  function printmsg() {
    let msgOpening = "";
    let msgAgent = "";
    const usr_input = document
      .getElementById("submit").value;

    if (usr_input == captchaInput.value) {
      let s = document.getElementById("key").innerHTML = '<p style="color: #121c7c; font-size: 16px;padding: 1px 10px;background: #fff;width: fit-content; border-radius: 5px;"><i class="fa fa-check"></i> Matched</p>';


      $('.submit-button').prop('disabled', false);
      document.getElementById("captcha_mail").value = captchaInput.value;
      document.getElementById("btnCheck").disabled = true;
      generate();
    } else {
      let s = document.getElementById("key")
        .innerHTML = '<p style="color: red; font-size: 16px;padding: 1px 10px;background: #fff;width: fit-content; border-radius: 5px;"><i class="fa fa-exclamation-triangle"></i> INCORRECT CAPTCHA</p>';

      generate();
    }
  }
</script>
</body>

<!-- Mirrored from tekup.netlify.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Dec 2025 09:07:12 GMT -->

</html>