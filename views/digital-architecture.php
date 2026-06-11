<div class="tekup-breadcrumb" style="background-image: url(assets/img/swt-banner.jpg)">
    <div class="container">
        <h1 class="post__title">Digital Architecture</h1>
        <nav class="breadcrumbs">
            <ul>
                <li><a href='?page=home'>Home</a></li>
                <li aria-current="page"> Digital Architecture</li>
            </ul>
        </nav>

    </div>
</div>
<div class="section tekup-section-padding">
    <div class="container">

        <div class="tekup-default-content text-center">
            <h2 class="text-center">Digital Architecture</h2>
            <h4>Technology, data, and methodologies that drive excellence in project management</h4>
           
            <p>Our digital architecture integrates leading platforms, specialized tools, and advanced analytics capabilities to deliver modern, connected, and results-driven project management. We design technology ecosystems that enable full control, efficient collaboration, and real-time decision-making.
            </p>
    
        </div>

        <div class="row mt-5">
            <?php foreach ($digitals as $digital): ?>
                <div class="col-xl-6 col-md-6">
                    <div class="tekup-blog-wrap">
                       
                        <div class="tekup-blog-content">
                            <h3><?= $digital['title'] ?></h3>

                            <p>
                            <h5><?= $digital['subTitle'] ?></h5>
                            </p>
                            <?= $digital['content']; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>