<?php

namespace App\Observers;

use App\Models\ContactSubmission;
use App\Services\TelegramService;

class ContactSubmissionObserver
{
    protected $telegramService;

    public function __construct(TelegramService $telegramService)
    {
        $this->telegramService = $telegramService;
    }

    /**
     * Handle the ContactSubmission "created" event.
     */
    public function created(ContactSubmission $contactSubmission): void
    {
        $message = $this->formatMessage($contactSubmission);
        $this->telegramService->sendMessage($message);
    }

    /**
     * Форматирование сообщения для Telegram (простой текст)
     */
    private function formatMessage(ContactSubmission $submission): string
    {
        // Очищаем все данные от потенциально опасных символов
        $name = $this->cleanText($submission->name);
        $phone = $this->cleanText($submission->phone);
        $email = $submission->email ? $this->cleanText($submission->email) : null;
        $company = $submission->company ? $this->cleanText($submission->company) : null;
        $service = $submission->service ? $this->cleanText($submission->service) : null;
        $messageText = $submission->message ? $this->cleanText($submission->message) : null;

        // Формируем простое текстовое сообщение без HTML тегов
        $message = "Новое обращение с сайта\n\n";
        $message .= "Имя: {$name}\n";
        $message .= "Телефон: {$phone}\n";

        if ($email) {
            $message .= "Email: {$email}\n";
        }

        if ($company) {
            $message .= "Компания: {$company}\n";
        }

        if ($service) {
            $message .= "Услуга: {$service}\n";
        }

        if ($messageText) {
            $message .= "Сообщение:\n{$messageText}\n";
        }

        $message .= "\nДата: " . $submission->created_at->format('d.m.Y H:i');

        return $message;
    }

    /**
     * Очистка текста от потенциально опасных символов
     */
    private function cleanText(string $text): string
    {
        // Удаляем HTML теги
        $clean = strip_tags($text);

        // Заменяем символы, которые могут нарушить форматирование
        $clean = str_replace(["\r\n", "\r"], "\n", $clean); // нормализуем переносы строк
        $clean = preg_replace('/\n{3,}/', "\n\n", $clean); // ограничиваем пустые строки

        // Ограничиваем длину
        if (strlen($clean) > 4000) {
            $clean = substr($clean, 0, 3997) . '...';
        }

        return trim($clean);
    }

}
