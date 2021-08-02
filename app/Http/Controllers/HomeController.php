<?php

namespace App\Http\Controllers;

use App\Models\Models\Ticket;
use App\Models\User;
use App\Repository\TicketRepository;
use App\Repository\UsersRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $ticket;
    private $user;

    public function __construct(TicketRepository $ticket, UsersRepository $user)
    {
        $this->ticket = $ticket;
        $this->user = $user;
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->type == 'support' || auth()->user()->type == 'admin') {
            $tickets = $this->ticket->getAllTickets();
            return view('home', compact('tickets'));
        } else {
            $tickets = $this->ticket->getUserTickets(auth()->user()->id);
            return view('home', compact('tickets'));
        }
    }
}
