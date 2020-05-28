<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function isSignIn()
  {
    return Auth::id() ? true : false;
  }

  public function isAdmin()
  {
    if (isset(Auth::user()->access) and Auth::user()->access === 'admin') {
      return true;
    } else {
      return false;
    }
  }

  public function redirectNotIsAdmin()
  {
    if ($this->isAdmin() === false) {
      return redirect()->route('error-access')->send();
    }
  }
}
