<?php

namespace App\Service;

use App\Models\Models\ModelSupport;

class SupportLoginService
{
    protected $loginModelObj;

    function __construct()
    {
        $this->loginModelObj = new ModelSupport;
    }

    public function authenticate($credentials)
    {
        return $this->loginModelObj->where($credentials)->first();
    }
}