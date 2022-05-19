<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'userid',
        'product_name',
        'cost',
        'quantity',
        'final_cost',
    ];
    use HasFactory;
}
