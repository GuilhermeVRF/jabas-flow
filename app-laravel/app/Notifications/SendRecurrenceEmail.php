<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendRecurrenceEmail extends Notification
{
    use Queueable;

    protected $recurrences;
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @param  array  $recurrences
     * @return void
     */
    public function __construct(array $recurrences, User $user)
    {
        $this->recurrences = $recurrences;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail']; // Pode ser expandido para outros canais (SMS, etc)
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  object  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Jabas Flow - Recorrências de Pagamento')
            ->view('emails.userRecurrences', ['recurrences' => $this->recurrences, 'user' => $this->user]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  object  $notifiable
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'recurrences' => $this->recurrences,
        ];
    }
}
