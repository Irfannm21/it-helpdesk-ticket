<?php

namespace App\Http\Controllers;

use App\Models\RealizationDetail;
use App\Models\Review;
use App\Models\Ticket;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $ticket = Ticket::count();
        $repair = RealizationDetail::count();
        $feedback = Review::count();

        $widget = [
            'users' => $users,
            'ticket' => $ticket,
            'repair' => $repair,
            'feedback' => $feedback,
        ];

        return view('home', compact('widget'));
    }
}
