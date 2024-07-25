<?php
use App\Telegram\Bot\BotHandler;

$bot = new BotHandler(['botToken'=>'1234']);
$data = $bot->setWebHook('https://komiljonovdev.uz/okdeveloper/tgbots/meme/public/webhook');

var_dump($data->result());

$update = $bot->updates();

if (isset($update?->message)){
    $message = $update->message;
    $text = $message->text;
    $chatId = $message->chat->id;
    if ($text == '/start'){
        $bot->start($chatId);
    }
}
