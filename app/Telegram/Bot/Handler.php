<?php
use App\Telegram\Bot\BotHandler;

$bot = new BotHandler(['botToken'=>'7170488644:AAG3pMlvLYfvGoGpoL9P3taX5FEDI37MOm0']);


$update = $bot->updates();

if (isset($update?->message)){
    $message = $update->message;
    $text = $message->text;
    $chatId = $message->chat->id;
    if ($text == '/start'){
        $bot->start($chatId);
    }
}
