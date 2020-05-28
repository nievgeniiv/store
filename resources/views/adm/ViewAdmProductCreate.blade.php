@extends('adm.layouts.app')

@section('titlePage')Магазин@endsection

@section('content')

<div class="single-products-catagory clearfix">
  <h1>Выложить новый товар</h1>
  <form method="POST" action="{{ route('admin-save') }}">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="name_product">Название продукта</label>
      <input type="text" class="form-control" id="name_product"
             placeholder="Название продукта" name="name_product" v-model="nameProduct" value="{{ old('name_product') }}">
    </div>
    <div class="form-group">
      <label for="review_product">Описание продукта</label>
      <textarea class="form-control" id="review_product"
                placeholder="Описание продукта" name="review_product">{{ old('review_product') }}</textarea>
    </div>
    <div class="form-group">
      <label for="addition_information_product">Дополнительная информация о продукте</label>
      <textarea class="form-control" id="addition_information_product"
                placeholder="Дополнительная информация о продукте" name="addition_information_product">
        {{ old('addition_information_product') }}
      </textarea>
    </div>
    <div class="form-group">
      <label for="price_product">Цена продукта</label>
      <input type="text" class="form-control" id="price_product"
                placeholder="Цена продукта" name="price_product" value="{{ old('price_product') }}">
    </div>
    <!--<div class="form-group">
      <label for="image_product">Изображение продукта</label>
      <input type="file" class="form-control-file" id="image_product" name="image">
    </div>-->
    <draganddrop crf-token="{{ csrf_token() }}"></draganddrop>




    <button type="submit" class="btn btn-primary">Сохранить</button>
  </form>
</div>
</div>
@endsection
