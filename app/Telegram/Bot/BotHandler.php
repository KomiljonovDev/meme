<?php

namespace App\Telegram\Bot;

use App\Telegram\Bot\Bot;
use App\Models\TgUser;

class BotHandler extends Bot {
    public function start(int $chatId):void {
        TgUser::firstOrCreate([
            'user_id' => $chatId,
        ]);
        $this->sendChatAction('typing', $chatId)
            ->sendMessage('Assalomu alaykum');
    }
    public function startReferal (int $chatId, string $text):void {
        $this->sendChatAction('typing', $chatId)
            ->sendMessage('Assalomu alaykum, referal: ' . explode('/start', $text)[1]);
    }
}
