<?php

namespace App\Repository;
use App\Models\User;
use App\Service\HelpTicketService;
use Illuminate\Support\Facades\Hash;

class UsersRepository 
{   
    protected $user;
    protected $helpTicketService;

    function __construct()
    {
        $this->user = new User();
        $this->helpTicketService = new HelpTicketService;
    }

    public function createUser($data)
    {
        return $this->user::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function getUsers()
    {
        return $this->user->all();
    }

    public function getUser($id)
    {
        return $this->user->where('id', $id)->first();
    }

    public function getUserByEmail($email)
    {
        return $this->user->where('email', $email)->first();
    }

    public function updateUserAccountType($email, $accountType)
    {
        return $this->user->where('email', $email)->update(['type' => $accountType]);
    }

    public function updateUser($data, $id)
    {
        $newUserNameEndEmail = ['name' => $data['name'], 'email' => $data['email']];
        $this->helpTicketService->updateTicketByEmail($newUserNameEndEmail, auth()->user()->email);
        return $this->user->where('id', $id)->update($data);
    }

    public function updatePassword($newPassword, $newPasswordConfirm)
    {
        return $newPassword == $newPasswordConfirm ? $this->user->where('id', auth()->user()->id)->update(['password' => Hash::make($newPassword)]) : false;
    }
}