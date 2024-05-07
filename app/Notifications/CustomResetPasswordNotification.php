<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomResetPasswordNotification extends Notification
{
    use Queueable;
    public $token;
    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token=$token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('بازیابی رمز عبور')
            ->greeting('سلام!')
                    ->line('شما این ایمیل را بخاطر فراموشی رمز عبور خود دریافت کرده اید،')
            ->line('لطفا بر روی دکمه زیر کلیک کنید تا رمز عبور خود را بازیابی کنید:')
                    ->action('بازیابی', url('/reset-password',$this->token))
            ->salutation('با تشکر،' . config('app.name'))
                    ->line('ممنون از شما برای استفاده از اپلیکیشن ما!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
