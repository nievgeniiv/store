@extends('layouts.app')
@section('titlePage')Магазин@endsection
@section('content')
    <div class="container section-padding-100-0">
      <form action="{{ route('login') }}" method="post">
        {{ csrf_token() }}
        <div class="form-group">
          <label for="login">Логин</label>
          <input type="text" class="form-control" id="login" name="login" placeholder="Введите логин">
        </div>
        <div class="form-group">
          <label for="passwd">Пароль</label>
          <input type="password" class="form-control" name="passwd" id="passwd" placeholder="Введите пароль">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
      </form>
    </div>
  </div>
</div>
@endsection
