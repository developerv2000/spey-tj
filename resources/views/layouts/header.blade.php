<header class="header">
  <div class="header__inner main-container">
    <div class="header__main">
      <div class="header__toggles">
        <button class="header__toggles-button header__toggles-menu-button button button--transparent">
          <span class="material-icons">menu_open</span> Меню
        </button>

        <button class="header__toggles-button header__toggles-search-button button button--transparent">
          <span class="material-icons">search</span> Поиск
        </button>
      </div>

      @include('layouts.breadcrumbs')
    </div>

    <a class="logo header__logo" href="{{ route('home') }}">
      <img class="logo__image" src="{{ asset('img/main/logo.png') }}" alt="Spey logo">
    </a>

    <button class="mobile-menu-toggler" data-action="toggle-mobile-menu">
      <span class="material-icons">menu_open</span>
    </button>
  </div>

  @include('menu.collapse')
  @include('menu.mobile')

</header>
