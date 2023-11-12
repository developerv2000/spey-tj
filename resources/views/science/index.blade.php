@extends('layouts.app', ['pageClass' => 'science-page'])

@section('title', 'Наука и развитие')
@section('pageClass', 'science')

@section('breadcrumbs')
<li>
  <a href="{{ route('home') }}">Главная</a>
</li>

<li>
  Наука и развитие
</li>
@endsection

@section('main')
<section class="science-banner">
  <picture>
    <source media="(max-width:991px)" srcset="{{ asset('img/science/banner-small.png') }}">
    <img class="science-banner__image" src="{{ asset('img/science/banner.png') }}" alt="doctor">
  </picture>

  <div class="science-banner__txt">
    <div class="science-banner__txt-inner main-container">
      <h1 class="science-banner__title main-title">Наука и развитие</h1>
      <p class="science-banner__desc">В данном разделе вы можете ознакомиться с полезными и важными публикациями о здоровье. Постоянно обновляемые посты, поданные доступным языком разделены для вашего удобства по категориям. В каждой из категорий находится только актуальная и достоверная информация.</p>
    </div>
  </div>
</section>

<section class="categories-section">
  <div class="categories-section__inner main-container">

    <h2 class="categories-section__title main-title">Категории</h2>

    <div class="categories__list">
      @foreach ($categories as $cat)
        <a class="secondary-card" href="{{ route('science.categories.show', $cat->slug) }}">
          <img class="secondary-card__image" src="{{ asset('img/categories/' . $cat->image) }}" alt="{{ $cat->title }}">
          <div class="secondary-card__txt">
            <h2 class="secondary-card__title">{{ $cat->title }}</h2>
            <p class="secondary-card__desc">{{ $cat->posts()->where('scientific', true)->count() }} постов</p>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</section>

<section class="latest-posts latest-scientific-posts">
  <div class="latest-posts__inner main-container">
    <h2 class="latest-posts__title main-title">Новые посты</h2>

    <x-posts-list :posts="$latestPosts" />
  </div>
</section>

@endsection
