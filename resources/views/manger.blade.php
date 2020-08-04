@extends('layouts.app')
@section('content')

    @include('operationStatus.area_add_status')
    <div class="container">
        @if(Auth::user()->user_type == 'area_admin')
            @include('function.mosque_fun')
            @include('function.teachers_fun')
            @include('function.students_fun')
        @endif
        @if(Auth::user()->user_type == 'mosque_admin')
            @include('function.teachers_fun')
            @include('function.students_fun')
        @endif
        @if(Auth::user()->user_type == 'teacher')
            @include('function.students_fun')
        @endif

    </div>
@endsection
