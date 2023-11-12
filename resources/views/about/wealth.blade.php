@extends('layouts.app', ['pageClass' => 'wealth-page'])

@section('title', 'Наши ценности')

@section('breadcrumbs')
  <li>
    <a href="{{ route('home') }}">Главная</a>
  </li>

  <li>
    <a href="{{ route('about.index') }}">О Нас</a>
  </li>

  <li>
    Наши ценности
  </li>
@endsection

@section('main')
<section class="main-banner wealth-page__banner">
  <picture>
    <source media="(max-width:991px)" srcset="{{ asset('img/about/wealth-banner-small.jpg') }}">
    <img class="main-banner__image" src="{{ asset('img/about/wealth-banner.png') }}" alt="Spey history">
  </picture>

  <div class="main-banner__txt-container">
    <h1 class="main-banner__title main-title">Наши ценности</h1>
    <p class="main-banner__txt">Представляя препараты на международном фармацевтическом рынке сотрудники компании руководствуются прежде всего такими понятиями как
      профессионализм, ответственность, безопасность и качество. Наши ценности выражают то, во что мы верим, как представители компании, и отражают наши лучшие качества. Но
      самое главное- все эти понятия лежат в основе одного- забота о здоровье людей.</p>
  </div>
</section>

<section class="wealth__cards">
  <div class="wealth__cards-inner main-container">
    <div class="wealth__cards-list">
      <div class="popup-card">
        <img class="popup-card__image" src="{{ asset('img/about/wealth-card2.png') }}" alt="health">
        <div class="popup-card__overlay">
          <h2 class="popup-card__title">Жизнь</h2>
          <p class="popup-card__txt">
            Мы признаём жизнь как смысл бытия. Мы чувствуем свою ответственность за сохранение жизни человека.
          </p>
        </div>
      </div>

      <div class="popup-card">
        <img class="popup-card__image" src="{{ asset('img/about/wealth-card3.png') }}" alt="health">
        <div class="popup-card__overlay">
          <h2 class="popup-card__title">Здоровье</h2>
          <p class="popup-card__txt">
            Мы признаём здоровье как атрибут жизни. Наша деятельность направлена на обеспечение здоровья людей.
          </p>
        </div>
      </div>

      <div class="popup-card">
        <img class="popup-card__image" src="{{ asset('img/about/wealth-card4.png') }}" alt="health">
        <div class="popup-card__overlay">
          <h2 class="popup-card__title">Творчество</h2>
          <p class="popup-card__txt">
            Мы создаём инновационные продукты для улучшения здоровья людей, тем самым, совершенствуя жизнь на планете.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="wealth-page__txt">
  <div class="wealth-page__txt-inner main-container">
    <p>Основная задача <b>Spey</b> это - непрерывная забота о здоровье и улучшении качества жизни людей. Для достижения этой цели у нас имеется широкий портфель товаров- это
      востребованные, качественные и доступные рецептурные и безрецептурные лекарственные препараты.</p>

    <p>Цель нашей работы лежит в основе всей нашей деятельности. Она разъясняет, для чего мы приходим на работу каждый день и служит важным напоминанием нам о том, почему мы
      существуем как единая компания. Каждый наш сотрудник работает для того, чтобы продукция под брендом <b>Spey</b> стала уверенным выбором профессионалов своего дела и
      потребителей во всех странах присутствия компании. Следуя своей цели, мы выводим на рынок современные, эффективные и инновационные аналоги оригинальных
      препаратов-дженерики, соблюдая единые международные качества GMP.</p>

    <p>Мы считаем развитие системы здравоохранения нашей приоритетной задачей. Именно поэтому <b>Spey</b> стремится помогать людям, не только чувствовать себя здоровыми и
      уверенными в завтрашнем дне, но и сохранять и поддерживать здоровье каждого из них. Также этой цели служат наши вложения в развитие сотрудников и спонсорская
      деятельность, которую мы осуществляем.</p>
  </div>
</section>


<section class="principles">
  <div class="principles__inner main-container">
    <h1 class="princilpes__title main-title">Наши принципы</h1>

    <div class="accordion principles-accordion">
      <div class="accordion__item accordion__item--active">
        <button class="accordion__button">
          Творческий подход <span class="material-icons">expand_more</span>
        </button>

        <div class="accordion__collapse">
          <div class="accordion__collapse-body">
            Добиваться лучших результатов – наш главный принцип. Мы проявляем максимум творчества там, где открываются новые возможности. Spey постоянно ищет оригинальные и
            оптимальные способы для усовершенствования своей деятельности и находит решения для преодоления имеющихся препятствий.
          </div>
        </div>
      </div>

      <div class="accordion__item">
        <button class="accordion__button">
          Забота <span class="material-icons">expand_more</span>
        </button>

        <div class="accordion__collapse">
          <div class="accordion__collapse-body">
            Мы стараемся заботиться о простых людях, о совсем маленьких и не очень, о пожилых и молодых, о здоровых и больных. Мы прилагаем максимум усилий, чтобы современные и
            качественные лекарства были доступны всем нуждающимся. Для нас важно здоровье всего общества и всей планеты, на которой мы живем.
          </div>
        </div>
      </div>

      <div class="accordion__item">
        <button class="accordion__button">
          Здоровье общества <span class="material-icons">expand_more</span>
        </button>

        <div class="accordion__collapse">
          <div class="accordion__collapse-body">
            Мы гордимся тем, что влияем на здоровье людей, изменяя его к лучшему и работаем в отрасли, от которой напрямую зависит благополучие и здоровье общества. Изо дня в
            день компания Spey старается претворять в жизнь поставленные задачи и работать с соблюдением высочайших этических и моральных норм.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
