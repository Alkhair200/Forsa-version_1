@extends('layouts.front.master2')
@section('title')

@stop
@section('css')
    <style>
        .job-detials,
        .job-info {
            text-align: right;
            padding: 30px
        }

        .job-detials {
            direction: rtl
        }

        .job-detials h1 {
            color: #00B074;
            margin-bottom: 30px;
            font-size: 30px;
        }

        .job-detials h1 span {
            color: #ce0029;
            font-size: 18px;
        }

        .job-item {
            border-radius: 10px;
        }

        .list-info {
            list-style: none;
            display: block ruby;

        }

        .link-info a {
            padding: 10px;
            border-bottom: 3px solid #00B074;
            border-top: 1px solid #00B074;
            /* border-left: 1px solid #00B074; */
            border-radius: 10px;
        }

        .wite{
            color: #00754D;
            text-align: center;
        }

        .link-info a:hover {
            transition: 1.0s;
            background-color: #00B074;
            color: #fff;
        }

        .job-edit,
        .job-delete {
            padding: 3px 30px;
            color: #fff;
            border-radius: 3px;
        }

        .job-delay {
            padding: 3px 30px;
            color: #fff;
            border-radius: 3px;
            background: #F57939;
        }

        .job-edit {
            background: #00B074;
        }

        .job-delete {
            background: #ce0029;
        }

        .job-edit:hover {
            box-shadow: 0px 0px 3px #00B074;
            background: #00754D;
            color: #fff;
        }

        .job-delete:hover {
            box-shadow: 0px 0px 3px #f03;
            background: #ce0029;
            color: #fff;
        }

        .active-jobs {
            display: none;
        }

        .com-info {
            float: right;
            background: #ffffff59;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 3px #ffffff59;
        }

        .com-info h2 {
            border-bottom: 1px solid #fff;
            padding-bottom: 14px;
            color: #fff;
        }

        .com-info span {
            color: #fff;
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
                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="btn btn-primary rounded-0 py-4 px-lg-5  d-lg-block">الدخول<i
                                class="fa fa-arrow-right ms-3"></i></a>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn btn-primary rounded-0 py-4 px-lg-5  d-lg-block"
                                href="{{ route('register') }}">تسجيل</a>
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
                <a href="/" class="nav-item nav-link ">الرئيسية</a>

            </div>

        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Search Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn mystl" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row">
                @if (isset($jobs) && $jobs->count() != 0)
                    <div class="col-md-8 com-info">
                        <h2>{{ $jobs->commpany->name_commpany }}</h2>
                        <p>{!! $jobs->commpany->about_commpany !!}</p>
                        <span>{{ $jobs->commpany->email }}</span>
                    </div>
                @else
                    <div class="col-md-8 com-info">
                        <h2>{{ auth()->user()->name }}</h2>
                        <span>{{ auth()->user()->email }}</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Search End -->

    <!-- Jobs Start -->
    @if (auth()->user()->status != 0)
    <div class="container">
        <div class="row">
            <div class="job-item job-info">
                <ul class="list-info">

                    <li class="link-info">
                        <a href="{{ route('all-intery-job') }}">طلبات الوظائف</a>
                    </li>

                    <li class="link-info">
                        <a href="{{ route('job-customer.create') }}">إضافة وظيفة جديدة</a>
                    </li>

                    <li class="link-info">
                        <a href="{{ route('active-job', $active = 1) }}">الوظائف المفعله</a>
                    </li>

                    <li class="link-info">
                        <a href="{{ route('active-job' ,$not_active = 0) }}">الوظائف الغير مفعله</a>
                    </li>
                    <li class="link-info">
                        <a href="{{ route('profile.index') }}">حسابي</a>
                    </li>
                </ul>
            </div>
        </div>

        @if (isset($my_jobs))
        <div class="row">
            <div class="job-detials">
                <h1 data-wow-delay="0.1s">كل الوظائف <span>{{ $my_jobs->total() }}</span></h1>
                <div class="row">
                    @if (isset($my_jobs))
                        @foreach ($my_jobs as $item)
                            <div class="col-md-4">
                                <div class="job-item p-4 mb-4 mystl">
                                    <div class="row g-4">
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded"
                                                src="{{ $item->commpany->image_path }}" alt="صوره"
                                                style="width: 80px; height: 80px;">
                                            <div class="text-right ps-4">
                                                <h5 class="">&nbsp;&nbsp; {{ $item->type_job }}</h5>
                                                <span class="text-truncate me-3"><i
                                                        class="fa fa-map-marker-alt text-primary me-2"></i>&nbsp;
                                                    {{ $item->location }}</span>
                                                <span class="text-truncate me-3"><i
                                                        class="far fa-clock text-primary me-2"></i>&nbsp;
                                                    {{ $item->getTypeTime() }}</span>
                                                <span class="text-truncate me-3"><i
                                                        class="far fa-money-bill-alt text-primary me-2"></i>&nbsp;
                                                    {{ $item->amount }}</span>
                                            </div>
                                        </div>
                                        <div class="btn-actions">
                                            @if ($item->status == 1)
                                                <a class="job-edit btn"
                                                    href="{{ route('job-customer.edit', $item->id) }}">تعديل</a>
                                                <a class="job-delete btn" data-toggle="modal"
                                                    data-target="#delete{{ $item->id }}">حذف</a>
                                            @else
                                                <span class="job-delay btn" href="#">بإنتظار التفعيل....</span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            {{ $my_jobs->links('vendor.pagination.custom') }}
        </div>
        @endif

        @if (isset($active_job))
        <div class="row">
            <div class="job-detials">
                <h1 data-wow-delay="0.1s">كل الوظائف <span>{{ $active_job->total() }}</span></h1>
                <div class="row">
                    @if (isset($active_job))
                        @foreach ($active_job as $item)
                            <div class="col-md-4">
                                <div class="job-item p-4 mb-4 mystl">
                                    <div class="row g-4">
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded"
                                                src="{{ $item->commpany->image_path }}" alt=""
                                                style="width: 80px; height: 80px;">
                                            <div class="text-right ps-4">
                                                <h5 class="">&nbsp;&nbsp; {{ $item->type_job }}</h5>
                                                <span class="text-truncate me-3"><i
                                                        class="fa fa-map-marker-alt text-primary me-2"></i>&nbsp;
                                                    {{ $item->location }}</span>
                                                <span class="text-truncate me-3"><i
                                                        class="far fa-clock text-primary me-2"></i>&nbsp;
                                                    {{ $item->getTypeTime() }}</span>
                                                <span class="text-truncate me-3"><i
                                                        class="far fa-money-bill-alt text-primary me-2"></i>&nbsp;
                                                    {{ $item->amount }}</span>
                                            </div>
                                        </div>
                                        <div class="btn-actions">
                                            @if ($item->status == 1)
                                                <a class="job-edit btn"
                                                    href="{{ route('job-customer.edit', $item->id) }}">تعديل</a>
                                                <a class="job-delete btn" data-toggle="modal"
                                                    data-target="#delete{{ $item->id }}">حذف</a>
                                            @else
                                                <span class="job-delay btn" href="#">بإنتظار التفعيل....</span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                {{ $active_job->links('vendor.pagination.custom') }}
            </div>
        </div>
        @endif

        @if (isset($not_active_job))
        <div class="row">
            <div class="job-detials">
                <h1 data-wow-delay="0.1s">كل الوظائف <span>{{ $not_active_job->total() }}</span></h1>
                <div class="row">
                    @if (isset($not_active_job))
                        @foreach ($not_active_job as $item)
                            <div class="col-md-4">
                                <div class="job-item p-4 mb-4 mystl">
                                    <div class="row g-4">
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded"
                                                src="{{ $item->commpany->image_path }}" alt=""
                                                style="width: 80px; height: 80px;">
                                            <div class="text-right ps-4">
                                                <h5 class="">&nbsp;&nbsp; {{ $item->type_job }}</h5>
                                                <span class="text-truncate me-3"><i
                                                        class="fa fa-map-marker-alt text-primary me-2"></i>&nbsp;
                                                    {{ $item->location }}</span>
                                                <span class="text-truncate me-3"><i
                                                        class="far fa-clock text-primary me-2"></i>&nbsp;
                                                    {{ $item->getTypeTime() }}</span>
                                                <span class="text-truncate me-3"><i
                                                        class="far fa-money-bill-alt text-primary me-2"></i>&nbsp;
                                                    {{ $item->amount }}</span>
                                            </div>
                                        </div>
                                        <div class="btn-actions">
                                            @if ($item->status == 1)
                                                <a class="job-edit btn"
                                                    href="{{ route('job-customer.edit', $item->id) }}">تعديل</a>
                                                <a class="job-delete btn" data-toggle="modal"
                                                    data-target="#delete{{ $item->id }}">حذف</a>
                                            @else
                                                <span class="job-delay btn" href="#">بإنتظار التفعيل....</span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                {{ $not_active_job->links('vendor.pagination.custom') }}
            </div>
        </div>
        @endif
    </div>
    @else
    <div class="row">
        <div class="job-item job-info wite">
            <span>.... سوف تتم معالجه طلبك خلال 24 ساعة</span>
            <p>شكراً لإنضمامك لنا</p>
        </div>
    </div>
    @endif
    <!-- Jobs End -->

    {{-- <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        هل انت متأكد من عملية الحذف
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('job-customer.destroy', $item->id) }}" method="POST">
                        {{ method_field('delete') }}

                        <input type="text" value="{{ $item->id }}" name="id" hidden>
                        @csrf
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">تراجع</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                </div>
                </form>

            </div>
        </div>
    </div> --}}





@stop
@section('script')

@stop
