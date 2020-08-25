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
                        <h1>{{\App\Student::where('group' ,10101 )->count()}}</h1>
                    </div>
                </div>
            </div>

            <table class="table mt-5">
                <thead class="text-center alert-danger">
                <tr>
                    <th scope="col">الصفحات خلال الشهر</th>
                    <th scope="col">الصفحات خلال الاسبوع</th>
                    <th scope="col">اخر حضور</th>
                    <th scope="col">الطالب</th>
                </tr>
                </thead>
                <tbody class="text-center">

                <?php
                $students = \App\Student::where('group', 10101)->get();

                ?>
                @foreach ($students as $student)
                    <tr>
                        <td>{{rand(4,10)}}</td>
                        <td>{{rand(1,3)}}</td>
                        <td>{{\App\Http\Controllers\Daily_followupController::Last_attendance($student->hqmcm_id)}}</td>
                        <td>{{ $student->firstName . " " . $student->familyName }}</td>
                    </tr>


                @endforeach
                </tbody>
            </table>

        </div>

    @elseif(Auth::user()->user_type == 'student')
        <table class="table mt-5">
            <thead class="text-center alert-danger">
            <tr>
                <th scope="col">التسميع</th>
                <th scope="col">الحضور والغياب</th>
                <th scope="col">تاريخ اليوم</th>
            </tr>
            </thead>
            <tbody class="text-center">

            <?php
            $students = \App\Daily::where('student_hqmcm_id', Auth::user()->hqmcm_id)->get();

            ?>
            @foreach ($students as $student)

                <tr>
                    <td>{{$student->daily_recitations}}</td>
                    <td>{{$student->attendance}}</td>
                    <td>{{$student->date}}</td>
                </tr>


            @endforeach
            </tbody>
        </table>

    @endif()

@endsection
