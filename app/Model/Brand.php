<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 't_brand';

    const FIELDS_EXPLAIN = [
        'founder_bg'     => '创始人背景',
        'brand_bg'       => '品牌背景',
        'brand_culture'  => '品牌文化',
        'brand_identify' => '品牌辨识',
    ];
}