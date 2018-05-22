<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 't_tag';

    public $timestamps = false;

    protected $guarded = ['id', 'ctime', 'mtime'];

}