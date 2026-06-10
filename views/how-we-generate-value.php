<div class="tekup-breadcrumb" style="background-image: url(assets/img/service-banner.jpg)">
  <div class="container">
    <h1 class="post__title">How We Generate Value</h1>
    <nav class="breadcrumbs">
      <ul>
        <li><a href='?page=home'>Home</a></li>
        <li aria-current="page"> How We Generate Value</li>
      </ul>
    </nav>

  </div>
</div>
<div class="section tekup-section-padding4">
  <div class="container">
    <div class="row">
      <?php foreach ($services as $service): ?>
        <div class="col-xl-4 col-md-6">
          <div class="tekup-iconbox-wrap4">
            <div class="tekup-iconbox-icon4">
              <img src="assets/img/services/<?= $service['image'] ?>" alt="">
            </div>

            <div class="tekup-iconbox-data4">
              <h4><?= $service['title'] ?></h4>
              <p><?= $service['SubTitle'] ?></p>
              <a class='tekup-iconbox-btn' href='./?page=how-we-generate-value&service=<?= $service['link'] ?>'>Learn More <i
                  class="ri-arrow-right-up-line"></i></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    
  </div>
</div>