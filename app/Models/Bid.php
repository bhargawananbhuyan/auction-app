<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'bid_by',
        'auction_id',
        'amount',
        'status'
    ];

    public function bidder()
    {
        return $this->belongsTo(User::class, 'bid_by');
    }

    public function auction()
    {
        return $this->belongsTo(Auction::class, 'auction_id');
    }
}
