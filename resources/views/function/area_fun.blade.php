<?php
if (session('status') == 'edit') {
    $active = 'active';
    $show = 'show';
    $d = '#nav-update';
    $active2 = '';
    $show2 = '';
} else {
    $active = '';
    $show = '';
    $d = '';
    $active2 = 'active';
    $show2 = 'show';
}

if (isset($_GET['areas'])) {
    $area = $_GET['areas'];
} else {
    $area = [0, 0, 0, 0];
}


?>

<div class="row justify-content-center">
    <div class="card h-100 w-100">
        <div class="card-body text-right">
            <div>
                <h2 class="text-right">ادارة المناطق</h2>

                <nav>
                    <div class="nav nav-tabs justify-content-end" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link " id="nav-hide-tab" data-toggle="tab" href="#nav-hide" role="tab"
                           aria-controls="nav-hide" aria-selected="true">ضم القائمة</a>
                        <a class="nav-item nav-link <?php echo $active?>" id="nav-update-tab" data-toggle="tab"
                           href="{{$d}}" role="tab"
                           aria-controls="nav-update" aria-selected="true">تعديل منطقة</a>
                        <a class="nav-item nav-link " id="nav-add-tab" data-toggle="tab" href="#nav-add" role="tab"
                           aria-controls="nav-add" aria-selected="false">اضافة منطقة</a>
                        <a class="nav-item nav-link <?php echo $active2?>" id="nav-view-tab" data-toggle="tab"
                           href="#nav-view"
                           role="tab" aria-controls="nav-view" aria-selected="false">عرض المناطق</a>
                    </div>
                </nav>

                <div class="tab-content text-right" id="nav-tabContent">

                    <!--ضم القائمة-->
                    <div class="tab-pane fade" id="nav-hide" role="tabpanel" aria-labelledby="nav-hide-tab"></div>

                    <!--تعديل منطقة-->
                    <div class="tab-pane fade <?php echo $active . " " . $show?>" id="nav-update" role="tabpanel"
                         aria-labelledby="nav-update-tab">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <!--$area[0]['id']-->
                                        <form method="post" action="/edit/{{$area[0]['id']}}">
                                        @csrf
                                        <!--اسم المنطقة-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">

                                                </div>
                                                <label for="name"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('اسم المنطقة') }}</label>

                                                <div class=" col-md-7">
                                                    <input id="name" type="text"
                                                           class="text-right form-control @error('name') is-invalid @enderror"
                                                           name="name" value="<?php if (isset($area[0]['name'])) {
                                                        echo $area[0]['name'];
                                                    } ?>" required
                                                           autocomplete="name" autofocus>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--رقم المنطقة-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">

                                                </div>
                                                <label for="hqmcm_id"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('رقم المنطقة') }}</label>

                                                <div class=" col-md-7">
                                                    <input id="hqmcm_id" type="text"
                                                           class="text-right form-control @error('hqmcm_id') is-invalid @enderror"
                                                           name="hqmcm_id" value="<?php if (isset($area[0]['hqmcm_id'])) {
                                                        echo $area[0]['hqmcm_id'];
                                                    } ?>" required
                                                           autocomplete="name" autofocus>

                                                    @error('hqmcm_id')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--المحافظة-->
                                            <div class="form-group row justify-content-lg-center ">
                                                <div class="col-lg-4">

                                                </div>
                                                <label for="governorate"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('المحافظة') }}</label>

                                                <div class=" col-md-7">
                                                    <input disabled id="governorate" type="text"
                                                           class="text-right form-control @error('name') is-invalid @enderror"
                                                           name="governorate" value="{{ old('name') }}" required
                                                           autocomplete="governorate" autofocus>

                                                    @error('governorate')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--عدد المساجد-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">

                                                </div>

                                                <label for="number_of_mosques"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('عدد المساجد') }}</label>

                                                <div class=" col-md-7">
                                                    <input id="number_of_mosques" type="text"
                                                           class="text-right form-control @error('number_of_mosques') is-invalid @enderror"
                                                           name="secondName"
                                                           value="<?php if (isset($area[0]['number_of_mosques'])) {
                                                               echo $area[0]['number_of_mosques'];
                                                           } ?>"
                                                           autocomplete="number_of_mosques" autofocus>

                                                    @error('number_of_mosques')
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
                                                           value="<?php if (isset($area[0]['number_of_teachers'])) {
                                                               echo $area[0]['number_of_teachers'];
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
                                                           value="<?php if (isset($area[0]['number_of_students'])) {
                                                               echo $area[0]['number_of_students'];
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

                    <!--اضافة منطقة-->
                    <div class="tab-pane fade" id="nav-add" role="tabpanel" aria-labelledby="nav-add-tab">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <form method="post" action="{{route('area.createArea')}}">
                                        @csrf
                                        <!--اسم المنطقة-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">

                                                </div>
                                                <label for="name"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('اسم المنطقة') }}</label>

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

                                            <!--رقم المنطقة-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">

                                                </div>
                                                <label for="hqmcm_id"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('رقم المنطقة') }}</label>

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

                                            <!--المحافظة-->
                                            <div class="form-group row justify-content-lg-center ">
                                                <div class="col-lg-4">

                                                </div>
                                                <label for="governorate"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('المحافظة') }}</label>

                                                <div class=" col-md-7">
                                                    <input disabled id="governorate" type="text"
                                                           class="text-right form-control @error('name') is-invalid @enderror"
                                                           name="governorate" value="{{ old('name') }}" required
                                                           autocomplete="governorate" autofocus>

                                                    @error('governorate')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--عدد المساجد-->
                                            <div class="form-group row justify-content-lg-center">
                                                <div class="col-lg-4">

                                                </div>

                                                <label for="number_of_mosques"
                                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('عدد المساجد') }}</label>

                                                <div class=" col-md-7">
                                                    <input id="number_of_mosques" type="text"
                                                           class="text-right form-control @error('number_of_mosques') is-invalid @enderror"
                                                           name="secondName" value="{{ old('number_of_mosques') }}"
                                                           autocomplete="number_of_mosques" autofocus>

                                                    @error('number_of_mosques')
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

                    <!--عرض المناطق-->
                    <div class="tab-pane fade <?php echo $active2 . " " . $show2?>" id="nav-view" role="tabpanel"
                         aria-labelledby="nav-view-tab">
                        <div class="container h-100 w-100">
                            <form method="post" action="{{route('area.showAreas')}}">
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
                                    <td scope="col">عدد المساجد</td>
                                    <td scope="col">اسم المنطقة</td>
                                    <td scope="col">#</td>
                                </tr>
                                </thead>
                                @if(Route::currentRouteName() == 'area.showAreas')
                                    @foreach ($areas as $area)
                                        <tbody>
                                        <tr>
                                            <td><a href='delete/{{ $area->id }}'>حذف</a><a href='edit/{{ $area->id }}'>|
                                                    تعديل</a></td>
                                            <td>{{ $area->number_of_students }}</td>
                                            <td>{{ $area->number_of_teachers }}</td>
                                            <td>{{ $area->number_of_mosques }}</td>
                                            <td>{{ $area->name }}</td>
                                            <td scope="row">{{ str_pad( $area->hqmcm_id, 2, "0", STR_PAD_LEFT ) }}</td>

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


