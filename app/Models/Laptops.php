<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laptops extends Model
{
    protected $table = 'laptops';

    protected $fillable = [
        'brand',
        'model',
        'ram_size',
        'storage_size',
        'processor',
    ];
}
