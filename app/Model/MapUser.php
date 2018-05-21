<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapUser extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 't_map_user';

    protected $guarded = ['id', 'ctime', 'mtime'];

    public $timestamps = false;


    const TYPE_BRAND   = 1;
    const TYPE_ARTICLE = 2;

    const FIELDS_EXPLAIN = [

    ];
}