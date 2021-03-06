@extends('layouts.' . $layout)
@section('content')
    @include('operationStatus.area_add_status')
    <?php
    if (session('status') == 'editArea') {
        $active = 'active';
        $show = 'show';
        $d = '#nav-update';
        $active2 = $show2 = $m = '';
    } elseif (session('status') == 'editMosque') {
        $active = 'active';
        $show = 'show';
        $m = '#nav-updateMosque';
        $active2 = $show2 = $d = '';
    } else {
        $active = $show = $d = $m = '';
        $active2 = 'active';
        $show2 = 'show';
    }
    if (isset($_GET['mosques'])) {
        $mosque = $_GET['mosques'];
    } else {
        $mosque = [0, 0, 0, 0, 0];
    }
    ?>

    <div class="row justify-content-center">
        <div class="card h-100 w-100">
            <div class="card-body text-right">
                <div>
                    <h2 class="text-right">ادارة المساجد</h2>

                    <nav>
                        <div class="nav nav-tabs justify-content-end" id="nav-tab" role="tablist">

                            <a class="nav-item nav-link <?php echo $active ?>" id="nav-updateMosque-tab"
                               data-toggle="tab" href="{{$m}}" role="tab" aria-controls="nav-updateMosque"
                               aria-selected="true">تعديل مسجد</a>

                            <a class="nav-item nav-link " id="nav-addMosque-tab" data-toggle="tab" href="#nav-addMosque"
                               role="tab" aria-controls="nav-addMosque" aria-selected="false">اضافة مسجد</a>

                            <a class="nav-item nav-link <?php echo $active2 ?>" id="nav-viewMosque-tab"
                               data-toggle="tab" href="#nav-viewMosque" role="tab" aria-controls="nav-viewMosque"
                               aria-selected="false">عرض المساجد</a>

                        </div>
                    </nav>

                    <div class="tab-content text-right" id="nav-tabContent">

                        <!--تعديل مسجد-->
                        <div class="tab-pane fade <?php echo $active . " " . $show?>" id="nav-updateMosque"
                             role="tabpanel"
                             aria-labelledby="nav-updateMosque-tab">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <form method="post" action="edit-mosque-records">
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
                                                <input name="area" value="{{$mosque[0]['area']}}" hidden>

                                                <!--مشرف المسجد-->
                                                @if(isset($mosque[0]['mosque_admin']))
                                                    <input name="mosque_admin" value="{{$mosque[0]['mosque_admin']}}"
                                                           hidden>
                                            @else
                                            @endif


                                            <!--رقم المسجد-->
                                                <div class="form-group row justify-content-lg-center">
                                                    <div class="col-lg-4">

                                                    </div>
                                                    <label for="hqmcm_id"
                                                           class="col-lg-3 col-md-4 col-form-label text-right">{{ __('رقم المسجد') }}</label>

                                                    <div class=" col-md-7">
                                                        <input id="hqmcm_id" type="text"
                                                               class="text-right form-control @error('hqmcm_id') is-invalid @enderror"
                                                               name="hqmcm_id"
                                                               value="<?php if (isset($mosque[0]['hqmcm_id'])) {
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
                        <div class="tab-pane fade" id="nav-addMosque" role="tabpanel"
                             aria-labelledby="nav-addMosque-tab">
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

                                                <!--المنطقة-->
                                                @if(Auth::user()->user_type == 'admin')
                                                    <div class="form-group row justify-content-lg-center">
                                                        <div class="col-lg-4">

                                                        </div>

                                                        <label for="area"
                                                               class="col-lg-3 col-md-4 col-form-label text-right">{{ __('المنطقة') }}</label>

                                                        <div class="col-md-7 float-left">
                                                            <select class="form-control text-right c" id="area"
                                                                    name="area">
                                                                <option value="" selected>...</option>
                                                                <?php $areas = \App\Area::all()?>
                                                                @foreach($areas as $area)
                                                                    <option value="{{$area->hqmcm_id}}"
                                                                            name="area">{{ $area->name}}</option>
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
                                                    <input value="{{Auth::user()->area}}" hidden name="area">
                                                @endif

                                            <!--hqmcm_id-->
                                                @if(Auth::user()->user_type == 'admin')
                                                    <input name="hqmcm_id" value="0" hidden>
                                                @else
                                                    <input hidden name="hqmcm_id" value="<?php

                                                    if (App\Mosque::all()->count() == 0) {
                                                        $hqmcm_id = Auth::user()->area . str_pad(1, 2, '0', STR_PAD_LEFT);
                                                        echo $hqmcm_id;
                                                    } else {
                                                        $hqmcm_id = App\Mosque::where('area', Auth::user()->area)->orderby('hqmcm_id', 'desc')->first()->hqmcm_id + 1;
                                                        echo $hqmcm_id;
                                                    }
                                                    ?>">
                                            @endif



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
                        <div class="tab-pane fade <?php echo $active2 . " " . $show2?>" id="nav-viewMosque"
                             role="tabpanel"
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
                                                    <td><a href='delete_mosque/{{ $mosque->id}}'>حذف</a><a
                                                            href='edit_mosque/{{ $mosque->id }}'>| تعديل</a></td>
                                                    <td>{{ \App\Student::where('mosque' , $mosque->hqmcm_id)->count() }}</td>
                                                    <td>{{ \App\Teacher::where('mosque' , $mosque->hqmcm_id)->count() }}</td>
                                                    <td>
                                                        @if(\App\Mosque_Admin::where('hqmcm_id',$mosque->mosque_admin)->exists())
                                                            {{\App\Mosque_Admin::where('hqmcm_id' ,$mosque->mosque_admin)->first()->firstName . " " . \App\Mosque_Admin::where('hqmcm_id' , $mosque->mosque_admin )->first()->familyName}}
                                                        @else
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(\App\Area::where('hqmcm_id' , $mosque->area)->exists())
                                                            {{\App\Area::where('hqmcm_id' , $mosque->area)->first()->name}}
                                                        @else
                                                        @endif
                                                    </td>
                                                    <td>{{ $mosque->name }}</td>
                                                    <td scope="row">{{$mosque->hqmcm_id}}</td>
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
