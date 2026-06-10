<div class="tekup-hero-section" style="background-image: url(assets/img/home-1.jpg)">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <div class="tekup-hero-content white-color">
          <h1>Project Management in Canada for Companies Seeking Real Results</h1>
          <p>We optimize your projects, reduce risks and accelerate results through strategic, operational and digital solutions designed for complex business environments.</p>
          <div class="tekup-extra-mt">
            <a class='tekup-default-btn' href='./?page=contact-us'>Request a personalized consultation<i
                class="ri-arrow-right-up-line"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End section -->


<div class="section tekup-section-padding">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6">
        <div class="tekup-thumb">
          <img src="assets/img/home-4.jpg" alt="">
        </div>
      </div>
      <div class="col-xl-5 offset-xl-1 col-lg-6 d-flex align-items-center">
        <div class="tekup-default-content">
          <h2>ABOUT US</h2>
          <p>In an environment where efficiency and execution make all the difference, we help organizations in Canada plan, execute, and transform their projects with a comprehensive consulting approach to <b>project management, business strategy, and digital transformation.</b></p>
          <p>We combine experience, methodology and strategic vision to turn complex initiatives into measurable results.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End section -->

<div class="sectin bg-light1 tekup-section-padding">
  <div class="container">
    <div class="tekup-section-title center">
      <h2>OUR ESSENCE</h2>
    </div>
    <div class="home-sec-2 text-center">
      <h4>We are your strategic partner in business management and improvement.</h4>
      <p>We help organizations reach their full potential, connecting strategy, technology, and execution. Our approach
        combines analytical insight with practical implementation, turning operational challenges into tangible
        opportunities for growth.</p>
      <p>Every project we develop is built on three pillars: strategic clarity, operational efficiency, and execution
        excellence. This ensures that today's decisions drive tomorrow's results.</p>
      <div class="row mt-5">
        <div class="col-lg-6">
          <img src="assets/img/home-2.jpg" alt="Our Essence" class="img-fluid">
        </div>
        <div class="col-lg-6">
          <img src="assets/img/home-3.jpg" alt="Our Essence" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End section -->


<div class="section tekup-section-padding2">
  <div class="container">
    <div class="tekup-section-title center">
      
      <h4>Solutions designed for each stage of your project</h4>
      <p>Our proposal is based on three key pillars that cover the entire project life cycle:</p>
    </div>
    <div class="tekup-iconbox-line" style="background-image: url(assets/images/v1/line.png)">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="tekup-iconbox-wrap2">
            <div class="tekup-iconbox-icon2">
              <img src="assets/img/icons/home-icon-1.png" alt="">
            </div>
            <div class="tekup-iconbox-data2">
              <a href='single-service.html'>
                <h5>Project Management</h5>
              </a>
              <p>We plan, execute and control projects ensuring compliance with deadlines, costs and strategic objectives.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="tekup-iconbox-wrap2">
            <div class="tekup-iconbox-icon2">
              <img src="assets/img/icons/home-icon-2.png" alt="">
            </div>
            <div class="tekup-iconbox-data2">
              <a href='single-service.html'>
                <h5>Strategy & Consulting</h5>
              </a>
              <p>We validate investments, develop strong business cases, and improve project management maturity within organizations.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
          <div class="tekup-iconbox-wrap2">
            <div class="tekup-iconbox-icon2">
              <img src="assets/img/icons/home-icon-3.png" alt="">
            </div>
            <div class="tekup-iconbox-data2">
              <a href='single-service.html'>
                <h5>IT and Digital Transformation</h5>
              </a>
              <p>We lead technology implementations, cloud migrations, and data and artificial intelligence programs.</p>
            </div>
          </div>
        </div>
      
      </div>
      <div class="tekup-extra-mt text-center">
        <a class='tekup-default-btn' href='./?page=contact-us'>Find out how we can strengthen your management <i
            class="ri-arrow-right-up-line"></i></a>
      </div>
    </div>

  </div>
</div>
<!-- End section -->

<div class="tekup-portfolio-section tekup-section-padding-top">
  <div class="container">
    <div class="tekup-section-title center light-color">
      <h2>Strategic solutions for your challenges</h2>
      <p class="text-white">We help organizations reach their full potential, connecting strategy, technology and
        execution.</p>
    </div>
  </div>
  <div class="tekup-portfolio-slider">
    <?php foreach ($home_services as $home_service) { ?>
      <div class="tekup-portfolio-wrap">
        <div class="tekup-portfolio-thumb">
          <img src="assets/img/services/<?= $home_service['image'] ?>" alt="">
          <div class="tekup-portfolio-data">
            <a href='./?page=how-we-drive-your-success'>
              <h5><?= $home_service['title'] ?></h5>
            </a>
            <p><?= $home_service['home_service'] ?></p>
            <a class='tekup-portfolio-btn' href='./?page=how-we-drive&service=<?= $home_service['url'] ?>'><i
                class="ri-arrow-right-up-line"></i></a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<!-- End section -->

  <div class="section tekup-section-padding2">
    <div class="container">
      <div class="tekup-section-title center">
        <h2>Real Results That Speak for Themselves</h2>
      </div>
      <div class="row">
        <div class="col-xl-4 col-md-6">
          <div class="tekup-testimonial-box">
            <div class="tekup-testimonial-rating">
              
            </div>
            <p>“Their structured approach to project management was key to the success of our technology implementation. We managed to reduce deployment times by 35%, improve operational efficiency by 28% and increase real-time project visibility. Today we operate with greater control and predictability.”</p>
            <div class="tekup-testimonial-author">
              <h5>Chief Technology Officer (CTO)</h5>
              <span>Software Company (Technology & Digital)</span>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="tekup-testimonial-box">
            <div class="tekup-testimonial-rating">
              
            </div>
            <p>“The consultancy completely transformed the management of our clinical and technological projects. We achieved a 40% reduction in operational incidents, a 30% improvement in meeting deadlines and greater coordination between critical teams. Its impact was immediate and sustainable. ”</p>
            <div class="tekup-testimonial-author">
              <h5>Director of Operations</h5>
              <span>Hospital (Healthcare and Life Sciences)</span>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="tekup-testimonial-box">
            <div class="tekup-testimonial-rating">
              
            </div>
            <p>“ Their support in our digital transformation program generated tangible results from the beginning. We optimized costs by 25%, accelerated project delivery by 32%, and improved the overall ROI of our digital initiatives. They brought control, clarity, and strategic vision at every stage. ”</p>
            <div class="tekup-testimonial-author">
              <h5>Digital Transformation Manager</h5>
              <span>Bank (Financial Services and Insurance)</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End section -->
  