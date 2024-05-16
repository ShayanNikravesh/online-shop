<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">

        <div class="row">

            <!-- Start Sidebar -->
            <div class="col-lg-3 col-md-12 col-sm-12 sticky-sidebar">
                <div class="dt-sn mb-3">
                    <form action="">
                        <div class="col-12">
                            <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide">
                                <h2>فیلتر محصولات</h2>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="widget-search">
                                <form action='search.php' method="get" class='search'>
                                    <input type="text" name="search" placeholder="نام محصول مورد نظر را بنویسید...">
                                    <button type="submit" class="btn-search-widget  bg-dark"><img src="./assets/img/theme/search.png" alt=""></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 filter-product mb-3">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-block text-right collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">دسته بندی<i class="mdi mdi-chevron-down"></i></button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <?php
                                            $categories = getallCategories();
                                        ?>
                                        <div class="card-body">
                                            <?php
                                                if ($categories){
                                                    foreach ($categories as $category){
                                            ?>
                                                        <a class="nav-link dark" target="_blank" href="<?php echo categoryUrl($category['id']) ?>"><?php echo $category['title'] ?></a>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-block text-right collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">برند<i class="mdi mdi-chevron-down"></i></button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <?php
                                            $brands = getBrands();
                                        ?>
                                        <div class="card-body">
                                            <div class="custom-control custom-checkbox">
                                                <?php
                                                    if ($brands){
                                                        foreach ($brands as $brand){
                                                    ?>
                                                            <a class="nav-link dark" target="_blank" href="<?php echo brandUrl($brand['id']) ?>"><?php echo $brand['title'] ?></a>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-1">
                                <h2>فیلتر براساس قیمت :</h2>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <form class="search" method="get" action="filter_price.php">
                                <div class="row align-items-center mb-2">
                                    <div class="mr-3"><label for="widget-rtlproductprice-2-widget-min">حداقل قیمت:</label></div>
                                    <div class="col">
                                        <div class="input-group w-100">
                                            <div class="input-field input-has-append">
                                                <input id="widget-rtlproductprice-2-widget-min" type="number" name="minPrice" pattern="[0-9]{1,}" class="form-control" value="
                                                             " data-widget="حداقل قیمت" placeholder=" مثلا: 300 هزار تومان" data-listener-added_4ffbe7ff="true">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-3">
                                    <div class="mr-3"><label for="widget-rtlproductprice-2-widget-max">حداکثر قیمت:</label></div>
                                    <div class="col">
                                        <div class="input-group w-100">
                                            <div class="input-field input-has-append">
                                                <input id="widget-rtlproductprice-2-widget-min" type="number" name="maxPrice" pattern="[0-9]{1,}" class="form-control" value="
                                                             " data-widget="حداقل قیمت" placeholder=" مثلا: 300 هزار تومان">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <button type="submit" class="btn btn-info mr-5">فیلتر قیمت</button>
                                    </div>
                                    <div class="mr-4">
                                        <a href="filter_price.php" class="btn btn-danger">حذف فیلتر ها</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Sidebar -->

            <!-- Start Content -->
            <div class="col-lg-9 col-md-12 col-sm-12 search-card-res">
                <div class="dt-sl dt-sn px-0 search-amazing-tab">
                    <div class="ah-tab-content-wrapper dt-sl px-res-0">
                        <div class="ah-tab-content dt-sl" data-ah-tab-active="true">
                            <div class="row mb-3 mx-0 px-res-0">
                                <?php
                                    if (isset($_GET['search'])){
                                        $products = searchProduct($_GET['search']);
                                        if ($products){
                                            foreach ($products as $product){
                                ?>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-8 mb-1 px-res-0">
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
                                        }else{
                                ?>
                                                <div class="col-12">
                                                        <div class="cart-page cart-empty">
                                                            <div class="circle-box-icon">
                                                                <i class="mdi mdi-close"></i>
                                                            </div>
                                                            <p class="cart-empty-title">محصولی یافت نشد!</p>
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
            </div>
            <!-- End Content -->
        </div>

    </div>
</main>
<!-- End main-content -->