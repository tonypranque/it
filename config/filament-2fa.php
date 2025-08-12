<?php

use Backstage\TwoFactorAuth\Enums\TwoFactorType;
use Backstage\TwoFactorAuth\Http\Livewire\Auth\Login;
use Backstage\TwoFactorAuth\Http\Livewire\Auth\LoginTwoFactor;
use Backstage\TwoFactorAuth\Http\Livewire\Auth\PasswordConfirmation;
use Backstage\TwoFactorAuth\Http\Livewire\Auth\PasswordReset;
use Backstage\TwoFactorAuth\Http\Livewire\Auth\Register;
use Backstage\TwoFactorAuth\Http\Livewire\Auth\RequestPasswordReset;
use Backstage\TwoFactorAuth\Pages\TwoFactor;

return [

    /*
    |--------------------------------------------------------------------------
    | Two Factor Authentication
    |--------------------------------------------------------------------------
    |
    | This value determines which two factor authentication options are available.
    | Simply add or remove the options you want to use.
    |
    | Available options: email, phone, authenticator
    |
    */
    'options' => [
        TwoFactorType::authenticator,
        TwoFactorType::email,
        // TwoFactorType::phone,
    ],

    'enabled_features' => [
        /*
        |--------------------------------------------------------------------------
        | Register
        |--------------------------------------------------------------------------
        |
        | This value determines whether users may register in the application.
        |
        */
        'register' => true,

        /*
        |--------------------------------------------------------------------------
        | Tenant
        |--------------------------------------------------------------------------
        |
        | Set to true if you're using Filament in a multi-tenant setup. If true, you
        | need to manually set the user menu item for the two factor authentication
        | page panel class. Take a look at the documentation for more information.
        |
        */
        'multi_tenancy' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | SMS Service
    |--------------------------------------------------------------------------
    |
    | To use an SMS service, you need to install the corresponding package.
    | You then have to create a App\Notifications\SendOTP class that extends
    | the Backstage\TwoFactorAuth\Notifications\SendOTP class. After that,
    | you can set the class alias in the sms_service key.
    |
    */
    'sms_service' => null, // For example 'vonage', 'twilio', 'nexmo', etc.
    'send_otp_class' => null,
    'phone_number_field' => 'phone',

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | If you want to customize the pages, you can override the used classes here.
    | Make your that your classes extend the original classes.
    |
    */
    'login' => Login::class,
    'register' => Register::class,
    'challenge' => LoginTwoFactor::class,
    'two_factor_settings' => TwoFactor::class,
    'password_reset' => PasswordReset::class,
    'password_confirmation' => PasswordConfirmation::class,
    'request_password_reset' => RequestPasswordReset::class,
];
