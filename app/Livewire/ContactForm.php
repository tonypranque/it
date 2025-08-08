<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactSubmission;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class ContactForm extends Component
{
    public $name = '';
    public $email = ''; // Теперь необязательное
    public $phone = ''; // Новое обязательное поле
    public $company = '';
    public $service = '';
    public $message = '';
    public $successMessage = '';

    // protected $rateLimitKey; // Можно добавить свойство для хранения ключа

    // Обновленные правила валидации
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'nullable|email|max:255', // Стало необязательным
        'phone' => 'required|string|regex:/^\+7 \d{3} \d{3} \d{2} \d{2}$/|max:20', // Обязательное, с маской
        'company' => 'nullable|string|max:255',
        'service' => 'required|string|max:255',
        'message' => 'required|string',
    ];

    // Обновленные сообщения валидации
    protected $messages = [
        'name.required' => 'Поле "Ваше имя" обязательно для заполнения.',
        'email.email' => 'Пожалуйста, введите корректный адрес электронной почты.', // required убран
        'phone.required' => 'Поле "Телефон" обязательно для заполнения.',
        'phone.regex' => 'Пожалуйста, введите телефон в формате +7 9xx xxx xx xx.',
        'service.required' => 'Пожалуйста, выберите услугу.',
        'message.required' => 'Поле "Опишите ваши потребности" обязательно для заполнения.',
    ];

    public function submit()
    {
        // Rate Limiting (по желанию)
        $throttleKey = Str::transliterate(Str::lower(request()->ip())).'|contact-form';

        if (RateLimiter::tooManyAttempts($throttleKey, $maxAttempts = 1)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            $this->addError('form', "Слишком много попыток. Пожалуйста, попробуйте снова через {$seconds} секунд.");
            return;
        }

        // Валидация данных
        $validatedData = $this->validate();

        // Сохранение данных в базе
        ContactSubmission::create($validatedData);

        // Увеличиваем счетчик только после успешного сохранения
        RateLimiter::hit($throttleKey);

        // Установка сообщения об успехе
        $this->successMessage = 'Спасибо! Ваша заявка отправлена. Мы свяжемся с вами в ближайшее время.';

        // Сброс полей формы
        $this->reset(['name', 'email', 'phone', 'company', 'service', 'message']);
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
