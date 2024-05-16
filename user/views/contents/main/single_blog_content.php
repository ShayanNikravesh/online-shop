<main class="main-content dt-sl mt-4 mb-3">
    <?php
        $article = getArticle($_GET['article_id']);
    ?>
    <div class="container main-container">
        <!-- Start title - breadcrumb -->
        <div class="title-breadcrumb-special dt-sl">
            <div class="title-page dt-sl">
                <h1><?php echo $article['title'] ?></h1>
            </div>
            <!-- star rate -->
            <div class="post-rating">
                <div class="star-rate" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="<b>۴</b> از ۴ رای">
                </div>
            </div>
            <!-- star rate end -->
        </div>
        <!-- End title - breadcrumb -->

        <div class="dt-sl">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-3">
                    <div class="content-page">
                        <div class="content-desc dt-sn dt-sl">
                            <header class="entry-header dt-sl mb-3">
                                <div class="post-meta date">
                                    <i class="mdi mdi-calendar-month"></i>
                                    <?php
                                        echo created_at($article['created_at']);
                                    ?>
                                </div>
                                <div class="post-meta author">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    ارسال شده توسط مدیرت
                                </div>
                                <div class="post-meta category">
                                    <i class="mdi mdi-pen"></i>
                                    <?php
                                        echo $article['first_name'],' ',$article['last_name'];
                                    ?>
                                </div>
                            </header>
                            <div class="post-thumbnail dt-sl">
                                <?php
                                if (!empty($article['photo_name'])) {
                                    ?>
                                    <img src="<?php echo normalizePath(DOMAINS['public'], $article['photo_src'], $article['photo_name']); ?>" alt='Product Thumbnail'>
                                    <?php
                                } else {
                                    ?>
                                    <img src="<?php echo normalizePath(DOMAINS['public'], '/images/180.png'); ?>" alt='Product Thumbnail'>
                                    <?php
                                }
                                ?>
                            </div>
                            <p><?php echo $article['article'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-3 sidebar sticky-sidebar">
                    <div class="dt-sn dt-sl">
                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-1">
                            <h2>برچسبها</h2>
                        </div>
                        <ul class="tag-list">
                            <li><a href="#">بهینه سازی</a></li>
                            <li><a href="#">برنامه نویسی</a></li>
                            <li><a href="#">طراحی سایت</a></li>
                            <li><a href="#">وردپرس</a></li>
                            <li><a href="#">پلاگین نویسی</a></li>
                            <li><a href="#">گرافیک</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

