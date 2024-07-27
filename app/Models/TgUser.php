<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TgUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'active'
    ];

    public static function saveUser (int $chatId, $referrer_code = null):array {
        $user = TgUser::where('user_id', $chatId)->first();
        if (!$user){
            $user = TgUser::create(['user_id' => $chatId]);
            $referral = ReferralCode::create(['tg_user_id' => $user->id, 'code'=>Str::random(10)]);
            $coin = Coin::create(['tg_user_id' => $user->id, 'coin'=>env('MINIMUM_BONUS_COIN', 10000)]);
            if ($referrer_code) {
                $referrer_user = ReferralCode::where(['code' => str_replace('r_', '', trim($referrer_code))])->first();
                $referrer_user_coin = Coin::where(['tg_user_id' => $referrer_user->id])->first();
                $referrer_user_coin->coin += env('REFERRAL_BONUS_COIN', 7000);
                Referral::create(['referrer_id' => $referrer_user->tg_user_id, 'referred_user_id' => $user->id, 'status'=>'accept']);
                $referrer_user_coin->save();
            }
        }else{
            $referral = ReferralCode::where('tg_user_id', $user->id)->first();
            $coin = Coin::where('tg_user_id', $user->id)->first();
        }
        return [
            'user' => $user,
            'referral' => $referral,
            'coin' => $coin
        ];
    }
}
