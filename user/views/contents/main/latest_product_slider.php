<!-- Start Product-Slider -->
<div class='row'>
    <div class='col-xl-10 col-lg-12'>
        <section class='slider-section dt-sl mb-5'>
            <div class='row mb-3'>
                <div class='col-12'>
                    <div class='section-title text-sm-title title-wide no-after-title-wide'>
                        <h2>محصولات اخیر</h2>
                        <a href='#'>مشاهده همه</a>
                    </div>
                </div>

                <?php
                    $getLatestProducts = getLatestProducts();
                ?>
                <!-- Start Product-Slider -->
                <div class='col-12 px-res-0'>
                    <div class='product-carousel carousel-md owl-carousel owl-theme'>
                        <?php
                        if ($getLatestProducts) {
                            foreach ($getLatestProducts as $product) {
                                ?>
                                <div class='item'>
                                    <div class='product-card'>
                                        <div class='product-head'>
                                            <div class='rating-stars'></div>
                                            <?php
                                                if ($product['price_discounted'] != 0){
                                            ?>
                                                    <div class='discount'>
                                                        <span></span>
                                                    </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <?php echo getpercent($product) ?>
                                        <a class='product-thumb' target="_blank" href='<?php echo productUrl($product['tracking_code'])?>'>
                                            <?php 
                                            if (!empty($product['photo_name'])) {
                                                ?>
                                                <img src="<?php echo normalizePath(DOMAINS['public'], $product['photo_src'], $product['photo_name']); ?>" alt='Product Thumbnail'>
                                                <?php
                                            } else {
                                                ?>
                                                <img src="<?php echo normalizePath(DOMAINS['public'], '/images/180.png'); ?>" alt='Product Thumbnail'>
                                                <?php
                                            }
                                            ?>
                                        </a>
                                        <div class='product-card-body'>
                                            <h5 class='product-title'>
                                                <a href='<?php echo productUrl($product['tracking_code']) ?>'><?php echo $product['title'] ?></a>
                                            </h5>
                                            <a class='product-meta' href="<?php echo categoryUrl($product['category_id']) ?>"><?php  echo $product['category_title'] ?></a>
                                            <?php
                                                if ($product['stock']== 0) {
                                            ?>
                                                    <span class='product-price'>ناموجود</span>
                                            <?php
                                                }else{
                                                    if (empty($product["price_discounted"])){
                                                        ?>
                                                        <span class='product-price'><?php echo priceFormatter($product['price']) ?></span>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <span class='product-price'><del><?php echo priceFormatter($product['price']) ?></del></span>
                                                        <span class='text-danger product-price'><?php echo priceFormatter($product['price_discounted']) ?></span>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <!-- End Product-Slider -->
            </div>
        </section>
    </div>
    <div class='col-xl-2 col-lg-3 hidden-lg pr-0'>
        <div class='widget-suggestion dt-sn pt-3 mt-3'>
            <div class='widget-suggestion-title'>
                <img src='./assets/img/theme/suggestion-title.png' alt=''>
            </div>
            <div id='progressBar'>
                <div class='slide-progress'></div>
            </div>
            <?php
                $getSuggestProducts=getSuggestProducts();
            ?>
            <div id='suggestion-slider' class='owl-carousel owl-theme'>
                <?php
                    if ($getSuggestProducts){
                        foreach ($getSuggestProducts as $product){
                ?>
                    <div class='item'>
                        <div class='product-card mb-3 shadow-unset'>
                            <div class='product-head'>
                                <div class='rating-stars'></div>
                                <?php
                                if ($product['price_discounted'] != 0){
                                    ?>
                                    <div class='discount'>
                                        <span></span>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php echo getpercent($product) ?>
                            <a class='product-thumb' target="_blank" href='<?php echo productUrl($product['tracking_code']) ?>'>
                                <?php
                                if (!empty($product['photo_name'])) {
                                ?>
                                    <img src="<?php echo normalizePath(DOMAINS['public'], $product['photo_src'], $product['photo_name']); ?>" alt='Product Thumbnail'>
                                <?php
                                } else {
                                ?>
                                    <img src="<?php echo normalizePath(DOMAINS['public'], '/images/180.png'); ?>" alt='Product Thumbnail'>
                                <?php
                                }
                                ?>
                            </a>
                            <div class='product-card-body'>
                                <h5 class='product-title'>
                                    <a href='<?php echo productUrl($product['tracking_code']) ?>'><?php echo $product['title'] ?></a>
                                </h5>
                                <a class='product-meta' href="<?php echo categoryUrl($product['category_id']) ?>"><?php  echo $product['category_title'] ?></a>
                                <?php
                                if (empty($product["price_discounted"])){
                                ?>
                                    <span class='product-price'><?php echo priceFormatter($product['price']) ?></span>
                                <?php
                                }else{
                                ?>
                                    <span class='product-price'><del><?php echo priceFormatter($product['price']) ?></del></span>
                                    <span class='text-danger product-price'><?php echo priceFormatter($product['price_discounted']) ?></span>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- End Product-Slider -->