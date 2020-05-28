<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerAuth extends Controller
{
  public function actView()
  {
    return view('ViewLogin', ['data'=>['singIn' => false]]);
  }

  public function actSignIn()
  {

  }
}
