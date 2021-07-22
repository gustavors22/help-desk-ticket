<?php

namespace App\Http\Controllers;

use App\Service\SupportLoginService;
use Illuminate\Http\Request;

class SupportLoginController extends Controller
{
    private $loginObj;

    function __construct()
    {
        $this->loginObj = new SupportLoginService;
    }

    public function supportLoginIndex()
    {
        return view('supportLogin');
    }

    public function supportLogin(Request $request)
    {  
        $crendentialsExist = $this->loginObj->authenticate(['email' => $request->email, 'password' => $request->password]);
        return $crendentialsExist ? redirect()->route('support.index') : redirect()->back()->withErrors("não existe");
    }

    public function userLoginIndex()
    {
        return view('userLogin');
    }
}
