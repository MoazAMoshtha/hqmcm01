<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Laravel 7 : HQMCM


## Download Laragon
```
https://laragon.org/download/
```

## Download Composer
```
https://getcomposer.org/download/
select php from C:\laragon\bin\php
```



## Download Git
```
https://git-scm.com/downloads
```

## Download phpStorm
```
https://www.jetbrains.com/phpstorm/download/download-thanks.html?platform=windows
rigester with your edu email to upgrade
```

## Clone this repo
```
open laragon->www folder , click right Git Bush
$ git clone https://github.com/MoazAMoshtha/hqmcm01.git
```

## Install composer packages
```
1- open project folder at phpStorm
2- phpStorm->terminal (bottom bar)
$ composer install
```

## Create and setup .env file
```
make a copy of .env.example and rename to .env
$ php artisan key:generate
put database credentials in .env file like:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hqmcm01 !open phpmyadmin and create database -> http://localhost/phpmyadmin/
DB_USERNAME=root
DB_PASSWORD=
```

## Migrate and insert records
```
$ php artisan migrate
```

## Mail setup !skippable
```
visit at : https://mailtrap.io/
put mail credentials in .env file
```

## Facing any problem? Contact with me
```
mama.moshtha@gmail.com
```
