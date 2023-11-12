@extends('layouts.app', ['pageClass' => 'product-page'])

@section('title', $product->title)

@section('meta-tags')
@php $shareText = App\Support\Helper::generateShareText($product->description); @endphp

<meta name="description" content="{{ $shareText }}">
<meta property="og:description" content="{{ $shareText }}">
<meta property="og:title" content="{{ $product->title }}" />
<meta property="og:image" content="{{ asset('img/products/thumbs/' . $product->image) }}">
<meta property="og:image:alt" content="{{ $product->title }}">
@endsection

@section('breadcrumbs')
<li>
  <a href="{{ route('home') }}">Главная</a>
</li>

<li>
  <a href="{{ route('products.index') }}">Продукты</a>
</li>

<li>
  <a href="{{ route('products.all') }}">Все продукты</a>
</li>

<li>
  {{ $product->title }}
</li>
@endsection

@section('main')
<section class="product-section">
  <div class="product-section__inner main-container">
    <div class="product-section__left">
      <div class="product-section__image-container">
        <div class="img-magnifier-container">
          <img class="product-section__image" id="magnifier-image" src="{{ asset('img/products/' . $product->image) }}" alt="{{ $product->title}}">
        </div>
      </div>

      <div class="product-properties">
        <div class="product-properties__item">
          <h3 class="product-properties__key">Название</h3>
          <div class="product-properties__value">
            <h1>{{ $product->title }}</h1>
          </div>
        </div>

        <div class="product-properties__item">
          <h3 class="product-properties__key">Форма выпуска</h3>
          <div class="product-properties__value">{{ $product->prescription ? 'Рецептурный' : 'Безрецептурный' }}</div>
        </div>

        @if($product->nosology()->count())
        <div class="product-properties__item">
          <h3 class="product-properties__key">Нозология</h3>
          <div class="product-properties__value">
            @foreach ($product->nosology as $nos)
            <a href="{{ route('nosology.show', $nos->slug) }}">{{ $nos->title }}</a>
            @endforeach
          </div>
        </div>
        @endif

        @if($product->atx()->count())
        <div class="product-properties__item">
          <h3 class="product-properties__key">АТХ классификация</h3>
          <div class="product-properties__value">
            @foreach ($product->atx as $at)
            <a href="{{ route('atx.show', $at->slug) }}">{{ $at->title }}</a>
            @endforeach
          </div>
        </div>
        @endif

        <div class="product-properties__item">
          <h3 class="product-properties__key">Инструкция</h3>
          <div class="product-properties__value"><a href="{{ asset('pdf/instructions/' . $product->instruction) }}" target="_blank">Скачать PDF</a></div>
        </div>

        @if($product->external_link)
        <div class="product-properties__item">
          <h3 class="product-properties__key">Дополнительно</h3>
          <div class="product-properties__value"><a href="{{ $product->external_link }}" target="_blank">Узнать цену</a></div>
        </div>
        @endif

        <div class="product-properties__item">
          <h3 class="product-properties__key">Поделиться</h3>
          <div class="product-properties__value">
            <div class="ya-share2" data-curtain data-services="vkontakte,telegram,twitter,viber,whatsapp"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="product-section__right">
      <h2 class="product-section__title">О препарате</h2>
      <div class="product-section__txt">{!! $product->description !!}</div>

      <h2 class="product-section__title">Состав</h2>
      <div class="product-section__txt">{!! $product->composition !!}</div>

      <h2 class="product-section__title">Показания к применению</h2>
      <div class="product-section__txt">{!! $product->indication !!}</div>

      <h2 class="product-section__title">Способ применения</h2>
      <div class="product-section__txt">{!! $product->usage !!}</div>
    </div>
  </div>
</section>

@endsection
