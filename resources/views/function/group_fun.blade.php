@extends('layouts.' . $layout)
@section('content')

    @include('operationStatus.area_add_status')
    <?php
    if (session('status') == 'editArea') {
        $active = 'active';
        $show = 'show';
        $d = '#nav-update';
        $active2 = $show2 = $m = '';
    } elseif (session('status') == 'editGroup') {
        $active = 'active';
        $show = 'show';
        $m = '#nav-updateGroup';
        $active2 = $show2 = $d = '';
    } else {
        $active = $show = $d = $m = '';
        $active2 = 'active';
        $show2 = 'show';
    }
    if (isset($_GET['groups'])) {
        $group = $_GET['groups'];
    } else {
        $group = [0, 0, 0, 0, 0];
    }
    ?>

    <div class="row justify-content-center">
        <div class="card h-100 w-100">
            <div class="card-body text-right">
                <div>
                    <h2 class="text-right">ادارة حلقات التحفيظ</h2>

                    <nav>
                        <div class="nav nav-tabs justify-content-end" id="nav-tab" role="tablist">

                            <a class="nav-item nav-link <?php echo $active ?>" id="nav-updateGroup-tab"
                               data-toggle="tab" href="{{$m}}" role="tab" aria-controls="nav-updateGroup"
                               aria-selected="true">تعديل حلقة</a>

                            <a class="nav-item nav-link " id="nav-addGroup-tab" data-toggle="tab" href="#nav-addGroup"
                               role="tab" aria-controls="nav-addGroup" aria-selected="false">اضافة حلقة</a>

                            <a class="nav-item nav-link <?php echo $active2 ?>" id="nav-viewGroup-tab"
                               data-toggle="tab" href="#nav-viewGroup" role="tab" aria-controls="nav-viewGroup"
                               aria-selected="false">عرض الحلقات</a>

                        </div>
                    </nav>

                    <div class="tab-content text-right" id="nav-tabContent">

                        <!--تعديل حلقة-->
                        <div class="tab-pane fade <?php echo $active . " " . $show?>" id="nav-updateGroup"
                             role="tabpanel"
                             aria-labelledby="nav-updateGroup-tab">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <form method="post" action="{{route('group.editRecords')}}">
                                            @csrf

                                            <!--المحفظ-->
                                                <div class="form-group row justify-content-lg-center">
                                                    <div class="col-lg-4">

                                                    </div>

                                                    <label for="teacher"
                                                           class="col-lg-3 col-md-4 col-form-label text-right">{{ __('المحفظ') }}</label>

                                                    <div class="col-md-7 float-left">
                                                        <select class="form-control text-right c" id="teacher"
                                                                name="teacher">
                                                            <option value="null" name="teacher" selected>...</option>
                                                            <?php $teachers = \App\Teacher::all();?>
                                                            @foreach($teachers as $teacher)
                                                                <option value="{{$teacher->hqmcm_id}}"
                                                                        name="teacher">{{ $teacher->firstName . " " . $teacher->familyName }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('$teacher')
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

                                                    <input name="area" value="{{Auth::user()->area}}" hidden>

                                            @endif
                                            <!--المسجد-->
                                                @if(Auth::user()->user_type == 'mosque_admin')
                                                    <input name="mosque" hidden value="{{Auth::user()->mosque}}">

                                                @else
                                                    <div class="form-group row justify-content-lg-center">
                                                        <div class="col-lg-4">
                                                        </div>
                                                        <label for="mosque"
                                                               class="col-lg-3 col-md-4 col-form-label text-right">{{ __('المسجد') }}</label>

                                                        <div class="col-md-7 float-left">
                                                            <select class="form-control text-right c" id="mosque"
                                                                    name="mosque">
                                                                <option value="" selected>...</option>
                                                                <?php
                                                                if (Auth::user()->user_type == 'admin') {
                                                                    $mosques = \App\Mosque::all();

                                                                } elseif (Auth::user()->user_type == 'area_admin') {
                                                                    $mosques = \App\Mosque::where('area', Auth::user()->area)->get();

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


                                                <!--hqmcm_id group-->
                                                <input name="hqmcm_id" hidden value="{{$group[0]['hqmcm_id']}}">

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
                                                               value="<?php if (isset($group[0]['number_of_students'])) {
                                                                   echo $group[0]['number_of_students'];
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

                        <!--اضافة حلقة-->
                        <div class="tab-pane fade" id="nav-addGroup" role="tabpanel"
                             aria-labelledby="nav-addGroup-tab">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <form method="post" action="{{route('group.createGroup')}}">
                                            @csrf

                                            <!--المحفظ-->
                                                <div class="form-group row justify-content-lg-center">
                                                    <div class="col-lg-4">

                                                    </div>

                                                    <label for="teacher"
                                                           class="col-lg-3 col-md-4 col-form-label text-right">{{ __('المحفظ') }}</label>

                                                    <div class="col-md-7 float-left">
                                                        <select class="form-control text-right c" id="teacher"
                                                                name="teacher">
                                                            <option value="null" name="teacher" selected>...</option>
                                                            <?php $teachers = \App\Teacher::all();?>
                                                            @foreach($teachers as $teacher)
                                                                <option value="{{$teacher->hqmcm_id}}"
                                                                        name="teacher">{{ $teacher->firstName . " " . $teacher->familyName }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('$teacher')
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

                                                    <input name="area" value="{{Auth::user()->area}}" hidden>

                                                @endif

                                            <!--المسجد-->
                                                @if(Auth::user()->user_type == 'mosque_admin')
                                                    <input name="mosque" hidden value="{{Auth::user()->mosque}}">

                                                @else
                                                    <div class="form-group row justify-content-lg-center">
                                                        <div class="col-lg-4">
                                                        </div>
                                                        <label for="mosque"
                                                               class="col-lg-3 col-md-4 col-form-label text-right">{{ __('المسجد') }}</label>

                                                        <div class="col-md-7 float-left">
                                                            <select class="form-control text-right c" id="mosque"
                                                                    name="mosque">
                                                                <option value="" selected>...</option>
                                                                <?php
                                                                if (Auth::user()->user_type == 'admin') {
                                                                    $mosques = \App\Mosque::all();

                                                                } elseif (Auth::user()->user_type == 'area_admin') {
                                                                    $mosques = \App\Mosque::where('area', Auth::user()->area)->get();

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


                                            <!--hqmcm_id group-->
                                                <input name="hqmcm_id" hidden value="0">

                                                <!--عدد الطلاب-->
                                                <input name="number_of_students" hidden
                                                       value="0">

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

                        <!--عرض الحلقات-->
                        <div class="tab-pane fade <?php echo $active2 . " " . $show2?>" id="nav-viewGroup"
                             role="tabpanel"
                             aria-labelledby="nav-viewGroup-tab">
                            <div class="container h-100 w-100">
                                <form method="post" action="{{route('group.showGroups')}}">
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
                                        <td scope="col">المسجد</td>
                                        <td scope="col">محفظ الحلقة</td>
                                        <td scope="col">#</td>
                                    </tr>
                                    </thead>
                                    @if(Route::currentRouteName() == 'group.showGroups')
                                        @foreach ($groups as $group)
                                            <tbody>
                                            <tr>
                                                <td><a href='delete_group/{{ $group->id}}'>حذف</a><a
                                                        href='edit-group-records/{{$group->hqmcm_id}}'>| تعديل</a></td>
                                                <td>{{ \App\Student::where('group' , $group->hqmcm_id)->count() }}</td>
                                                <td><?php
                                                    if (\App\Mosque::where('hqmcm_id', $group->mosque)->exists()) {
                                                        echo \App\Mosque::where('hqmcm_id', $group->mosque)->first()->name;
                                                    }
                                                    ?></td>
                                                <td><?php if (\App\Teacher::where('hqmcm_id', $group->teacher)->exists()) {
                                                        echo \App\Teacher::where('hqmcm_id', $group->teacher)->first()->firstName . " " .
                                                            \App\Teacher::where('hqmcm_id', $group->teacher)->first()->familyName;
                                                    }?></td>
                                                <td scope="row">{{$group->hqmcm_id}}</td>
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
