<?php

namespace App\Repository;

use App\Models\Models\Ticket;
use App\Service\ImageService;
use App\Service\SolutionService;
use Exception;
use Symfony\Component\VarDumper\Cloner\Data;

class TicketRepository
{
    private $ticket;
    private $solution;
    private $image;
    
    function __construct()
    {
        $this->ticket = new Ticket;
        $this->solution = new SolutionService;
        $this->image = new ImageService;
    }
    
    public function getAllTickets()
    {
        return $this->ticket->all()->sortByDesc('id');
    }
    
    public function getUserTickets($userId)
    {
        return $this->ticket->where(['user_id' => $userId])->get()->sortByDesc('id');
    }

    public function getTicketById($id)
    {
       return $this->ticket->where('id', $id)->with('image')->get();
    }

    public function saveTicket($ticketData)
    {
        return $this->ticket->create($ticketData);
    } 

    public function updateTicket($data, $id)
    {
        return $this->ticket->where('id', $id)->update($data);
    }

    public function updateTicketByEmail($data, $email)
    {
        return $this->ticket->where('email', $email)->update($data);
    }

    public function closeTicket($id)
    {
        $data  = [
            'status' => 'resolvido',
            'support_id' => auth()->user()->id,
            'support_email' => auth()->user()->email
        ];
        
        $this->ticket->where('id', $id)->update($data['status']);
    }

    public function deleteTicket($id)
    {
        try{
            $this->image->delete($id);
            $this->solution->delete($id);
            $this->ticket->find($id)->delete();

        }catch(Exception $exception){
            return $exception->getMessage();
        }

        return true;
    }

    public function generateTicketCode()
    {
       return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 9);
    }

    public function getTicketByYourCode($ticketCode)
    {
        return $this->ticket->where('ticket_id', $ticketCode)->first();
    }

}