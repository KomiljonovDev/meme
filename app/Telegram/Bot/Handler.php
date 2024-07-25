<?php
use App\Telegram\Bot\BotHandler;

$bot = new BotHandler(['botToken'=>'1234']);

$update = $bot->updates();

if (isset($update)){
    $message = $update->message;
    $text = $message->text;
    $chatId = $message->chat->id;
    if ($text == '/start'){
        $bot->start($chatId);
    }
}
