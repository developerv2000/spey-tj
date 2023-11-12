@extends('layouts.app', ['pageClass' => 'videos-page'])

@section('title', 'Видео')

@section('breadcrumbs')
<li>
  <a href="{{ route('home') }}">Главная</a>
</li>

<li>
  <a href="{{ route('interesting.index') }}">Это интересно</a>
</li>

<li>
  Видео
</li>
@endsection

@section('main')
<section class="videos-page__section">
  <div class="videos-page__section-inner main-container">
    <h1 class="videos-page__section-title main-title">Видео</h1>

    <x-videos-list :videos="$videos" />
  </div>
</section>
@endsection
