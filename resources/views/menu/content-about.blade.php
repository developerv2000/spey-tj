<div class="tab-content-item @if(strpos($route, 'about') !== false) tab-content-item--active @endif" data-content-id="about">
  <div class="menu-tab-content__main">
    <a class="menu__tab-title-link" href="{{ route('about.index') }}">
      <h3 class="menu__tab-title">О Нас</h3>
    </a>

    <p class="menu__tab-desc">
      Spey – это международная компания, деятельность которой направлена на улучшение жизни людей путем предоставления инновационной и востребованной продукции в сфере здравоохранения.
    </p>

    <a class="menu__tab-link" href="{{ route('about.index') }}">
      <span class="material-icons">chevron_right</span> Подробнее
    </a>
  </div>

  @include('menu.top-products')

  <ul class="menu-tab-content__sublinks-container">
    <li>
      <a class="menu-tab-content__sublink" href="{{ route('about.history') }}">История становления</a>
    </li>

    <li>
      <a class="menu-tab-content__sublink" href="{{ route('about.wealth') }}">Наши ценности</a>
    </li>

    <li>
      <a class="menu-tab-content__sublink" href="{{ route('about.career') }}">Карьера</a>
    </li>
  </ul>
</div>
