@extends('layouts.app', ['pageClass' => 'atx-page'])

@section('title', $pageTitle)

@section('breadcrumbs')
<li>
  <a href="{{ route('home') }}">Главная</a>
</li>

<li>
  <a href="{{ route('products.index') }}">Продукты</a>
</li>

<li>
  <a href="{{ route('atx.index') }}">ATX классификация</a>
</li>

<li>
  {{ $pageTitle }}
</li>
@endsection

@section('main')
<section class="atx-section">
  <div class="atx-section__inner main-container">
    <h1 class="atx-title main-title">{{ $pageTitle }}</h1>

    <div class="atx-section__divider">
      <ul class="classifications-list">
        <li>
          <a class="classifications-list__link @if(!$activeCategory) classifications-list__link--active @endif"
            href="{{ route('atx.index') }}">Все продукты</a>
        </li>

        @foreach ($categories as $category)
        <li>
          <a class="classifications-list__link @if($activeCategory && $category->slug == $activeCategory->slug) classifications-list__link--active @endif"
            href="{{ route('atx.show', $category->slug) }}">{{ $category->title }}</a>
        </li>
        @endforeach
      </ul>

      {{-- Mobile start --}}
      <div class="classifications-select only-mobile">
        <div class="selectize-singular-container">
          <select class="selectize--linked">
            <option value="{{ route('atx.index') }}" @selected(!$activeCategory)>Все продукты</option>

            @foreach($categories as $category)
              <option option value="{{ route('atx.show', $category->slug) }}" @selected($activeCategory && $category->slug == $activeCategory->slug)>{{ $category->title }}</option>
            @endforeach
          </select>
        </div>
      </div> {{-- Mobile end --}}

      <x-products-list class="atx-products-list" :products="$products" />
    </div>
  </div>
</section>
@endsection
