@extends('layouts.' . $layout)
@section('content')
    @include('operationStatus.area_add_status')




    <?php
    if (session('status') == 'editTeacher') {
        $active = 'active';
        $show = 'show';
        $d = '#nav-update';
        $active2 = $show2 = $m = '';
    } elseif (session('status') == 'editTeacher') {
        $active = 'active';
        $show = 'show';
        $m = '#nav-updateTeacher';
        $active2 = $show2 = $d = '';
    } else {
        $active = $show = $d = $m = '';
        $active2 = 'active';
        $show2 = 'show';
    }
    if (isset($_GET['teachers'])) {
        $teacher = $_GET['teachers'];
    } else {
        $teacher = [0, 0, 0, 0, 0];
    }
    ?>

    <div class="row justify-content-center">
        <div class="card h-100 w-100">
            <div class="card-body text-right">
                <div>
                    <h2 class="text-right">ادارة المحفظين</h2>

                    <nav>
                        <div class="nav nav-tabs justify-content-end" id="nav-tab" role="tablist">

                            <a class="nav-item nav-link <?php echo $active ?>" id="nav-updateTeacher-tab"
                               data-toggle="tab"
                               href="{{$m}}" role="tab" aria-controls="nav-updateTeacher" aria-selected="true">تعديل
                                محفظ</a>

                            <a class="nav-item nav-link " id="nav-addTeacher-tab" data-toggle="tab"
                               href="#nav-addTeacher"
                               role="tab" aria-controls="nav-addTeacher" aria-selected="false">اضافة محفظ</a>

                            <a class="nav-item nav-link <?php echo $active2 ?>" id="nav-viewTeacher-tab"
                               data-toggle="tab"
                               href="#nav-viewTeacher" role="tab" aria-controls="nav-viewTeacher" aria-selected="false">عرض
                                المحفظين</a>

                        </div>
                    </nav>

                    <div class="tab-content text-right" id="nav-tabContent">

                        <!--تعديل محفظ-->
                        <div class="tab-pane fade <?php echo $active . " " . $show?>" id="nav-updateTeacher"
                             role="tabpanel"
                             aria-labelledby="nav-updateTeacher-tab">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <form method="post" action="/edit/{{$teacher[0]['id']}}">
                                            @csrf
                                            <!--الاسم الأول-->
                                                <div class="form-group row justify-content-lg-center">
                                                    <div class="col-lg-4">

                                                    </div>

                                                    <label for="firstName"
                                                           class="col-lg-3 col-md-4 col-form-label text-right">{{ __('الاسم الأول') }}</label>

                                                    <div class=" col-md-7">
                                                        <input id="firstName" type="text"
                                                               class="text-right form-control @error('firstName') is-invalid @enderror"
                                                               name="firstName"
                                                               value="<?php if (isset($teacher[0]['firstName'])) {
                                                                   echo $teacher[0]['firstName'];
                                                               } ?>" required
                                                               autocomplete="firstName" autofocus>

                                                        @error('firstName')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!--الاسم الثاني-->
                                                <div class="form-group row justify-content-lg-center">
                                                    <div class="col-lg-4">

                                                    </div>

                                                    <label for="secondName"
                                                           class="col-lg-3 col-md-4 col-form-label text-right">{{ __('الاسم الثاني') }}</label>

                                                    <div class=" col-md-7">
                                                        <input id="secondName" type="text"
                                                               class="text-right form-control @error('secondName') is-invalid @enderror"
                                                               name="secondName"
                                                               value="<?php if (isset($teacher[0]['secondName'])) {
                                                                   echo $teacher[0]['secondName'];
                                                               } ?>" required
                                                               autocomplete="secondName" autofocus>

                                                        @error('secondName')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!--اسم العائلة-->
                                                <div class="form-group row justify-content-lg-center">
                                                    <div class="col-lg-4">

                                                    </div>

                                                    <label for="familyName"
                                                           class="col-lg-3 col-md-4 col-form-label text-right">{{ __('اسم العائلة') }}</label>

                                                    <div class=" col-md-7">
                                                        <input id="familyName" type="text"
                                                               class="text-right form-control @error('familyName') is-invalid @enderror"
                                                               name="familyName"
                                                               value="<?php if (isset($teacher[0]['familyName'])) {
                                                                   echo $teacher[0]['familyName'];
                                                               } ?>" required
                                                               autocomplete="familyName" autofocus>

                                                        @error('familyName')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!--رقم الهوية-->
                                                <div class="form-group row justify-content-lg-center">
                                                    <div class="col-lg-4">

                                                    </div>

                                                    <label for="id_number"
                                                           class="col-lg-3 col-md-4 col-form-label text-right">{{ __('رقم الهوية') }}</label>

                                                    <div class=" col-md-7">
                                                        <input id="id_number" type="text"
                                                               class="text-right form-control @error('id_number') is-invalid @enderror"
                                                               name="id_number"
                                                               value="<?php if (isset($teacher[0]['id_number'])) {
                                                                   echo $teacher[0]['id_number'];
                                                               } ?>" required
                                                               autocomplete="id_number" autofocus>

                                                        @error('id_number')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!--الايميل-->
                                                <div class="form-group row justify-content-lg-center">
                                                    <div class="col-lg-4">

                                                    </div>

                                                    <label for="email"
                                                           class="col-md-3 col-form-label text-right">{{ __('الايميل') }}</label>

                                                    <div class="col-md-7">
                                                        <input id="email" type="email"
                                                               class="form-control @error('email') is-invalid @enderror"
                                                               name="email"
                                                               value="<?php if (isset($teacher[0]['email'])) {
                                                                   echo $teacher[0]['email'];
                                                               } ?>" autocomplete="email"
                                                               placeholder="مطلوب لاعادة تعيين كلمة المرور">

                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!--رقم الجوال-->
                                                <div class="form-group row justify-content-lg-center">
                                                    <div class="col-lg-4">

                                                    </div>

                                                    <label for="phoneNumber"
                                                           class="col-lg-3 col-md-4 col-form-label text-right">{{ __('رقم الجوال') }}</label>

                                                    <div class="col-md-7">
                                                        <input placeholder="059/056" id="phoneNumber" type="text"
                                                               class="text-right form-control @error('phoneNumber') is-invalid @enderror"
                                                               name="phoneNumber"
                                                               value="<?php if (isset($teacher[0]['phoneNumber'])) {
                                                                   echo $teacher[0]['phoneNumber'];
                                                               } ?>" required
                                                               autocomplete="phoneNumber">

                                                        @error('phoneNumber')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!--المنطقة-->
                                                @if(Auth::user()->user_type == 'admin')
                                                    <div class="form-group row justify-content-lg-center">
                                                        <div class="col-lg-4">

                                                        </div>

                                                        <label for="area"
                                                               class="col-lg-3 col-md-4 col-form-label text-right">{{ __('المنطقة') }}</label>

                                                        <div class="col-md-7 float-left">
                                                            <select class="form-control text-right c" id="area" name="area">
                                                                <option value="" selected>...</option>
                                                                <?php $areas = \App\Area::all()?>
                                                                @foreach($areas as $area)
                                                                    <option value="{{$area->hqmcm_id}}" name="area">{{ $area->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('area')
                                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                     </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                @else

                                                    <input name="area" value="{{Auth::user()->area}}" hidden>

                                            @endif

                                            <!--المسجد-->
                                                @if(Auth::user()->user_type == 'mosque_admin')
                                                    <input hidden name="mosque" value="{{Auth::user()->mosque}}">
                                                @else
                                                    <div class="form-group row justify-content-lg-center">
                                                        <div class="col-lg-4">
                                                        </div>
                                                        <label for="mosque"
                                                               class="col-lg-3 col-md-4 col-form-label text-right">{{ __('المسجد') }}</label>

                                                        <div class="col-md-7 float-left">
                                                            <select class="form-control text-right c" id="mosque" name="mosque">
                                                                <option value="" selected>...</option>
                                                                <?php
                                                                if (Auth::user()->user_type == 'admin'){
                                                                    $mosques = \App\Mosque::all();

                                                                }elseif(Auth::user()->user_type == 'area_admin'){
                                                                    $mosques = \App\Mosque::where('area' ,Auth::user()->area )->get();
                                                                }
                                                                ?>
                                                                @foreach($mosques as $mosque)
                                                                    <option
                                                                        value="{{$mosque->hqmcm_id }}">{{ $mosque->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('mosque')
                                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                     </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                            @endif

                                                <!--تسجيل-->
                                                <div class="form-group row justify-content-center">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('تسجيل') }}
                                                        </button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--اضافة محفظ-->
                        <div class="tab-pane fade" id="nav-addTeacher" role="tabpanel" aria-labelledby="nav-addTeacher-tab">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card-body">

                                            <form method="POST" action="{{route('register')}}">
                                                <input name="user_type" value="teacher" hidden>
                                                <input name="group" value="0" hidden>
                                            @csrf

                                            <!--الاسم الأول-->
                                                <div class="form-group row justify-content-lg-center">
                                                    <div class="col-lg-4">

                                                    </div>

                                                    <label for="firstName"
                                                           class="col-lg-3 col-md-4 col-form-label text-right">{{ __('الاسم الأول') }}</label>

                                                    <div class=" col-md-7">
                                                        <input id="firstName" type="text"
                                                               class="text-right form-control @error('firstName') is-invalid @enderror"
                                                               name="firstName" value="{{ old('firstName') }}" required
                                                               autocomplete="firstName" autofocus>

                                                        @error('firstName')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!--الاسم الثاني-->
                                                <div class="form-group row justify-content-lg-center">
                                                    <div class="col-lg-4">

                                                    </div>

                                                    <label for="secondName"
                                                           class="col-lg-3 col-md-4 col-form-label text-right">{{ __('الاسم الثاني') }}</label>

                                                    <div class=" col-md-7">
                                                        <input id="secondName" type="text"
                                                               class="text-right form-control @error('secondName') is-invalid @enderror"
                                                               name="secondName" value="{{ old('secondName') }}" required
                                                               autocomplete="secondName" autofocus>

                                                        @error('secondName')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!--اسم العائلة-->
                                                <div class="form-group row justify-content-lg-center">
                                                    <div class="col-lg-4">

                                                    </div>

                                                    <label for="familyName"
                                                           class="col-lg-3 col-md-4 col-form-label text-right">{{ __('اسم العائلة') }}</label>

                                                    <div class=" col-md-7">
                                                        <input id="familyName" type="text"
                                                               class="text-right form-control @error('familyName') is-invalid @enderror"
                                                               name="familyName" value="{{ old('familyName') }}" required
                                                               autocomplete="familyName" autofocus>

                                                        @error('familyName')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!--رقم الهوية-->
                                                <div class="form-group row justify-content-lg-center">
                                                    <div class="col-lg-4">

                                                    </div>

                                                    <label for="id_number"
                                                           class="col-lg-3 col-md-4 col-form-label text-right">{{ __('رقم الهوية') }}</label>

                                                    <div class=" col-md-7">
                                                        <input id="id_number" type="text"
                                                               class="text-right form-control @error('id_number') is-invalid @enderror"
                                                               name="id_number" value="{{ old('id_number') }}" required
                                                               autocomplete="id_number" autofocus>

                                                        @error('id_number')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!--الايميل-->
                                                <div class="form-group row justify-content-lg-center">
                                                    <div class="col-lg-4">

                                                    </div>

                                                    <label for="email"
                                                           class="col-md-3 col-form-label text-right">{{ __('الايميل') }}</label>

                                                    <div class="col-md-7">
                                                        <input id="email" type="email"
                                                               class="form-control @error('email') is-invalid @enderror"
                                                               name="email"
                                                               value="{{ old('email') }}" autocomplete="email"
                                                               placeholder="مطلوب لاعادة تعيين كلمة المرور">

                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!--كلمة السر-->
                                                <input name="password" type="password" hidden value="12345678">

                                                <!--تأكيد كلمة السر-->
                                                <input name="password_confirmation" type="password" hidden value="12345678">

                                                <!--رقم الجوال-->
                                                <div class="form-group row justify-content-lg-center">
                                                    <div class="col-lg-4">

                                                    </div>

                                                    <label for="phoneNumber"
                                                           class="col-lg-3 col-md-4 col-form-label text-right">{{ __('رقم الجوال') }}</label>

                                                    <div class="col-md-7">
                                                        <input placeholder="059/056" id="phoneNumber" type="text"
                                                               class="text-right form-control @error('phoneNumber') is-invalid @enderror"
                                                               name="phoneNumber" value="{{ old('phoneNumber') }}" required
                                                               autocomplete="phoneNumber">

                                                        @error('phoneNumber')
                                                        <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!--المنطقة-->
                                                @if(Auth::user()->user_type == 'admin')
                                                    <div class="form-group row justify-content-lg-center">
                                                        <div class="col-lg-4">

                                                        </div>

                                                        <label for="area"
                                                               class="col-lg-3 col-md-4 col-form-label text-right">{{ __('المنطقة') }}</label>

                                                        <div class="col-md-7 float-left">
                                                            <select class="form-control text-right c" id="area" name="area">
                                                                <option value="" selected>...</option>
                                                                <?php $areas = \App\Area::all()?>
                                                                @foreach($areas as $area)
                                                                    <option value="{{$area->hqmcm_id}}" name="area">{{ $area->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('area')
                                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                     </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                @else

                                                        <input name="area" value="{{Auth::user()->area}}" hidden>

                                            @endif

                                            <!--المسجد-->
                                                @if(Auth::user()->user_type == 'mosque_admin')
                                                    <input hidden name="mosque" value="{{Auth::user()->mosque}}">
                                                @else
                                                    <div class="form-group row justify-content-lg-center">
                                                        <div class="col-lg-4">
                                                        </div>
                                                        <label for="mosque"
                                                               class="col-lg-3 col-md-4 col-form-label text-right">{{ __('المسجد') }}</label>

                                                        <div class="col-md-7 float-left">
                                                            <select class="form-control text-right c" id="mosque" name="mosque">
                                                                <option value="" selected>...</option>
                                                                <?php
                                                                if (Auth::user()->user_type == 'admin'){
                                                                    $mosques = \App\Mosque::all();

                                                                }elseif(Auth::user()->user_type == 'area_admin'){
                                                                    $mosques = \App\Mosque::where('area' ,Auth::user()->area )->get();
                                                                }
                                                                ?>
                                                                @foreach($mosques as $mosque)
                                                                    <option
                                                                        value="{{$mosque->hqmcm_id }}">{{ $mosque->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('mosque')
                                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                     </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                            @endif


                                            <!--تسجيل-->
                                                <div class="form-group row justify-content-center">

                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('تسجيل') }}
                                                    </button>

                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--عرض المحفظين-->
                        <div class="tab-pane fade <?php echo $active2 . " " . $show2?>" id="nav-viewTeacher"
                             role="tabpanel"
                             Teacher
                             aria-labelledby="nav-viewTeacher-tab">
                            <div class="container h-100 w-100">
                                <form method="post" action="{{route('teacher.showTeachers')}}">
                                @csrf

                                <!--تسجيل-->
                                    <div class="form-group row text-center justify-content-center">
                                        <div class="col-lg-12 mt-3">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('تحديث الجدول ') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>


                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>حذف | تعديل</td>
                                        <td scope="col">المسجد</td>
                                        <td scope="col">المنطقة</td>
                                        <td scope="col">رقم الجوال</td>
                                        <td scope="col">الاسم</td>
                                        <td scope="col">#</td>
                                    </tr>
                                    </thead>
                                    @if(Route::currentRouteName() == 'teacher.showTeachers')
                                        @foreach ($teachers as $teacher)
                                            <tbody>
                                            <tr>
                                                <td><a href='delete/{{ $teacher->id }}'>حذف</a><a
                                                        href='edit/{{ $teacher->id }}'>| تعديل</a></td>
                                                <td>{{ \App\Mosque::where('hqmcm_id' , $teacher->mosque)->first()->name }}</td>
                                                <td>{{ \App\Area::where('hqmcm_id' , $teacher->area)->first()->name }}</td>
                                                <td>{{ $teacher->phoneNumber }}</td>

                                                <td>{{ $teacher->firstName . " " . $teacher->secondName . " " . $teacher->familyName  }}</td>
                                                <td scope="row">{{ str_pad( $teacher->hqmcm_id, 4, "0", STR_PAD_LEFT ) }}</td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
