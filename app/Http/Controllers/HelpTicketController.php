<?php

namespace App\Http\Controllers;

use App\Models\Models\ModelHelpTicket;
use App\Service\HelpTicketService;
use App\Service\ImageService;
use Illuminate\Http\Request;

class HelpTicketController extends Controller
{
    private $ticketService;
    private $imageService;

    function __construct()
    {
        $this->ticketService = new HelpTicketService;
        $this->imageService = new ImageService;
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
        $ticketData = [
            'user_id'       => auth()->user()->id,
            'title'         => $request->title,
            'user_message'  => $request->user_message
        ];
        
        $ticket = $this->ticketService->saveTicket($ticketData);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $name = uniqid(date('HisYmd'));
            $extension = $request->image->extension();
            $file = "{$name}.{$extension}";
            $path = public_path('images', $file);
            $upload = $request->image->move($path, $file);
            $this->imageService->save(['ticket_id' => $ticket['ticket_id'], 'path' => $upload]);
         
        }

        return redirect()->route('home')->with('success', 'Ticket criado com sucesso'); 
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
