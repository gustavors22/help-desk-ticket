<?php

namespace App\Repository;

use App\Models\Models\Solution;

class SolutionRepository
{
    private $solution;

    function __construct()
    {
        $this->solution = new Solution;
    }

    public function save($solutionData)
    {
        return $this->solution->create($solutionData);
    }

    public function getByTicketId($ticket_id)
    {
        return $this->solution->where('ticket_id', $ticket_id)->orderBy('id', 'desc')->first();
    }

    public function delete($ticket_id)
    {
        return $this->solution->where('ticket_id', $ticket_id)->delete();
    }
}