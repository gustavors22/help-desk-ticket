<?php

namespace App\Service;
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

    
    public function getAllClosedTickets()
    {
        return $this->solvedTicketRepository->getAllClosedTickets();
    }

    public function getTicket($ticketCode)
    {
        return $this->solvedTicketRepository->getTicketByCode($ticketCode);
    }

    public function getTicketBySupportId($id)
    {
        return $this->solvedTicketRepository->getTicketBySupportId($id);
    }

}