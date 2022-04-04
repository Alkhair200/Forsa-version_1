<div class="dropdown nav-item main-header-message ">
    <a class="new nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
            </path>
            <polyline points="22,6 12,13 2,6"></polyline>
        </svg><span class=" pulse-danger"></span></a>
    <div class="dropdown-menu">
        <div class="menu-header-content bg-primary text-right">
            <div class="d-flex">
                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">@lang('about.msg-notiy')</h6>
                {{--  <span class="badge badge-pill badge-warning mr-auto my-auto float-left">Mark All
                    Read</span>  --}}
            </div>
            <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have {{$contact->count()}} unread
                messages</p>
        </div>
        <div class="main-message-list chat-scroll">
            @foreach ($contact as $val)
            <a href="#" class="p-3 d-flex border-bottom">
                <div class="  drop-img  cover-image  "
                    data-image-src="{{ URL::asset('assets/img/faces/3.jpg') }}">
                    <span class="avatar-status bg-teal"></span>
                </div>
                <div class="wd-90p">
                    <div class="d-flex">
                        <h5 class="mb-1 name">{{$val->name}}</h5>
                    </div>
                    <p class="mb-0 desc">{{$val->msg = Str::limit($val->msg , 53, '.....')}}</p>
                    <p class="time mb-0 text-left float-right mr-2 mt-2">{{$val->created_at->format("F j, Y, g:i a");  }}</p>
                </div>
            </a>
            @endforeach
        </div>
        <div class="text-center dropdown-footer">
            <a href="{{route('contact-us.index')}}">@lang('about.vew-all')</a>
        </div>
    </div>
</div>
