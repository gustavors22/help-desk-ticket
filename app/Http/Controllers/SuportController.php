<?php

namespace App\Http\Controllers;

use App\Service\SolutionService;
use App\Service\SolvedTicketService;
use Illuminate\Http\Request;
use App\Service\SupportService;

class SuportController extends Controller
{
    private $supportService;
    private $solution;
    private $solvedTickets;

    function __construct()
    {
        $this->supportService = new SupportService;
        $this->solvedTickets = new SolvedTicketService;
        $this->solution = new SolutionService;
    }

    public function index()
    {
        $helpTickets = $this->supportService->getAllTickets();
        return view("supportHome", compact('helpTickets'));
    }

    public function show($id)
    {
        $ticket = $this->supportService->getTicketById($id);
        $solution = $this->solution->getByTicketId($id) ?? null;

        return view('ticketView', compact('ticket', 'solution'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'priority' => $request->priority , 
            'solution_date' => $request->solution_date,
            'status' => $request->status
        ];

        if($data['status'] == 'resolvido')
        {
            $this->solution->save(['ticket_id' => $id, 'support_id' => auth()->user()->id, 'solution' => $request->solution]);
        }

        $this->supportService->updateTicket($data, $id);
        return redirect()->route('home');
    }

    public function getAllClosedTickets()
    {
        if(auth()->user()->type != 'user'){
            $closedTickets = $this->solvedTickets->getAllClosedTickets();
            return view('allClosedTickets', compact('closedTickets'));
        }

        return redirect()->back()->withErrors('impossivel de acessar');
    }

    public function getClosedTicketsBySupport()
    {
        if(auth()->user()->type != 'user'){
            $closedTickets = $this->solvedTickets->getTicketBySupportId(auth()->user()->id);
            return view('closedTicketsBySupport', compact('closedTickets'));
        }

        return redirect()->back()->withErrors('impossilvel de acessar');
    }
    
    public function closeTicket($id)
    {
        $this->supportService->closeTicket($id);
        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $this->supportService->deleteTicket($id);
        return redirect()->route('home');
    }
}