<?php namespace Concrete\Package\EloquentOrm\Src\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Example extends Eloquent {

    protected $table = 'example';
    protected $fillable = ['name','email'];
    public $timestamps = false;


}