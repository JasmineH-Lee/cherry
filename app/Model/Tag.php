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

    const FIELDS_EXPLAIN = [
        'founder_bg'     => '创始人背景',
        'brand_bg'       => '品牌背景',
        'brand_culture'  => '品牌文化',
        'brand_identify' => '品牌辨识',
    ];
}