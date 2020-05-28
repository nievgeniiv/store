<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerReview extends Controller
{
  public function actView()
  {
    return view('ViewReview', ['data'=>['singIn' => $this->isSignIn(), 'access' => $this->isAdmin()]]);
  }
}
