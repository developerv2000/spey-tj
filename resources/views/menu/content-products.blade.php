<div class="tab-content-item @if(strpos($route, 'products') !== false || strpos($route, 'nosology') !== false || strpos($route, 'atx') !== false) tab-content-item--active @endif" data-content-id="products">
  <div class="menu-tab-content__main">
    <a class="menu__tab-title-link" href="{{ route('products.index') }}">
      <h3 class="menu__tab-title">Продукты</h3>
    </a>

    <p class="menu__tab-desc">
      Широкий спектр современных препаратов на рынке фармацевтической индустрии позволяет Spey осуществлять свою деятельность во многих странах мира.
    </p>

    <a class="menu__tab-link" href="{{ route('products.index') }}">
      <span class="material-icons">chevron_right</span> Подробнее
    </a>
  </div>

  @include('menu.top-products')

  <ul class="menu-tab-content__sublinks-container">
    <li>
      <a class="menu-tab-content__sublink" href="{{ route('products.all') }}">Все продукты</a>
    </li>

    <li>
      <a class="menu-tab-content__sublink" href="{{ route('nosology.index') }}">Нозология</a>
    </li>

    <li>
      <a class="menu-tab-content__sublink" href="{{ route('atx.index') }}">ATX классификация</a>
    </li>
  </ul>
</div>
