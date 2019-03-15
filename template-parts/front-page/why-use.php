<!-- why-us section -->
<section class="why-us">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="color bold text-left">چرا پارس تاچ؟</h2>
            </div>
            <div class="col-sm-12">
                <div class="d-flex flex-row mt-2">

                    <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--right">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#design" role="tab" aria-controls="design"
                               aria-selected="true">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/pars/assets/images/why-design.png" />
                                <h3>طراحی</h3>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#services" role="tab" aria-controls="design"
                               aria-selected="false">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/pars/assets/images/why-services.png" />
                                <h3>خدمات</h3>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#performance" role="tab" aria-controls="design"
                               aria-selected="false">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/pars/assets/images/why-performance.png" />
                                <h3>کارایی</h3>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="design" role="tabpanel" aria-labelledby="design-tab">
                            <?php
                            !empty($pars_touch_options['design']) ? print($pars_touch_options['design']) : "";
                            ?>
                            <!--                            <ol>
                                                            <li class="col-sm-12">
                                                                <div class="col-md-2 col-sm-12">
                                                                    <img src="<?php echo get_site_url(); ?>/wp-content/themes/pars/assets/images/inventory.png" />
                                                                </div>
                                                                <div class="col-md-10 col-sm-12">
                                                                    <h3>در هر تعدادی که شما نیاز دارید</h3>
                                                                    <p>
                                                                        پارس‌تاچ می داند که سفارش شما ممکن است از یک تا چند هزار دستگاه لمسی
                                                                        باشد، بنابراین مفهومی تحت عنوان حداقل تعداد سفارش وجود ندارد. چه برای
                                                                        تهیه‌ی پروتوتایپ محصول شما و چه برای تولید انبوه، ما بی اندازه منعطف
                                                                        هستیم.
                                                                    </p>
                                                                </div>
                            
                                                                daadsasdsa
                                                            </li>
                                                            <li class="col-sm-12">
                                                                <div class="col-md-2 col-sm-12">
                                                                    <img src="<?php echo get_site_url(); ?>/wp-content/themes/pars/assets/images/shipping.png" />
                                                                </div>
                                                                <div class="col-md-10 col-sm-12">
                                                                    <h3>در اندازه ‌ی دلخواه شما</h3>
                                                                    <p>
                                                                        پارس‌تاچ در تولید طیف تقریبا نامحدودی از اشکال و ابعاد صفحات لمسی و تعاملی، شما را همراهی می‌کند. شما می‌توانید محصولی داشته باشید که مخصوص برند شما تعبیه شده اند. از صفحات منحنی گرفته تا استفاده از لوگوی شما، تیم طراحان پارس تاچ با شماست.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="col-sm-12">
                                                                <div class="col-md-2 col-sm-12">
                                                                    <img src="<?php echo get_site_url(); ?>/wp-content/themes/pars/assets/images/checking.png" />
                                                                </div>
                                                                <div class="col-md-10 col-sm-12">
                                                                    <h3>منطبق با آخرین استانداردهای روز دنیا</h3>
                                                                    <p>
                                                                        محصولات پارس‌تاچ همسو و همگام با آخرین فناوری ها و استانداردهای حوزه های سخت افزاری و نرم افزاری تهیه و تولید می‌شوند. محصولات دانش بنیان پارس‌تاچ هرروز ویژگی های جدیدی برای شگفت زده کردن شما و مشتریان شما با خود خواهند داشت.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        </ol>-->
                        </div>
                        <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
                            <?php
                            !empty($pars_touch_options['Services']) ? print($pars_touch_options['Services']) : "";
                            ?>

                        </div>
                        <div class="tab-pane fade" id="performance" role="tabpanel" aria-labelledby="performance-tab">
                            <?php
                            !empty($pars_touch_options['Performance']) ? print($pars_touch_options['Performance']) : "";
                            ?>

                        </div>
                    </div>
                </div>

            </div>
        </div><!-- .row END -->
    </div><!-- .container END -->
</section><!-- end why-us section -->