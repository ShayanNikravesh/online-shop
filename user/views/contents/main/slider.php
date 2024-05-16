<!-- Start Main-Slider -->
<div class='row mb-5'>
    <aside class='sidebar col-xl-2 col-lg-3 col-12 order-2 order-lg-1 pl-0 hidden-md'>
        <!-- Start banner -->
        <div class='sidebar-inner dt-sl'>
            <?php
                $smallbanner = getSmallBanner();
            ?>
            <div class='sidebar-banner'>
                <?php
                    if ($smallbanner){
                ?>
                        <img src="<?php echo normalizePath(DOMAINS['public'], $smallbanner['src'], $smallbanner['name']);?>" width='100%' height='329' alt=''>
                <?php
                    }
                ?>
            </div>
        </div>
        <!-- End banner -->
    </aside>

    <div class='col-xl-10 col-lg-9 col-12 order-1 order-lg-2'>
        <!-- Start main-slider -->
        <section id='main-slider' class='main-slider carousel slide carousel-fade card hidden-sm' data-ride='carousel'>
            <?php
                $banners = getCarousel();
            ?>
            <div class='carousel-inner rounded'>
                <?php
                    if ($banners){
                        foreach ($banners as $key=> $banner){
                ?>
                            <div class='carousel-item <?= $key==1 ? 'active' : '' ?>'>
                                <img src="<?php echo normalizePath(DOMAINS['public'], $banner['src'], $banner['name']);?>" alt="">
                            </div>
                <?php
                        }
                    }
                ?>
            </div>
            <ol class='carousel-indicators'>
                <?php
                    for ($i=0;$i<=$key;$i++){
                        ?>
                           <li data-target='#main-slider' data-slide-to='<?php echo $i ?>' class='<?= $i==1 ? 'active' : '' ?>'></li>
                        <?php
                    }
                ?>
            </ol>
            <a class='carousel-control-prev' href='#main-slider' role='button' data-slide='prev'>
                <i class='mdi mdi-chevron-right'></i>
            </a>
            <a class='carousel-control-next' href='#main-slider' data-slide='next'>
                <i class='mdi mdi-chevron-left'></i>
            </a>
        </section>
        <section id='main-slider-res' class='main-slider carousel slide carousel-fade card d-none show-sm' data-ride='carousel'>
            <?php
            $banners = getCarousel();
            ?>
            <div class='carousel-inner'>
                <?php
                if ($banners){
                    foreach ($banners as $key=> $banner){
                        if ($banner['banner_id'] == 1){
                            ?>
                            <div class='carousel-item <?= $key==1 ? 'active' : '' ?>'>
                                <img src="<?php echo normalizePath(DOMAINS['public'], $banner['src'], $banner['name']); ?>">
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
            <ol class='carousel-indicators'>
                <?php
                for ($i=0;$i<=$key;$i++){
                    ?>
                    <li data-target='#main-slider' data-slide-to='<?php echo $i ?>' class='<?= $i==1 ? 'active' : '' ?>'></li>
                    <?php
                }
                ?>
            </ol>
            <a class='carousel-control-prev' href='#main-slider-res' role='button' data-slide='prev'>
                <i class='mdi mdi-chevron-right'></i>
            </a>
            <a class='carousel-control-next' href='#main-slider-res' data-slide='next'>
                <i class='mdi mdi-chevron-left'></i>
            </a>
        </section>
        <!-- End main-slider -->
    </div>
</div>
<!-- End Main-Slider -->