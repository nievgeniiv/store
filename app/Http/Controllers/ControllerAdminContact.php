<?php

namespace App\Http\Controllers;

use App\Models\ModelContacts;
use Illuminate\Http\Request;

class ControllerAdminContact extends Controller
{

  public function actEdit()
  {
    $this->redirectNotIsAdmin();
    return view('adm/ViewAdmEditContacts', ['data' => []]);
  }

  public function actSave(Request $request)
  {
    $this->redirectNotIsAdmin();
    $db = new ModelContacts();
    $db->contacts = $request['contacts'];
    $db->save();
  }

  public function actUpdate(Request $request)
  {
    $this->redirectNotIsAdmin();
    $db = new ModelContacts();
    $db->where('id', '=', 1)->update(
      [
        'contacts' => $request['contacts']
      ]
    );
  }
}
