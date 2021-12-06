<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name', 'product_code', 'cate_id', 'supply_id', 'product_self', 'product_route', 'buy_date', 'expire_date', 'buying_price', 'selling_price', 'product_img',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id','id');
    }


    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supply_id','id');
    }


}
