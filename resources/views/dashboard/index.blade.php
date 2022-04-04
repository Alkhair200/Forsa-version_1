@extends('layouts.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">@lang('site.welcome-back')</h2>
                {{-- <p class="mg-b-0">Sales monitoring dashboard template.</p> --}}
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">عدد المشتركين</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{-- $students->count() --}}</h4>
                                {{-- <p class="mb-0 tx-12 text-white op-7">Compared to last week</p> --}}
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                                <span class="text-white op-7"> {{ $users->count()}}%</span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">الوظائف المفعله</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{-- $courses->count() --}}</h4>
                                {{-- <p class="mb-0 tx-12 text-white op-7">Compared to last week</p> --}}
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                                <span class="text-white op-7"> {{ $active_jobs->count() }}%</span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">الوظائف الغير مفعله</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{-- $users->count() --}}</h4>
                                {{-- <p class="mb-0 tx-12 text-white op-7">Compared to last week</p> --}}
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                                <span class="text-white op-7"> {{ $not_active_jobs->count() }}%</span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm row-deck">
        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <h6 class="card-title">@lang('site.last-courses')</h6>
                {{-- <span class="d-block mg-b-10 text-muted tx-12">Sales performance revenue based by country</span> --}}
                <div class="list-group">
                    {{-- @foreach ( $courses as $item) --}}
                        <div class="list-group-item border-top-0">
                            <img src="{{-- $item->image_path --}}" alt="image"
                                style="width: 50px;height: 44px; border-radius: 22px;" srcset="">
                            <p>{{-- $item->name --}}</p><span>{{-- $item->price --}} جنيه</span>
                        </div>
                    {{-- @endforeach --}}
					<a class="btn ripple btn-primary btn-sm"  href="{{-- route('courses.index') --}}">@lang('site.all-courses')</a>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8 col-xl-8">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-1">@lang('site.last-payments')</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                {{-- <span class="tx-12 tx-muted mb-3 ">This is your most recent earnings for today's date.</span> --}}
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                            <tr>
								<th>#</th>
                                <th class="wd-15p border-bottom-0">@lang('site.students')</th>
                                <th class="wd-15p border-bottom-0">@lang('site.course-name')</th>
                                <th class="wd-20p border-bottom-0">@lang('site.operation-number')</th>
                                <th class="wd-20p border-bottom-0">@lang('site.amount')</th>
                                <th class="wd-20p border-bottom-0">@lang('site.notice')</th>
                                <th class="wd-25p border-bottom-0">@lang('site.created_at')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            {{-- @foreach ($payments as $item)
                                {{ $i++ }}
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $item->full_name }}</td>
                                    <td>{{ $item->courses->name }}</td>
                                    <td>{{ $item->operation_num }}</td>
                                    <td>{{ $item->price }} @lang('site.currncy')</td>
                                    <td><img src="{{ $item->image_path }}" alt="image" srcset=""></td>
                                    <td>{{ $item->created_at }}</td>
                                </tr> --}}
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
<br>
					<a class="btn ripple btn-info btn-sm"  href="{{-- route('payments.index') --}}">@lang('site.all-payments')
                    </a>

                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
    </div>
    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
@endsection
