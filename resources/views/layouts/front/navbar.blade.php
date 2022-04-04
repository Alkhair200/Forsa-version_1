<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">FORSA</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
        @guest
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="btn btn-primary rounded-0 py-4 px-lg-5  d-lg-block">دخول<i
                        class="fa fa-arrow-right ms-3"></i></a>
            @endif


            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="btn btn-primary rounded-0 py-4 px-lg-5  d-lg-block" href="{{ route('register') }}">تسجيل</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a href="{{ route('job-customer.index') }}" class="dropdown-item color-white">لوحة التحكم</a>

                    <a class="dropdown-item color-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        {{ __('site.logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest

        <a href="#contact-us" class="nav-item nav-link">تواصل معنا</a>
        <a href="#jobs" class="nav-link nav-link">الوظائف</a>
        <a href="#about-us" class="nav-item nav-link">عنا</a>
        <a href="/" class="nav-item nav-link active"> الرئيسية </a>
    </div>
</div>
</nav>
<!-- Navbar End -->
