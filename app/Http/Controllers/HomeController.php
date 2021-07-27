<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\TicketRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $ticketsRepository;

    public function __construct()
    {
        $this->ticketsRepository = new TicketRepository;
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()->user()->type == 'support' || auth()->user()->type == 'admin')
            $tickets = $this->ticketsRepository->getAllTickets();
        else
            $tickets = $this->ticketsRepository->getUserTickets(auth()->user()->id);
            
        return view('home', compact('tickets'));
    }
}
