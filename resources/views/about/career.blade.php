@extends('layouts.app', ['pageClass' => 'career-page'])

@section('title', 'Карьера')

@section('breadcrumbs')
  <li>
    <a href="{{ route('home') }}">Главная</a>
  </li>

  <li>
    <a href="{{ route('about.index') }}">О Нас</a>
  </li>

  <li>
    Карьера
  </li>
@endsection

@section('main')
<section class="career-page__banner main-banner">
  <picture>
    <source media="(max-width:991px)" srcset="{{ asset('img/about/career-banner-small.jpg') }}">
    <img class="main-banner__image" src="{{ asset('img/about/career-banner.png') }}" alt="Spey career">
  </picture>

  <div class="main-banner__txt-container">
    <h1 class="main-banner__title main-title">Карьера</h1>
    <p class="main-banner__txt">Сотрудничество с представителями мировых компаний, использование современных информационных технологий, помогает нам расти и добиваться
      желаемых результатов. Изменения внутри компании, способствуют тому, что мы развиваемся не только по отдельности, как индивидуумы,
      но и как вся компания целиком, как один слаженный механизм.</p>
  </div>
</section>

<section class="career-page__txt main-container">
  <div class="main-cards-list">
    <div class="main-card">
      <img class="main-card__image" src="{{ asset('img/about/career-card.png') }}" alt="We value">
      <div class="main-card__text-container">
        <h4 class="main-card__title">В будущих сотрудниках мы ценим:</h4>
        <div class="main-card__text">
          <ul>
            <li>Профессионализм и инициативность</li>
            <li>Ответственность и энергичность</li>
            <li>Динамичность и готовность к изменениям</li>
            <li>Наличие желания расти и развиваться вместе с компанией</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="main-card">
      <img class="main-card__image" src="{{ asset('img/about/career-card2.png') }}" alt="We offer">
      <div class="main-card__text-container">
        <h4 class="main-card__title">Spey предлагает:</h4>
        <div class="main-card__text">
          <ul>
            <li>Карьерный и профессиональный рост</li>
            <li>Работа в команде профессионалов высочайшего уровня</li>
            <li>Возможность ротации для приобретения современных навыков и разнообразного опыта в крупной компании</li>
            <li>Вознаграждение, достойное профессионалов</li>
            <li>Дополнительные развивающие программы, в зависимости от позиции</li>
          </ul>
        </div>
      </div>
    </div>
  </div> {{-- Cards List end --}}
</section>

@endsection
