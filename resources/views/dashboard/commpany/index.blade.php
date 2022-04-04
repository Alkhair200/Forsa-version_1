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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">كل المشتركين</h2>
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

                </div>
                <div class="card-body">
                    @if (isset($users))
                        <div class="table-responsive">
                            @if (isset($users) && $users->count() != 0)
                                <table class="table text-md-nowrap" id="example1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="wd-15p border-bottom-0">إسم المشترك</th>
                                            <th class="wd-15p border-bottom-0">ايميل</th>
                                            <th class="wd-15p border-bottom-0">تاريخ الإشتراك</th>
                                            <th class="wd-15p border-bottom-0">الحالة</th>
                                            <th class="wd-15p border-bottom-0">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($users as $item)
                                            <tr>
                                                <td> {{ $i++ }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ date_format($item->created_at, 'Y-m-d') }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <a type="button" class="btn btn-success btn-sm"
                                                            href="{{ route('commpany-active', $item->id) }}"><i
                                                                class="fa fa-sitting"></i>{{ $item->getUserStatus() }}</a>
                                                    @else
                                                        <a type="button" class="btn btn-danger btn-sm"
                                                            href="{{ route('commpany-active', $item->id) }}"><i
                                                                class="fa fa-sitting"></i>{{ $item->getUserStatus() }}</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-info btn-sm dropdown-toggle" role="button"
                                                            id="dropdownMenuLink" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false" href="#">العمليات</a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a href="{{ route('commpany.edit', $item->id) }}"
                                                                class="dropdown-item">
                                                                <i style="color: rgb(10, 197, 4)"
                                                                    class="fa fa-edit"></i>&nbsp;تعديل البيانات
                                                            </a> </a>

                                                            <a type="button" style="cursor: pointer" class="dropdown-item"
                                                                data-toggle="modal"
                                                                data-target="#delete{{ $item->id }}" title="حذف">
                                                                <i style="color: #f03" class="fa fa-trash"></i>&nbsp;حذف
                                                                بيانات
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
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- add_form -->
                                                            <form action="{{ route('commpany.destroy', $item->id) }}"
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
                    @elseif(isset($users_not_active))
                        <div class="table-responsive">
                            @if (isset($users_not_active) && $users_not_active->count() != 0)
                                <table class="table text-md-nowrap btn-danger" id="example1">
                                    <thead>
                                        <tr>
                                            <th >#</th>
                                            <th class="wd-15p border-bottom-0">إسم المشترك</th>
                                            <th class="wd-15p border-bottom-0">ايميل</th>
                                            <th class="wd-15p border-bottom-0">تاريخ الإشتراك</th>
                                            <th class="wd-15p border-bottom-0">الحالة</th>
                                            <th class="wd-15p border-bottom-0">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($users_not_active as $item)
                                            <tr>
                                                <td> {{ $i++ }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ date_format($item->created_at, 'Y-m-d') }}</td>
                                                <td>
                                                    <a type="button" class="btn btn-danger btn-sm"
                                                        href="{{ route('commpany-active', $item->id) }}"><i
                                                            class="fa fa-sitting"></i>{{ $item->getUserStatus() }}</a>
                                                </td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-info btn-sm dropdown-toggle" role="button"
                                                            id="dropdownMenuLink" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false" href="#">العمليات</a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a href="{{ route('job.edit', $item->id) }}"
                                                                class="dropdown-item">
                                                                <i style="color: rgb(10, 197, 4)"
                                                                    class="fa fa-edit"></i>&nbsp;تعديل البيانات
                                                            </a> </a>

                                                            <a type="button" style="cursor: pointer" class="dropdown-item"
                                                                data-toggle="modal"
                                                                data-target="#delete{{ $item->id }}" title="حذف">
                                                                <i style="color: #f03" class="fa fa-trash"></i>&nbsp;حذف
                                                                بيانات
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
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- add_form -->
                                                            <form action="{{ route('commpany.destroy', $item->id) }}"
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
                    @endif
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
