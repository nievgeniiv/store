<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ControllerAdminHome extends Controller
{
  public function actList()
  {
    return view('adm/ViewAdmHome', ['data'=>['singIn' => $this->isSignIn(), 'access' => $this->isAdmin()]]);
  }

  public function getData()
  {
    return User::all()->toArray();
  }

  public function actView($id)
  {
    $user = User::find($id);
    return view('adm/ViewAdmEdit', ['data' => $user]);
  }


}
