@extends('layouts.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">

    <style>
        #multiCollapseExample1,#multiCollapseExample2,#multiCollapseExample3{
            padding: 30px 10px;
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{ $commpany_info->name_commpany }}</h2>
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

                    </div>

                    {{-- <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p> --}}
                </div>
                <div class="card-body">
                    <div>
                        <div class="btn-list">
                            <a aria-controls="multiCollapseExample1" aria-expanded="false"
                                class="btn ripple btn-primary mb-3 mb-xl-0"  data-toggle="collapse"
                                href="#multiCollapseExample1" 
                                role="button">معلومات المشترك</a>

                            <a aria-controls="multiCollapseExample2" aria-expanded="false"
                                class="btn ripple btn-success mb-3 mb-xl-0" href="#multiCollapseExample2"
                                data-toggle="collapse" 
                                role="button">وظائف مفعله</a>

                            <a aria-controls="multiCollapseExample3" aria-expanded="false"
                                class="btn ripple btn-danger mb-3 mb-xl-0" href="#multiCollapseExample3" 
                                data-toggle="collapse"
                                role="button">وظائف بإنتظار التفعيل</a>
                        </div>
                        <div class="collapse multi-collapse" id="multiCollapseExample1">

                            <form action="{{ route('commpany.update', $commpany_info->id) }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                {{ method_field('put') }}

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">إسم المشترك</label>
                                            <input type="text" name="name_commpany"
                                                value="{{ $commpany_info->name_commpany }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">ايميل المشترك</label>
                                            <input type="text" name="email"
                                                value="{{ $commpany_info->email }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">شعار الشركة</label>
                                        <div class="form-group custom-file">
                                            <input name="image" class="custom-file-input" id="customFile"
                                                type="file"> <label class="custom-file-label"
                                                for="customFile">@lang('site.choose-image')</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">معلومات عن الشركة</label>
                                            <textarea class="form-control " name="about_commpany" placeholder="@lang('site.description')"
                                                rows="3">{!! $commpany_info->about_commpany !!}</textarea>
                                            @error('about_commpany')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer" style="justify-content: right;">
                                    <button class="btn ripple btn-info"
                                        type="submit">@lang('site.save')</button>
                                </div>
                            </form>
                        </div>

                        <div class="collapse multi-collapse" id="multiCollapseExample2">
                            <table class="table text-md-nowrap btn-success" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="wd-15p border-bottom-0">إسم الوظيفه</th>
                                        <th class="wd-15p border-bottom-0">الموقع</th>
                                        <th class="wd-10p border-bottom-0">دوام العمل</th>
                                        <th class="wd-15p border-bottom-0">الراتب</th>
                                        <th class="wd-15p border-bottom-0">تاريخ الإضافة</th>
                                        <th class="wd-15p border-bottom-0">الحالة</th>
                                        <th class="wd-15p border-bottom-0">العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($active_job as $item)
                                        <tr>
                                            <td> {{ $i++ }}</td>
                                            <td>{{ $item->type_job }}</td>
                                            <td>{{ $item->location }}</td>
                                            <td>{{ $item->getTypeTime() }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ date_format($item->created_at, 'Y-m-d') }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <a type="button" class="btn btn-success btn-sm"
                                                        href="{{ route('change-status', $item->id) }}"><i
                                                            class="fa fa-sitting"></i>{{ $item->getTypeStatus() }}</a>
                                                @else
                                                    <a type="button" class="btn btn-danger btn-sm"
                                                        href="{{ route('change-status', $item->id) }}"><i
                                                            class="fa fa-sitting"></i>{{ $item->getTypeStatus() }}</a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown show">
                                                    <a class="btn btn-info btn-sm dropdown-toggle" role="button"
                                                        id="dropdownMenuLink" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        href="#">العمليات</a>
                                                    <div class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuLink">
                                                        <a href="{{ route('job.edit', $item->id) }}"
                                                            class="dropdown-item">
                                                            <i style="color: rgb(10, 197, 4)"
                                                                class="fa fa-edit"></i>&nbsp;تعديل البيانات
                                                        </a> </a>

                                                        <a type="button" style="cursor: pointer"
                                                            class="dropdown-item" data-toggle="modal"
                                                            data-target="#delete{{ $item->id }}"
                                                            title="حذف">
                                                            <i style="color: #f03"
                                                                class="fa fa-trash"></i>&nbsp;حذف
                                                            بيانات
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- delete alert message -->
                                        <div class="modal fade" id="delete{{ $item->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif; color: #f03"
                                                            class="modal-title" id="exampleModalLabel">
                                                            @lang('site.delete-this') !
                                                        </h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- add_form -->
                                                        <form action="{{ route('job.destroy', $item->id) }}"
                                                            method="POST">
                                                            {{ method_field('delete') }}
                                                            @csrf

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-info"
                                                            data-dismiss="modal">@lang('site.close')</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">@lang('site.continue')</button>
                                                    </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End delete alert message -->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="collapse multi-collapse" id="multiCollapseExample3">
                            <table class="table text-md-nowrap btn-danger">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="wd-15p border-bottom-0">إسم الوظيفه</th>
                                        <th class="wd-15p border-bottom-0">الموقع</th>
                                        <th class="wd-10p border-bottom-0">دوام العمل</th>
                                        <th class="wd-15p border-bottom-0">الراتب</th>
                                        <th class="wd-15p border-bottom-0">تاريخ الإضافة</th>
                                        <th class="wd-15p border-bottom-0">الحالة</th>
                                        <th class="wd-15p border-bottom-0">العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($not_active_job as $item)
                                        <tr>
                                            <td> {{ $i++ }}</td>
                                            <td>{{ $item->type_job }}</td>
                                            <td>{{ $item->location }}</td>
                                            <td>{{ $item->getTypeTime() }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ date_format($item->created_at, 'Y-m-d') }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <a type="button" class="btn btn-success btn-sm"
                                                        href="{{ route('change-status', $item->id) }}"><i
                                                            class="fa fa-sitting"></i>{{ $item->getTypeStatus() }}</a>
                                                @else
                                                    <a type="button" class="btn btn-danger btn-sm"
                                                        href="{{ route('change-status', $item->id) }}"><i
                                                            class="fa fa-sitting"></i>{{ $item->getTypeStatus() }}</a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown show">
                                                    <a class="btn btn-info btn-sm dropdown-toggle" role="button"
                                                        id="dropdownMenuLink" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        href="#">العمليات</a>
                                                    <div class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuLink">
                                                        <a href="{{ route('job.edit', $item->id) }}"
                                                            class="dropdown-item">
                                                            <i style="color: rgb(10, 197, 4)"
                                                                class="fa fa-edit"></i>&nbsp;تعديل البيانات
                                                        </a> </a>

                                                        <a type="button" style="cursor: pointer"
                                                            class="dropdown-item" data-toggle="modal"
                                                            data-target="#delete{{ $item->id }}"
                                                            title="حذف">
                                                            <i style="color: #f03"
                                                                class="fa fa-trash"></i>&nbsp;حذف
                                                            بيانات
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- delete alert message -->
                                        <div class="modal fade" id="delete{{ $item->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif; color: #f03"
                                                            class="modal-title" id="exampleModalLabel">
                                                            @lang('site.delete-this') !
                                                        </h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- add_form -->
                                                        <form action="{{ route('job.destroy', $item->id) }}"
                                                            method="POST">
                                                            {{ method_field('delete') }}
                                                            @csrf

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-info"
                                                            data-dismiss="modal">@lang('site.close')</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">@lang('site.continue')</button>
                                                    </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End delete alert message -->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

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
