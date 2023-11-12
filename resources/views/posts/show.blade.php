@extends('layouts.app', ['pageClass' => 'post-page'])

@section('title', $post->title)

@section('meta-tags')
@php $shareText = App\Support\Helper::generateShareText($post->body); @endphp

<meta name="description" content="{{ $shareText }}">
<meta property="og:description" content="{{ $shareText }}">
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:image" content="{{ asset('img/posts/thumbs/' . $post->image) }}">
<meta property="og:image:alt" content="{{ $post->title }}">
@endsection

@section('breadcrumbs')
<li>
  <a href="{{ route('home') }}">Главная</a>
</li>

@switch($previousRoute)
@case('home')
<li>
  Новые посты
</li>
@break

@case('science.index')
@case('science.categories.show')
<li>
  <a href="{{ route('science.index') }}">Наука и развитие</a>
</li>
@break

@case('interesting.index')
@case('interesting.posts')
@case('interesting.categories.show')
<li>
  <a href="{{ route('interesting.index') }}">Это интересно</a>
</li>
@break
@endswitch

<li>
  {{ $post->title }}
</li>
@endsection


@section('main')
<section class="post-page__section">
  <div class="post-page__section-inner main-container">
    <div class="post">
      <img class="post__banner" src="{{ asset('img/posts/' . $post->image) }}" alt="{{ $post->title }}">

      <div class="post__desc">
        <span class="post__date">{{ Carbon\Carbon::create($post->created_at)->locale('ru')->isoFormat('DD.MM.YYYY') }}</span>
        <h1 class="post__title main-title">{{ $post->title }}</h1>

        @if($post->pdf)
        <a class="post__pdf" href="/pdf/posts/{{ $post->pdf }}" target="_blank">Скачать PDF</a>
        @endif

        <div class="ya-share2" data-curtain data-services="vkontakte,telegram,twitter,viber,whatsapp"></div>
      </div>

      <div class="font-controller">
        <p class="font-controller__desc">Выберите размер шрифта:</p>

        <div class="font-controller__btns-container">
          <input class="font-controller__radio" type="radio" name="font_size" id="small-font" value="small" @checked($fontSize == 'small')>
          <label class="font-controller__label" for="small-font">A</label>

          <input class="font-controller__radio" type="radio" name="font_size" id="medium-font" value="medium" @checked($fontSize == 'medium')>
          <label class="font-controller__label" for="medium-font">AA</label>

          <input class="font-controller__radio" type="radio" name="font_size" id="large-font" value="large" @checked($fontSize == 'large')>
          <label class="font-controller__label" for="large-font">AAA</label>

          <input class="font-controller__radio" type="radio" name="font_size" id="giant-font" value="giant" @checked($fontSize == 'giant')>
          <label class="font-controller__label" for="giant-font">AAAA</label>
        </div>
      </div>

      <div class="post__body {{ 'post__body--' . $fontSize . '-font' }}">{!! $post->body !!}</div>
    </div>
  </div>
</section>
@endsection
