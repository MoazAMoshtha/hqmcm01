<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ادارة مراكز التحفيظ</title>

    </head>
    <body>
    @include('includes.navbar')
    <!--اخر الأخبار-->
    <div class="container-fluid">
        <div class="row justify-content-start">
            <div class="col-1">
                <div>

                </div>
            </div>

            <div class="col-10">
                <h4 class=" pt-3 text-right">أخر الأخبار </h4>
                <div class="bg-dark h-15 pt-1 mb-2">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block  imagesSize" src="../../assets/images/1.svg"
                                 alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block imagesSize" src="assets/images/2.svg"
                                 alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>وزارة الأوقاف والشؤون الدينية</h5>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block imagesSize" src="assets/images/3.svg"
                                 alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!--لوحة الشرف-->
    <div class="container-fluid bg-dark">
        <h2 class="text-blue2 text-center pt-3">لوحة الشرف</h2>
        <div class="row text-center pb-3">
            <div class="col-sm">
                <h3 class="text-white">الشهرية</h3>
                <div class="bg-white rounded">
                    اسماء اليومية<br>اسماء اليومية<br>اسماء اليومية
                    <br>اسماء اليومية<br>اسماء اليومية<br>اسماء اليومية<br>اسماء اليومية
                    <br>اسماء اليومية<br> اسماء اليومية<br>اسماء اليومية<br>اسماء اليومية
                    <br>اسماء اليومية<br>اسماء اليومية<br>اسماء اليومية<br>اسماء اليومية
                    <br>اسماء اليومية<br>
                </div>
            </div>
            <div class="col-sm">
                <h3 class="text-white">الأسبوعية</h3>
                <div class="bg-white rounded">
                    اسماء اليومية<br>اسماء اليومية<br>اسماء اليومية
                    <br>اسماء اليومية<br>اسماء اليومية<br>اسماء اليومية<br>اسماء اليومية
                    <br>اسماء اليومية<br> اسماء اليومية<br>اسماء اليومية<br>اسماء اليومية
                    <br>اسماء اليومية<br>اسماء اليومية<br>اسماء اليومية<br>اسماء اليومية
                    <br>اسماء اليومية<br>
                </div>
            </div>
            <div class="col-sm">
                <h3 class="text-white">اليومية</h3>
                <div class="bg-white rounded">
                    اسماء اليومية<br>اسماء اليومية<br>اسماء اليومية
                    <br>اسماء اليومية<br>اسماء اليومية<br>اسماء اليومية<br>اسماء اليومية
                    <br>اسماء اليومية<br> اسماء اليومية<br>اسماء اليومية<br>اسماء اليومية
                    <br>اسماء اليومية<br>اسماء اليومية<br>اسماء اليومية<br>اسماء اليومية
                    <br>اسماء اليومية<br>
                </div>
            </div>
        </div>
    </div>


    <!-- اسلاميات -->
    <div class="container-fluid bgimg pb-5">
        <div class="row justify-content-start">
            <div class="col-sm-1">
                <div>

                </div>
            </div>
            <div class="col-sm-10">
                <h4 class="aljazera pt-3 text-right">اسلاميات </h4>
                <div class="bg-dark h-15 pt-1 mb-2">

                </div>
            </div>
        </div>
        <div class="row justify-content-end ">
            <div class="col-sm-3 col-md-3 ">
                <div class="container-fluid bg-dark rounded h-100">

                </div>
            </div>
            <div class="col-sm-7 col-md-7">
                <div class="container-fluid bg-blue2 rounded">
                    <div class="row justify-content-end pt-3">
                        <div class="col-sm-12 col-md-12">
                            <div class="container-fluid bg-dark rounded">
                                <div class="row justify-content-end text-white text-right">
                                    <h3 class="mt-3 mb-3 mr-4 ">فيديو</h3>
                                </div>
                                <div class="row justify-content-around text-white text-right">
                                    <div class="col-md-4 col-sm-6 col-lg-4 mb-3">
                                        <img src="assets/images/qra.jpg" class="rounded float-sm-left w-100 img200">
                                    </div>
                                    <div class="col-md-6 col-sm-2 col-lg-6">
                                        <div>
                                            <h3>خطبة عن اجر حفظ القران
                                                للشيخ يوسف القرضاوي</h3>
                                        </div>
                                        <div class="mt-5">
                                            <a href="" class="nav-link"><h5 class="text-blue2 ">...شاهد الأن </h5></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end pt-3">
                        <div class="col-sm-12 col-md-12">
                            <div class="container-fluid bg-dark rounded mb-3">
                                <div class="row justify-content-end text-white text-right">
                                    <h3 class="mt-3 mb-3 mr-4 ">مقال</h3>
                                </div>
                                <div class="row justify-content-around text-white text-right">
                                    <div class="col-md-4 col-sm-6 col-lg-4 mb-3">
                                        <img src="assets/images/1.jpg" class="rounded float-sm-left w-100 img200">
                                    </div>
                                    <div class="col-md-6 col-sm-2 col-lg-6">
                                        <div >
                                            <h3>مقال اسلامي عن فضل قراءة القران وتدبر معانيه</h3>
                                        </div>
                                        <div class="mt-5">
                                            <a href="" class="nav-link"><h5 class="text-blue2 ">...اقرأ المزيد </h5></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-1">

            </div>
        </div>
    </div>

    <div class="container-fluid bg-blue2 h-100">
        <div class="row justify-content-start">
            <div class="col-sm-1">
                <div>

                </div>
            </div>
            <div class="col-sm-10">
                <h4 class="aljazera pt-3 text-right text-white">ابداعات الطلاب </h4>
                <div class="bg-white h-15 pt-1 mb-2">

                </div>
            </div>
        </div>

    </div>
@include('includes.footer')
    </body>
</html>
