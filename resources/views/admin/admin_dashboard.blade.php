@extends('layouts.admin')
@section('content')

    <div class="container aljazera">
        <div class="card-deck text-center justify-content-center">

            <div class="col-lg-3 card text-white bg-primary">
                <div class="card-header">
                    عدد المناطق
                </div>
                <div class="card-body">
                    <h1>{{\App\Area::all()->count()}}</h1>
                </div>
            </div>

            <div class="col-lg-3 card text-white bg-secondary">
                <div class="card-header">
                    عدد المساجد
                </div>
                <div class="card-body">
                    <h1>{{\App\Mosque::all()->count()}}</h1>
                </div>
            </div>

            <div class="col-lg-3  card text-white bg-danger">
                <div class="card-header ">
                    عدد الحلقات
                </div>
                <div class="card-body">
                    <h1>{{\App\Group::all()->count()}}</h1>
                </div>
            </div>

            <div class="col-lg-3  card text-white bg-success">
                <div class="card-header ">
                    عدد الطلاب
                </div>
                <div class="card-body">
                    <h1>{{\App\Student::all()->count()}}</h1>
                </div>
            </div>

        </div>

        <div class="card-deck text-center justify-content-center mt-4">

            <div class="col-lg-3 card text-white bg-success">
                <div class="card-header">
                    عدد مشرفون المناطق
                </div>
                <div class="card-body">
                    <h1>{{\App\Area_Admin::all()->count()}}</h1>
                </div>
            </div>

            <div class="col-lg-3 card text-white bg-dark">
                <div class="card-header">
                    عدد مشروفون المساجد
                </div>
                <div class="card-body">
                    <h1>{{\App\Teacher::all()->count()}}</h1>
                </div>
            </div>

            <div class="col-lg-3  card text-white bg-info">
                <div class="card-header ">
                    عدد المحفظين
                </div>
                <div class="card-body">
                    <h1>{{\App\Group::all()->count()}}</h1>
                </div>
            </div>

            <div class="col-lg-3  card text-white bg-secondary">
                <div class="card-header ">
                        اجمالي المسنخدمين
                </div>
                <div class="card-body">
                    <h1>{{\App\User::all()->count()}}</h1>
                </div>
            </div>

        </div>
    </div>



@endsection

