<?php

namespace App\Repository;

use App\Models\Models\ModelSolvedTicket;

class SolvedTicketRepository
{
    protected $solvedTicketObj;

    function __construct()
    {
        $this->solvedTicketObj = new ModelSolvedTicket;
    }
    
    public function saveTicket($ticket)
    {
        return $this->solvedTicketObj->create($ticket);
    }

    public function getTicketByCode($ticketCode)
    {
        return $this->solvedTicketObj->where('ticket_code', $ticketCode)->first();
    }

    public function getTicketBySupportEmail($email)
    {
        return $this->solvedTicketObj->where('support_person_email', $email)->all();
    }
}