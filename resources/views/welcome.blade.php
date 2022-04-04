@extends('layouts.front.master')
@section('title')

@stop
@section('css')

@stop
@section('content')

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('front/img/carousel-1.jpg') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(43, 57, 64, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown mb-4 mystl cairo">ابحث عن الوظيفة
                                    المثالية التي تستحقها</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2 mystl">يمكنك الآن البحث بسهولة عن الوظائف دون
                                    الحاجة إلى الجلوس على جهاز الكمبيوتر الخاص بك فقط من خلال هاتفك. </p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft ">الوظائف</a>
                                <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">إقرا المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('front/img/carousel-2.jpg') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(43, 57, 64, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown mb-4 mystl cairo">ابحث عن وظيفتك بشكل
                                    أفضل وأسرع </h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2 mystl">قدم بسهولة للوظيفة المناسبة لك فقط
                                    بنقرة واحدة! يُظهر التقديم السريع الوظائف الموصى بها بناءً على أحدث عمليات البحث . </p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">الوظائف</a>
                                <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">إقرا المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
    
    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <center>
                <h1 class="text-center mb-5 wow fadeInUp cairo" data-wow-delay="0.1s">إستكشف حسب الفئة</h1>
                <div class="row g-4 ">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
                            <h6 class="mb-3 cairo">تسويق</h6>

                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                            <h6 class="mb-3 cairo">خدمة العملاء </h6>

                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                            <h6 class="mb-3 cairo">إدارة الموارد البشرية </h6>

                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-tasks text-primary mb-4"></i>
                            <h6 class="mb-3 cairo">إدارة المشاريع</h6>

                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-chart-line text-primary mb-4"></i>
                            <h6 class="mb-3 cairo">تطوير الاعمال</h6>

                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-hands-helping text-primary mb-4"></i>
                            <h6 class="mb-3 cairo">المبيعات والاتصالات</h6>

                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-book-reader text-primary mb-4"></i>
                            <h6 class="mb-3 cairo">التدريس والتعليم</h6>

                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-drafting-compass text-primary mb-4"></i>
                            <h6 class="mb-3 cairo">التصميم والإبداع</h6>

                        </a>
                    </div>
                </div>

            </center>

        </div>
    </div>
    <!-- Category End -->


    <!-- About Start -->
    <div class="container-xxl py-5" id="about-us">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-0 about-bg rounded overflow-hidden">
                        <div class="col-6 text-start">
                            <img class="img-fluid w-100" src="{{ asset('front/img/about-1.jpg') }}">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid" src="{{ asset('front/img/about-2.jpg') }}"
                                style="width: 85%; margin-top: 15%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid" src="{{ asset('front/img/about-3.jpg') }}" style="width: 85%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid w-100" src="{{ asset('front/img/about-4.jpg') }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4 mystl cairo">نحن نساعد في الحصول على أفضل وظيفة والعثور على الموهبة</h1>
                    <p class="mystl"><i class="fa fa-check text-primary me-3 "> </i> نوفر لك الكثير من فرص العمل
                        المختلفة . </p>
                    <p class="mystl"><i class="fa fa-check text-primary me-3 "></i> نوفر لك ولشركتك الإنتشار . </p>
                    <p class="mystl"><i class="fa fa-check text-primary me-3"></i> نوفر الكثير من الوقت والمجهود في
                        عملية ايجاد وظيفة مناسبة . </p>
                    <!-- <a class="btn btn-primary py-3 px-5 mt-3" href="">إقرا المزيد</a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Jobs Start -->
    <div class="container-xxl py-5" id="jobs">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp cairo" data-wow-delay="0.1s">قائمة الوظائف</h1>
            <div class="tab-class text-center wow fadeInUp " data-wow-delay="0.3s">

                <div class="tab-content ">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        @foreach ($jobs as $item)
                        <div class="job-item p-4 mb-4 mystl">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ $item->commpany->image_path }}" alt="صوره"
                                        style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3 mystl cairo">&nbsp;&nbsp; {{ $item->type_job }}</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>&nbsp; {{ $item->location }}</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-primary me-2"></i>&nbsp; {{ $item->getTypeTime() }}</span>
                                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2">
                                            </i>&nbsp; {{ $item->amount }} </span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">

                                        <a class="btn btn-primary" href="{{ route('job-detail',$item->id) }}"> التقديم للوظيفة</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>{{ date_format($item->created_at,'Y-m-d') }}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <a class="btn btn-primary py-3 px-5 " href="{{ route('all-job') }}">تصفح المزيد من الوظائف</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="text-center mb-5 cairo">أقوال بعض العملاء</h1>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item bg-light rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p class="mystl">أنا أحب فرصه ، منصة سهلة الاستخدام ، فريق عمل خيالي ولا شيء سوى نتائج رائعة!
                    </p>
                    <div class="d-flex align-items-center mystl">
                        <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('front/img/testimonial-1.jpg') }}"
                            style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1 cairo">&nbsp; العميل</h5>
                            <small>&nbsp; الوظيفة</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p class="mystl">أنا أحب فرصه ، منصة سهلة الاستخدام ، فريق عمل خيالي ولا شيء سوى نتائج رائعة!
                    </p>
                    <div class="d-flex align-items-center mystl ">
                        <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('front/img/testimonial-2.jpg') }}"
                            style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1 cairo">&nbsp; العميل</h5>
                            <small>&nbsp; الوظيفة</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p class="mystl">أنا أحب فرصه ، منصة سهلة الاستخدام ، فريق عمل خيالي ولا شيء سوى نتائج رائعة!
                    </p>
                    <div class="d-flex align-items-center mystl">
                        <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('front/img/testimonial-3.jpg') }}"
                            style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1  cairo">&nbsp; العميل</h5>
                            <small>&nbsp; الوظيفة</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p class="mystl">أنا أحب فرصه ، منصة سهلة الاستخدام ، فريق عمل خيالي ولا شيء سوى نتائج رائعة!
                    </p>
                    <div class="d-flex align-items-center mystl">
                        <img class="img-fluid flex-shrink-0 rounded" src="" style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1 cairo">&nbsp; العميل</h5>
                            <small>&nbsp; الوظيفة</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@stop
@section('script')

@stop
