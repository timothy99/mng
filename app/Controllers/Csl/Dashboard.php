<?php

namespace App\Controllers\Csl;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return redirect()->to("/csl/dashboard/dashboard");
    }

    public function dashboard()
    {
        return aview("csl/dashboard/dashboard");
    }

}