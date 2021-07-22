<?php

namespace App\Http\Controllers;
use App\Service\HelpTicketService;
use Illuminate\Http\Request;

class HelpTicketController extends Controller
{
    private $ticketService;

    function __construct(HelpTicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function index()
    {
        return view('helpTicketHome');
    }

    public function create()
    {
        return view('helpTicketForm');
    }

    public function store(Request $request)
    {
        $data = $this->ticketService->saveTicket($request->all());
        return redirect()->route('ticket.show', $data['ticket_id']); 
    }

    public function showTicketByCode($ticket_code)
    {
        $ticket = $this->ticketService->getTicketByYourCode($ticket_code);
        return !$ticket ? redirect()->back()->withErrors("não existe") : view('ticketView', compact('ticket'));
    }
    
    public function getTicketCodeByUser(Request $request)
    {
        return $request->ticket_code ? redirect()->route('ticket.show', [$request->ticket_code]) : redirect()->back()->withErrors("não existe");
    }

    public function showUsersTickets($credentials)
    {
        $tickets = $this->ticketService->getUserTickets($credentials);
        return $tickets;
    }

    public function getUserCredentials(Request $request)
    {
        $credentials = ['email' => $request->email, 'name' => $request->name];
        return redirect()->route('tickets.user', $credentials);
    }
}
