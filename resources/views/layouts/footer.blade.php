<footer class="footer">
  <div class="footer__inner main-container">

    {{-- About links start --}}
    <div class="footer__block">
      <h4 class="footer__title"><a href="{{ route('about.index') }}">О Нас</a></h4>

      <ul class="footer__list">
        <li>
          <a href="{{ route('about.history') }}" class="footer__link">История становления</a>
        </li>

        <li>
          <a href="{{ route('about.wealth') }}" class="footer__link">Наши ценности</a>
        </li>

        <li>
          <a href="{{ route('about.career') }}" class="footer__link">Карьера</a>
        </li>
      </ul>
    </div> {{-- About links end --}}

    {{-- Products links start --}}
    <div class="footer__block">
      <h4 class="footer__title"><a href="{{ route('products.index') }}">Продукты</a></h4>

      <ul class="footer__list">
        <li>
          <a href="{{ route('products.all') }}" class="footer__link">Все продукты</a>
        </li>

        <li>
          <a href="{{ route('nosology.index') }}" class="footer__link">Нозология</a>
        </li>

        <li>
          <a href="{{ route('atx.index') }}" class="footer__link">ATX классификация</a>
        </li>
      </ul>
    </div> {{-- Products links start --}}

    {{-- For patients links start --}}
    <div class="footer__block">
      <h4 class="footer__title"><a href="{{ route('interesting.index') }}">Это интересно</a></h4>

      <ul class="footer__list">
        <li>
          <a href="{{ route('interesting.posts') }}" class="footer__link">Статьи</a>
        </li>

        <li>
          <a href="{{ route('interesting.videos') }}" class="footer__link">Видео</a>
        </li>
      </ul>
    </div> {{-- For patients links end --}}

    {{-- Contacts start --}}
    <div class="footer__block">
      <h4 class="footer__title">Контакты</h4>

      <ul class="footer__list">
        <li>
          <a href="tel:+992372368956" class="footer__link">Тел: +992 (37) 236-89-56</a>
        </li>

        <li>
          <a href="mailto:info@spey.tj" class="footer__link">Эл. почта: info@spey.tj</a>
        </li>
      </ul>

      <ul class="footer__socials-list">
        <li>
          <a href="https://www.facebook.com/spey.tj" class="footer__socials-link" target="_blank"><svg>
              <use href="#facebook-svg"></use>
            </svg></a>
        </li>

        <li>
          <a href="https://www.instagram.com/spey.tj" class="footer__socials-link" target="_blank"><svg>
              <use href="#instagram-svg"></use>
            </svg></a>
        </li>
      </ul>

    </div> {{-- Contacts end --}}
  </div>

  <div class="footer__copyright">Spey Healthcare © {{ date('Y') }}. Все права защищены</div>
</footer>
