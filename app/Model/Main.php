<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 't_main';

    protected $guarded = ['id', 'ctime', 'mtime'];

    public $timestamps = false;

}