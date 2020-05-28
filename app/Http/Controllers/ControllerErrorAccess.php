<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerErrorAccess extends Controller
{
    public function actView()
    {
      return view('adm/ViewAdmCloseAccess', ['data' => ['singIn' => $this->isSignIn(), 'access' => $this->isAdmin()]]);
    }
}
