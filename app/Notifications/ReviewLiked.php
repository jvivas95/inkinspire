<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\Review;
use App\Models\User;



class ReviewLiked extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public User $liker,
        public Review $review,

    )
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the database representation of the notification.
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'liker_id' => $this->liker->id,
            'liker_name' => $this->liker->name,
            'liker_username' => $this->liker->username,
            'review_id' => $this->review->id,
            'book_title' => $this->review->book->title,
            'book_id' => $this->review->book->id,
            'message' => $this->liker->name . ' ha dado like a tu reseña del libro "' . $this->review->book->title . '"',
        ];
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
