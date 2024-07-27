<?php

namespace App\Telegram\Bot;

use App\Models\Coin;
use App\Telegram\Bot\Bot;
use App\Models\TgUser;
use App\Models\ReferralCode;
use Illuminate\Support\Str;

class BotHandler extends Bot {
    public function start(int $chatId):void {
        $user = TgUser::where('user_id', $chatId)->first();

        if (!$user){
            $user = TgUser::create(['user_id' => $chatId]);
            $referral = ReferralCode::create(['tg_user_id' => $user->id, 'code'=>Str::random(10)]);
            $coin = Coin::create(['tg_user_id' => $user->id, 'coin'=>env('MINIMUM_BONUS_COIND', 10000)]);
        }else{
            $referral = ReferralCode::where('tg_user_id', $user->id)->first();
            $coin = ReferralCode::where('tg_user_id', $user->id)->first();
        }

        $this->sendChatAction('typing', $chatId)
            ->sendMessage('Assalomu alaykum, ' . $referral->code . "\ncoin: " . $coin->coin);
    }
    public function startReferal (int $chatId, string $text):void {
        $referrer_id = explode("/start", $text)[1];
        $this->sendChatAction('typing', $chatId)
            ->sendMessage('Assalomu alaykum, referal: ');
    }
}
