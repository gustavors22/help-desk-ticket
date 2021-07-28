<?php

namespace App\Http\Controllers;

use App\Service\HelpTicketService;
use App\Service\UserService;

use Illuminate\Http\Request;


class UserController extends Controller
{
    private $user;
    private $ticket;
    
    function __construct(UserService $user, HelpTicketService $ticket)
    {
        $this->user = $user;
        $this->ticket = $ticket;
    }

    public function userHomePage($user_name, $user_email)
    {
        $tickets = array_reverse($this->ticket->getUserTickets(['name' => $user_name, 'email' => $user_email]));
        return view('userHomePage', compact('tickets'));
    }

    public function userTicketView($id)
    {
        $ticket = $this->ticket->getTicketById($id);
        return view('userTicketView', compact('ticket'));
    }

    public function createUserView()
    {
        return auth()->user()->type == 'user' ? redirect()->back()->withErrors('não autorizado') : view('createUser');
    }

    public function userStore(Request $request)
    {
        $userData = ['name' => $request->name, 'email' => $request->email, 'password' => $request->password];
        $this->user->createUser($userData);
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
        $this->user->updateUserAccountType($request->email, $request->type);
        return redirect()->back();
    }

    public function userUpdate(Request $request, $id)
    {
        $data = ['name' => $request->name, 'email' => $request->email];
        $this->user->updateUser($data, $id);
        return redirect()->back();
    }

    public function updatePasswordView()
    {
        return view('updatePassword');
    }

    public function updatePassword(Request $request)
    {
        $this->user->updatePassword($request->new_password, $request->new_password_confirm);
        return redirect()->route('home');
    }

    public function getUser($id)
    {
        return $this->user->getUser($id);
    }
}

