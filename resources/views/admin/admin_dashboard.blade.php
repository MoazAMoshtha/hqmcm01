<?php
if(isset($_GET['hqmcm_id'])){
    switch ($_GET['user_type']){
        case 'area_admin':
            \App\Area_Admin::where('hqmcm_id' , $_GET['hqmcm_id'])->delete();
            \App\User::where('hqmcm_id' , $_GET['hqmcm_id'])->delete();
            break;
        case 'mosque_admin':
            \App\Mosque_Admin::where('hqmcm_id' , $_GET['hqmcm_id'])->delete();
            \App\User::where('hqmcm_id' , $_GET['hqmcm_id'])->delete();
            break;
        case 'teacher':
            \App\Teacher::where('hqmcm_id' , $_GET['hqmcm_id'])->delete();
            \App\User::where('hqmcm_id' , $_GET['hqmcm_id'])->delete();
            break;
        case 'student':
            \App\Student::where('hqmcm_id' , $_GET['hqmcm_id'])->delete();
            \App\User::where('hqmcm_id' , $_GET['hqmcm_id'])->delete();
            break;
    }
}
?>
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

    <div class="container mt-5">

            <h4 class="text-right">أخر مستخدم مضاف </h4><hr>
        <table class="table ">
            <thead class="thead-dark">
            <tr>
                <th scope="col">رقم المستخدم</th>
                <th scope="col">اسم المستخدم</th>
                <th scope="col">نوع المسنخدم</th>
                <th scope="col">حذف | تعديل</th>
            </tr>
            </thead>
            <tbody>
            <?php $users = \App\User::where('hqmcm_id' , '!=' , Auth::user()->hqmcm_id)->get()?>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->hqmcm_id}}</th>
                <td>{{$user->firstName . " " . $user->secondName . " " . $user->familyName}}</td>
                <td>{{$user->user_type}}</td>
                <form action="" >
                    <td><input type="number" name="hqmcm_id" hidden value="{{$user->hqmcm_id}}">
                        <input type="text" name="user_type" hidden value="{{$user->user_type}}">
                        <input type="submit" value="حذف" class="btn-danger"></td>
                </form>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection

