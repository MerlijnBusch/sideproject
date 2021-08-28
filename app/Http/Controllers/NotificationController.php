<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notify = auth()->user()->unreadNotifications()->get()->toArray();
        return view('partials.notification.index', ['notifications' => $notify]);
    }
}
