<?php
/* Template Name: Front Page */

FrontPageHeader();
?>
<div class="search-overlay">
    <div class="container text-center position-relative">
        <form class="form-inline d-inline-block">
            <button class="btn close-btn" type="submit">
                <i class="fa fa-remove"></i>
            </button>
            <input class="search-form-control form-control" type="search" placeholder="جستجو ..." aria-label="Search">
            <button class="btn search-btn" type="submit">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
</div>

<!--  feature section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="bg-text bg-top">
                    بزرگترین
                </div>
                <h3 class="alter color bold">پارس تاچ</h3>
                <h2 class="alter">
                    به روز ترین و بزرگترین
                    <br />
                    تولید کننده <strong>محصولات لمسی</strong>
                </h2>
                <p class="text-justify">
                    شرکت نوآوران هزاره دانش، اولین شرکت متخصص در حوزه رسانه های تعاملی یا اینتراکتیو ،فعالیت خودرا
                    در سال 1389 تحت حمایت پارک علم و فناوری خلیج فارس آغاز نمود. این شرکت همواره تلاش نموده است تا
                    با سرمایه گذاری انسانی و مادی در زمینه های تحقیق و توسعه، نوآوری، خلق و تجاری سازی ایده های
                    خلاقانه، گامهای موثری در راستای استقلال کشور و پیشبرد اقتصاد مقاومتی در زمینه علم و فناوری
                    بردارد.
                </p>
                <p class="text-right">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/brands.png" alt="KMI Brands" height="64" class="img-h-100" />
                </p>
                <div class="text-right">
                    <div class="big-blue-btn">
                        <i class="fa fa-phone"></i>
                        <span>تماس با ما</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 text-center">1
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/video.png" alt="Parstouch Introduction" /></a>
            </div>
        </div>
    </div><!-- .container END -->
</section><!-- end  feature section -->

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
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/why-design.png" />
                                <h3>طراحی</h3>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#services" role="tab" aria-controls="design"
                               aria-selected="false">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/why-services.png" />
                                <h3>خدمات</h3>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#performance" role="tab" aria-controls="design"
                               aria-selected="false">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/why-performance.png" />
                                <h3>کارایی</h3>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="design" role="tabpanel" aria-labelledby="design-tab">
                            <ol>
                                <li class="col-sm-12">
                                    <div class="col-md-2 col-sm-12">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/inventory.png" />
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
                                </li>
                                <li class="col-sm-12">
                                    <div class="col-md-2 col-sm-12">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shipping.png" />
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
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/checking.png" />
                                    </div>
                                    <div class="col-md-10 col-sm-12">
                                        <h3>منطبق با آخرین استانداردهای روز دنیا</h3>
                                        <p>
                                            محصولات پارس‌تاچ همسو و همگام با آخرین فناوری ها و استانداردهای حوزه های سخت افزاری و نرم افزاری تهیه و تولید می‌شوند. محصولات دانش بنیان پارس‌تاچ هرروز ویژگی های جدیدی برای شگفت زده کردن شما و مشتریان شما با خود خواهند داشت.
                                        </p>
                                    </div>
                                </li>
                            </ol>
                        </div>
                        <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
                            Services
                        </div>
                        <div class="tab-pane fade" id="performance" role="tabpanel" aria-labelledby="performance-tab">
                            Performance
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- .row END -->
    </div><!-- .container END -->
</section><!-- end why-us section -->

<!--  creative comunication section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">

            </div>

        </div><!-- .row END -->
    </div><!-- .container END -->
</section><!-- end  creative comunication section -->

<!--  parallax area section -->
<section>
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-7">
            </div>
            <div class="col-lg-5">

            </div>
        </div><!-- .row END -->
    </div><!-- .container END -->
</section>

<section>
    <div class="container">
        <div class="row no-gutters">

        </div><!-- .row END -->
    </div><!-- .container END -->
</section>

<?php get_footer(); ?>
