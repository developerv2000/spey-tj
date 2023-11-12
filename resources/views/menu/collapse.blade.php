<div class="menu">
  <div class="menu__header">
    <div class="menu__header-inner main-container">
      <button class="menu__close-button button button--transparent">
        <span class="material-icons">close</span> Закрыть
      </button>

      <form class="menu__search-form" action="#" method="POST">
        <input class="menu__search-input" type="text" placeholder="Поиск..." required minlength="3">
        <button class="menu__search-submit"><span class="material-icons">search</span></button>
      </form>

      <a class="logo menu__logo" href="{{ route('home') }}">
        <img class="logo__image" src="{{ asset('img/main/logo-light.png') }}" alt="Spey logo">
      </a>
    </div>
  </div>

  <div class="menu__body">
    <div class="menu__tab">
      <div class="tab-buttons-container">
        <div class="tab-buttons-container__inner main-container">
          <button class="tab-button @if($route == 'home' || $route == ('posts.show')) tab-button--active @endif" data-target-id="main"
            data-link="{{ route('home') }}">Главная</button>
          <button class="tab-button @if(strpos($route, 'about') !== false) tab-button--active @endif" data-target-id="about" data-link="{{ route('about.index') }}">О Нас</button>
          <button class="tab-button @if(strpos($route, 'products') !== false || strpos($route, 'nosology') !== false || strpos($route, 'atx') !== false) tab-button--active @endif"
            data-target-id="products" data-link="{{ route('products.index') }}">Продукты</button>
          <button class="tab-button @if(strpos($route, 'science') !== false) tab-button--active @endif" data-target-id="science" data-link="{{ route('science.index') }}">Наука и
            развитие</button>
          <button class="tab-button @if(strpos($route, 'interesting') !== false) tab-button--active @endif" data-target-id="interesting"
            data-link="{{ route('interesting.index') }}">Это интересно</button>
        </div>
      </div>

      <div class="tab-content-container">
        <div class="tab-content-container__inner main-container">
          @include('menu.content-home')
          @include('menu.content-about')
          @include('menu.content-products')
          @include('menu.content-science')
          @include('menu.content-interesting')
        </div>
      </div>
    </div>

    <div class="menu__search">
      <div class="menu__search-inner main-container">
        <div class="spinner-container">
          <div class="spinner">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>

        <div class="menu__search-results-container"></div>
      </div>
    </div>
  </div>
</div>
