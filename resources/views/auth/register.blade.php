@extends('layouts.' . $layout)
@section('content')
    <?php
    if (isset($_GET['user_type'])) {

    } else {
        $_GET['user_type'] = null;
    }
    ?>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form method="POST" action="{{route('register')}}">
                        <div class="card-header text-right">{{ __('سجل الأن') }}

                            <div class="row justify-content-center">
                                {{$user_type=null}}
                                <div class="">
                                    <select class="form-control" id="user_type" name="user_type">
                                        <option  value="admin">...</option>
                                        <option value="area_admin"
                                                @if($_GET['user_type'] == 'area_admin') selected @endif >مشرف منطقة
                                        </option>
                                        <option value="mosque_admin"
                                                @if($_GET['user_type'] == 'mosque_admin') selected @endif >مشرف مسجد
                                        </option>
                                        <option value="teacher" @if($_GET['user_type'] == 'teacher') selected @endif>
                                            محفظ
                                        </option>
                                        <option value="student" @if($_GET['user_type'] == 'student') selected @endif>
                                            طالب
                                        </option>
                                    </select>
                                    <script>
                                        document.getElementById('user_type').onchange = function () {
                                            window.location = "{{route('register')}}?user_type=" + this.value;
                                        };
                                    </script>
                                </div>
                                <div class="pt-1 pl-2">
                                    <label>نوع المستخدم</label>
                                </div>
                            </div>
                        </div>
                        @csrf
                        <div class="card-body">

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

                            <!--الاسم العائلة-->
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
                                           class="form-control @error('email') is-invalid @enderror" name="email"
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
                            <input type="password" name="password" value="12345678" hidden>

                            <!--تأكيد كلمة السر-->
                            <input type="password" name="password_confirmation" value="12345678" hidden>

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
                                            <option value="{{$area->hqmcm_id}} " name="area">{{ $area->name}}</option>
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
                            <div class="form-group row justify-content-lg-center"
                                 @if($_GET['user_type'] == 'area_admin') hidden @endif>
                                <div class="col-lg-4">

                                </div>

                                <label for="mosque"
                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('المسجد') }}</label>

                                <div class="col-md-7 float-left">
                                    <select class="form-control text-right c" id="mosque" name="mosque">
                                        <option value="null" name="mosque" selected>...</option>
                                        <?php $mosques = \App\Mosque::all()?>
                                        @foreach($mosques as $mosque)
                                            <option value="{{$mosque->hqmcm_id}}" name="mosque">{{$mosque->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('$mosque')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                     </span>
                                    @enderror
                                </div>
                            </div>

                            <!--المحفظ-->
                            <div class="form-group row justify-content-lg-center"
                                 @if($_GET['user_type'] != 'student' and $_GET['user_type'] != 'teacher') hidden @endif>
                                <div class="col-lg-4">

                                </div>

                                <label for="group"
                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('حلقة التحفيظ') }}</label>

                                <div class="col-md-7 float-left">
                                    <select class="form-control text-right c" id="group" name="group">
                                        <option value="null" name="group" selected>...</option>
                                        <?php $groups = \App\Group::all();
                                        ?>
                                        @foreach($groups as $group)
                                            <option value="{{$group->hqmcm_id}}" name="group">{{ $group->hqmcm_id }}</option>
                                        @endforeach
                                    </select>
                                    @error('$mosque')
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

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
