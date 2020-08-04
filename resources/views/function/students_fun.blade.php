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

                        <a class="nav-item nav-link " id="nav-hideTeacher-tab" data-toggle="tab" href="#nav-hideTeacher"
                           role="tab" aria-controls="nav-hideTeacher" aria-selected="true">ضم القائمة</a>

                        <a class="nav-item nav-link <?php echo $active ?>" id="nav-updateTeacher-tab" data-toggle="tab"
                           href="{{$m}}" role="tab" aria-controls="nav-updateTeacher" aria-selected="true">تعديل
                            طالب</a>

                        <a class="nav-item nav-link " id="nav-addTeacher-tab" data-toggle="tab" href="#nav-addTeacher"
                           role="tab" aria-controls="nav-addTeacher" aria-selected="false">اضافة طالب</a>

                        <a class="nav-item nav-link <?php echo $active2 ?>" id="nav-viewTeacher-tab" data-toggle="tab"
                           href="#nav-viewTeacher" role="tab" aria-controls="nav-viewTeacher" aria-selected="false">عرض
                            طالب</a>

                    </div>
                </nav>

                <div class="tab-content text-right" id="nav-tabContent">

                    <!--ضم القائمة-->
                    <div class="tab-pane fade" id="nav-hideTeacher" role="tabpanel"
                         aria-labelledby="nav-hideTeacher-tab"></div>

                    <!--تعديل محفظ-->
                    <div class="tab-pane fade <?php echo $active . " " . $show?>" id="nav-updateTeacher" role="tabpanel"
                         aria-labelledby="nav-updateTeacher-tab">
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
                                                            <option
                                                                value="{{$area->hqmcm_id }}">{{ $area->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('area')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                     </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--المسجد-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">
                                                </div>
                                                <label for="mosque"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('المسجد') }}</label>

                                                <div class="col-md-7 float-left">
                                                    <select class="form-control text-right c" id="mosque" name="mosque">
                                                        <option value="" selected>...</option>
                                                        <?php $mosques = \App\Mosque::all()?>
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
                                        <form method="post" action="{{route('teacher.createTeacher')}}">
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
                                                    <input id="password-confirm" type="password" class="form-control"
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
                                                            <option
                                                                value="{{$area->hqmcm_id }}">{{ $area->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('area')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                     </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--المسجد-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">
                                                </div>
                                                <label for="mosque"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('المسجد') }}</label>

                                                <div class="col-md-7 float-left">
                                                    <select class="form-control text-right c" id="mosque" name="mosque">
                                                        <option value="" selected>...</option>
                                                        <?php $mosques = \App\Mosque::all()?>
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

                    <!--عرض المحفظين-->
                    <div class="tab-pane fade <?php echo $active2 . " " . $show2?>" id="nav-viewTeacher" role="tabpanel"
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
                                    <td scope="col">الاسم</td>
                                    <td scope="col">رقم الجوال</td>
                                    <td scope="col">المنطقة</td>
                                    <td scope="col">المسجد</td>
                                    <td scope="col">#</td>
                                    <th scope="coll"><a href='mosqueDeleteAll'>حذف المحدد</a></th>
                                </tr>
                                </thead>
                                @if(Route::currentRouteName() == 'teacher.showTeachers')
                                    @foreach ($teachers as $teacher)
                                        <tbody>
                                        <tr>
                                            <td><a href='delete/{{ $teacher->id }}'>حذف</a><a
                                                    href='edit/{{ $teacher->id }}'>| تعديل</a></td>
                                            <td>{{ $teacher->firstName . " " . $teacher->secondName . " " . $teacher->familyName  }}</td>
                                            <td>{{ $teacher->phoneNumber }}</td>
                                            <td>{{ $teacher->area }}</td>
                                            <td>{{ $teacher->mosque }}</td>
                                            <td scope="row">{{ str_pad( $teacher->hqmcm_id, 4, "0", STR_PAD_LEFT ) }}</td>
                                            <td><input type="checkbox" name="checkForDelete"></td>
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


