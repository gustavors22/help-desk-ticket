<?php

namespace App\Service;
use App\Repository\SolutionRepository;

class SolutionService
{
    private $solution;

    function __construct()
    {
        $this->solution = new SolutionRepository;
    }

    public function save($data)
    {
        return $this->solution->save($data);
    }

    public function getByTicketId($id)
    {
        return $this->solution->getByTicketId($id);
    }

    public function delete($id)
    {
        return $this->solution->delete($id);
    }
}