@extends('layouts.front.master2')
@section('title')

@stop
@section('css')
    <style>
        .lable {
            margin-bottom: 10px;
        }

        .required {
            color: #f03;
        }

        .alert-danger {
            height: 30px;
            font-size: 12px;
            line-height: 0px;
        }

    </style>
@stop
@section('content')

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
            <h1 class="m-0 text-primary">FORSA</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">



                <a href="/" class="nav-item nav-link "> العودة الي القائمة الرئيسية </a>

            </div>
            <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5  d-lg-block"> تسجيل الدخول <i
                    class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->



    <!-- Job Detail Start -->
    <div class="container-xxl py-5 wow fadeInUp mystl" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid border rounded" src="{{ $job->commpany->image_path }}" alt=""
                            style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h5 class="mb-3 mystl cairo">&nbsp;&nbsp; {{ $job->type_job }}</h5>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>&nbsp;
                                {{ $job->location }}</span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>&nbsp;
                                {{ $job->getTypeTime() }}</span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"> </i>&nbsp;
                                {{ $job->amount }} </span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-3 cairo"> وصف الوظيفة</h4>
                        <p>{!! $job->description !!}</p>

                    </div>

                    <div class="">
                        <h4 class="mb-4 cairo"> التقديم للوظيفة </h4>
                        <form class="mystl" action="{{ route('intery-job') }}" method="POST"
                            enctype="multipart/form-data" accept="pdf/*">
                            @csrf

                            <input type="hidden" name="job_id" value="{{ $job->id }}">
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                            
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <label for="" class="lable">الإسم رباعى<span class="required">*</span></label>
                                    <input type="text" name="full_name" class="form-control" placeholder="الإسم رباعي"
                                    value="{{ old('full_name') }}">
                                    @error('full_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="" class="lable">ايميل <span class="required">*</span></label>
                                    <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني"
                                    value="{{ old('email') }}">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="" class="lable">رقم الهاتف <span
                                            class="required">*</span></label>
                                    <input type="text" name="phone" class="form-control" placeholder="رقم الهاتف"
                                    value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="" class="lable">السيرة الذاتيه <span
                                            class="required">*</span></label>
                                    <input type="file" name="cv" class="form-control bg-white">
                                    @error('cv')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="" class="lable">تحدث عن نفسك <span
                                            class="required">*</span></label>
                                    <textarea class="form-control" name="description" rows="5">value="{{ old('description') }}"</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">تقديم </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4 mystl"> ملخص الوظيفة</h4>
                        <p><i class="fa fa-angle-left text-primary me-2 mystl"></i> تاريخ النشر :
                            {{ date_format($job->created_at, 'Y-m-d') }}</p>

                        <p><i class="fa fa-angle-left text-primary me-2"></i> طبيعة العمل : {{ $job->getTypeTime() }}</p>
                        <p><i class="fa fa-angle-left text-primary me-2"></i> السعر : {{ $job->amount }}</p>
                        <p><i class="fa fa-angle-left text-primary me-2"></i> المكان : {{ $job->location }}</p>
                        <p class="m-0"><i class="fa fa-angle-left text-primary me-2"></i> تاريخ الإنتهاء : </p>
                    </div>
                    <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4 mystl">{{ $job->commpany->name_commpany }}</h4>
                        <p class="m-0">
                            {!! $job->commpany->about_commpany !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail End -->



@stop
@section('script')

@stop
