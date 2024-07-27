<?php

namespace App\Telegram\Bot;

use App\Models\Coin;
use App\Telegram\Bot\Bot;
use App\Models\TgUser;
use App\Models\ReferralCode;
use Illuminate\Support\Str;

class BotHandler extends Bot {
    public function updateHandler () {
        $this->sendMessage(json_encode($this->updates()), $this->updates()->message->from->id);
    }
    public function start(int $chatId):void {

        $user_data = TgUser::saveUser($chatId);

        $this->sendMessage('Assalomu alaykum, ' . $user_data['referral']->code . "\ncoin: " . $user_data['coin']->coin, $chatId);
    }
    public function startReferral (int $chatId, string $text):void {
        $referrer_id = explode("/start", $text)[1];
        $this->sendMessage('ref: ' . $referrer_id . "\n\ntrimmed: " . json_encode(trim($referrer_id, 'r_')), $chatId);
        $user_data = TgUser::saveUser($chatId, $referrer_id);

        $this->sendMessage('Assalomu alaykum, by referral ' . $user_data['referral']->code . "\ncoin: " . $user_data['coin']->coin, $chatId);

    }
}
