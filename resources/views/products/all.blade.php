@extends('layouts.app', ['pageClass' => 'all-products-page'])

@section('title', 'Все продукты')

@section('breadcrumbs')
<li>
  <a href="{{ route('home') }}">Главная</a>
</li>

<li>
  <a href="{{ route('products.index') }}">Продукты</a>
</li>

<li>
  Все продукты
</li>
@endsection

@section('main')
<section class="all-products-page__banner main-banner">
  <picture>
    <source media="(max-width:991px)" srcset="{{ asset('img/products-page/all-products-banner-small.jpg') }}">
    <img class="main-banner__image" src="{{ asset('img/products-page/all-products-banner.png') }}" alt="Spey products">
  </picture>

  <div class="products-counter">
    <div class="products-counter__item counter-box">
      <div class="products-counter__number counter-number" data-speed="2500" data-stop="{{ $allProductsCount }}"></div>
      <p class="products-counter__txt">Всего <br>препаратов</p>
    </div>

    <div class="products-counter__item counter-box">
      <div class="products-counter__number counter-number" data-speed="2500" data-stop="{{ $rxProductsCount }}"></div>
      <p class="products-counter__txt">Рецептурных <br>препаратов</p>
    </div>

    <div class="products-counter__item counter-box">
      <div class="products-counter__number counter-number" data-speed="2500" data-stop="{{ $otcProductsCount }}"></div>
      <p class="products-counter__txt">Безрецептурных <br>препаратов</p>
    </div>
  </div>
</section>

<section class="all-products-section" id="all-products">
  <div class="all-products-section__inner main-container">
    <h1 class="all-products-title main-title">Все продукты</h1>

    <div class="products-filter">
      <div class="filter-by-letter">
        <h2 class="filter-by-letter__title">Фильтр по буквам:</h2>
        <ul class="filter-by-letter__list">
          @foreach ($letters as $letter)
          <li>
            <a href="{{ route('products.all') }}@if($activeLetter != $letter)?letter={{ $letter . '#all-products' }}@endif"
              class="filter-by-letter__link @if($activeLetter == $letter) filter-by-letter__link--active @endif">{{ $letter }}</a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>

    <x-products-list class="all-products-list" :products="$products" />
  </div>
</section>

@endsection
