<?php

namespace App\Repository;

use App\Models\Models\Solution;
use App\Models\Models\Ticket;

class SolvedTicketRepository
{
    private $solvedTicketObj;
    private $solution;

    function __construct()
    {
        $this->solvedTicketObj = new Ticket;
        $this->solution = new Solution;
    }
    
    public function saveTicket($ticket)
    {
        return $this->solvedTicketObj->create($ticket);
    }

    public function getAllClosedTickets()
    {
        return $this->solvedTicketObj->where('status', 'resolvido')->get()->sortByDesc('id');
    }

    public function getTicketByCode($ticketCode)
    {
        return $this->solvedTicketObj->where('ticket_code', $ticketCode)->first();
    }

    public function getTicketBySupportId($id)
    {
        $solution = $this->solution->where('support_id', $id)->with('ticket')->get()->sortByDesc('ticket_id');
        return $solution;
    }
}