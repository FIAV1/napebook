<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class FriendshipAccepted extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var User $sender
     */
    protected $sender;

    /**
     * Create a new notification instance.
     *
     * @param User $sender
     * @return void
     */
    public function __construct(User $sender)
    {
        $this->sender = $sender;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * The user_id and notification type are automatically set, plus we can extend
     * the notification with more data.
     * That’s what toDatabase is for.
     * The returned array will be added to the data field of the notification
     *
     * @param $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'sender_id' => $this->sender->id,
            'sender_name' => $this->sender->name .' '. $this->sender->surname,
        ];
    }


    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'id' => $this->id,
            'read_at' => null,
            'data' => [
                'sender_id' => $this->sender->id,
                'sender_name' => $this->sender->name .' '. $this->sender->surname,
            ]
        ]);
    }
}