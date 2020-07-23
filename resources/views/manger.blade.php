@extends('layouts.app')
@section('content')
@include('operationStatus.area_add_status')
<div class="container">

    @include('function.area_fun')
    @include('function.mosque_fun')
    @include('function.teachers_fun')
    @include('function.students_fun')
</div>
@endsection
