<?php

namespace App\Http\Controllers;

use App\Service\HelpTicketService;
use App\Service\UserService;

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
        return auth()->user()->type == 'user' ? redirect()->back()->withErrors('não autorizado') : view('createUser');
    }

    public function userStore(Request $request)
    {
        $userData = ['name' => $request->name, 'email' => $request->email, 'password' => $request->password];
        $this->userObj->createUser($userData);
        return redirect()->back();
    }

    public function userProfile()
    {
        $userData = $this->getUser(auth()->user()->id);
        return view('profile', compact('userData'));
    }

    public function userUpdateAccountTypeView()
    {
        return auth()->user()->type != 'admin' ? redirect()->back()->withErrors('não autorizado') : view('updateAccountType');
    }

    public function userUpdateAccountType(Request $request)
    {
        $this->userObj->updateUserAccountType($request->email, $request->type);
        return redirect()->back();
    }

    public function userUpdate(Request $request, $id)
    {
        $data = ['name' => $request->name, 'email' => $request->email];
        $this->userObj->updateUser($data, $id);
        return redirect()->back();
    }

    public function updatePasswordView()
    {
        return view('updatePassword');
    }

    public function updatePassword(Request $request)
    {
        $this->userObj->updatePassword($request->new_password, $request->new_password_confirm);
        return redirect()->route('home');
    }

    public function getUser($id)
    {
        return $this->userObj->getUser($id);
    }
}

