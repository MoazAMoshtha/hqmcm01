@include('includes.navbar')

    <div class="float-right navbar-dark bg-dark" style="width: 15%">
        <ul class="navbar-nav text-right mr-3">
            <li class="navbar-brand"><a class="nav-link"
                                        href="">{{Auth::user()->firstName . " " . Auth::user()->familyName}}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('admin.dashboard')}}">الاحصائيات</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('area_fun')}}">ادارة المناطق</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('area_admin_fun')}}">ادارة مشرفي المناطق</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('mosque_fun')}}">ادارة المساجد</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('mosque_admin_fun')}}">ادارة مشرفي المساجد</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('group_fun')}}">ادارة الحلقات</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('teacher_fun')}}">ادارة المحفظين</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('students_fun')}}">ادارة الطلاب</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('register')}}">مستخدم جديد</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"> تسجيل الخروج </a>
            <li class="nav-item text-white mb-5 pt-5 mt-5 pb-4">{{ date('Y-m-d H:i:s')}}</li>
        </ul>
    </div>


        <div>
            @yield('content')
        </div>




