<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = [
        'added_by',
        'product_name',
        'product_details',
        'base_amount',
        'sold_for',
        'status'
    ];
}
