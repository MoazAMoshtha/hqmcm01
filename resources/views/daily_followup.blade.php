@extends('layouts.app')
@section('content')

    <?php
    if (isset($_GET['hqmcm_id'])) {
        $hqmcm_id = $_GET['hqmcm_id'];
    } else {
        $hqmcm_id = null;
    }
    ?>

    <div class="container ">
        <table class="table">
            <thead class="text-center alert-danger">
            <tr>
                <th scope="col">التسجيل اليومي</th>
                <th scope="col">اخر تسميع</th>
                <th scope="col">اخر حضور</th>
                <th scope="col">الطالب</th>
            </tr>
            </thead>
            <tbody class="text-center">
            <?php
            $group = \App\Group::where('teacher', Auth::user()->hqmcm_id)->first()->hqmcm_id;
            $students = \App\Student::where('group', $group)->get();
            use App\Http\Controllers\Daily_followupController;

            ?>
            @foreach ($students as $student)
                <tr>
                    <td><a href='{{route('daily_record' , $student->hqmcm_id )}} #record'>تسجيل</a></td>
                    <td>{{Daily_followupController::Last_recitations($student->hqmcm_id)}}</td>
                    <td>{{Daily_followupController::Last_attendance($student->hqmcm_id)}}</td>
                    <td>{{ $student->firstName . " " . $student->familyName }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <form action="{{route('daily_record_save')}}">
        <div class="container" @if($hqmcm_id == null) hidden @endif>

            <div class="card" id="record">
                @if(isset($_GET['hqmcm_id']))
                    <div class="card-header text-right">
                        {{\App\Student::where('hqmcm_id',$hqmcm_id)->first()->firstName . " " . \App\Student::where('hqmcm_id',$hqmcm_id)->first()->familyName}}
                        <input type="text" name="hqmcm_id" value="{{$_GET['hqmcm_id']}}" hidden>
                        <input type="text" name="date" value="{{date("Y/m/d")}}" hidden>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center text-center">
                            <label class="col-lg-2 order-lg-1">: الحضور والغياب</label>
                            <div class="col-lg-3">
                                <div class="form-check form-check-inline">
                                    <input onclick="myFunction()" class="form-check-input" type="radio"
                                           name="attendance" id="attendance1"
                                           value="غائب">
                                    <label class="form-check-label" for="inlineRadio1">غائب</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input onclick="myFunction()" class="form-check-input" type="radio"
                                           name="attendance" id="attendance2"
                                           value="لم يسمع">
                                    <label class="form-check-label" for="inlineRadio2">لم يسمع</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input onclick="myFunction()" class="form-check-input" type="radio"
                                           name="attendance" id="attendance3"
                                           value="حاضر">
                                    <label class="form-check-label" for="inlineRadio3">حاضر</label>
                                </div>
                            </div>
                            <script>
                                function myFunction() {
                                    $('#nnn').hide();
                                    $("#attendance3").click(function () {
                                        $("#nnn").show();
                                    });

                                }
                            </script>
                        </div>
                        <div class="row justify-content-center" id="nnn">
                            <div class="col-lg-4 row form-group order-lg-2">
                                <label class="col-lg-6 col-form-label order-lg-1">اسم السورة</label>
                                <div class="col-lg-6">
                                    <select name='s_quran' class="custom-select">
                                        <option value='' selected>...</option>
                                        <option value=' الفاتحة'> الفاتحة</option>
                                        <option value=' البقرة'> البقرة</option>
                                        <option value='  آل عمران'> آل عمران</option>
                                        <option value=' النساء'> النساء</option>
                                        <option value=' المائدة'> المائدة</option>
                                        <option value='  الأنعام '> الأنعام</option>
                                        <option value='  الأعراف'> الأعراف</option>
                                        <option value='  الأنفال '> الأنفال</option>
                                        <option value=' التوبة '> التوبة</option>
                                        <option value='  يونس'> يونس</option>
                                        <option value='  هود'> هود</option>
                                        <option value='  يوسف'> يوسف</option>
                                        <option value=' الرعد'> الرعد</option>
                                        <option value='  إبراهيم'> إبراهيم</option>
                                        <option value='  الحجر'> الحجر</option>
                                        <option value='  النحل'> النحل</option>
                                        <option value=' الإسراء'> الإسراء</option>
                                        <option value='  الكهف'> الكهف</option>
                                        <option value='  مريم'> مريم</option>
                                        <option value='  طه'> طه</option>
                                        <option value=' الأنبياء'> الأنبياء</option>
                                        <option value='  الحج'> الحج</option>
                                        <option value=' المؤمنون'> المؤمنون</option>
                                        <option value=' النّور'> النّور</option>
                                        <option value=' الفرقان'> الفرقان</option>
                                        <option value='  الشعراء'> الشعراء</option>
                                        <option value='  النّمل'> النّمل</option>
                                        <option value='  القصص'> القصص</option>
                                        <option value=' العنكبوت'> العنكبوت</option>
                                        <option value='  الرّوم'> الرّوم</option>
                                        <option value=' لقمان'> لقمان</option>
                                        <option value='  السجدة'> السجدة</option>
                                        <option value=' الأحزاب'> الأحزاب</option>
                                        <option value='  سبأ'> سبأ</option>
                                        <option value='  فاطر'> فاطر</option>
                                        <option value='  يس'> يس</option>
                                        <option value=' الصافات'> الصافات</option>
                                        <option value='  ص'> ص</option>
                                        <option value='  الزمر'> الزمر</option>
                                        <option value=' غافر'> غافر</option>
                                        <option value=' فصّلت'> فصّلت</option>
                                        <option value='  الشورى'> الشورى</option>
                                        <option value='  الزخرف'> الزخرف</option>
                                        <option value='  الدّخان'> الدّخان</option>
                                        <option value=' الجاثية'> الجاثية</option>
                                        <option value='  الأحقاف'> الأحقاف</option>
                                        <option value='  محمد'> محمد</option>
                                        <option value='  الفتح'> الفتح</option>
                                        <option value=' الحجرات'> الحجرات</option>
                                        <option value='  ق'> ق</option>
                                        <option value='  الذاريات'> الذاريات</option>
                                        <option value='  الطور'> الطور</option>
                                        <option value=' النجم'> النجم</option>
                                        <option value='  القمر'> القمر</option>
                                        <option value='  الرحمن'> الرحمن</option>
                                        <option value='  الواقعة'> الواقعة</option>
                                        <option value=' الحديد'> الحديد</option>
                                        <option value=' المجادلة'> المجادلة</option>
                                        <option value='  الحشر'> الحشر</option>
                                        <option value=' الممتحنة'> الممتحنة</option>
                                        <option value=' الصف'> الصف</option>
                                        <option value='  الجمعة'> الجمعة</option>
                                        <option value=' المنافقون'> المنافقون</option>
                                        <option value='  التغابن'> التغابن</option>
                                        <option value=' الطلاق'> الطلاق</option>
                                        <option value='  التحريم'> التحريم</option>
                                        <option value='  الملك'> الملك</option>
                                        <option value='  القلم'> القلم</option>
                                        <option value=' الحاقة'> الحاقة</option>
                                        <option value='  المعارج'> المعارج</option>
                                        <option value='  نوح'> نوح</option>
                                        <option value='  الجن'> الجن</option>
                                        <option value=' المزّمّل'> المزّمّل</option>
                                        <option value='  المدّثر'> المدّثر</option>
                                        <option value='  القيامة'> القيامة</option>
                                        <option value='  الإنسان'> الإنسان</option>
                                        <option value=' المرسلات'> المرسلات</option>
                                        <option value='  النبأ'> النبأ</option>
                                        <option value='  النازعات'> النازعات</option>
                                        <option value='  عبس'> عبس</option>
                                        <option value=' التكوير'> التكوير</option>
                                        <option value='  الإنفطار'> الإنفطار</option>
                                        <option value='  المطفّفين'> المطفّفين</option>
                                        <option value='  الإنشقاق'> الإنشقاق</option>
                                        <option value=' البروج'> البروج</option>
                                        <option value='  الطارق'> الطارق</option>
                                        <option value='  الأعلى'> الأعلى</option>
                                        <option value='  الغاشية'> الغاشية</option>
                                        <option value=' الفجر'> الفجر</option>
                                        <option value=' البلد'> البلد</option>
                                        <option value='  الشمس'> الشمس</option>
                                        <option value=' الليل'> الليل</option>
                                        <option value=' الضحى'> الضحى</option>
                                        <option value='  الشرح'> الشرح</option>
                                        <option value=' التين'> التين</option>
                                        <option value=' العلق'> العلق</option>
                                        <option value=' القدر'> القدر</option>
                                        <option value=' البينة'> البينة</option>
                                        <option value=' الزلزلة'> الزلزلة</option>
                                        <option value=' العاديات'> العاديات</option>
                                        <option value=' القارعة'> القارعة</option>
                                        <option value=' التكاثر'> التكاثر</option>
                                        <option value=' العصر'> العصر</option>
                                        <option value=' الهمزة'> الهمزة</option>
                                        <option value=' الفيل'> الفيل</option>
                                        <option value='  قريش'> قريش</option>
                                        <option value=' الماعون'> الماعون</option>
                                        <option value=' الكوثر'> الكوثر</option>
                                        <option value=' الكافرون'> الكافرون</option>
                                        <option value=' النصر'> النصر</option>
                                        <option value=' المسد'> المسد</option>
                                        <option value=' الإخلاص'> الإخلاص</option>
                                        <option value=' الفلق'> الفلق</option>
                                        <option value='  النّاس'> النّاس</option>
                                    </select>
                                </div>
                            </div>
                            <div class=" col-lg-4 order-lg-1 row form-group">
                                <label class="col-lg-6 col-form-label order-lg-1">من الاية رقم</label>
                                <div class="col-lg-6">
                                    <input class="form-control order-lg-0" type="text" name="from">
                                </div>
                            </div>
                            <div class=" col-lg-4 order-lg-0 row form-group">
                                <label class="col-lg-6 col-form-label order-lg-1">حتى الاية رقم</label>
                                <div class="col-lg-6">
                                    <input class="form-control order-lg-0" type="text" name="to">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">تسجيل</button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </form>

@endsection
