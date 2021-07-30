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

    public function getUser($id)
    {
        return $this->userRepository->getUser($id);
    }

    public function getUsers()
    {
        return $this->userRepository->getUsers();
    }

    public function updateUserAccountType($email, $accountType)
    {
        return $this->userRepository->updateUserAccountType($email, $accountType);
    }

    public function updateUser($data, $id)
    {
        return $this->userRepository->updateUser($data, $id);
    }

    public function updatePassword($newPassword, $newPasswordConfirm)
    {
        return $this->userRepository->updatePassword($newPassword, $newPasswordConfirm);
    }
    
}