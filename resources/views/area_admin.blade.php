@include('includes.navbar')

<?php
    echo "hello";
    $user = DB::table('users')->where('firstName', 'معاذ')->first()->firstName;
    echo $user;
echo "area admin page";
?>


