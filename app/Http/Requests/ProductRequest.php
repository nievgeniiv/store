<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return Auth::id() ? true : false;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name_product' => 'required|min:1',
      'review_product' => 'required|min:1',
      //'price_product' => 'required|digits:8',
      'price_product' => 'required',
      //'image_product' => 'required|min:12'
    ];
  }

  public function messages()
  {
    return [
      'name_product' => 'Поле "Имя продукта" должно иметь минимум 1 символ',
      'review_product' => 'Поле "Описание продукта" должно иметь минимум 1 символ',
      'price_product' => 'Поле "Цена продукта" должно иметь максимум 8 символ',
      'image_product' => 'Название изображения продукта должно иметь минимум 1 символ',
      'name_product.required' => 'Поле "Имя продукта" не заполнено',
      'review_product.required' => 'Поле "Описание продукта" не заполнено',
      'price_product.required' => 'Поле "Цена продукта" не заполнено',
      'image_product.required' => 'Поле "Имя продукта" не заполнено'
    ];
  }
}
