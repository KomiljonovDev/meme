<?php

namespace App\Telegram\Bot;

use App\Telegram\Bot\Bot;
use App\Models\TgUser;
use App\Models\ReferralCode;
use Illuminate\Support\Str;

class BotHandler extends Bot {
    public function start(int $chatId):void {
        $user = TgUser::where('user_id', $chatId)->first();

        if (!$user){
            $user = TgUser::create(['user_id' => $chatId]);
            ReferralCode::create(['tg_user_id' => $user->id, 'code'=>Str::random(10)]);
        }

        $this->sendChatAction('typing', $chatId)
            ->sendMessage('Assalomu alaykum, ' . $user->code);
    }
    public function startReferal (int $chatId, string $text):void {
        $referrer_id = explode("/start", $text)[1];
        $this->sendChatAction('typing', $chatId)
            ->sendMessage('Assalomu alaykum, referal: ' . explode('/start'));
    }
}
