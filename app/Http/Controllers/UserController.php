<?php

namespace App\Http\Controllers;

use App\Service\HelpTicketService;
use App\Service\UserService;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;


class UserController extends Controller
{

    private $userObj;
    private $helpTicketsObj;
    
    function __construct()
    {
        $this->userObj = new UserService;
        $this->helpTicketsObj = new HelpTicketService;
    }

    public function userHomePage($user_name, $user_email)
    {
        $tickets = $this->helpTicketsObj->getUserTickets(['name' => $user_name, 'email' => $user_email]);
        return view('userHomePage', compact('tickets'));
    }

    public function userTicketView($id)
    {
        $ticket = $this->helpTicketsObj->getTicketById($id);
        return view('userTicketView', compact('ticket'));
    }

    public function createUser(Request $request)
    {
        $data = [
            'user_name' => $request->user_name, 
            'user_email' => $request->user_email,
            'password' => $request->password
        ];

        $userCreated = $this->userObj->createUser($data);
        $userData = ['user_name' => $userCreated->user_name, 'user_email' => $userCreated->user_email];
        return $userCreated ? redirect()->route('help.home', $userData) : redirect()->back();
    }

    public function getUser($data)
    {
        return $this->userObj->getUser($data);
    }
}

