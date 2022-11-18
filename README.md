#### Install via composer

```
composer require lumen/octane
```

#### Copy the config


Copy the config file from vendor/lumen/octane/config/octane.php to config folder of your Lumen application 

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
