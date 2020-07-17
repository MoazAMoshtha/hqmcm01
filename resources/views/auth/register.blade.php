@include('includes.navbar')
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-right">{{ __('سجل الأن') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!--الاسم الأول-->
                            <div class="form-group row justify-content-lg-center">
                                <div class="col-lg-4">

                                </div>

                                <label for="name"
                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('الاسم الأول') }}</label>

                                <div class=" col-md-7">
                                    <input id="name" type="text"
                                           class="text-right form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
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

                                <label for="name"
                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('الاسم الثاني') }}</label>

                                <div class=" col-md-7">
                                    <input id="name" type="text"
                                           class="text-right form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
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

                                <label for="name"
                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('اسم العائلة') }}</label>

                                <div class=" col-md-7">
                                    <input id="name" type="text"
                                           class="text-right form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
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
                                           value="{{ old('email') }}" required autocomplete="email">

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
                                           class="form-control @error('password') is-invalid @enderror" name="password"
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
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <!--رقم الجوال-->
                            <div class="form-group row justify-content-lg-center">
                                <div class="col-lg-4">

                                </div>

                                <label for="name"
                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('رقم الجوال') }}</label>

                                <div class="col-md-7">
                                    <input placeholder="059/056" id="phoneNumber" type="text"
                                           class="text-right form-control @error('phoneNumber') is-invalid @enderror"
                                           name="phoneNumber" value="{{ old('phoneNumber') }}" required autocomplete="phoneNumber" pattern="[059]{1}[0-9]{7}" >

                                    @error('name')
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
                                    <select class="form-control text-right" id="area">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    @error('mosque')
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
                                    <select class="form-control text-right" id="mosque">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    @error('mosque')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!--رقم المستخدم-->
                            <div class="form-group row justify-content-lg-center">
                                <div class="col-lg-4">

                                </div>

                                <label for="name"
                                       class="col-lg-3 col-md-4 col-form-label text-right">{{ __('رقم المستخدم') }}</label>

                                <div class=" col-md-7">
                                    <input id="id" type="text" placeholder=" : خاص بتسجيل الدخول " disabled
                                           class="text-right form-control @error('id') is-invalid @enderror"
                                           name="id" value="{{ old('id') }}"  autocomplete="id" autofocus>

                                    @error('id')
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
@endsection
