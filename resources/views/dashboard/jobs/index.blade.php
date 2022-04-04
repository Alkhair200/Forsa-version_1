@extends('layouts.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">

    <style>
        .error-msg {
            display: none;
        }

        /* Start update Message */
        .update-message {
            padding: 10px;
            color: #fff;
            width: 283px;
            font-size: 20px;
            text-align: center;
            background-color: rgba(60, 231, 79, 0.81);
            position: fixed;
            right: -600px;
            top: 29px;
            z-index: 99999;
            border-radius: 6px;
            text-align: center;
            box-shadow: 1px 0px 22px 2px #2cff00;
        }

        /* End update Message */


        /* Start add Message */
        .add-message {
            padding: 10px;
            color: #fff;
            width: 283px;
            font-size: 20px;
            text-align: center;
            background-color: rgba(60, 231, 79, 0.81);
            position: fixed;
            right: -600px;
            top: 29px;
            z-index: 99999;
            border-radius: 6px;
            text-align: center;
            box-shadow: 1px 0px 22px 2px #2cff00;
        }

        /* End add Message */

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
                        <td><a class="btn btn-primary" href="{{ route('job.create') }}"><i
                                    class="fa fa-pulse"></i>@lang('site.add')</a></td>


                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>

                    {{-- <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if (isset($jobs) && $jobs->count() != 0)
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="wd-15p border-bottom-0">إسم الشركة</th>
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
                                    @foreach ($jobs as $item)
                                        <tr>
                                            <td> {{ $i++ }}</td>
                                            <td>{{ $item->commpany->name_commpany }}</td>
                                            <td>{{ $item->type_job }}</td>
                                            <td>{{ $item->location }}</td>
                                            <td>{{ $item->getTypeTime() }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ date_format($item->created_at,'Y-m-d' )}}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                <a type="button" class="btn btn-success btn-sm" href="{{ route('change-status',$item->id) }}"><i
                                                    class="fa fa-sitting"></i>{{ $item->getTypeStatus()}}</a>
                                                @else
                                                <a type="button" class="btn btn-danger btn-sm" href="{{ route('change-status',$item->id) }}"><i
                                                    class="fa fa-sitting"></i>{{ $item->getTypeStatus()}}</a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown show">
                                                    <a class="btn btn-info btn-sm dropdown-toggle" role="button"
                                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" href="#">العمليات</a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a href="{{ route('job.edit', $item->id) }}"
                                                            class="dropdown-item">
                                                            <i style="color: rgb(10, 197, 4)"
                                                                class="fa fa-edit"></i>&nbsp;تعديل البيانات   
                                                        </a>                                                     </a>

                                                        <a type="button" style="cursor: pointer" class="dropdown-item"
                                                            data-toggle="modal" data-target="#delete{{ $item->id }}"
                                                            title="حذف">
                                                            <i style="color: #f03" class="fa fa-trash"></i>&nbsp;حذف
                                                            بيانات
                                                        </a>

                                                        <a href="{{ route('commpany.show', $item->commpany_id) }}"
                                                            class="dropdown-item">
                                                            <i style="color: rgb(10, 197, 4)"
                                                                class="fa fa-eye"></i>&nbsp;معلومات الشركة    
                                                        </a>     
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- delete alert message -->
                                        <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif; color: #f03"
                                                            class="modal-title" id="exampleModalLabel">
                                                            @lang('site.delete-this') ! 
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
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
                        @endif

                        @if (isset($active_job))
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="wd-15p border-bottom-0">إسم الشركة</th>
                                        <th class="wd-15p border-bottom-0">إسم الوظيفه</th>
                                        <th class="wd-15p border-bottom-0">الموقع</th>
                                        <th class="wd-10p border-bottom-0">دوام العمل</th>
                                        <th class="wd-15p border-bottom-0">الراتب</th>
                                        <th class="wd-15p border-bottom-0">شعار الشركة</th>
                                        <th class="wd-15p border-bottom-0">تاريخ الإضافة</th>
                                        <th class="wd-15p border-bottom-0">العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1; ?>
                                    @foreach ($active_job as $item)
                                        <tr>
                                            <td> {{ $i++ }}</td>
                                            <td>{{ $item->commpany->name_commpany }}</td>
                                            <td>{{ $item->type_job }}</td>
                                            <td>{{ $item->location }}</td>
                                            <td>{{ $item->type_time }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td><img src="{{ $item->image_path }}" alt="@lang('site.image')" width="40px"
                                                    height="40px"></td>
                                            <td>{{ $item->created_at }}</td>
                                            <td> <a class="btn ripple btn-primary btn-sm"
                                                    href="{{ route('job.edit', $item->id) }}">@lang('site.edit')</a>

                                                <a class="btn ripple btn-danger btn-sm"
                                                    data-target="#delete{{ $item->id }}" data-toggle="modal"
                                                    href="">@lang('site.delete')</a>
                                            </td>
                                        </tr>

                                        <!-- delete alert message -->
                                        <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif; color: #f03"
                                                            class="modal-title" id="exampleModalLabel">
                                                            ! @lang('site.delete-this')
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
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
                        @endif

                        @if (isset($not_active_job) && $not_active_job->count() != 0)
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="wd-15p border-bottom-0">إسم الشركة</th>
                                        <th class="wd-15p border-bottom-0">إسم الوظيفه</th>
                                        <th class="wd-15p border-bottom-0">الموقع</th>
                                        <th class="wd-10p border-bottom-0">دوام العمل</th>
                                        <th class="wd-15p border-bottom-0">الراتب</th>
                                        <th class="wd-15p border-bottom-0">شعار الشركة</th>
                                        <th class="wd-15p border-bottom-0">تاريخ الإضافة</th>
                                        <th class="wd-15p border-bottom-0">العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($not_active_job as $item)
                                        <tr>
                                            <td> {{ $i++ }}</td>
                                            <td>{{ $item->commpany->name_commpany }}</td>
                                            <td>{{ $item->type_job }}</td>
                                            <td>{{ $item->location }}</td>
                                            <td>{{ $item->type_time }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td><img src="{{ $item->image_path }}" alt="@lang('site.image')" width="40px"
                                                    height="40px"></td>
                                            <td>{{ $item->created_at }}</td>
                                            <td> <a class="btn ripple btn-primary btn-sm"
                                                    href="{{ route('job.edit', $item->id) }}">@lang('site.edit')</a>

                                                <a class="btn ripple btn-danger btn-sm"
                                                    data-target="#delete{{ $item->id }}" data-toggle="modal"
                                                    href="">@lang('site.delete')</a>
                                            </td>
                                        </tr>

                                        <!-- delete alert message -->
                                        <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif; color: #f03"
                                                            class="modal-title" id="exampleModalLabel">
                                                            ! @lang('site.delete-this')
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
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
                        @endif
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
