<div class="menu-tab-content__top-products top-products">
  <h3 class="top-products__title">Топ продукты</h3>

  <div class="top-products__list">
    @foreach ($topProducts as $top)
    <a href="{{ route('products.show', $top->product->slug) }}" class="top-products__item">
      <img class="top-products__image" src="{{ asset('img/top-products/' . $top->image) }}" alt="{{ $top->product->title }}">

      <p class="top-products__text">
        <span class="material-icons">chevron_right</span> {{ $top->product->title }}
      </p>
    </a>
    @endforeach
  </div>
</div>
