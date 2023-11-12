<div class="tab-content-item @if(strpos($route, 'interesting') !== false) tab-content-item--active @endif" data-content-id="interesting">
  <div class="menu-tab-content__main">
    <a class="menu__tab-title-link" href="{{ route('interesting.index') }}">
      <h3 class="menu__tab-title">Это интересно</h3>
    </a>

    <p class="menu__tab-desc">
      В данном разделе представлены научно-популярные статьи и интересные видео о современных лекарственных средствах и их пользе для здоровья.
    </p>

    <a class="menu__tab-link" href="{{ route('interesting.index') }}">
      <span class="material-icons">chevron_right</span> Подробнее
    </a>
  </div>

  @include('menu.top-products')

  <ul class="menu-tab-content__sublinks-container">
    <li>
      <a class="menu-tab-content__sublink" href="{{ route('interesting.posts') }}">Научно-популярные статьи</a>
    </li>

    <li>
      <a class="menu-tab-content__sublink" href="{{ route('interesting.videos') }}">Видео</a>
    </li>
  </ul>
</div>
