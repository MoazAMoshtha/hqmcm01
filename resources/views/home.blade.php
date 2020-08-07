@extends('layouts.app')
@section('content')
    @if(Auth::user()->user_type == 'area_admin')
        <div class="container">
            <div class="card-deck text-center justify-content-center">

                <div class="col-lg-3 card text-white bg-primary">
                    <div class="card-header">
                        عدد المساجد
                    </div>
                    <div class="card-body">
                        <h1>{{\App\Mosque::where('area',Auth::user()->area)->count()}}</h1>
                    </div>
                </div>

                <div class="col-lg-3 card text-white bg-secondary">
                    <div class="card-header">
                        عدد المحفظين
                    </div>
                    <div class="card-body">
                        <h1>{{\App\Teacher::where('area',Auth::user()->area)->count()}}</h1>
                    </div>
                </div>

                <div class="col-lg-3  card text-white bg-danger">
                    <div class="card-header ">
                        عدد الحلقات
                    </div>
                    <div class="card-body">
                        <h1>{{\App\Group::where('area',Auth::user()->area)->count()}}</h1>
                    </div>
                </div>

                <div class="col-lg-3  card text-white bg-success">
                    <div class="card-header ">
                        عدد الطلاب
                    </div>
                    <div class="card-body">
                        <h1>{{\App\Student::where('area',Auth::user()->area)->count()}}</h1>
                    </div>
                </div>

            </div>
        </div>

    @elseif(Auth::user()->user_type == 'mosque_admin')
        <div class="container">
            <div class="card-deck text-center justify-content-center">
                <div class="col-lg-3 card text-white bg-secondary">
                    <div class="card-header">
                        عدد المحفظين
                    </div>
                    <div class="card-body">
                        <h1>{{\App\Teacher::where('mosque' , Auth::user()->mosque)->count()}}</h1>
                    </div>
                </div>
                <div class="col-lg-3  card text-white bg-danger">
                    <div class="card-header ">
                        عدد الحلقات
                    </div>
                    <div class="card-body">
                        <h1>{{\App\Group::where('mosque' , Auth::user()->mosque)->count()}}</h1>
                    </div>
                </div>
                <div class="col-lg-3  card text-white bg-success">
                    <div class="card-header ">
                        عدد الطلاب
                    </div>
                    <div class="card-body">
                        <h1>{{\App\Student::where('mosque' , Auth::user()->mosque)->count()}}</h1>
                    </div>
                </div>
            </div>
        </div>

    @elseif(Auth::user()->user_type == 'teacher')
        <div class="container">
            <div class="card-deck text-center justify-content-center">
                <div class="col-lg-3  card text-white bg-success">
                    <div class="card-header ">
                        عدد الطلاب
                    </div>
                    <div class="card-body">
                        <h1>{{\App\Student::where('group' ,Auth::user()->group )->count()}}</h1>
                    </div>
                </div>
            </div>
        </div>

    @elseif(Auth::user()->user_type == 'student')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-right">{{ __('طالب') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}

                                </div>
                            @endif

                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif()

@endsection
