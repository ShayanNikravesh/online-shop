<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">جزئیات سفارش</h5>
                <!--end::Page Title-->
                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <span class="text-muted font-weight-bold mr-4">در این صفحه می توانید جزئیات سفارش را مشاهده کنید.</span>
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Actions-->

                <!--end::Actions-->
                <!--begin::Daterange-->
                <!--end::Daterange-->
                <!--begin::Dropdowns-->
                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                    <a href="#" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="svg-icon svg-icon-success svg-icon-lg">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>
                    </a>
                    <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right py-3">
                        <!--begin::Navigation-->
                        <ul class="navi navi-hover py-5">
                            <li class="navi-item">
                                <a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-drop"></i>
														</span>
                                    <span class="navi-text">New Group</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-list-3"></i>
														</span>
                                    <span class="navi-text">Contacts</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-rocket-1"></i>
														</span>
                                    <span class="navi-text">Groups</span>
                                    <span class="navi-link-badge">
															<span class="label label-light-primary label-inline font-weight-bold">new</span>
														</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-bell-2"></i>
														</span>
                                    <span class="navi-text">Calls</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-gear"></i>
														</span>
                                    <span class="navi-text">Settings</span>
                                </a>
                            </li>
                            <li class="navi-separator my-3"></li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-magnifier-tool"></i>
														</span>
                                    <span class="navi-text">Help</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-bell-2"></i>
														</span>
                                    <span class="navi-text">Privacy</span>
                                    <span class="navi-link-badge">
															<span class="label label-light-danger label-rounded font-weight-bold">5</span>
														</span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                </div>
                <!--end::Dropdowns-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card card-custom gutter-b">
                <?php
                $order_details = getDetailsOrders($_GET['tracking_code']);
                ?>
                <div class="card-header">
                    <h3 class="card-title">جزئیات سفارش <span class="font-en text-primary"><?php echo $order_details['tracking_code'] ?></span></h3>
                </div>
                <!--begin::Form-->
                <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <span class="text-primary">تحویل گیرنده:</span>
                                <br>
                                <span class=""><?php echo $order_details['receiver_first_name'] , ' ' , $order_details['receiver_last_name']?></span>
                            </div>
                            <div class="col-lg-6">
                                <span class="text-primary">شماره تماس تحویل گیرنده:</span>
                                <br>
                                <span class=""><?php echo $order_details['receiver_mobile'] ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <span class="text-primary">شهر مقصد:</span>
                                <br>
                                <span class=""><?php echo $order_details['city_name'] ?></span>
                            </div>
                            <div class="col-lg-6">
                                <span class="text-primary">کد پستی:</span>
                                <br>
                                <span class=""><?php echo $order_details['receiver_postal_code'] ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <span class="text-primary">نحوه ارسال سفارش:</span>
                                <br>
                                <span class="">پست</span>
                            </div>
                            <div class="col-lg-6">
                                <span class="text-primary">هزینه ارسال:</span>
                                <br>
                                <span class="">رایگان</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <span class="text-primary">مبلغ کل:</span>
                                <br>
                                <span class=""><?php echo priceFormatter($order_details['total_amount']) ?></span>
                            </div>
                            <div class="col-lg-6">
                                <span class="text-primary">مبلغ قابل پرداخت:</span>
                                <br>
                                <span class=""><?php echo priceFormatter($order_details['amount_payable']) ?></span>
                            </div>
                        </div>
                    </div>
                <!--end::Form-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

