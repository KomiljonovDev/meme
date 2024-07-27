<?php
use App\Telegram\Bot\BotHandler;

$bot = new BotHandler(['botToken'=>env('TELEGRAM_BOT_TOKEN')]);


$update = $bot->updates();

if (isset($update?->message)){
    echo "ok";
    $message = $update->message;
    $text = $message->text;
    $chatId = $message->chat->id;
    if ($text == '/start'){
        $bot->start($chatId);
        return;
    }
    if (mb_stripos($text, '/start') !== false){
        $bot->startReferral($chatId, $text);
        return;
    }
}
