<div class="tekup-breadcrumb" style="background-image: url(assets/img/our-essence-banner.jpg)">
    <div class="container">
        <h1 class="post__title">Our Essence</h1>
        <nav class="breadcrumbs">
            <ul>
                <li><a href='?page=home'>Home</a></li>
                <li aria-current="page"> Our Essence</li>
            </ul>
        </nav>

    </div>
</div>
<section class="section tekup-section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="tekup-default-content">
                    <h2>Our Essence</h2>
                    <h4>We build efficiency, we drive results.</h4>
                    <p>We are a consulting firm specializing in project management and business operations optimization,
                        committed to helping organizations reach their full potential. Our work combines strategic
                        expertise, data analytics, and advanced technology to improve processes, strengthen supply
                        chains, and optimize collaboration between teams and suppliers.</p>
                    <p>We don't just design strategies: we make them work. A vision of continuous improvement,
                        sustainability, and measurable results guides every project we undertake. We work together with
                        our clients as true strategic allies, committed to the long-term success of their business.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="assets/img/about-1.jpg" alt="">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6 d-flex align-items-center flex-column justify-content-center">
                <div class="about-card">
                    <h2>Our Mission</h2>
                    <p><b>To accompany companies in their evolution towards more efficient, digital, and sustainable
                            management models, integrating technological tools, continuous improvement
                            methodologies,</b> and operational excellence practices that deliver real, lasting value.
                    </p>
                </div>
                <div class="about-card">
                    <h2>Our Vision</h2>
                    <p><b>To be a benchmark in project management and operational optimization consulting in Canada,</b>
                        recognized for transforming the way organizations plan, execute, and scale their operations
                        towards a more competitive, collaborative, and digital future.</p>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center">
                <div class="tekup-default-content ml-60">
                    <h2>Our Values</h2>
                    <div class="tekup-extra-mt">
                        <div class="tekup-icon-list-wrap">
                            <?php foreach ($our_values as $value): ?>
                                <div class="tekup-icon-list-item">
                                    <div class="tekup-icon-list-icon">
                                        <i class="fa <?= $value["icon"] ?>"></i>
                                    </div>
                                    <div class="tekup-icon-list-data">
                                        <h5><?= $value["title"] ?></h5>
                                        <p><?= $value["content"] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="section bg-light1 tekup-section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="tekup-default-content mr-60">
                    <h2>Frequently Asked Questions</h2>
                    <p>Find out how we can strengthen your business management</p>
                    <div class="tekup-extra-mt">
                        <a class='tekup-default-btn' href='./?page=contact-us'>Let's talk about your project <i
                                class="ri-arrow-right-up-line"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="tekup-accordion-wrap init-wrap">
                    <?php foreach ($faqs as $index => $faq) { ?>
                        <div class="tekup-accordion-item">
                            <div class="tekup-accordion-header init-header">
                                <h6><span><?= $index + 1 ?>. </span> <?= $faq['title'] ?></h6>
                            </div>
                            <div class="tekup-accordion-body init-body">
                                <p><?= $faq['content'] ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>