@extends('layouts.app')
@section('content')

    @include('operationStatus.area_add_status')
    <script>
        function showManger() {
           $("#mosqueFun").click(function () {
                $("#mosque_fun").show();
                $("#teachers_fun").hide();
                $("#students_fun").hide();
            });
            //$('#vvvvv').hide();

        }
    </script>
    <div class="container" >
        @if(Auth::user()->user_type == 'area_admin')
            <div id="mosque_fun">
            @include('function.mosque_fun')
        </div>
        <div id="teachers_fun">
            @include('function.teachers_fun')

        </div>
        <div id="students_fun">
            @include('function.students_fun')
        </div>
    @endif


    </div>

        @if(Auth::user()->user_type == 'mosque_admin')
            @include('function.teachers_fun')
            @include('function.students_fun')
        @endif
        @if(Auth::user()->user_type == 'teacher')
            @include('function.students_fun')
        @endif

    </div>
@endsection
