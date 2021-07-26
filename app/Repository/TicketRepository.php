<?php

namespace App\Repository;
use App\Models\Models\ModelHelpTicket;
use Symfony\Component\VarDumper\Cloner\Data;

class TicketRepository
{
    protected $ticketModelObj;

    function __construct()
    {
        $this->ticketModelObj = new ModelHelpTicket;
    }

    public function getAllTickets()
    {
        return $this->ticketModelObj->all()->sortByDesc('id');
    }

    public function getTicketById($id)
    {
        return $this->ticketModelObj->find($id);
    }

    public function saveTicket($ticketData)
    {
        return $this->ticketModelObj::create($ticketData);
    } 

    public function updateTicket($data, $id)
    {
        return $this->ticketModelObj->where('id', $id)->update($data);
    }

    public function updateTicketByEmail($data, $email)
    {
        return $this->ticketModelObj->where('email', $email)->update($data);
    }


    public function closeTicket($id)
    {
        $data  = [
            'status' => 'resolvido',
            'support_name' => auth()->user()->name,
            'support_email' => auth()->user()->email
        ];
        return $this->ticketModelObj->where('id', $id)->update($data);
    }

    public function deleteTicket($id)
    {
        return $this->ticketModelObj->find($id)->delete();
    }

    public function generateTicketCode()
    {
       return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 9);
    }

    public function getTicketByYourCode($ticketCode)
    {
        return $this->ticketModelObj->where('ticket_id', $ticketCode)->first();
    }

    public function getUserTickets($credentials)
    {
        return $this->ticketModelObj->where($credentials)->get();
    }
    
}