@extends('layouts.app', ['pageClass' => 'about-page'])

@section('title', 'О Нас')

@section('breadcrumbs')
  <li>
    <a href="{{ route('home') }}">Главная</a>
  </li>

  <li>
    О Нас
  </li>
@endsection

@section('main')
<section class="about-page__section">
  <div class="about-page__section-inner main-container">
    <h1 class="about-page__section-title main-title">О компании</h1>

    @include('components.about-cards-list')
  </div>
</section>

@endsection
