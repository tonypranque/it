<?php

namespace App\Services;

use Telegram\Bot\Api;
use Illuminate\Support\Facades\Log;

class TelegramService
{
    public function sendMessage(string $message): bool
    {
        try {
            $botToken = config('telegram.bots.mybot.token');
            $chatId = config('telegram.bots.mybot.chat_id');

            if (empty($botToken) || $botToken === 'YOUR-BOT-TOKEN') {
                Log::error('TELEGRAM_BOT_TOKEN не установлен правильно');
                return false;
            }

            if (empty($chatId)) {
                Log::error('TELEGRAM_CHANNEL не установлен');
                return false;
            }

            $telegram = new Api($botToken);

            // Отправляем сообщение без HTML парсинга
            $response = $telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => $message,
                // Убираем parse_mode - отправляем как обычный текст
            ]);

            Log::info('Сообщение успешно отправлено в Telegram');
            return true;

        } catch (\Exception $e) {
            Log::error('Ошибка отправки Telegram сообщения: ' . $e->getMessage());
            return false;
        }
    }
}
