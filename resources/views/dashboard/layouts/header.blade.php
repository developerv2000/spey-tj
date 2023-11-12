<header class="header">
  {{-- Toggler start --}}
  <div class="header__toggler-container">
    <h2 class="header__site-name">{{ env('APP_NAME') }}</h2>
    <button class="aside-toggler"><span class="material-icons"">menu</span></button>
  </div>  {{-- Toggler end --}}

  {{-- Body start --}}
  <div class=" header__body">
    {{-- Title start --}}
    <ul class="header__breadcrumbs">
      {{-- first level --}}
      <li>
        @switch($modelTag)
          @case('products') Продукты @break
          @case('nosology') Нозология @break
          @case('atx') АТХ классификация @break
          @case('posts') Посты @break
          @case('categories') Категории @break
          @case('top') Топ @break
          @case('videos') Видео @break
        @endswitch

        {{-- First levels items count --}}
        @if( strpos($route, 'index')) ({{ count($totalItems) }}) @endif
      </li>

      {{-- second level on CREATE page --}}
      @if(strpos($route, 'create')) <li>Добавить</li> @endif

      {{-- second level on item EDIT page --}}
      @switch($route)
        @case('products.edit')
        @case('nosology.edit')
        @case('atx.edit')
        @case('posts.edit')
        @case('categories.edit')
        @case('videos.edit')
        <li>{{ $item->title }}</li>
          @break
      @endswitch
    </ul> {{-- Title end --}}

    {{-- Actions start --}}
    <ul class="header__actions">
      {{-- Actions for index pages --}}
      @switch($route)
        @case('products.dashboard.index')
        @case('nosology.dashboard.index')
        @case('atx.dashboard.index')
        @case('posts.dashboard.index')
        @case('categories.dashboard.index')
        @case('videos.dashboard.index')
        <li>
          <a href="{{ route($modelTag . '.create') }}">
            <span class="material-icons">add</span> Добавить
          </a>
        </li>

        <li>
          <button data-action="select-all"><span class="material-icons">done_all</span> Отметить все</button>
        </li>

        <li>
          <button data-bs-toggle="modal" data-bs-target="#destroy-multiple-items-modal"><span class="material-icons">clear</span> Удалить отмеченные</button>
        </li>
        @break
      @endswitch
    </ul> {{-- Actions end --}}
  </div> {{-- Body start --}}
</header>
