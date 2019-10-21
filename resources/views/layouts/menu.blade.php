<!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn-menu toggle">
      <i class="fa fa-bars"></i> Меню
    </a>
    
     <input type="hidden" name="cart_list" id='cart_list' value="">
     <a href="{{ url('/cart') }}" class="btn btn-link btn-cart">
      <i class="fa fa-shopping-cart"></i>(<span id="count_cart"></span>) Корзина
     </a>
    <nav id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle">
          <i class="fa fa-times"></i>
        </a>
        <li class="sidebar-brand">
          <a class="js-scroll-trigger" href="{{ url('/') }}">{{config('app.name')}}</a>
        </li>
        <li>
          <a class="js-scroll-trigger" href="{{ url('/') }}">Главная</a>
        </li>
        <li>
          <a class="js-scroll-trigger" href="{{ url('/catalog') }}">Каталог</a>
        </li>
        <li>
          <a class="js-scroll-trigger" href="#about">О нас</a>
        </li>
      </ul>
    </nav>
    