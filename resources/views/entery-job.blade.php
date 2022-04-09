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
    @include('layouts.front.singleNav')
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
