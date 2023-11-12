@extends('layouts.app', ['pageClass' => 'products-page'])

@section('title', 'Продукты')

@section('breadcrumbs')
  <li>
    <a href="{{ route('home') }}">Главная</a>
  </li>

  <li>
    Продукты
  </li>
@endsection

@section('main')
<section class="products-page__banner main-banner">
  <picture>
    <source media="(max-width:991px)" srcset="{{ asset('img/products-page/banner-small.jpg') }}">
    <img class="main-banner__image" src="{{ asset('img/products-page/banner.png') }}" alt="Spey products">
  </picture>

  <div class="main-banner__txt-container">
    <h1 class="main-banner__title main-title">Продукты</h1>
    <p class="main-banner__txt">Широкий спектр современных препаратов на рынке фармацевтической индустрии позволяет Spey осуществлять свою деятельность во многих странах мира.
      Мы готовы делиться опытом и накопленными знаниями с медицинскими специалистами, чтобы решать и находить лучшие решения для возникающих проблем в здравоохранении.</p>
  </div>
</section>

<section class="products-boxes">
  <div class="products-boxes__inner main-container">
    <div class="products-page__box-list">
      <div class="iconed-box">
        <img class="iconed-box__image" src="{{ asset('img/products-page/all-products-icon.png') }}" alt="All products">

        <div class="iconed-box__text-container">
          <h2 class="iconed-box__title">Все продукты</h2>
          <p class="iconed-box__desc">Широкий спектр современных препаратов для различных отраслей медицины</p>

          <a href="{{ route('products.all') }}" class="iconed-box__button button button--more">
            <i>Перейти</i> <span class="material-icons">east</span>
          </a>
        </div>
      </div>

      <div class="iconed-box">
        <img class="iconed-box__image" src="{{ asset('img/products-page/nosology-icon.png') }}" alt="Nosology">

        <div class="iconed-box__text-container">
          <h2 class="iconed-box__title">Нозология</h2>
          <p class="iconed-box__desc">Все наши препараты отсортированные по Нозологию</p>

          <a href="{{ route('nosology.index') }}" class="iconed-box__button button button--more">
            <i>Перейти</i> <span class="material-icons">east</span>
          </a>
        </div>
      </div>

      <div class="iconed-box">
        <img class="iconed-box__image" src="{{ asset('img/products-page/atx-icon.png') }}" alt="Atx">

        <div class="iconed-box__text-container">
          <h2 class="iconed-box__title">АТХ классификация</h2>
          <p class="iconed-box__desc">Все наши препараты отсортированные по АТХ классификации</p>

          <a href="{{ route('atx.index') }}" class="iconed-box__button button button--more">
            <i>Перейти</i> <span class="material-icons">east</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="new-products">
  <div class="new-products__inner main-container">
    <h2 class="new-products__title main-title">Новые препараты</h2>

    <div class="carousel-container">
      <div class="products-carousel owl-carousel">
        @foreach ($newProducts as $product)
        <div class="owl-carousel__item">
          <x-product-card :product="$product" />
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endsection
