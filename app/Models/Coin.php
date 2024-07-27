<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;
    protected $fillable = [
        'tg_user_id',
        'coin'
    ];

    public static function plus (int $tgUserId) {
        $referrals = Referral::where('referrer_id', $tgUserId)->count();
        dd($referrals);
    }
}
