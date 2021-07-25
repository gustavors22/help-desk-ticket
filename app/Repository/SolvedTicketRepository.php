<?php

namespace App\Repository;

use App\Models\Models\ModelHelpTicket;

class SolvedTicketRepository
{
    protected $solvedTicketObj;

    function __construct()
    {
        $this->solvedTicketObj = new ModelHelpTicket();
    }
    
    public function saveTicket($ticket)
    {
        return $this->solvedTicketObj->create($ticket);
    }

    public function getAllClosedTickets()
    {
        return $this->solvedTicketObj->where('status', 'resolvido')->get();
    }

    public function getTicketByCode($ticketCode)
    {
        return $this->solvedTicketObj->where('ticket_code', $ticketCode)->first();
    }

    public function getTicketBySupportEmail($email)
    {
        return $this->solvedTicketObj->where('support_email', $email)->get();
    }
}