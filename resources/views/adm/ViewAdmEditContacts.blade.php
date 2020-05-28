@extends('adm.layouts.app')

@section('titlePage')Магазин@endsection

@section('content')
  <script src="/js/ext/tinymce/tinymce.min.js"></script>
  <script>tinyMCE.init({
      selector:"textarea",
      language: "ru",
      skin_url: "/css/tinymce/skins/ui/oxide",
      content_css: "/css/tinymce/skins/ui/oxide/content.css",
    });</script>
  <div class="container-fluid">
    <h1>Редактирование контактов</h1>
    <div class="row">
      <div class="col">
        <form action="{{ route('admin-contacts-save') }}" method="post">
          {{ csrf_field() }}
          <textarea name="contacts"></textarea>
          <div class="row">
            <div class="col">
              <input type="submit" class="btn btn-primary" value="Сохранить">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>
@endsection