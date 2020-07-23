<?php

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
                        <a class="nav-item nav-link " id="nav-delet-tab" data-toggle="tab" href="#nav-delet" role="tab"
                           aria-controls="nav-delet" aria-selected="true">حذف منطقة</a>
                        <a class="nav-item nav-link " id="nav-add-tab" data-toggle="tab" href="#nav-add" role="tab"
                           aria-controls="nav-add" aria-selected="false">اضافة منطقة</a>
                        <a class="nav-item nav-link active" id="nav-view-tab" data-toggle="tab" href="#nav-view"
                           role="tab" aria-controls="nav-view" aria-selected="false">عرض المناطق</a>
                    </div>
                </nav>
                <div class="tab-content text-right" id="nav-tabContent">
                    <!--ضم القائمة-->
                    <div class="tab-pane fade" id="nav-hide" role="tabpanel" aria-labelledby="nav-hide-tab"></div>
                    <!--حذف منطقة-->
                    <div class="tab-pane fade" id="nav-delet" role="tabpanel" aria-labelledby="nav-delet-tab"></div>
                    <!--اضافة منطقة-->
                    <div class="tab-pane fade" id="nav-add" role="tabpanel" aria-labelledby="nav-add-tab">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <form method="post" action="/createArea">
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
                    <div class="tab-pane fade show active" id="nav-view" role="tabpanel" aria-labelledby="nav-view-tab">
                        <div class="container h-100 w-100">
                            <form method="post" action="/showAreas">
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
                                    <td scope="col">عدد الطلاب</td>
                                    <td scope="col">عدد المحفظين</td>
                                    <td scope="col">عدد المساجد</td>
                                    <td scope="col">اسم المنطقة</td>
                                    <td scope="col">#</td>
                                </tr>
                                </thead>
                                @if(Route::currentRouteName() == 'showAreas')
                                        @foreach ($areas as $area)
                                        <tbody>
                                            <tr>
                                                <td>{{ $area->number_of_students }}</td>
                                                <td>{{ $area->number_of_teachers }}</td>
                                                <td>{{ $area->number_of_mosques }}</td>
                                                <td>{{ $area->name }}</td>
                                                <td scope="row">{{ $area->id }}</td>
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


