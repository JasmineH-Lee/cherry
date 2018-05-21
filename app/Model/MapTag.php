<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapTag extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 't_map_tag';

    protected $guarded = ['id', 'ctime', 'mtime'];

    public $timestamps = false;


    const TYPE_BRAND   = 1;
    const TYPE_ARTICLE = 2;

    const FIELDS_EXPLAIN = [

    ];
}