<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">FORSA</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">

        <div class="small-link">
            <a href="/" class="nav-item nav-link"> العودة الي القائمة الرئيسية </a>
            </div>

        <div class="navbar-nav ms-auto p-4 p-lg-0 big-link">
            <a href="/" class="nav-item nav-link "> العودة الي القائمة الرئيسية </a>
        </div>

    @guest
    @if (Route::has('login'))

    <div class="small-link">
        <a href="{{ route('login') }}" class="nav-item nav-link">الدخول</a>
        </div>

        <div class="big-link">
        <a href="{{ route('login') }}" class="btn btn-primary rounded-0 py-4 px-lg-5  d-lg-block"><i
                class="fa fa-arrow-left ms-3"></i>الدخول</a>
        </div>
    @endif

    @if (Route::has('register'))

    <div class="small-link">
        <a class="nav-item nav-link" href="{{ route('register') }}">تسجيل</a>
        </div>

        <div class="big-link">
            <a class="btn btn-primary rounded-0 py-4 px-lg-5  d-lg-block" href="{{ route('register') }}">تسجيل</a>
        </div>
    @endif
@else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a href="{{ route('job-customer.index') }}" class="dropdown-item color-white">لوحة التحكم</a>

            <a class="dropdown-item color-white" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                                                                                    document.getElementById('logout-form').submit();">
                {{ __('site.logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
@endguest
</nav>