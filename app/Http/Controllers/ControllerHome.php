<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerHome extends Controller
{
  public function actView()
  {
    return view('ViewHome', ['data'=>['singIn' => $this->isSignIn(), 'access' => $this->isAdmin()]]);
  }

}
