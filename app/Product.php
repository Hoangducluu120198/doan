<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     public $timestamps = false; //set time to false
    protected $fillable = [
        'category_id', 'brand_id', 'product_desc','product_content','product_price','product_image','product_status',
        'product_name'
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';
}