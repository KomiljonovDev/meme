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
        $this->sendMessage('Assalomu alaykum, https://t.me/' . env('BOT_USER_NAME', 'bot_meme_bot_test_bot') . "?start=r_" . $user_data['referral']->code . "\ncoin: " . $user_data['coin']->coin, $chatId);
    }
    public function startReferral (int $chatId, string $text):void {
        $referrer_id = explode("/start", $text)[1];
        $user_data = TgUser::saveUser($chatId, $referrer_id);
        $this->sendMessage("Assalomu alaykum, by referral \n\nhttps://t.me/" . env('BOT_USER_NAME', 'bot_meme_bot_test_bot') . "?start=r_" . $user_data['referral']->code . "\ncoin: " . $user_data['coin']->coin, $chatId);

    }
}
