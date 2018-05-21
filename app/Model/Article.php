<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 't_article';

    protected $guarded = ['id', 'ctime', 'mtime'];

    public $timestamps = false;

}