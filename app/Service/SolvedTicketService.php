<?php

use App\Repository\SolvedTicketRepository;

class SolvedTicketService
{
    protected $solvedTicketRepository;

    function __construct()
    {
        $this->solvedTicketRepository = new SolvedTicketRepository;
    }

    public function saveTicket($ticket)
    {
        return $this->solvedTicketRepository->saveTicket($ticket);
    }

    public function getTicket($ticketCode)
    {
        return $this->solvedTicketRepository->getTicketByCode($ticketCode);
    }

    public function getTicketBySupportEmail($email)
    {
        return $this->solvedTicketRepository->getTicketBySupportEmail($email);
    }

}