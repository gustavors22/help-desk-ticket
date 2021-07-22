<?php

namespace App\Service;
use App\Repository\TicketRepository;

class SupportService
{
    protected $ticketRepository;

    function __construct()
    {
        $this->ticketRepository = New TicketRepository;
    }

    public function getAllTickets()
    {
        return $this->ticketRepository->getAllTickets();
    }

    public function getTicketById($id)
    {
        return $this->ticketRepository->getTicketById($id);
    }

    public function updateTicket($data, $id)
    {
        return $this->ticketRepository->updateTicket($data, $id);
    }

    public function deleteTicket($id)
    {
        return $this->ticketRepository->deleteTicket($id);
    }
}