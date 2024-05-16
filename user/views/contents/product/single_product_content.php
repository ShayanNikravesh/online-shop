<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">
        <!-- Start title - breadcrumb -->
        <div class="title-breadcrumb-special dt-sl mb-3">
            <div class="breadcrumb dt-sl">
                <nav>
                    <a href="#"><?php echo $details_products['category_title'] ?></a>
                    <a href="#"><?php echo $details_products['title'] ?></a>
                </nav>
            </div>
        </div>
        <!-- End title - breadcrumb -->
        <!-- Start Product -->
        <div class="dt-sn mb-5 dt-sl">
            <div class="row">
                <!-- Product Gallery-->
                <div class="col-lg-4 col-md-6 pb-5 ps-relative">
                    <!-- Product Options-->
                    <ul class="gallery-options">
                        <?php
                            if (!empty($_SESSION['user_sing'])){
                                $favorite=GetFavorite($_SESSION['user_sing'],$details_products['id']);
                            }
                        ?>
                        <li>
                            <button data-product="<?= $details_products['id'] ?>" class="add-favorites js--toggle-favorite <?php if ($favorite) echo 'favorites';?>"><i class="mdi mdi-heart"></i></button>
                            <span class="tooltip-option">افزودن به علاقمندی ها</span>
                        </li>
                    </ul>
                    <?php
                    $getProductPhotos = getProductPhotos($details_products['id']);
                    if ($getProductPhotos) {
                        ?>
                        <div class="product-gallery">
                            <!--<span class="badge">پر فروش</span>-->
                            <div class="product-carousel owl-carousel">
                                <?php
                                foreach ($getProductPhotos as $photo) {
                                    ?>
                                    <div class="item">
                                        <a class="gallery-item" href="<?php echo normalizePath(DOMAINS['public'], $photo['src'], $photo['name']); ?>"
                                           data-fancybox="gallery1" data-hash="product_photo_<?php echo $photo['id'] ?>">
                                            <img src="<?php echo normalizePath(DOMAINS['public'], $photo['src'], $photo['name']); ?>" alt="Product">
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <ul class="product-thumbnails">
                                <?php
                                foreach ($getProductPhotos as $key => $photo) {
                                    ?>
                                    <li <?php echo $key === 0 ? 'class="active"' : null ?>>
                                        <a href="#product_photo_<?php echo $photo['id'] ?>">
                                            <img src="<?php echo normalizePath(DOMAINS['public'], $photo['src'], $photo['name']); ?>" alt="Product">
                                        </a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="product-gallery">
                            <div class="product-carousel owl-carousel">
                                <div class="item">
                                    <a class="gallery-item" href="<?php echo normalizePath(DOMAINS['public'], $photo['src'], $photo['name']); ?>"
                                       data-fancybox="gallery1" data-hash="product_photo_none">
                                        <img src="<?php echo normalizePath(DOMAINS['public'], $photo['src'], $photo['name']); ?>" alt="Product">
                                    </a>
                                </div>
                            </div>
                            <ul class="product-thumbnails">
                                <li class="active">
                                    <a href="#product_photo_none">
                                        <img src="<?php echo normalizePath(DOMAINS['public'], $photo['src'], $photo['name']); ?>" alt="Product">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <!-- Product Info -->
                <div class="col-lg-8 col-md-6 pb-5">
                    <div class="product-info dt-sl">
                        <div class="product-title dt-sl">
                            <h2><?php echo $details_products['title'] ?></h2>
<!--                            <h3>--><?php //echo $details_products['english_title'] ?><!--</h3>-->
                        </div>
                        <?php
                            if ($details_products['stock'] == 0){
                        ?>
                                <span class='font-weight-bold'>ناموجود</span>
                        <?php
                            }else{
                        ?>
                                <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                    <h2><?php echo $details_products['tracking_code'] ?></h2>
                                </div>
                                <?php
                                if (empty($details_products["price_discounted"])){
                                    ?>
                                    <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                        <h2>قیمت : <span class="price"><?php echo priceFormatter($details_products['price'])?></span></h2>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                        <h2>قیمت : <del class="price"><?php echo priceFormatter($details_products['price'])?></del></h2>
                                    </div>
                                    <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                        <h2>قیمت با تخفیف : <span class="text-danger price"><?php echo priceFormatter($details_products["price_discounted"])?></span></h2>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="dt-sl mt-4">
                                    <form action="" method="post">
                                        <input type="hidden" name="action" value="add_to_cart">
                                        <input type="hidden" name="product" value="<?php echo $details_products['tracking_code'] ?>">
                                        <button class="btn btn-primary btn-lg">افزودن به سبد خرید</button>
                                    </form>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="dt-sn mb-5 px-0 dt-sl pt-0">
            <!-- Start tabs -->
            <section class="tabs-product-info mb-3 dt-sl">
                <div class="ah-tab-wrapper dt-sl">
                    <div class="ah-tab dt-sl">
                        <a class="ah-tab-item" data-ah-tab-active="true" href=""><i class="mdi mdi-glasses"></i>نقد و بررسی</a>
                        <a class="ah-tab-item" href=""><i class="mdi mdi-format-list-checks"></i>مشخصات</a>
                        <a class="ah-tab-item" href=""><i class="mdi mdi-comment-text-multiple-outline"></i>نظرات کاربران</a>
                        <a class="ah-tab-item" href=""><i class="mdi mdi-comment-question-outline"></i>پرسش و پاسخ</a>
                    </div>
                </div>
                    <div class="ah-tab-content-wrapper product-info px-4 dt-sl">
                        <div class="ah-tab-content dt-sl" data-ah-tab-active="true">
                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                            <h2>نقد و بررسی</h2>
                        </div>
                        <div class="product-title dt-sl">
                            <h1></h1>
                            <h3></h3>
                        </div>
                        <div class="description-product dt-sl mt-3 mb-3">
                            <div class="container">
                                <p><?php echo $details_products['description'] ?></p>
                            </div>
                        </div>
                        <div class="accordion dt-sl accordion-product" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="false"
                                                aria-controls="collapseOne">
                                            Face ID (کسی به‌غیراز تو را نمی‌شناسم)
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                     data-parent="#accordionExample">
                                    <div class="card-body">
                                        <img src="assets/img/single-product/1406986.jpg" alt="">
                                        <p>
                                            در فناوری تشخیص چهره‌ی اپل، یک دوربین و
                                            فرستنده‌ی مادون‌قرمز در بالای نمایشگر قرار داده
                                            ‌شده‌ است؛ هنگامی‌که آیفون
                                            می‌خواهد چهره‌ی شما را تشخیص دهد، فرستنده‌ی نوری
                                            نامرئی را به ‌صورت شما می‌تاباند. دوربین
                                            مادون‌قرمز، این نور را تشخیص
                                            داده و با الگویی که قبلا از صورت شما ثبت کرده،
                                            مطابقت می‌دهد و در صورت یکی‌بودن، قفل گوشی را
                                            باز می‌کند. اپل ادعا کرده،
                                            الگوی صورت را با استفاده از سی هزار نقطه ذخیره
                                            می‌کند که دورزدن آن اصلا کار ساده‌ای نیست.
                                            استفاده از ماسک، عکس یا موارد
                                            مشابه نمی‌تواند امنیت اطلاعات شما را به خطر
                                            اندازد؛ اما اگر برادر یا خواهر دوقلو دارید، باید
                                            برای امنیت اطلاعاتتان نگران
                                            باشید.
                                        </p>
                                        <img src="assets/img/single-product/1431842.jpg" alt="">
                                        <p>
                                            فقط یک نکته‌ی مثبت در مورد Face ID وجود ندارد؛
                                            بلکه موارد زیادی هستند که دانستن آن‌ها ضروری به
                                            نظر می‌رسد. آیفون 10 فقط
                                            چهره‌ی یک نفر را می‌شناسد و نمی‌توانید مثل
                                            اثرانگشت، چند چهره را به آیفون معرفی کنید تا از
                                            آن‌ها برای بازکردنش استفاده
                                            کنید. اگر آیفون در تلاش اول، صورت شما را نشناسد،
                                            باید نمایشگر را برای شناختن مجدد خاموش و روشن
                                            کنید یا اینکه آن را پایین
                                            ببرید و دوباره روبه‌روی صورتتان قرار دهید. این
                                            تمام ماجرا نیست؛ اگر آیفون 10 بین افراد زیادی که
                                            چهره‌شان را نمی‌شناسد
                                            دست‌به‌دست شود، دیگر به شناخت چهره عکس‌العمل
                                            نشان نمی‌دهد و حتما باید از پین یا پسوورد برای
                                            بازکردن آن استفاده کنید تا
                                            دوباره صورتتان را بشناسد.
                                        </p>
                                        <img src="assets/img/single-product/1439653.jpg" alt="">
                                        <p>
                                            اپل سعی کرده نهایت استفاده را از این فناوری جدید
                                            بکند؛ استفاده از آن برای ثبت تصاویر پرتره با
                                            دوربین سلفی، استفاده برای
                                            ساختن شکلک‌های بامزه که آن‌ها را Animoji نامیده
                                            است و همچنین استفاده برای روشن نگه‌داشتن گوشی
                                            زمانی که کاربر به آن نگاه
                                            می‌کند، مواردی هستند که iPhone X به کمک حسگر
                                            اینفرارد، بدون نقص آن‌ها را انجام می‌دهد.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                            نمایش‌گر (رنگی‌تر از همیشه)
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                     data-parent="#accordionExample">
                                    <div class="card-body">
                                        <img src="assets/img/single-product/1429172.jpg" alt="">
                                        <p>
                                            اولین تجربه‌ی استفاده از پنل‌های اولد سامسونگ
                                            روی گوشی‌های اپل، نتیجه‌ای جذاب برای همه به
                                            همراه آورده است. مهندسی
                                            افزوده‌ی اپل روی این پنل‌ها باعث شده تا غلظت
                                            رنگ‌ها کاملا متعادل باشد، نه مثل آیفون 8 کم باشد
                                            و نه مثل گلکسی S8 اشباع
                                            باشد تا از حد تعادل خارج شود. اپل این نمایشگر را
                                            Super Retina نامیده تا ثابت کند، بهترین نمایشگر
                                            موجود در دنیا را طراحی
                                            کرده و از آن روی iPhone X استفاده کرده است.
                                        </p>
                                        <img src="assets/img/single-product/1436228.jpg" alt="">
                                        <p>
                                            این نمایشگر در مقایسه با پنل‌های معمولی، مصرف
                                            انرژی کمتری دارد و این به خاطر استفاده از
                                            پنل‌های اولد است؛ اما این مشخصه
                                            باعث نشده تا نور نمایشگر مثل محصولات دیگری که
                                            پنل اولد دارند کم باشد؛ بلکه این پنل در هر
                                            شرایطی بهترین بازده‌ی ممکن را
                                            دارد. استفاده زیر نور شدید خورشید یا تاریکی مطلق
                                            فرقی ندارد، آیفون 10 خود را با شرایط تطبیق
                                            می‌دهد. این تمام ماجرا نیست.
                                            در نمایشگر آیفون 10 نقطه‌ی حساس به تراز سفیدی
                                            نور محیط قرار داده ‌شده‌اند تا آیفون 10 را با
                                            شرایط نوری محیطی که از آن
                                            استفاده می‌کنید، هماهنگ کند و تراز سفیدی نمایشگر
                                            را به‌صورت خودکار تغییر دهد. این فناوری که با
                                            نام True-Tone نام‌گذاری
                                            شده، کمک می‌کند رنگ‌های نمایشگر در هر نوری
                                            نزدیک‌ترین غلظت و تراز سفیدی ممکن را به رنگ‌های
                                            طبیعی داشته باشد.
                                        </p>
                                        <img src="assets/img/single-product/1406339.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                            طراحی و ساخت (قربانی کردن سنت برای امروزی شدن)
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                     data-parent="#accordionExample">
                                    <div class="card-body">
                                        <img src="assets/img/single-product/1398679.jpg" alt="">
                                        <p>
                                            اپل پا جای پای سامسونگ گذاشته و برای داشتن ظاهری
                                            امروزی و استفاده از جدیدترین فناوری‌های روز، سنت
                                            ده‌ساله‌ی طراحی
                                            گوشی‌هایش را شکسته است. دیگر کلید خانه‌ای وجود
                                            ندارد و تمام قاب جلویی را نمایشگر پر کرده است.
                                            حتی نمایشگر هم برای
                                            استفاده از فناوری تشخیص چهره قربانی شده و قسمت
                                            بالایی آن بریده ‌شده است و لبه‌ی بالایی آن در
                                            مقایسه با هر گوشی دیگری که
                                            تا به امروز دیده بودیم، حالت متفاوتی دارد. ابعاد
                                            iPhone X کمی بزرگ‌تر از ابعاد آیفون 6 است؛ اما
                                            نمایشگرش حدود یک اینچ
                                            بزرگ‌تر از آیفون 6 است. این نشان می‌دهد، فاصله‌ی
                                            لبه‌ها تا نمایشگر تا جای ممکن از طراحی جدیدترین
                                            آیفون اپل حذف‌ شده‌
                                            است.
                                        </p>
                                        <img src="assets/img/single-product/1441226.jpg" alt="">
                                        <p>
                                            زبان طراحی جدید، آیفون 10 را به‌طور عجیبی به سمت
                                            تبدیل‌شدنش به یک کالای لوکس پیش برده است. نگاه
                                            کلی به طراحی این گوشی
                                            نشان می‌دهد، اپل سنت‌شکنی کرده و کالایی تولید
                                            کرده تا از هر نظر با نسخه‌های قبلی آیفون متفاوت
                                            باشد. استفاده از شیشه برای
                                            قاب پشتی، فلزی براق برای قاب اصلی، حذف کلید خانه
                                            و در انتها استفاده از نمایشگری بزرگ مواردی هستند
                                            که نشان‌دهنده‌ی تفاوت
                                            iPhone X با نسخه‌های قبلی آیفون است. تمام سطوح
                                            آیفون براق و صیقلی طراحی ‌شده‌اند و تنها برآمدگی
                                            آیفون جدید مربوط به
                                            مجموعه‌ی دوربین آن می‌شود که حدود یک میلی‌متری
                                            از قاب پشتی بیرون زده است. برخلاف آیفون 8پلاس،
                                            دوربین‌های روی قاب پشتی به
                                            حالت عمودی روی قاب پشتی قرار گرفته‌اند.
                                        </p>
                                        <img src="assets/img/single-product/1418947.jpg" alt="">
                                        <p>
                                            آیفون جدید در دو رنگ خاکستری و نقره‌ای راهی
                                            بازار شده که در هر دو مدل قاب جلویی به رنگ مشکی
                                            است و این بابت استفاده از
                                            سنسورهای متعدد در بخش بالایی نمایشگر است. برخلاف
                                            تمام آیفون‌های فلزی که تا امروز ساخته‌ شده‌اند،
                                            قاب اصلی از فلزی براق
                                            ساخته ‌شده تا زیر نور خودنمایی کند.

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="ah-tab-content params dt-sl">
                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                            <h2>مشخصات فنی</h2>
                        </div>
                        <div class="product-title dt-sl mb-3">
                            <h1></h1>
                            <h3></h3>
                        </div>
                        <section>
                            <h3 class="params-title">مشخصات کلی</h3>
                            <ul class="params-list">
                                <li>
                                    <div class="params-list-key">
                                        <span class="d-block">ابعاد</span>
                                    </div>
                                    <div class="params-list-value">
                                                <span class="d-block"></span>
                                    </div>
                                    <div class="params-list-value">
                                                <span class="d-block"></span>
                                    </div>
                                    <div class="params-list-value">
                                                <span class="d-block"></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="params-list-key">
                                        <span class="d-block">توضیحات سیم کارت</span>
                                    </div>
                                    <div class="params-list-value">
                                                <span class="d-block"></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="params-list-key">
                                        <span class="d-block">وزن</span>
                                    </div>
                                    <div class="params-list-value">
                                                <span class="d-block"></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="params-list-key">
                                        <span class="d-block">ویژگی‌های خاص</span>
                                    </div>
                                    <div class="params-list-value">
                                                <span class="d-block">
                                                    مقاوم در برابر آب , مناسب عکاسی , مناسب عکاسی
                                                    سلفی , مناسب بازی , مجهز به حس‌گر تشخیص چهره
                                                </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="params-list-key">
                                        <span class="d-block">تعداد سیم کارت</span>
                                    </div>
                                    <div class="params-list-value">
                                                <span class="d-block"></span>
                                    </div>
                                </li>
                            </ul>
                        </section>
                        <section>
                            <h3 class="params-title">پردازنده</h3>
                            <ul class="params-list">
                                <li>
                                    <div class="params-list-key">
                                        <span class="d-block">تراشه</span>
                                    </div>
                                    <div class="params-list-value">
                                                <span class="d-block"></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="params-list-key">
                                        <span class="d-block">نوع پردازنده</span>
                                    </div>
                                    <div class="params-list-value">
                                                <span class="d-block"></span>
                                    </div>
                                </li>
                            </ul>
                        </section>
                    </div>
                        <div class="ah-tab-content dt-sl">
                            <div class="col-md-12 col-sm-12 mb-1">
                                <div class="section-title title-wide no-after-title-wide dt-sl">
                                    <h2>شما هم می‌توانید در مورد این کالا نظر بدهید.</h2>
                                </div>
                                     <?php
                                     if (!authUser()){
                                     ?>
                                         <p>برای ثبت نظر، لازم است ابتدا وارد حساب کاربری خود شوید.</p>
                                     <?php
                                     }else{
                                     ?>
                                         <form id="form_comment" action="">
                                                 <textarea type="text" name="comment" class="form-control mb-3" rows="5" placeholder="لطفا نظر خود را وارد کنید.(پس از تایید مدیر ثبت می شود.)" ></textarea>
                                             <button onclick="AddComment(<?php echo $_SESSION['user_sing'] ?>, <?php echo $details_products['id'] ?>)" type="button" class="btn btn-primary float-right ml-3">ثبت نظر</button>
                                         </form>
                                     <?php
                                     }
                                     ?>
                            </div>
                            <?php
                              $comments = getComments($details_products['id']);
                            ?>
                            <div class="comments-area dt-sl mt-5">
                                <hr>
                                <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                    <h2>نظرات کاربران</h2>
                                    <p class="count-comment"> </p>
                                </div>
                                <div id="allComments">
                               <?php
                                    if ($comments){
                                        foreach ($comments as $comment){
                               ?>
                                            <ol class="comment-list">
                                                <!-- #comment-## -->
                                                <li>
                                                    <div class="comment-body">
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-12">
                                                                <div class="message-light message-light--opinion-positive font-weight-bold"><?php echo $comment['user_first_name'] ,' ', $comment['user_last_name'] ?></div>
                                                                <ul class="comments-user-shopping">
                                                                    <!--<li>
                                                                        <div class="cell">رنگ خریداری شده:</div>
                                                                        <div class="cell color-cell">
                                                                           <span class="shopping-color-value" style="background-color: #0c0e18; border: 1px solid rgba(0, 0, 0, 0.25)"></span>سفید
                                                                        </div>
                                                                    </li>-->
                                                                </ul>
                                                                <div class="col-md-9 col-sm-12 comment-content">
                                                                    <p><?php echo $comment['comment'] ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- #comment-## -->
                                            </ol>
                               <?php
                                        }
                                    }else{
                               ?>
                                        <span class="mr-2 font-weight-bold">نظری برای نمایش وجود ندارد.</span>
                               <?php
                                    }
                               ?>
                                </div>
                            </div>
                        </div>
                        <div class="ah-tab-content dt-sl">
                            <div class="section-title title-wide no-after-title-wide dt-sl">
                                <h2>پرسش و پاسخ</h2>
                                <p class="count-comment">پرسش خود را در مورد محصول مطرح نمایید</p>
                            </div>
                            <div class="form-question-answer dt-sl mb-3">
                                <form action="">
                                    <textarea class="form-control mb-3" rows="5"></textarea>
                                    <button class="btn btn-dark float-right ml-3" disabled="">ثبت پرسش</button>
                                    <div class="custom-control custom-checkbox float-right mt-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">اولین پاسخی که به پرسش من داده شد، از طریق ایمیل به من اطلاع دهید.</label>
                                    </div>
                                </form>
                            </div>
                            <div class="comments-area default">
                                <div class="section-title text-sm-title title-wide no-after-title-wide mt-5 mb-0 dt-sl">
                                    <h2>پرسش ها و پاسخ ها</h2>
                                    <p class="count-comment">123 پرسش</p>
                                </div>
                                <ol class="comment-list">
                                    <!-- #comment-## -->
                                    <li>
                                        <div class="comment-body">
                                            <div class="comment-author">
                                                <span class="icon-comment">?</span>
                                                <cite class="fn">حسن</cite>
                                                <span class="says">گفت:</span>
                                                <div class="commentmetadata">
                                                    <a href="#">
                                                        اسفند ۲۰, ۱۳۹۶ در ۹:۴۱ ب.ظ
                                                    </a>
                                                </div>
                                            </div>



                                            <p>لورم ایپسوم متن ساختگی</p>

                                            <div class="reply"><a class="comment-reply-link" href="#">پاسخ</a></div>
                                        </div>
                                    </li>
                                    <!-- #comment-## -->
                                </ol>
                            </div>
                        </div>
                    </div>
        </div>
            </section>
            <!-- End tabs -->
        </div>
        <!-- End Product -->

    </div>
</main>
<!-- End main-content -->