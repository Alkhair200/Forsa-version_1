@extends('layouts.front.master2')
@section('title')

@stop
@section('css')

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

        @guest
        @if (Route::has('login'))
            <a href="{{ route('login') }}" class="btn btn-primary rounded-0 py-4 px-lg-5  d-lg-block">الدخول<i
                    class="fa fa-arrow-right ms-3"></i></a>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="btn btn-primary rounded-0 py-4 px-lg-5  d-lg-block" href="{{ route('register') }}">تسجيل</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a href="{{ route('job-customer.index') }}" class="dropdown-item color-white">لوحة التحكم</a>

                <a class="dropdown-item color-white" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                                                                        document.getElementById('logout-form').submit();">
                    {{ __('site.logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
    </nav>
    <!-- Navbar End -->



    <!-- Search Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn mystl" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="col">
                        <input type="text" name="" class="form-control " placeholder="إبحث عن التخصص ..">

                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-dark border-0 w-100">بحث</button>
                </div>
            </div> <br>

            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <select class="form-select border-0">
                                <option selected>-- المجالات --</option>
                                <option value="1">Category 1</option>
                                <option value="2">Category 2</option>
                                <option value="3">Category 3</option>
                            </select>
                        </div>




                        <div class="col-md-6">
                            <select class="form-select border-0">
                                <option selected>-- التخصصات --</option>
                                <option value="1">Category 1</option>
                                <option value="2">Category 2</option>
                                <option value="3">Category 3</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-dark border-0 w-100">بحث</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Search End -->

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
                                                    class="fa fa-map-marker-alt text-primary me-2"></i>&nbsp;
                                                {{ $item->location }}</span>
                                            <span class="text-truncate me-3"><i
                                                    class="far fa-clock text-primary me-2"></i>&nbsp;{{ $item->getTypeTime() }}</span>
                                            <span class="text-truncate me-0"><i
                                                    class="far fa-money-bill-alt text-primary me-2"> </i>&nbsp;
                                                {{ $item->amount }}
                                            </span>
                                        </div>
                                    </div>
                                    <div
                                        class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">

                                            <a class="btn btn-primary" href="{{ route('job-detail', $item->id) }}">
                                                التقديم للوظيفة</a>
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>
                                            {{ date_format($item->created_at, 'Y-m-d') }}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{ $jobs->links('vendor.pagination.custom') }}


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->





@stop
@section('script')

@stop
