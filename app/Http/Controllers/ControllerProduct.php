<?php

namespace App\Http\Controllers;

use App\Models\ModelProduct;
use Illuminate\Http\Request;

class ControllerProduct extends Controller
{
    public function actList()
    {
      return view('ViewProductList');
    }

    public function getData()
    {
      $data = ModelProduct::all()->toArray();
      $path = __DIR__ . '/../../../public';
      foreach ($data as $key => $value) {
        $images = scandir($path . $data[$key]['image_product'],1);
        $data[$key]['image_product'] .= $images[0];
      }
      return $data;
    }

    public function actView($id)
    {
      return view('ViewProductView');
    }
}
