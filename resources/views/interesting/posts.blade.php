@extends('layouts.app', ['pageClass' => 'interesting-posts-page'])

@section('title', 'Посты')

@section('breadcrumbs')
<li>
  <a href="{{ route('home') }}">Главная</a>
</li>

<li>
  <a href="{{ route('interesting.index') }}">Это интересно</a>
</li>

<li>
  Научно-популярные статьи
</li>
@endsection

@section('main')
<section class="categories-section">
  <div class="categories-section__inner main-container">

    <h1 class="categories-section__title main-title">Категории</h1>

    <div class="categories__list">
      @foreach ($categories as $cat)
      <a class="secondary-card" href="{{ route('interesting.categories.show', $cat->slug) }}">
        <img class="secondary-card__image" src="{{ asset('img/categories/' . $cat->image) }}" alt="{{ $cat->title }}">
        <div class="secondary-card__txt">
          <h2 class="secondary-card__title">{{ $cat->title }}</h2>
          <p class="secondary-card__desc">{{ $cat->posts()->where('interesting', true)->count() }} постов</p>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>

<section class="latest-posts latest-interesting-posts">
  <div class="latest-posts__inner main-container">
    <h2 class="latest-posts__title main-title">Новые статьи</h2>

    <x-posts-list :posts="$latestPosts" />
  </div>
</section>

@endsection
