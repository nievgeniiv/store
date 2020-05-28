@extends('adm.layouts.app')

@section('titlePage')Магазин@endsection

@section('content')
  <div class="container-fluid">
    <h1>Данные пользователя</h1>
    <form method="post" action="{{ route('admin-update', $data['product']->id) }}">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
      <div class="form-group">
        <label for="name">Фамилия и имя пользователя</label>
        <input type="text" class="form-control" id="name"
               placeholder="Фамилия и имя пользователя" name="name" value="{{ old('name') ?? $data['user']->name }}">
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" class="form-control" id="email"
               placeholder="E-mail" name="email" value="{{ old('email') ?? $data['user']->email }}">
      </div>
      <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>

    <div class="row">
      <div class="col-8">
        <h4>ФИО пользователя</h4>
        <p>{{$data->name}}</p>
      </div>
      <div class="col-4">
        <button class="btn btn-primary">Редактировать</button>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <h4>E-mail</h4>
        <p>{{$data->email}}</p>
      </div>
    </div>
  </div>
@endsection