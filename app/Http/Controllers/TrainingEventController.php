<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{EventTraning, PaymentHistory, User};

class TrainingEventController extends Controller
{
    public function index($id)
    {
        $view = "Event_traning.index";
        $EventTraning = EventTraning::where('event_id', $id)->get();
        $PaymentHistory = PaymentHistory::where('user_id', auth()->id())
            ->where('event_id', $id)
            ->where('status', 2)
            ->first();
        $userDetails = User::where('id',$PaymentHistory->user_id)->get()->first();

        if (!$PaymentHistory) {
            return redirect()->back()->with('msg', 'Please buy the event.');
        }

        return view('TraningView', compact('EventTraning', 'view', 'userDetails'));
    }
}
