@extends('layouts.' . $layout)
@section('content')
    @include('operationStatus.area_add_status')

    <?php
    if (session('status') == 'editStudent') {
        $active = 'active';
        $show = 'show';
        $d = '#nav-update';
        $active2 = $show2 = $m = '';
    } elseif (session('status') == 'editStudent') {
        $active = 'active';
        $show = 'show';
        $m = '#nav-updateStudent';
        $active2 = $show2 = $d = '';
    } else {
        $active = $show = $d = $m = '';
        $active2 = 'active';
        $show2 = 'show';
    }
    if (isset($_GET['students'])) {
        $student = $_GET['students'];
    } else {
        $student = [0, 0, 0, 0, 0];
    }


    ?>

    <div class="row justify-content-center">
        <div class="card h-100 w-100">
            <div class="card-body text-right">
                <div>
                    <h2 class="text-right">ادارة الطلاب</h2>
                    <nav>
                        <div class="nav nav-tabs justify-content-end" id="nav-tab" role="tablist">

                            <a class="nav-item nav-link " id="nav-hideStudent-tab" data-toggle="tab"
                               href="#nav-hideStudent"
                               role="tab" aria-controls="nav-hideStudent" aria-selected="true">ضم القائمة</a>

                            <a class="nav-item nav-link <?php echo $active ?>" id="nav-updateStudent-tab"
                               data-toggle="tab"
                               href="{{$m}}" role="tab" aria-controls="nav-updateStudent" aria-selected="true">تعديل
                                طالب</a>

                            <a class="nav-item nav-link " id="nav-addStudent-tab" data-toggle="tab"
                               href="#nav-addStudent"
                               role="tab" aria-controls="nav-addStudent" aria-selected="false">اضافة طالب</a>

                            <a class="nav-item nav-link <?php echo $active2 ?>" id="nav-viewStudent-tab"
                               data-toggle="tab"
                               href="#nav-viewStudent" role="tab" aria-controls="nav-viewStudent" aria-selected="false">عرض
                                طالب</a>

                        </div>
                    </nav>

                    <div class="tab-content text-right" id="nav-tabContent">

                        <!--ضم القائمة-->
                        <div class="tab-pane fade" id="nav-hideStudent" role="tabpanel"
                             aria-labelledby="nav-hideStudent-tab"></div>

                        <!--تعديل طالب-->
                        <div class="tab-pane fade <?php echo $active . " " . $show?>" id="nav-updateStudent"
                             role="tabpanel"
                             aria-labelledby="nav-updateStudent-tab">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <form method="post" action="/edit/{{$student[0]['id']}}">
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
                                                               value="<?php if (isset($student[0]['firstName'])) {
                                                                   echo $student[0]['firstName'];
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
                                                               value="<?php if (isset($student[0]['secondName'])) {
                                                                   echo $student[0]['secondName'];
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
                                                               value="<?php if (isset($student[0]['familyName'])) {
                                                                   echo $student[0]['familyName'];
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
                                                               value="<?php if (isset($student[0]['id_number'])) {
                                                                   echo $student[0]['id_number'];
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
                                                               value="<?php if (isset($student[0]['email'])) {
                                                                   echo $student[0]['email'];
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
                                                               value="<?php if (isset($student[0]['phoneNumber'])) {
                                                                   echo $student[0]['phoneNumber'];
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
                                                <input name="area" value="{{Auth::user()->area}}" hidden>
                                                <!--المسجد-->
                                                <input name="mosque" value="{{Auth::user()->mosque}}" hidden>


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

                        <!--اضافة طالب-->
                        <div class="tab-pane fade" id="nav-addStudent" role="tabpanel"
                             aria-labelledby="nav-addStudent-tab">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <form method="post" action="{{route('student.createStudent')}}">
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
                                                               name="secondName" value="{{ old('secondName') }}"
                                                               required
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
                                                               name="familyName" value="{{ old('familyName') }}"
                                                               required
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
                                                <div class="form-group row justify-content-lg-center">
                                                    <div class="col-lg-4">

                                                    </div>

                                                    <label for="password"
                                                           class="col-md-3 col-form-label text-right">{{ __('كلمة السر') }}</label>

                                                    <div class="col-md-7">
                                                        <input id="password" type="password"
                                                               class="form-control @error('password') is-invalid @enderror"
                                                               name="password"
                                                               required autocomplete="new-password">

                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!--تأكيد كلمة السر-->
                                                <div class="form-group row justify-content-lg-center">
                                                    <div class="col-lg-4">

                                                    </div>
                                                    <label for="password-confirm"
                                                           class="col-md-3 col-form-label text-right">{{ __('تأكيد كلمة السر') }}</label>

                                                    <div class="col-md-7">
                                                        <input id="password-confirm" type="password"
                                                               class="form-control"
                                                               name="password_confirmation" required
                                                               autocomplete="new-password">
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
                                                               name="phoneNumber" value="{{ old('phoneNumber') }}"
                                                               required
                                                               autocomplete="phoneNumber">

                                                        @error('phoneNumber')
                                                        <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!--المنطقة-->
                                                <input name="area" value="{{Auth::user()->area}}" hidden>
                                                <!--المسجد-->
                                                <input name="mosque" value="{{Auth::user()->mosque}}" hidden>

                                                <!--المحفظ-->
                                                @if(  Auth::user()->user_type == 'teacher')
                                                    <input name="group" value="{{Auth::user()->group + 102}}" hidden>
                                                @else
                                                    <div class="form-group row justify-content-lg-center" >
                                                        <div class="col-lg-4">
                                                        </div>
                                                        <label for="group"
                                                               class="col-lg-3 col-md-4 col-form-label text-right">{{ __('حلقة التحفيظ') }}</label>

                                                        <div class="col-md-7 float-left">
                                                            <select class="form-control text-right c" id="group"
                                                                    name="group">
                                                                <option value="null" name="group" selected>...</option>
                                                                <?php $groups = \App\Group::all();
                                                                ?>
                                                                @foreach($groups as $group)
                                                                    <option value="{{$group->hqmcm_id}}"
                                                                            name="group">{{ \App\Teacher::where('hqmcm_id' , $group->teacher)->first()->firstName . " " . \App\Teacher::where('hqmcm_id' , $group->teacher)->first()->familyName }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('$mosque')
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

                        <!--عرض الطلاب-->
                        <div class="tab-pane fade <?php echo $active2 . " " . $show2?>" id="nav-viewStudent"
                             role="tabpanel"
                             aria-labelledby="nav-viewStudent-tab">
                            <div class="container h-100 w-100">
                                <form method="post" action="{{route('student.showStudents')}}">
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
                                        <td scope="col">رقم الجوال</td>
                                        <td scope="col">رقم الهوية</td>
                                        <td scope="col">الاسم</td>
                                        <td scope="col">#</td>
                                    </tr>
                                    </thead>
                                    @if(Route::currentRouteName() == 'student.showStudents')
                                        @foreach ($students as $student)
                                            <tbody>
                                            <tr>
                                                <td><a href='delete/{{$student->hqmcm_id}}'>حذف</a><a
                                                        href='edit/{{$student->hqmcm_id}}'>| تعديل</a></td>
                                                <td>{{ $student->phoneNumber }}</td>
                                                <td>{{ $student->id_number }}</td>
                                                <td>{{ $student->firstName . " " . $student->secondName . " " . $student->familyName  }}</td>
                                                <td scope="row">{{ $student->hqmcm_id}}</td>

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

