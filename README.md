####  

Laravel Octane supercharges your application's performance by serving your application using high-powered application servers, including Open Swoole, Swoole, and RoadRunner. Octane boots your application once, keeps it in memory, and then feeds it requests at supersonic speeds.

lumen Octane is based on code from   Laravel Octane,  make your lumen app can integration octane

it can run on php >= 7.4 , lumen version  5.8, 6.0, 7.0, 8.0, 9.0



#### Install via composer

```
composer require swooder/lumenoctane
```

#### Copy the config


Copy the config file from vendor/swooder/lumenoctane/config/octane.php to config folder of your Lumen application 

Register your config by adding the following in the bootstrap/app.php before middleware declaration.

```
$app->configure('octane');
```


#### Bootstrap file changes

Add the following snippet to the bootstrap/app.php file under the providers section as follows:

```
// Add this line
$app->register(Laravel\Octane\OctaneServiceProvider::class);
```


#### swoole

If you plan to use the Swoole application server to serve your Laravel Octane application, you must install the Swoole PHP extension. Typically, this can be done via PECL

```
pecl install swoole
```

#### RoadRunner

RoadRunner is powered by the RoadRunner binary, which is built using Go. The first time you start a RoadRunner based Octane server, Octane will offer to download and install the RoadRunner binary for you

```
# Within the Sail shell...
./vendor/bin/rr get-binary
```

#### Serving Your Application

```
php artisan octane:start
```

#### More Info about 

please visit laravel octane https://laravel.com/docs/9.x/octane
