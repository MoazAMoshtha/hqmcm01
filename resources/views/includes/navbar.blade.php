<!doctype html>
<html lang="ar">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/hqmcm01/assets/css/css.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body class="aljazera">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapse_target">
        <ul class="navbar-nav mr-auto aljazera">
            <li class="nav-item dropdown">
                @if (Route::has('logout'))

                    <div class="top-right links">
                        @auth
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        $user = DB::table('users')->where('id',)->first();
                        echo $user->firstName;



                        ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">الملف الشخصي</a>
                        <a class="dropdown-item" href="#">الاعدادات</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item">تسجيل الخروج</a>
                    </div>

                        @else
                        @endauth
                    </div>
                @endif
            </li>
            <li class="nav-item">
                @if (Route::has('register'))
                    <div class="top-right links">
                        @auth
                        @else
                            <a href="{{ route('register') }}" class="nav-link">سجل الان</a>
                        @endauth

                    </div>
                @endif

            </li>
            <li>
                @if (Route::has('login'))

                    <div class="top-right links">
                        @auth
                        @else
                            <a href="{{ route('login') }}" class="nav-link"> تسجيل الدخول</a>
                        @endauth
                    </div>
                @endif
            </li>

        </ul>
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">اتصل بنا</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">من نحن</a>
            </li>
            <li class="nav-item">


                            <a href="" class="nav-link">الرئيسية</a>

            </li>
        </ul>
        </div>
    </nav>




















<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
