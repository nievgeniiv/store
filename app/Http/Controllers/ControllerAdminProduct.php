<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\ModelProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ControllerAdminProduct extends Controller
{
  private $path = __DIR__ . '/../../../public/files/';
  private $folderImageProduct = '/files/';

  public function actList()
  {
    $this->redirectNotIsAdmin();
    return view('adm/ViewAdmProductList', ['data'=>['singIn' => $this->isSignIn(), 'access' => $this->isAdmin(),]]);
  }

  public function getData()
  {
    return $products = ModelProduct::all()->toArray();
  }

  public function actCreate()
  {
    $this->redirectNotIsAdmin();
    return view('adm.ViewAdmProductCreate', ['data'=>['singIn' => $this->isSignIn(), 'access' => $this->isAdmin()]]);
  }

  public function actView($id)
  {
    $this->redirectNotIsAdmin();
    $db = ModelProduct::find($id);
    return view('adm/ViewAdmProductEdit', ['data'=>['singIn' => $this->isSignIn(), 'access' => $this->isAdmin(),
                                                      'product' => $db]]);
  }

  public function actSave(Request $request)
  {
    $this->redirectNotIsAdmin();
    $db = new ModelProduct();
    if (!file_exists($this->path . $request['name_product'])) {
      $db->name_product = $request['name_product'];
      $db->review_product = $request['review_product'];
      $db->price_product = (float)$request['price_product'];
      $db->addition_information_product = $request['addition_information_product'];
      $db->image_product = '';
      $db->save();
    } else {
      $db->where('name_product', '=', $request['name_product'])->update(
        [
          'name_product' => $request['name_product'],
          'review_product' => $request['review_product'],
          'price_product' => (float)$request['price_product'],
          'addition_information_product' => $request['addition_information_product']
        ]
      );
    }
    return redirect()->route('admin')->with('success', 'Данные успешно сохранены');
  }

  public function actUpdate($id, Request $request)
  {
    $this->redirectNotIsAdmin();
    $db = new ModelProduct();
    $db->where('id', '=', (int)$id)->update(
      [
        'name_product' => $request->name_product,
        'review_product' => $request->review_product,
        'price_product' => (float)$request->price_product,
        'addition_information_product' => $request->addition_information_product
      ]
    );
    return redirect()->route('admin-list')->with('success', 'Данные успешно обновлены');
  }

  public function actDelete($id)
  {
    $this->redirectNotIsAdmin();
    return redirect()->route('admin')->with('success', 'Данные успешно удалены');
  }

  public function actSaveFile(Request $request)
  {
    $this->redirectNotIsAdmin();
    if (!file_exists($this->path . $request['name'])) {
      mkdir($this->path . $request['name'], 0777);
    }
    move_uploaded_file($_FILES['image']['tmp_name'], $this->path . $request['name'] . '/'
      . basename($_FILES['image']['name']));
    $db = new ModelProduct();
    $db->name_product = $request['name'];
    $db->review_product = '';
    $db->price_product = 0;
    $db->addition_information_product = '';
    $db->image_product = $this->folderImageProduct . $request['name'] . '/';
    $db->save();
  }
}
