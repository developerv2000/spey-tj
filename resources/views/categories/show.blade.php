@extends('layouts.app', ['pageClass' => 'category-page'])

@section('title', $category->title)

@section('breadcrumbs')
<li>
  <a href="{{ route('home') }}">Главная</a>
</li>

<li>
  @if($route == 'science.categories.show')
  <a href="{{ route('science.index') }}">Наука и развитие</a>
  @elseif($route == 'interesting.categories.show')
  <a href="{{ route('interesting.index') }}">Это интересно</a>
  @endif
</li>

<li>
  {{ $category->title }}
</li>
@endsection

@section('main')
<section class="category-posts">
  <div class="category-posts__inner main-container">
    <h2 class="category-posts__title main-title">{{ $category->title }}</h2>

    <x-posts-list class="category-posts-list" :posts="$posts" paginate="1" />
  </div>
</section>

@endsection
