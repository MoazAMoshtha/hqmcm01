@include('layouts.master')
@section('content')
<style>
    .bg{
        background-image: url("{{ asset('assets/images/bg.jpg') }}")
    }
</style>
<body class="aljazera">
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
    <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapse_target">
        <ul class="navbar-nav mr-auto aljazera">
            <li class="nav-item dropdown">
                @if (Route::has('logout'))

                    <div class="top-right links">
                        @auth
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                               echo  Auth::user()->firstName . " " . Auth::user()->familyName ;
                                ?>
                            </a>
                            <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">الملف الشخصي</a>
                                <a class="dropdown-item" href="#">الاعدادات</a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item">تسجيل الخروج</a>
                            </div>

                        @else
                        @endauth
                    </div>
                @endif
            </li>
            <li class="nav-item">
                @if (Route::has('register'))
                    <div class="top-right links">
                        @auth
                        @else
                            <a href="{{ route('register') }}" class="nav-link">سجل الان</a>
                        @endauth

                    </div>
                @endif

            </li>
            <li>
                @if (Route::has('login'))

                    <div class="top-right links">
                        @auth
                        @else
                            <a href="{{ route('login') }}" class="nav-link"> تسجيل الدخول</a>
                        @endauth
                    </div>
                @endif
            </li>

        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">اتصل بنا</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">من نحن</a>
            </li>
            <li>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ادارة
                    </a>
                    <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#mosqueFun" onclick="showManger()">المساجد</a>
                        <a class="dropdown-item" href="#groupFun" onclick="showManger()">الحلقات</a>
                        <a class="dropdown-item" href="#teacherFun" onclick="showManger()">المحفظين</a>
                        <a class="dropdown-item" href="#studentFun" onclick="showManger()">الطلاب</a>
                    </div>
                </div>

                @if (isset(Auth::user()->user_type))
                    @if(Auth::user()->user_type != 'student')

                    @endif
                @endif

            </li>
            <li>
                @if (isset(Auth::user()->user_type))
                    @if(Auth::user()->user_type == 'teacher')
                    <div class="top-right links">
                        @auth
                            <a href="{{ route('daily_followup')}}" class="nav-link">المتابعة اليومية</a>
                        @else
                        @endauth
                    </div>
                    @endif
                @endif

            </li>
            <li class="nav-item">

                <a href="{{route('welcome')}}" class="nav-link  ">الرئيسية</a>
            </li>
        </ul>
    </div>
</nav>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
