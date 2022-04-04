@extends('layouts.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">

    <style>
        .required{
            color: #f03;
            margin-right: 6px
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">كل الوظائف</h2>
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
                    <form action="{{ route('job.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        {{ method_field('post') }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">إسم الوظيفه<span class="required">*</span></label>
                                    <input type="text" name="type_job" class="form-control" 
                                    value="{{ old('type_job') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">الموقع<span class="required">*</span></label>
                                    <input type="text" name="location" class="form-control"
                                    value="{{ old('location') }}">
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
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">الراتب<span class="required">*</span></label>
                                    <input type="text" name="amount" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">إسم الشركة<span class="required">*</span></label>
                                    <input type="text" name="name_commpany" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">الهاتف<span class="required">*</span></label>
                                    <input type="phone" name="phone" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">ايميل الشركة<span class="required">*</span></label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">شعار الشركة</label>
                                <div class="form-group custom-file">
                                    <input name="image" class="custom-file-input" id="customFile" type="file"> <label
                                        class="custom-file-label" for="customFile">@lang('site.choose-image')</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">معلومات عن الشركة<span class="required">*</span></label>
                                    <textarea class="form-control " name="about_commpany" placeholder="@lang('site.description')" rows="3"></textarea>
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
