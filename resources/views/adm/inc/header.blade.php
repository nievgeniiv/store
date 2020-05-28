<!-- Search Wrapper Area Start -->
<div class="search-wrapper section-padding-100">
  <div class="search-close">
    <i class="fa fa-close" aria-hidden="true"></i>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="search-content">
          <form action="{{ route('search') }}" method="get">
            <input type="search" name="search" id="search" placeholder="Ведите фразу...">
            <button type="submit"><img src="/img/core-img/search.png" alt=""></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Search Wrapper Area End -->

<!-- ##### Main Content Wrapper Start ##### -->
<div class="main-content-wrapper d-flex clearfix">

  <!-- Mobile Nav (max width 767px)-->
  <div class="mobile-nav">
    <!-- Navbar Brand -->
    <div class="amado-navbar-brand">
      <a href="{{ route('home') }}"><img src="/img/core-img/logo.png" alt=""></a>
    </div>
    <!-- Navbar Toggler -->
    <div class="amado-navbar-toggler">
      <span></span><span></span><span></span>
    </div>
  </div>

  <!-- Header Area Start -->
  <header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
      <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo">
      <a href="{{ route('home') }}"><img src="/img/core-img/logo.png" alt=""></a>
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
      <ul>
        <li><a href="{{ route('admin') }}">Управление пользователями</a></li>
        <li><a href="{{ route('admin-list') }}">Список продуктов</a></li>
        <li><a href="{{ route('admin-contacts') }}">Редактирование контактов</a></li>
        @if(!empty($data) and $data['singIn'] === true)
          <form action="{{ route('logout') }}" method="post">
            {{ csrf_field() }}
            <li><button type="submit">Выйти</button></li>
          </form>

        @else
          <li><a href="{{ route('login') }}">Войти</a></li>
        @endif
      </ul>
    </nav>
    <!-- Cart Menu -->
    <div class="cart-fav-search mb-100">
      @if(!empty($data) and $data['singIn'] === true)
        <a href="{{ route('trash') }}" class="cart-nav"><img src="/img/core-img/cart.png" alt="">Корзина<span>(0)</span></a>
        <a href="{{ route('favorite') }}" class="fav-nav"><img src="/img/core-img/favorites.png" alt="">Избранное</a>
      @endif
      <a href="{{ route('search') }}" class="search-nav"><img src="/img/core-img/search.png" alt="">Поиск</a>
    </div>
    <!-- Social Button -->
    <div class="social-info d-flex justify-content-between">
      <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
      <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
      <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    </div>
  </header>