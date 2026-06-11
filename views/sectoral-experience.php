<div class="tekup-breadcrumb" style="background-image: url(assets/img/swt-banner.jpg)">
    <div class="container">
        <h1 class="post__title">Sectoral Experience</h1>
        <nav class="breadcrumbs">
            <ul>
                <li><a href='?page=home'>Home</a></li>
                <li aria-current="page"> Sectoral Experience</li>
            </ul>
        </nav>

    </div>
</div>
<div class="section tekup-section-padding">
    <div class="container">

        <div class="tekup-default-content text-center">
            <h2 class="text-center">Sectoral Experience</h2>
            <h4>In-depth knowledge to solve industry-specific challenges</h4>
           
            <p>We understand that every industry presents unique challenges. That's why we tailor our project management, strategy, and digital transformation solutions to the specific needs of each industry, bringing expertise, accuracy, and measurable results.
            </p>
    
        </div>

        <div class="row mt-5">
            <?php foreach ($sectors as $sector): ?>
                <div class="col-xl-6 col-md-6">
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