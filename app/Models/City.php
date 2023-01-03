<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'tb_ro_cities';
    protected $fillable = [
        'city_id','province_id', 'city_name', 'postal_code',
    ];
}
