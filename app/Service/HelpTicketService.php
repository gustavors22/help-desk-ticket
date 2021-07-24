<?php

namespace App\Service;
use App\Repository\TicketRepository;

class HelpTicketService
{
    protected $ticketRepository;
    
    function __construct()
    {
        $this->ticketRepository = New TicketRepository;
    }
    
    private function generateTicketId()
    {
        return $this->ticketRepository->generateTicketCode();
    }

    public function getAlltickets()
    {
        return $this->getAlltickets();
    }

    public function saveTicket($ticketData)
    {
        $ticketData['ticket_id'] = $this->generateTicketId();
        $this->ticketRepository->saveTicket($ticketData);
        return $ticketData;
    }

    public function updateTicketByEmail($data, $email)
    {
        return $this->ticketRepository->updateTicketByEmail($data, $email);
    }

    public function getTicketById($id)
    {
        return $this->ticketRepository->getTicketById($id);
    }

    public function getTicketByYourCode($ticketId)
    {
        return $this->ticketRepository->getTicketByYourCode($ticketId);
    }

    public function getUserTickets($credentials)
    {
        return $this->ticketRepository->getUserTickets($credentials);
    }
}