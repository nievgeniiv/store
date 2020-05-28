<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerContacts extends Controller
{
  public function actView()
  {
    return view('ViewContacts', ['data'=>['singIn' => $this->isSignIn(), 'access' => $this->isAdmin()]]);
  }
}
