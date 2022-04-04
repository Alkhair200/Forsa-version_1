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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">تعديل</h2>
                <br>
                @include('partials._errors')

            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <td><a class="btn btn-success" href="{{ route('job.index') }}"><i class="fa fa-pulse"></i>قائمة
                                الوظائف</a></td>


                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>

                    {{-- <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p> --}}
                </div>
                <div class="card-body">
                    <form action="{{ route('job.update', $job->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        {{ method_field('put') }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">إسم الوظيفه</label>
                                    <input type="text" name="type_job" value="{{ $job->type_job }}"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">الموقع</label>
                                    <input type="text" name="location" value="{{ $job->location }}"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">دوام العمل</label>
                                    <select name="type_time" class="form-control select2-no-search">
                                        <option value="">-- اختر دوام العمل --</option>
                                        @foreach (typeTime() as $key => $item)
                                            <option value="{{ $key }}"
                                                @if ($job->type_time == $key) selected @endif>{{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">الراتب</label>
                                    <input type="text" name="amount" value="{{ $job->amount }}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">الحالة</label>
                                    <select name="status" class="form-control select2-no-search">
                                        <option value="">-- اختر الحاله --</option>
                                        @foreach (typeStatus() as $key => $item)
                                            <option value="{{ $key }}"
                                                @if ($job->status == $key) selected @endif>{{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer" style="justify-content: right;">
                            <button class="btn ripple btn-info" type="submit">@lang('site.save')</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--/div-->
        </div>
        <!-- /row -->
    @endsection
    @section('js')
        <!-- Internal Data tables -->
        <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
        <!--Internal  Datatable js -->
        <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    @endsection
