<header class='main-header js-fixed-topbar dt-sl'>
    <!-- Start ads -->

    <!-- End ads -->
    <!-- Start topbar -->
    <div class='container main-container'>
        <div class='topbar dt-sl'>
            <div class='row'>
                <div class='col-lg-2 col-md-3 col-6'>
                    <div class='logo-area float-right'>
<!--                        <a href='/index.php'>-->
<!--                            <img src='./assets/img/it land.jpg' style="width: 90px;" alt='error'>-->
<!--                        </a>-->
                        <span class="note-color">Logo</span>
                        <br>
                        <span class="mr-3 mt-1">
                             <?php
                             $date=jdate('Y/m/d H:i:s');
                             $explode=explode(' ',$date);
                             echo $explode[0];
                             ?>
                        </span>
                    </div>
                </div>
                <div class='col-lg-6 col-md-5 hidden-sm'>
                    <div class='search-area dt-sl'>
                        <form action='search.php' method="get" class='search'>
                            <input type='text' name="search" placeholder='نام محصول مورد نظر خود را جستجو کنید…'>
                            <button type='submit' class="bg-dark"><img src='./assets/img/theme/search.png' alt=''></button>
                            <button class='close-search-result' type='button'><i class='mdi mdi-close'></i></button>
                        </form>
                    </div>
                </div>
                <!--begin profile-->
                <div class='col-md-4 col-6 topbar-left'>
                    <ul class='nav float-left'>
                        <li class='nav-item account dropdown bg-dark shadow'>
                            <a class='nav-link' href='#' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <span class='label-dropdown text-white'>حساب کاربری</span>
                                <i class='mdi mdi-account-circle-outline' style="color: whitesmoke"></i>
                            </a>
                            <div class='dropdown-menu dropdown-menu-sm dropdown-menu-left' style="background-color: whitesmoke">
                                <?php
                                    if (!authUser()){
                                ?>
                                        <a class='dropdown-item' href='/login.php'>
                                            <i class='mdi mdi-login-variant'></i>ورود
                                        </a>
                                        <a class='dropdown-item' href='/register.php'>
                                            <i class='mdi mdi-account'></i>ثبت نام
                                        </a>
                                <?php
                                        }
                                ?>
                                <?php
                                if (authUser()){
                                    ?>
                                    <a class='dropdown-item' href='/profile.php'>
                                        <i class='mdi mdi-account-card-details-outline'></i>پروفایل
                                    </a>
                                    <a class='dropdown-item' href='/update_profile.php'>
                                        <i class='mdi mdi-account-edit-outline'></i>ویرایش حساب کاربری
                                    </a>
                                    <a class='dropdown-item' href='/profile-addresses.php'>
                                        <i class='mdi mdi-home-outline'></i>آدرس ها
                                    </a>
                                    <div class='dropdown-divider' role='presentation'></div>
                                    <a class='dropdown-item' href='/logout.php'>
                                        <i class='mdi mdi-logout-variant'></i>خروج
                                    </a>
                                    <?php
                                }
                                ?>
                            </div>
                        </li>
                    </ul>
                </div>
                <!--end profile-->
            </div>
        </div>
    </div>
    <!-- End topbar -->

    <!-- Start bottom-header -->
    <div class='bottom-header dt-sl mb-sm-bottom-header'>
        <div class='container main-container'>
            <?php
                $parentcategories = getParentCategories();
                $brands = getBrands();
            ?>
            <!-- Start Main-Menu -->
            <nav class='main-menu dt-sl'>
                <ul class='list float-right hidden-sm'>
                    <li class="list-item list-item-has-children menu-col-1">
                        <a class="nav-link" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="19" fill="currentColor" class="bi bi-shop-window" viewBox="0 0 16 16"><path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5m2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5"/></svg>
                            دسته بندی کالاها</a>
                          <ul class="sub-menu nav">
                              <?php
                              if ($parentcategories){
                              foreach ($parentcategories as $parentcategory){
                              $categories = getCategories($parentcategory['id']);
                              ?>
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" target="_blank" href="<?php echo parentcategoryUrl($parentcategory['id']) ?>"><?php echo $parentcategory['title'] ?></a>
                                <ul class="sub-menu nav">
                                    <?php
                                    if ($categories){
                                    foreach ($categories as $category){
                                    ?>
                                      <li class="list-item">
                                         <a class="nav-link" target="_blank" href="<?php echo categoryUrl($category['id']) ?>"><?php echo $category['title'] ?></a>
                                      </li>
                                    <?php
                                     }
                                    }
                                    ?>
                                </ul>
                            </li>
                               <?php
                                }
                              }
                              ?>
                          </ul>
                    </li>
                    <li class="list-item list-item-has-children menu-col-1">
                        <a class="nav-link" href="javascript:;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
                                <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0"/>
                                <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1m0 5.586 7 7L13.586 9l-7-7H2z"/>
                            </svg>
                            برندها
                        </a>
                          <ul class="sub-menu nav">
                              <?php
                                if ($brands){
                                    foreach ($brands as $brand){
                              ?>
                            <li class="list-item">
                                <a class="nav-link" target="_blank" href="<?php echo brandUrl($brand['id']) ?>"><?php echo $brand['title'] ?></a>
                            </li>
                               <?php
                                    }
                              }
                              ?>
                          </ul>
                    </li>
                    <li class="list-item menu-col-1">
                        <a class="nav-link" target="_blank" href="blog.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
                                <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5M5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1z"/>
                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
                            </svg> مقالات</a>
                    </li>
                    <li class="list-item menu-col-1">
                        <a class="nav-link" target="_blank" href="guide.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                            </svg> راهنما</a>
                    </li>
                </ul>
                <ul class='nav float-left'>
                    <li class='nav-item'>
                        <a class='nav-link' href='/cart.php'>
                            <button type="button" class="btn btn-square btn-dark" >سبد خرید <icon class='mdi mdi-cart'></icon></button>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- End Main-Menu -->
        </div>
    </div>
    <!-- End bottom-header -->
</header>