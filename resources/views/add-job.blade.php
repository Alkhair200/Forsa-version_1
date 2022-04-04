@extends('layouts.front.master2')
@section('title')
    إضافة وظيفه جديده
@stop
@section('css')
    <style>
        .add-job {
            overflow: hidden !important;
        }

        .job-detials {
            margin-top: 30px;
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

        .link-info a:hover {
            transition: 1.0s;
            background-color: #00B074;
            color: #fff;
        }

        .job-link {
            background: #00B074;
            padding: 3px 30px;
            color: #fff;
        }

        .job-link:hover {
            transition: 1.0s;
            background: #007c53;
            color: #fff;
        }

        .active-jobs {
            display: none;
        }

        .add-job {
            text-align: right
        }

        .form-group {
            margin: 10px 0px;
            direction: rtl;

        }

        .required {
            color: #f03;
            margin-right: 10px;
        }

        .form-control {
            margin-top: 10px
        }

        .form-control:focus {
            border: 1px solid #00B074;
            box-shadow: 0px 0px 5px #00b075a8;
        }

        .modal-footer button {
            color: #fff;
        }

        .alert-danger {
            height: 30px;
            font-size: 12px;
            line-height: 0px;
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

            <a href="/" class="nav-item nav-link ">الرئيسية</a>
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
    <div class="container add-job">
        {{-- <h1 class="text-center  cairo" data-wow-delay="0.1s">قائمة الوظائف</h1> --}}
        @include('partials._session')
        @if (auth()->user()->admin != 1)
            @if (!isset($edit_job))

                @if (isset($jobs) && $jobs->count() != 0)
                    <div class="row">
                        <form action="{{ route('single-store') }}" method="POST">
                            @csrf
                            {{ method_field('post') }}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">الموقع<span class="required">*</span></label>
                                        <input type="text" name="location" class="form-control">
                                        @error('location')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">إسم الوظيفه<span class="required">*</span></label>
                                        <input type="text" name="type_job" class="form-control">
                                        @error('type_job')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">دوام العمل<span class="required">*</span></label>
                                        <select name="type_time" class="form-control select2-no-search">
                                            <option value="" selected>-- اختر دوام العمل --</option>
                                            @foreach (typeTime() as $key => $item)
                                                <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                        @error('type_time')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">الراتب<span class="required">*</span></label>
                                        <input type="text" name="amount" class="form-control">
                                        @error('amount')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> وصف الوظيفة <span class="required">*</span></label>
                                        <textarea class="form-control" name="description" rows="5"></textarea>
                                        @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer" style="justify-content: right;">
                                <button class="btn btn-info" type="submit">@lang('site.save')</button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="row">
                        <form action="{{ route('job-customer.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            {{ method_field('post') }}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">إسم الوظيفه<span class="required">*</span></label>
                                        <input type="text" name="type_job" class="form-control">
                                        @error('type_job')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">الموقع<span class="required">*</span></label>
                                        <input type="text" name="location" class="form-control">
                                        @error('location')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">دوام العمل<span class="required">*</span></label>
                                        <select name="type_time" class="form-control select2-no-search">
                                            <option value="" selected>-- اختر دوام العمل --</option>
                                            @foreach (typeTime() as $key => $item)
                                                <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                        @error('type_time')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">الراتب<span class="required">*</span></label>
                                        <input type="text" name="amount" class="form-control">
                                        @error('amount')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> وصف الوظيفة <span class="required">*</span></label>
                                        <textarea class="form-control" name="description" rows="5"></textarea>
                                        @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">إسم الشركة<span class="required">*</span></label>
                                        <input type="text" name="name_commpany" class="form-control">
                                        @error('name_commpany')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">ايميل الشركة<span class="required">*</span></label>
                                        <input type="email" name="email" class="form-control">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">شعار الشركة</label>
                                    <div class="form-group custom-file">
                                        <input name="image" class="custom-file-input" id="customFile" type="file">
                                        {{-- <label class="custom-file-label" for="customFile">@lang('site.choose-image')</label> --}}
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">معلومات عن الشركة<span class="required">*</span></label>
                                        <textarea class="form-control " name="about_commpany" placeholder="@lang('site.description')" rows="3"></textarea>
                                        @error('about_commpany')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer" style="justify-content: right;">
                                <button class="btn btn-info" type="submit">@lang('site.save')</button>
                            </div>
                        </form>
                    </div>
                @endif
            @else
                <div class="row">
                    <form action="{{ route('job-customer.update', $edit_job->id) }}" method="POST">
                        @csrf
                        {{ method_field('put') }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">الموقع<span class="required">*</span></label>
                                    <input type="text" name="location" value="{{ $edit_job->location }}"
                                        class="form-control">
                                    @error('location')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">إسم الوظيفه<span class="required">*</span></label>
                                    <input type="text" name="type_job" value="{{ $edit_job->type_job }}"
                                        class="form-control">
                                    @error('type_job')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">دوام العمل<span class="required">*</span></label>
                                    <select name="type_time" class="form-control select2-no-search">
                                        <option value="">-- اختر دوام العمل --</option>
                                        @foreach (typeTime() as $key => $item)
                                            <option value="{{ $key }}"
                                                @if ($edit_job->type_time == $key) selected @endif>{{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('type_time')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">الراتب<span class="required">*</span></label>
                                    <input type="text" name="amount" value="{{ $edit_job->amount }}"
                                        class="form-control">
                                    @error('amount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> وصف الوظيفة <span class="required">*</span></label>
                                    <textarea class="form-control" name="description" rows="5">{!! $edit_job->description !!}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer" style="justify-content: right;">
                            <button class="btn btn-info" type="submit">@lang('site.save')</button>
                        </div>
                    </form>
                </div>
            @endif
        @endif

    </div>
    <!-- Jobs End -->





@stop
@section('script')
@stop
