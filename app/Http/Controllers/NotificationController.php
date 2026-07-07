<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{
    //
    public function read(string $id)
    {
        $notification = Auth::user()->notifications->findOrFail($id);
        $notification->markAsRead();

        // Redirect to the appropriate page based on the notification type
        if (isset($notification->data['book_id'])){
            return redirect()->route('books.show', $notification->data['book_id']);
        }

        if (isset($notification->data['follower_username'])){
            return redirect()->route('profile.show', $notification->data['follower_username']);
        }

        return redirect()->route('dashboard');
    }

    public function markAllRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    public function index()
    {
        $notifications = Auth::user()->notifications()->paginate(10);
        Auth::user()->unreadNotifications->markAsRead();

        return view('notifications.index', compact('notifications'));
    }
}
