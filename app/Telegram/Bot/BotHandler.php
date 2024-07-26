<?php

namespace App\Telegram\Bot;

use App\Telegram\Bot\Bot;
use App\Models\TgUser;

class BotHandler extends Bot {
    public function start(int $chatId):void {
        $user = TgUser::firstOrCreate([
            'user_id' => $chatId,
        ]);
        $this->sendChatAction('typing', $chatId)
            ->sendMessage('Assalomu alaykum');
        dd($user->id);
    }
    public function startReferal (int $chatId, string $text):void {
        $referrer_id = explode("/start", $text)[1];
        $this->sendChatAction('typing', $chatId)
            ->sendMessage('Assalomu alaykum, referal: ' . explode('/start'));
    }
}
