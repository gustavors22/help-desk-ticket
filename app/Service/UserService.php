<?php

namespace App\Service;

use App\Repository\UsersRepository;

class UserService
{
    protected $userRepository;

    function __construct()
    {
        $this->userRepository = new UsersRepository;
    }

    public function createUser($data)
    {
        return $this->userRepository->createUser($data);
    }

    public function getUser($data)
    {
        return $this->userRepository->getUser($data);
    }
    
}