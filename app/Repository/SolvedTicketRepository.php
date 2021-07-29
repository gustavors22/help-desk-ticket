<?php

namespace App\Repository;

use App\Models\Models\Ticket;

class SolvedTicketRepository
{
    protected $solvedTicketObj;

    function __construct()
    {
        $this->solvedTicketObj = new Ticket;
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
        return $this->solvedTicketObj->where('support_id', $id)->get()->sortByDesc('id');
    }
}