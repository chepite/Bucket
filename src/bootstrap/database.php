<?php
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection([
 'driver'    => 'mysql',
 'host'      => getenv('PHP_DB_HOST') ?: 'ID338673_bucketdb.db.webhosting.be',
 'database'  => getenv('PHP_DB_DATABASE') ?: 'ID338673_bucketdb',
 'username'  => getenv('PHP_DB_USERNAME') ?: 'ID338673_bucketdb',
 'password'  => getenv('PHP_DB_PASSWORD') ?: 'devine4life',
 'charset'   => 'utf8mb4',
 'collation' => 'utf8mb4_unicode_ci',
 'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();
