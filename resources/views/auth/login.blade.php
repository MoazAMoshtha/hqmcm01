@include('includes.navbar')
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right">{{ __('تسجيل الدخول') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <!--رقم المستخدم-->
                            <div class="form-group row justify-content-lg-center">
                                <div class="col-lg-4">

                                </div>

                                <label for="id"
                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('رقم المستخدم') }}</label>

                                <div class=" col-md-7">
                                    <input id="id" type="text" class="text-right form-control"
                                           name="id" value="{{ old('id') }}"  autocomplete="id" autofocus>

                                    @error('id')
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
                            <label for="password" class="col-lg-3 col-md-4 col-form-label text-right">{{ __('كلمة السر') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

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
                                    <input class="form-check-input ml-1 " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
