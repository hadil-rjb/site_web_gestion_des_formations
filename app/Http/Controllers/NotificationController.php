<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markAllAsRead()
    {
        // Marquer toutes les notifications comme lues
        Auth::user()->unreadNotifications->markAsRead();

        return redirect()->back();
    }
}
