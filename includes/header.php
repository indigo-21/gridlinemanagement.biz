<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from tekup.netlify.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Dec 2025 09:06:34 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gridline Management Inc</title>

  <!-- <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
  <link rel="icon" href="assets/img/favicon.png" type="image/x-icon"> -->
  <!--- End favicon-->

  <link href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&amp;display=swap"
    rel="stylesheet"> <!-- End google font  -->

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/magnific-popup.css">
  <link rel="stylesheet" href="assets/css/slick.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/aos.css">
  <link rel="stylesheet" href="assets/css/remixicon.css">


  <!-- Code Editor  -->

  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel="stylesheet" href="assets/css/app.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="light">

  <div class="tekup-preloader-wrap">
    <div class="tekup-preloader">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>

  <header
    class="site-header tekup-header-section site-header--menu-right light-color <?php echo isset($_REQUEST['page']) ? 'nav-custom' : '' ?>"
    id="sticky-menu">
    <div class="tekup-header-top bg-accent">
      <div class="container-fuild">
        <div class="tekup-header-info-wrap">
          <div class="tekup-header-info">
            <ul>
              <li><i class="ri-map-pin-2-fill"></i>145 ½ Church Street Office 589, Unit 5, Toronto Ontario M5B 1Y4, Canada
</li>
            </ul>
          </div>
          <div class="tekup-header-info">
            <ul>
              <li><a href="mailto:info@corlevconsulting.com"><i class="ri-mail-fill"></i>project.support@gridlinemanagement.biz</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fuild">
      <div class="tekup-header-bottom border_bottom">
        <nav class="navbar site-navbar">
          <!-- Brand Logo-->
          <div class="brand-logo">
            <a href='./'>
              <img src="assets/images/logo/logo.png" alt="" class="light-version-logo">
<!--               <h1 class="logo-text">Gridline Management Inc</h1>
 -->            </a>
          </div>
          <div class="menu-block-wrapper">
            <div class="menu-overlay"></div>
            <nav class="menu-block" id="append-menu-header">
              <div class="mobile-menu-head">
                <div class="go-back">
                  <i class="fa fa-angle-left"></i>
                </div>
                <div class="current-menu-title"></div>
                <div class="mobile-menu-close">&times;</div>
              </div>
              <ul class="site-menu-main">
                <?php
                foreach ($navLinks as $link) {
                  if (!in_array($link['url'], ["cookies-policy", "privacy-policy"])) {
                    if (isset($link['dropdown']) && is_array($link['dropdown']) && count($link['dropdown']) > 0) { ?>
                      <li class="nav-item nav-item-has-children">
                        <a href="./?page=how-we-generate-value" class="nav-link-item drop-trigger">How We Generate Value <i class="ri-arrow-down-s-line"></i></a>
                        <ul class="sub-menu" id="submenu-9">
                          <?php
                          foreach ($link['dropdown'] as $sublink) {
                            ?>
                            <li class="sub-menu--item">
                              <a href='./?page=how-we-generate-value&service=<?= $sublink['url']; ?>'>
                                <span class="menu-item-text"><?= $sublink['name']; ?></span>
                              </a>
                            </li>
                            <?php
                          }
                          ?>
                        </ul>
                      <?php } else { ?>
                      <li class="nav-item">
                        <a class='nav-link-item' href='./?page=<?= $link['url']; ?>'><?= $link['name']; ?></a>
                      </li>
                      <?php
                    }
                  }
                }
                ?>
              </ul>
            </nav>
          </div>

          <!-- mobile menu trigger -->
          <div class="mobile-menu-trigger light">
            <span></span>
          </div>
          <!--/.Mobile Menu Hamburger Ends-->
        </nav>
      </div>
    </div>
  </header>
  <!--End landex-header-section -->

  <div class="offcanves-menu"></div>