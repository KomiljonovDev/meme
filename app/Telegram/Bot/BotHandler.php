<?php

namespace App\Telegram\Bot;

use App\Models\Coin;
use App\Telegram\Bot\Bot;
use App\Models\TgUser;
use App\Models\ReferralCode;
use Illuminate\Support\Str;

class BotHandler extends Bot {
    public function start(int $chatId):void {

        $user_data = TgUser::saveUser($chatId);

        $this->sendChatAction('typing', $chatId)
            ->sendMessage('Assalomu alaykum, ' . $user_data['referral']->code . "\ncoin: " . $user_data['coin']->coin);
    }
    public function startReferral (int $chatId, $update):void {
        $this->sendChatAction('typing', $chatId)
            ->sendMessage(json_encode($update));

//        $referrer_id = explode("/start", $text)[1];
//
//        $user_data = TgUser::saveUser($chatId, $referrer_id);
//
//        $this->sendChatAction('typing', $chatId)
//            ->sendMessage('Assalomu alaykum, by referral ' . $user_data['referral']->code . "\ncoin: " . $user_data['coin']->coin);

    }
}
