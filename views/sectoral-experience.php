<div class="tekup-breadcrumb" style="background-image: url(assets/img/swt-banner.jpg)">
    <div class="container">
        <h1 class="post__title">Sectors We Transform</h1>
        <nav class="breadcrumbs">
            <ul>
                <li><a href='?page=home'>Home</a></li>
                <li aria-current="page"> Sectors We Transform</li>
            </ul>
        </nav>

    </div>
</div>
<div class="section tekup-section-padding">
    <div class="container">
        <div class="row">
            <?php foreach ($sectors as $sector): ?>
                <div class="col-xl-4 col-md-6">
                    <div class="tekup-blog-wrap">
                        <a href='single-blog.html'>
                            <div class="tekup-blog-thumb">
                                <img src="assets/img/sectors-we-transform/<?= $sector['image'] ?>" alt="">
                            </div>
                        </a>
                        <div class="tekup-blog-content">
                            <h3><?= $sector['title'] ?></h3>

                            <p>
                            <h5><?= $sector['subTitle'] ?></h5>
                            </p>
                            <?= $sector['content']; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>