@extends('layouts.app')
@section('content')
    <?php
    if (isset($_GET['user_type'])) {

    } else {
        $_GET['user_type'] = null;
    }
    $get_area_admin_from_url = $get_mosque_admin_from_url = $get_teacher_from_url = $get_student_from_url = 0;
    $get_area_admin_from_url = preg_match("/user_type=area_admin/i", url()->previous());
    $get_mosque_admin_from_url = preg_match("/user_type=mosque_admin/i", url()->previous());
    $get_teacher_from_url = preg_match("/user_type=teacher/i", url()->previous());
    $get_student_from_url = preg_match("/user_type=student/i", url()->previous());

    ?>



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="card-header text-right">{{ __('تسجيل الدخول') }}
                            <div class="row justify-content-center">
                                {{$user_type=null}}
                                <div class="">
                                    <select class="form-control" id="user_type" name="user_type">
                                        <option>...</option>
                                        <option value="area_admin"
                                                @if($_GET['user_type'] == 'area_admin') selected @endif
                                                @if($get_area_admin_from_url == 1) selected @endif>مشرف منطقة
                                        </option>
                                        <option value="mosque_admin"
                                                @if($_GET['user_type'] == 'mosque_admin') selected @endif
                                        @if($get_mosque_admin_from_url == 1) selected @endif>مشرف مسجد
                                        </option>
                                        <option value="teacher" @if($_GET['user_type'] == 'teacher') selected @endif
                                        @if($get_teacher_from_url == 1) selected @endif>
                                            محفظ
                                        </option>
                                        <option value="student" @if($_GET['user_type'] == 'student') selected @endif
                                        @if($get_student_from_url == 1) selected @endif>
                                            طالب
                                        </option>
                                    </select>
                                    <script>
                                        document.getElementById('user_type').onchange = function () {
                                            window.location = "{{route('login')}}?user_type=" + this.value;
                                        };
                                    </script>
                                </div>
                                <div class="pt-1 pl-2">
                                    <label>نوع المستخدم</label>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">

                            <!--رقم المستخدم-->
                            <div class="form-group row justify-content-lg-center">
                                <div class="col-lg-4">

                                </div>

                                <label for="hqmcm_id"
                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('رقم المستخدم') }}</label>

                                <div class=" col-md-7">
                                    <input id="hqmcm_id" type="text" class="text-right form-control"
                                           name="hqmcm_id" value="{{ old('hqmcm_id') }}" required
                                           autocomplete="hqmcm_id" autofocus>

                                    @error('hqmcm_id')
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
                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('كلمة السر') }}</label>

                                <div class="col-md-7">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!--تذكرني-->
                            <div class="form-group row justify-content-end">
                                <div class="col-5">
                                    <div class="form-check">
                                        <label class="form-check-label" for="remember">
                                            {{ __('تذكرني') }}
                                        </label>
                                        <input class="form-check-input ml-1 " type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">


                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('نسيت كلمة المرور؟') }}
                                        </a>
                                    @endif
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('تسجيل الدخول') }}
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
