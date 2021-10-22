<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
        'kategori' => [
            'driver' => 'local',
            'root' => dirname(__DIR__,2).'/public_html/img/kategori',
            'url' => env('APP_URL').'/img/kategori',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'endpoint' => env('AWS_URL'),
        ],
        'produk' => [
            'driver' => 'local',
            'root' => dirname(__DIR__,2).'/public_html/img/produk',
            'url' => env('APP_URL').'/img/produk',
            'visibility' => 'public',
        ],
        'banner' =>[
            'driver' => 'local',
            'root' =>dirname(__DIR__,2).'/public_html/img/banner',
            'url' => env('APP_URL').'/img/banner',
            'visibility' => 'public',
        ],
        'berita' =>[
            'driver' => 'local',
            'root' =>dirname(__DIR__,2).'/public_html/img/berita',
            'url' => env('APP_URL').'/img/berita',
            'visibility' => 'public',
        ],
        'foto_ktp' =>[
            'driver' => 'local',
            'root' =>dirname(__DIR__,2).'/public_html/img/foto_ktp',
            'url' => env('APP_URL').'/img/foto_ktp',
        ],
        'foto' =>[
            'driver' => 'local',
            'root' =>dirname(__DIR__,2).'/public_html/img/foto',
            'url' => env('APP_URL').'/img/foto',
            'visibility' => 'public',
        ],
        'umkm' =>[
            'driver' => 'local',
            'root' =>dirname(__DIR__,2).'/public_html/img/umkm',
            'url' => env('APP_URL').'/img/umkm',
            'visibility' => 'public',
        ],
        'foto_user' =>[
            'driver' => 'local',
            'root' =>dirname(__DIR__,2).'/public_html/img/foto_user',
            'url' => env('APP_URL').'/img/foto_user',
            'visibility' => 'public',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
