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

    public static function toFill (int $tgUserId) {
        $referrals = Referral::where('referrer_id', $tgUserId)->count();
        $plus = 1;
        if ($referrals >= 3) {
            $plus = 3;
        }
        $coin = Coin::where('tg_user_id', $tgUserId)->first();
        $coin->increment('coin', $plus);
        $coin->save();
        return $coin;
    }
}
