<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    UserEvent,
    Admin,
    EventType,
    User
};

class DashboardController extends Controller
{
    public function index()
    {
        $view = "UserPanel.dashboard";
        $currentUser = getUser(auth()->id());
        $adminEvents = UserEvent::where('type', 2)->where('status', 2)->get();
        $userEvents = UserEvent::where('user_id', auth()->id())
        ->where('type', 1)
        ->get();

        return view('UserView', compact('view', 'adminEvents', 'userEvents', 'currentUser'));
    }
}
