<?php

namespace App\Telegram\Bot;

use App\Telegram\Bot\Bot;

class BotHandler extends Bot {
    public function start(int $chatId) {
        echo "test";
        $this->sendChatAction('typing', $chatId)
            ->sendMessage('Assalomu alaykum');
    }
}
