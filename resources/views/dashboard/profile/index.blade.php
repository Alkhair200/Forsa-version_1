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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">@lang('site.all-users')</h2>
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
                        {{-- <td><a class="btn btn-primary" href="{{ route('courses.create') }}"><i
                                    class="fa fa-pulse"></i>@lang('site.add')</a></td> --}}
                        <a class="btn ripple btn-primary" data-target="#modaldemo3" data-toggle="modal"
                            href="">@lang('site.add-profile')</a>

                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>

                    {{-- <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="wd-15p border-bottom-0">@lang('site.name')</th>
                                    <th class="wd-15p border-bottom-0">@lang('site.email')</th>
                                    <th class="wd-25p border-bottom-0">@lang('site.created_at')</th>
                                    <th class="wd-25p border-bottom-0">@lang('site.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($users as $item)
                                    {{ $i++ }}
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td> <a class="btn ripple btn-primary btn-sm" data-target="#edit{{ $item->id }}"
                                                data-toggle="modal" href="">@lang('site.edit')</a>

                                            <a class="btn ripple btn-danger btn-sm" data-target="#delete{{ $item->id }}"
                                                data-toggle="modal" href="">@lang('site.delete')</a>
                                        </td>
                                    </tr>

                                    <!-- edit user -->
                                    <div class="modal" id="edit{{$item->id}}">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">@lang('site.edit-profile')</h6><button
                                                        aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('profile.update', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        {{ method_field('put') }}

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">@lang('site.name')</label>
                                                                    <input type="text" 
                                                                    name="name" class="form-control"
                                                                    value="{{$item->name}}"
                                                                        placeholder="@lang('site.name') ....">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">@lang('site.email')</label>
                                                                    <input type="email" name="email"
                                                                    value="{{$item->email}}"
                                                                     class="form-control"
                                                                        placeholder="@lang('site.email') ....">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="">@lang('site.old-password')</label>
                                                                    <input type="password" name="old_password"
                                                                        class="form-control"
                                                                        placeholder="@lang('site.password') ....">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">@lang('site.new-password')</label>
                                                                    <input type="password" name="new_password"
                                                                        class="form-control"
                                                                        placeholder="@lang('site.password') ....">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">الصلاحية</label>
                                                                    <select name="admin"
                                                                        class="form-control select2-no-search">
                                                                        <option disabled label="--- اختر الصالاحيه ---">
                                                                        <option value="admin">admin</option>
                                                                        <option value="user">user</option>
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                         </div>

                                                        <div class="modal-footer" style="justify-content: right;">
                                                            <button class="btn ripple btn-success"
                                                                type="submit">@lang('site.save')</button>
                                                            <button class="btn ripple btn-danger" data-dismiss="modal"
                                                                type="button">@lang('site.close')</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End edit user -->

                                    <!-- delete alert message -->
                                    <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <form action="{{ route('profile.destroy', $item->id) }}"
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
                    <!-- add user -->
                    <div class="modal" id="modaldemo3">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">@lang('site.add-profile')</h6><button aria-label="Close"
                                        class="close" data-dismiss="modal" type="button"><span
                                            aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('profile.store') }}" method="POST">
                                        @csrf
                                        {{ method_field('post') }}

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">@lang('site.name')</label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="@lang('site.name') ....">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">@lang('site.email')</label>
                                                    <input type="email" name="email" class="form-control"
                                                        placeholder="@lang('site.email') ....">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">@lang('site.password')</label>
                                                    <input type="password" name="password" class="form-control"
                                                        placeholder="@lang('site.password') ....">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">@lang('site.password-confirmation')</label>
                                                    <input type="password" name="password_confirmation"
                                                        class="form-control" placeholder="@lang('site.password') ....">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">الصلاحية</label>
                                                    <select name="admin"
                                                        class="form-control select2-no-search">
                                                        <option disabled label="--- اختر الصالاحيه ---">
                                                        <option value="admin">admin</option>
                                                        <option value="user">user</option>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                         </div>

                                        <div class="modal-footer" style="justify-content: right;">
                                            <button class="btn ripple btn-success" type="submit">@lang('site.save')</button>
                                            <button class="btn ripple btn-danger" data-dismiss="modal"
                                                type="button">@lang('site.close')</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End add user -->
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

    <script>
        // start data
        use = "strict";

        $(document).on('click', '#send', function(e) {

            e.preventDefault();

            $('#name_error').text('');
            $('#name_en_error').text('');
            $('#phone_error').text('');

            $('.error-msg').css({
                display: "none"
            });

            var formData = new FormData($('#form_data')[0]);

            $.ajax({
                type: "post",
                url: "{{-- route('students.store') --}}",
                cach: false,
                processData: false,
                contentType: false,
                data: formData,

                success: function(data) {

                    $('input[type=text]').val('');

                    $('.error-msg').css({
                        display: "none"
                    });

                    $.each(data, function(key, val) {

                        $('#success').text(val);

                        /* Start add Message */
                        $('.add-message').each(function() {

                            $(this).animate({

                                right: '-5px'
                            }, 1000, function() {

                                $(this).delay(1000).fadeOut();
                            });

                        });
                    });
                },

                error: function(reject) {

                    var response = $.parseJSON(reject.responseText);

                    $.each(response.errors, function(key, val) {

                        $('#' + key + '_error').css({
                            display: "block"
                        });
                        $('#' + key + '_error').text(val);

                    });

                }
            });
        });
        // end add data
    </script>

@endsection
