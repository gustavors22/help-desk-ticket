<?php

namespace App\Repository;
use App\Models\Models\ModelUser;
use App\Service\HelpTicketService;
use Illuminate\Support\Facades\Hash;

class UsersRepository 
{   
    protected $userModelObj;
    protected $helpTicketService;

    function __construct()
    {
        $this->userModelObj = new ModelUser;
        $this->helpTicketService = new HelpTicketService;
    }

    public function createUser($data)
    {
        return $this->userModelObj::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function getUser($id)
    {
        return $this->userModelObj->where('id', $id)->first();
    }

    public function getUserByEmail($email)
    {
        return $this->userModelObj->where('email', $email)->first();
    }

    public function updateUserAccountType($email, $accountType)
    {
        return $this->userModelObj->where('email', $email)->update(['type' => $accountType]);
    }

    public function updateUser($data, $id)
    {

        $newUserNameEndEmail = ['name' => $data['name'], 'email' => $data['email']];
        $this->helpTicketService->updateTicketByEmail($newUserNameEndEmail, auth()->user()->email);
        return $this->userModelObj->where('id', $id)->update($data);
    }
}