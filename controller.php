<?php namespace Concrete\Package\EloquentOrm;
defined('C5_EXECUTE') or die('Access Denied');
require(__DIR__ . '/vendor/autoload.php');

use Illuminate\Database\Capsule\Manager as Capsule;
use Concrete\Core\Package\Package;

class Controller extends Package {

    protected $pkgHandle = 'eloquent_orm';
    protected $appVersionRequired = '5.7';
    protected $pkgVersion = '1.0';

    public function getPackageDescription()
    {
        return t('Laravel Illuminate/Database component for c5.7');
    }

    public function getPackageName()
    {
        return t('Laravel Eloquent ORM');
    }

    public function install()
    {
        return parent::install();
    }

    public function bootEloquent()
    {
        //Get DB connection configuration
        $db = \Config::get('database')['connections']['concrete'];

        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => $db['server'],
            'database'  => $db['database'],
            'username'  => $db['username'],
            'password'  => $db['password'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'strict'    => false,
        ]);


        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();

        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();
    }

    public function on_start()
    {
       
        $this->bootEloquent();

    }

}