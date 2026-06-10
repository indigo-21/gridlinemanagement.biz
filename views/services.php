<div class="tekup-breadcrumb" style="background-image: url(assets/img/service-banner.jpg)">
    <div class="container">
        <?php foreach ($services as $service):
                    if ($_REQUEST['service'] === $service['link']):
                        ?>
        <h1 class="post__title"><?= $service['title'] ?></h1>
        <nav class="breadcrumbs">
            <ul>
                <li><a href='?page=home'>Home</a></li>
                <li><a href='?page=how-we-drive'>How We Drive</a></li>
                <li aria-current="page"> <?= $service['title'] ?></li>
            </ul>
        </nav>   
        <?php endif; endforeach; ?>                                                                                                                                         
    </div>
</div>
<div class="section tekup-section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php foreach ($services as $service):
                    if ($_REQUEST['service'] === $service['link']):
                          $currentService = $service;
                        ?>
                        <div class="tekup-service-details-wrap">
                            <img src="assets/img/services/<?= $service['image'] ?>" alt="">
                            <div class="tekup-service-details-item">
                                <h3><?= $service['title'] ?></h3>
                                <p><b><i class="ri-check-line"></i> <?= $service['SubTitle'] ?></b></p>
                                <?= $service['content'] ?>
                               <!--  <blockquote>
                                    <p><?= $service['buttonSubMessgae'] ?></p>
                                    <a class="tekup-default-btn mt-3" href="./?page=contact-us">
                                        <?= $service['buttonMessage'] ?><i class="ri-arrow-right-up-line"></i></a>
                                </blockquote> -->
                            </div>
                        </div>
                    <?php endif; endforeach; ?>
            </div>
            <div class="col-lg-4 pt-3">
                <div class="tekup-service-sidebar">
                    <div class="tekup-service-menu">
                        <ul>
                            <?php foreach ($services as $service): ?>
                                <li><a href="./?page=how-we-drive&service=<?= $service['link'] ?>"><?= $service['title'] ?>
                                        <i class="ri-arrow-right-up-line"></i></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
          <div class="row mt-5">

            <?php foreach ($currentService['details'] as $detail): ?>
                <div class="col-xl-6 col-md-6">
                    <div class="tekup-blog-wrap">
                    
                        <div class="tekup-blog-content">
                            <h3><?= $detail['title'] ?></h3>
                            <?= $detail['content']; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>