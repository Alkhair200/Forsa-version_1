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
    @include('layouts.front.singleNav')
    <!-- Navbar End -->

    <!-- Search Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn mystl" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <form action="{{ route('search') }}" method="post">
                @csrf
                {{ method_field('post') }}
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                {{-- <label for="" class="lable">ايميل <span class="required">*</span></label> --}}
                                <input type="text" name="type_job"  class="form-control" placeholder="-- إسم الوظيفة --"
                                style="height: 36px;" value="{{request()->type_job}}">
                                {{-- <select name="type_job" class="form-select border-0">
                                    <option selected disabled>-- إسم الوظيفة --</option>
                                    @foreach (allJobs() as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select> --}}
                            </div>

                            <div class="col-md-4">
                                <select name="location" class="form-select border-0">
                                    <option selected disabled>-- المنطقه --</option>
                                    @foreach (location() as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <select name="type_time" class="form-select border-0">
                                    <option selected disabled>-- دوام العمل --</option>
                                    @foreach (typeTime() as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-dark border-0 w-100">بحث</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Jobs Start -->
    <div class="container-xxl py-5" id="jobs">
        <div class="container">
            @if (isset($jobs) && $jobs->count() > 0)
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
                                            <small class="text-truncate"><i
                                                    class="far fa-calendar-alt text-primary me-2"></i>
                                                {{ date_format($item->created_at, 'Y-m-d') }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{$jobs->appends(request()->query())->links('vendor.pagination.custom')}}
                        @else
                        <h1 class="text-center mb-5 wow fadeInUp cairo" data-wow-delay="0.1s" style="font-size: 18px; color: #00B074">لا يوجد جرب بحث اخر</h1>

            @endif

            


        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Jobs End -->





@stop
@section('script')

@stop
