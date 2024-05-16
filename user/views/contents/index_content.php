<!-- Start main-content -->
<main class='main-content dt-sl mt-4 mb-3'>
    <div class='container main-container'>

        <?php
        require_once 'main/slider.php';
        ?>

        <?php
        require_once 'main/latest_product_slider.php';
        ?>

        <!-- Start med Banners -->
        <?php
            $MedBanners = getMedBanner();
        ?>
        <div class='row mt-3 mb-5'>
        <?php
            if ($MedBanners){
                foreach ($MedBanners as $MedBanner){
        ?>
            <div class='col-sm-6 col-12 mb-2'>
                <div class='widget-banner'>
                        <img src='<?php echo normalizePath(DOMAINS['public'], $MedBanner['src'], $MedBanner['name']);?>' alt=''>
                </div>
            </div>
        <?php
                }
            }
        ?>
        </div>
        <!-- End med Banners -->

        <!-- Start small Banners -->
        <div class='row mt-3 mb-5'>
            <div class='col-md-3 col-sm-6 col-6 mb-2'>
                <div class='widget-banner'>
                    <a href='#'>
                        <img src='./assets/img/banner/small-banner-5.jpg' alt=''>
                    </a>
                </div>
            </div>
            <div class='col-md-3 col-sm-6 col-6 mb-2'>
                <div class='widget-banner'>
                    <a href='#'>
                        <img src='./assets/img/banner/small-banner-6.jpg' alt=''>
                    </a>
                </div>
            </div>
            <div class='col-md-3 col-sm-6 col-6 mb-2'>
                <div class='widget-banner'>
                    <a href='#'>
                        <img src='./assets/img/banner/small-banner-7.jpg' alt=''>
                    </a>
                </div>
            </div>
            <div class='col-md-3 col-sm-6 col-6 mb-2'>
                <div class='widget-banner'>
                    <a href='#'>
                        <img src='./assets/img/banner/small-banner-8.jpg' alt=''>
                    </a>
                </div>
            </div>
        </div>
        <!-- End small Banners -->

        <!-- Start Category-Section -->

        <!-- End Category-Section -->

        <!-- Start Product-Slider -->
        <!-- End Product-Slider -->

        <!-- Start big Banner -->
        <div class='row mt-3 mb-5'>
            <div class='col-12'>
                <div class='widget-banner'>
                    <a href='#'>
                        <img src='./assets/img/banner/large-banner.jpg' alt=''>
                    </a>
                </div>
            </div>
        </div>
        <!-- End big Banner -->

        <!-- Start Product-Slider -->
        <!-- End Product-Slider -->

        <!-- Start Feature-Product -->
        <!-- End Feature-Product -->

        <!-- Start Brand-Slider -->
        <section class='slider-section dt-sl mb-5'>
            <div class='row'>
                <!-- Start Product-Slider -->
                <div class='col-12'>
                    <div class='brand-slider carousel-lg owl-carousel owl-theme'>
                        <div class='item'>
                            <img src='./assets/img/brand/1076.png' class='img-fluid' alt=''>
                        </div>
                        <div class='item'>
                            <img src='./assets/img/brand/1078.png' class='img-fluid' alt=''>
                        </div>
                        <div class='item'>
                            <img src='./assets/img/brand/1080.png' class='img-fluid' alt=''>
                        </div>
                        <div class='item'>
                            <img src='./assets/img/brand/2315.png' class='img-fluid' alt=''>
                        </div>
                        <div class='item'>
                            <img src='./assets/img/brand/1086.png' class='img-fluid' alt=''>
                        </div>
                        <div class='item'>
                            <img src='./assets/img/brand/5189.png' class='img-fluid' alt=''>
                        </div>
                        <div class='item'>
                            <img src='./assets/img/brand/1000006973.png' class='img-fluid' alt=''>
                        </div>
                        <div class='item'>
                            <img src='./assets/img/brand/1000014452.jpg' class='img-fluid' alt=''>
                        </div>
                    </div>
                </div>
                <!-- End Product-Slider -->

            </div>
        </section>
        <!-- End Brand-Slider -->

    </div>
</main>
<!-- End main-content -->