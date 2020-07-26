<?php
if (session('status') == 'editArea') {
    $active = 'active';
    $show = 'show';
    $d = '#nav-update';
    $active2 = $show2 = $m = '';
} elseif (session('status') == 'editMosque'){
    $active = 'active';
    $show = 'show';
    $m = '#nav-updateMosque';
    $active2 = $show2 = $d = '';
}else{
    $active = $show = $d = $m = '';
    $active2 = 'active';
    $show2 = 'show';
}

if (isset($_GET['mosques'])) {
    $mosque = $_GET['mosques'];
} else {
    $mosque = [0,0, 0, 0, 0];
}


?>

<div class="row justify-content-center">
    <div class="card h-100 w-100">
        <div class="card-body text-right">
            <div>
                <h2 class="text-right">ادارة المساجد</h2>

                <nav>
                    <div class="nav nav-tabs justify-content-end" id="nav-tab" role="tablist">

                        <a class="nav-item nav-link " id="nav-hideMosque-tab" data-toggle="tab" href="#nav-hideMosque" role="tab" aria-controls="nav-hideMosque" aria-selected="true">ضم القائمة</a>

                        <a class="nav-item nav-link <?php echo $active ?>" id="nav-updateMosque-tab" data-toggle="tab" href="{{$m}}" role="tab" aria-controls="nav-updateMosque" aria-selected="true">تعديل مسجد</a>

                        <a class="nav-item nav-link " id="nav-addMosque-tab" data-toggle="tab" href="#nav-addMosque" role="tab" aria-controls="nav-addMosque" aria-selected="false">اضافة مسجد</a>

                        <a class="nav-item nav-link <?php echo $active2 ?>" id="nav-viewMosque-tab" data-toggle="tab" href="#nav-viewMosque" role="tab" aria-controls="nav-viewMosque" aria-selected="false">عرض المساجد</a>

                    </div>
                </nav>

                <div class="tab-content text-right" id="nav-tabContent">

                    <!--ضم القائمة-->
                    <div class="tab-pane fade" id="nav-hideMosque" role="tabpanel" aria-labelledby="nav-hideMosque-tab"></div>

                    <!--تعديل مسجد-->
                    <div class="tab-pane fade <?php echo $active . " " . $show?>" id="nav-updateMosque" role="tabpanel"
                         aria-labelledby="nav-updateMosque-tab">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <form method="post" action="/edit/{{$mosque[0]['id']}}">
                                        @csrf
                                            <!--اسم المسجد-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">

                                                </div>
                                                <label for="name"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('اسم المسجد') }}</label>

                                                <div class=" col-md-7">
                                                    <input id="name" type="text"
                                                           class="text-right form-control @error('name') is-invalid @enderror"
                                                           name="name" value="<?php if (isset($mosque[0]['name'])) {
                                                        echo $mosque[0]['name'];
                                                    } ?>" required
                                                           autocomplete="name" autofocus>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--اسم المنطقة-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">

                                                </div>
                                                <label for="area"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('المنطقة') }}</label>

                                                <div class=" col-md-7">
                                                    <input id="name" type="text"
                                                           class="text-right form-control @error('area') is-invalid @enderror"
                                                           name="name" value="<?php if (isset($mosque[0]['area'])) {
                                                        echo $mosque[0]['area'];
                                                    } ?>" required
                                                           autocomplete="area" autofocus>

                                                    @error('area')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--مشرف المسجد-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">

                                                </div>
                                                <label for="mosque_admin"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('مشرف المسجد') }}</label>

                                                <div class=" col-md-7">
                                                    <input id="mosque_admin" type="text"
                                                           class="text-right form-control @error('mosque_admin') is-invalid @enderror"
                                                           name="mosque_admin" value="<?php if (isset($mosque[0]['mosque_admin'])) {
                                                        echo $mosque[0]['mosque_admin'];
                                                    } ?>" required
                                                           autocomplete="mosque_admin" autofocus>

                                                    @error('mosque_admin')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--رقم المسجد-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">

                                                </div>
                                                <label for="hqmcm_id"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('رقم المسجد') }}</label>

                                                <div class=" col-md-7">
                                                    <input id="hqmcm_id" type="text"
                                                           class="text-right form-control @error('hqmcm_id') is-invalid @enderror"
                                                           name="hqmcm_id" value="<?php if (isset($mosque[0]['hqmcm_id'])) {
                                                        echo $mosque[0]['hqmcm_id'];
                                                    } ?>" required
                                                           autocomplete="name" autofocus>

                                                    @error('hqmcm_id')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--عدد المحفظين-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">

                                                </div>

                                                <label for="number_of_teachers"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('عدد المحفظين') }}</label>

                                                <div class=" col-md-7">
                                                    <input id="number_of_teachers" type="text"
                                                           class="text-right form-control @error('number_of_teachers') is-invalid @enderror"
                                                           name="number_of_teachers"
                                                           value="<?php if (isset($mosque[0]['number_of_teachers'])) {
                                                               echo $mosque[0]['number_of_teachers'];
                                                           } ?>"
                                                           autocomplete="number_of_teachers" autofocus>

                                                    @error('number_of_teachers')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--عدد الطلاب-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">

                                                </div>

                                                <label for="number_of_students"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('عدد الطلاب') }}</label>

                                                <div class=" col-md-7">
                                                    <input id="number_of_students" type="text"
                                                           class="text-right form-control @error('number_of_students') is-invalid @enderror"
                                                           name="number_of_students"
                                                           value="<?php if (isset($mosque[0]['number_of_students'])) {
                                                               echo $mosque[0]['number_of_students'];
                                                           } ?>"
                                                           autocomplete="number_of_students" autofocus>

                                                    @error('number_of_students')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--تسجيل-->
                                            <div class="form-group row text-center justify-content-center">
                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('حفظ') }}
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--اضافة مسجد-->
                    <div class="tab-pane fade" id="nav-addMosque" role="tabpanel" aria-labelledby="nav-addMosque-tab">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <form method="post" action="{{route('mosque.createMosque')}}">
                                        @csrf

                                            <!--اسم المسجد-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">

                                                </div>
                                                <label for="name"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('اسم المسجد') }}</label>

                                                <div class=" col-md-7">
                                                    <input id="name" type="text"
                                                           class="text-right form-control @error('name') is-invalid @enderror"
                                                           name="name" value="{{ old('name') }}" required
                                                           autocomplete="name" autofocus>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--اسم المنطقة-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">

                                                </div>
                                                <label for="area"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('المنطقة') }}</label>

                                                <div class=" col-md-7">
                                                    <input id="area" type="text"
                                                           class="text-right form-control @error('area') is-invalid @enderror"
                                                           name="area" value="{{ old('area') }}" required
                                                           autocomplete="area" autofocus>

                                                    @error('area')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                     </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--رقم المسجد-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">

                                                </div>
                                                <label for="hqmcm_id"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('رقم المسجد') }}</label>

                                                <div class=" col-md-7">
                                                    <input id="hqmcm_id" type="text"
                                                           class="text-right form-control @error('hqmcm_id') is-invalid @enderror"
                                                           name="hqmcm_id" value="{{ old('hqmcm_id') }}" required
                                                           autocomplete="name" autofocus>

                                                    @error('hqmcm_id')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--مشرف المسجد-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">

                                                </div>
                                                <label for="mosque_admin"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('مشرف المسجد') }}</label>

                                                <div class=" col-md-7">
                                                    <input id="mosque_admin" type="text"
                                                           class="text-right form-control @error('mosque_admin') is-invalid @enderror"
                                                           name="mosque_admin" value="{{ old('mosque_admin') }}" required
                                                           autocomplete="mosque_admin" autofocus>

                                                    @error('mosque_admin')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--عدد المحفظين-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">

                                                </div>

                                                <label for="number_of_teachers"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('عدد المحفظين') }}</label>

                                                <div class=" col-md-7">
                                                    <input id="number_of_teachers" type="text"
                                                           class="text-right form-control @error('number_of_teachers') is-invalid @enderror"
                                                           name="number_of_teachers"
                                                           value="{{ old('number_of_teachers') }}"
                                                           autocomplete="number_of_teachers" autofocus>

                                                    @error('number_of_teachers')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                     </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--عدد الطلاب-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">

                                                </div>

                                                <label for="number_of_students"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('عدد الطلاب') }}</label>

                                                <div class=" col-md-7">
                                                    <input id="number_of_students" type="text"
                                                           class="text-right form-control @error('number_of_students') is-invalid @enderror"
                                                           name="number_of_students"
                                                           value="{{ old('number_of_students') }}"
                                                           autocomplete="number_of_students" autofocus>

                                                    @error('number_of_students')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--تسجيل-->
                                            <div class="form-group row text-center justify-content-center">
                                                <div class="col-lg-12">
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

                    <!--عرض المساجد-->
                    <div class="tab-pane fade <?php echo $active2 . " " . $show2?>" id="nav-viewMosque" role="tabpanel"
                         aria-labelledby="nav-viewMosque-tab">
                        <div class="container h-100 w-100">
                            <form method="post" action="{{route('mosque.showMosques')}}">
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
                                    <td scope="col">عدد الطلاب</td>
                                    <td scope="col">عدد المحفظين</td>
                                    <td scope="col">مشرف المسجد</td>
                                    <td scope="col">المنطقة</td>
                                    <td scope="col">اسم المسجد</td>
                                    <td scope="col">#</td>
                                </tr>
                                </thead>
                                @if(Route::currentRouteName() == 'mosque.showMosques')
                                    @foreach ($mosques as $mosque)
                                        <tbody>
                                        <tr>
                                            <td><a href='delete/{{ $mosque->id }}'>حذف</a><a href='edit/{{ $mosque->id }}'>| تعديل</a></td>
                                            <td>{{ $mosque->number_of_students }}</td>
                                            <td>{{ $mosque->number_of_teachers }}</td>
                                            <td>{{ $mosque->mosque_admin }}</td>
                                            <td>{{ $mosque->area }}</td>
                                            <td>{{ $mosque->name }}</td>
                                            <td scope="row">{{ str_pad( $mosque->hqmcm_id, 4, "0", STR_PAD_LEFT ) }}</td>
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


