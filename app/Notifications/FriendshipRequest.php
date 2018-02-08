<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class FriendshipRequest extends Notification
{
    use Queueable;

    /**
     * @var User $requestor
     */
    protected $requestor;

    /**
     * Create a new notification instance.
     *
     * @param User $requestor
     * @return void
     */
    public function __construct(User $requestor)
    {
        $this->requestor = $requestor;
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
            'rquestor_id' => $this->requestor->id,
            'requestor_name' => $this->requestor->name,
        ];
    }

    /**
     * Get the array representation of the notification.
     * The toArray method is also used by the broadcast channel
     * to determine which data to broadcast to your JavaScript client.
     * If you would like to have two different array representations
     * for the database and broadcast channels,
     * you should define a toDatabase method instead of a toArray method.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {

        return [
            'id' => $this->id,
            'read_at' => null,
            'data' => [
                'requestor_id' => $this->requestor->id,
                'requestor_name' => $this->requestor->name,
            ],
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
            'requestor_id' => $this->requestor->id,
            'requestor_name' => $this->requestor->name,
            ]);
    }
}
