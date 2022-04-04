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

        .wite {
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

                            <a class="dropdown-item color-white" href="{{ route('logout') }}" onclick="event.preventDefault();
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
    @if (isset($allJobEnery) && $allJobEnery->count() > 0)
    <div class="container" style="direction: rtl">
        <div class="row">
            <table class="table text-md-nowrap btn-dark" id="example1">
                <thead>
                    <tr class="btn-success">
                        <th>#</th>
                        <th class="wd-15p border-bottom-0">إسم مقدم الطلب</th>
                        <th class="wd-15p border-bottom-0">الهاتف</th>
                        <th class="wd-15p border-bottom-0">ايميل</th>
                        <th class="wd-15p border-bottom-0">إسم الوظيفه</th>
                        <th class="wd-10p border-bottom-0">دوام العمل</th>
                        <th class="wd-15p border-bottom-0">الراتب</th>
                        <th class="wd-15p border-bottom-0">تاريخ التقديم</th>
                        <th class="wd-15p border-bottom-0">العمليات</th>
                    </tr>
                </thead>
                <tbody>
    
                    <?php $i = 1; ?>
                    @foreach ($allJobEnery as $item)
                        <tr>
                            <td> {{ $i++ }}</td>
                            <td>{{ $item->full_name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->Jobs->type_job }}</td>
                            <td>{{ $item->Jobs->getTypeTime() }}</td>
                            <td>{{ $item->Jobs->amount }}</td>
                            <td>{{ date_format($item->created_at  , 'Y-m-d')}}</td>
                            <td> <a class="btn ripple btn-primary btn-sm"
                                    href="{{ route('dwonload', $item->id) }}">تحميل</a>
    
                                <a href="{{ route('destroy',$item->id) }}" class="btn ripple btn-danger btn-sm">@lang('site.delete')</a>
                            </td>
                        </tr>
    
                        <!-- delete alert message -->
                        <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif; color: #f03" class="modal-title"
                                            id="exampleModalLabel">
                                            ! @lang('site.delete-this')
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- add_form -->
                                        <form action="{{ route('job.destroy', $item->id) }}" method="POST">
                                            {{ method_field('delete') }}
                                            @csrf
    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info"
                                            data-dismiss="modal">@lang('site.close')</button>
                                        <button type="submit" class="btn btn-danger">@lang('site.continue')</button>
                                    </div>
                                    </form>
    
                                </div>
                            </div>
                        </div>
                        <!-- End delete alert message -->
                    @endforeach

                    {{ $allJobEnery->links('vendor.pagination.custom') }}

                </tbody>
            </table>
        </div>
    </div>

    @endif
    <!-- Jobs End -->

@stop
@section('script')

@stop
