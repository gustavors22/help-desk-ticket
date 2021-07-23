<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\SupportService;

class SuportController extends Controller
{
    private $supportService;

    function __construct()
    {
        $this->supportService = new SupportService;
    }

    public function index()
    {
        $helpTickets = $this->supportService->getAllTickets();
        return view("supportHome", compact('helpTickets'));
    }

    public function show($id)
    {
        $ticket = $this->supportService->getTicketById($id);
        return view('ticketView', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'priority' => $request->priority , 
            'solution_date' => $request->solution_date,
            'solution' => $request->solution,
            'status' => $request->status
        ];

        $this->supportService->updateTicket($data, $id);
        return redirect()->route('home');
    }   

    public function destroy($id)
    {
        $this->supportService->deleteTicket($id);
        return redirect()->route('home');
    }
}