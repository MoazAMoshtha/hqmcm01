@extends('layouts.app')
@section('content')

@include('operationStatus.area_add_status')
    <?php
    $get_mosques_manger_from_url = $get_groups_manger_from_url = $get_teachers_manger_from_url = $get_students_manger_from_url = 0;
    $get_mosques_manger_from_url = preg_match("/mosques_manger/i", url()->full());
    $get_groups_manger_from_url = preg_match("/groups_manger/i", url()->full());
    $get_teachers_manger_from_url = preg_match("/teachers_manger/i", url()->full());
    $get_students_manger_from_url = preg_match("/students_manger/i", url()->full());

    ?>

    <div class="container">
        @if(Auth::user()->user_type == 'area_admin')
            @if($get_mosques_manger_from_url == 1)
                @include('function.mosque_fun')
            @elseif($get_groups_manger_from_url == 1)
                @include('function.group_fun')
            @elseif($get_teachers_manger_from_url == 1)
                @include('function.teachers_fun')
            @elseif($get_students_manger_from_url == 1)
                @include('function.students_fun')
            @endif
        @endif
    </div>

    <div class="container">
        @if(Auth::user()->user_type == 'mosque_admin')
            @if($get_mosques_manger_from_url == 1)
                @include('function.teachers_fun')
            @elseif($get_groups_manger_from_url == 1)
                @include('function.students_fun')
            @endif
        @endif

    </div>
    <div class="container">
        @if(Auth::user()->user_type == 'teacher')
                @if($get_mosques_manger_from_url == 1)
                    @include('function.students_fun')
                @endif
        @endif
    </div>
@endsection

