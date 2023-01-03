<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table ='product';
    protected $fillable = [
        'name', 'price','stock','type','description','manufacturer',
    ];

    public function image()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function categorys()
    {
        return $this->hasMany(ProductCategory::class, 'product_id', 'id');
    }

    public function detailTransaction()
    {
        return $this->hasOne(TransactionDetail::class, 'product_id', 'id');
    }
}
