<?php

namespace App\Notifications\Users;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WelcomeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var User
     */
    public $user;

    /**
     * Create a new notification instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Welcome to ' . config('app.name') . '!')
                    ->greeting('Hi, ' . $this->user->name . '!')
                    ->line('Thank you for signing up to ' . config('app.name') . '.')
                    ->line('You can now join or submit events all over the world on ' . config('app.name') . '.')
                    ->action('Submit your own event!', url('/events/submit'))
                    ->line('Thank you for using ' . config('app.name') . '!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => 'Welcome to ' . config('app.name') . '!',
            'from_user_name' => (new \App\Models\User)->first()->name,
            'from_user_gravatar' => (new \App\Models\User)->first()->getGravatar()
        ];
    }
}
