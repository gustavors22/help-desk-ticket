<?php

namespace App\Http\Controllers;

use App\Service\HelpTicketService;
use App\Service\UserService;

use Illuminate\Http\Request;


class UserController extends Controller
{

    private $userObj;
    private $helpTicketsObj;
    private $createUser;
    
    function __construct()
    {
        $this->userObj = new UserService;
        $this->helpTicketsObj = new HelpTicketService;
    }

    public function userHomePage($user_name, $user_email)
    {
        $tickets = array_reverse($this->helpTicketsObj->getUserTickets(['name' => $user_name, 'email' => $user_email]));
        return view('userHomePage', compact('tickets'));
    }

    public function userTicketView($id)
    {
        $ticket = $this->helpTicketsObj->getTicketById($id);
        return view('userTicketView', compact('ticket'));
    }

    public function createUserView()
    {
        return view('createUser');
    }

    public function userStore(Request $request)
    {
        $userData = ['name' => $request->name, 'email' => $request->email, 'password' => $request->password];
        dd($this->userObj->createUser($userData));
    }

    public function userProfile()
    {
        $userData = $this->getUser(auth()->user()->id);
        return view('profile', compact('userData'));
    }

    public function userUpdate(Request $request, $id)
    {
        $data = ['name' => $request->name, 'email' => $request->email];
        $userUpdated = $this->userObj->updateUser($data, $id);
        return redirect()->back();
    }

    public function getUser($id)
    {
        return $this->userObj->getUser($id);
    }
}

