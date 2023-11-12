@if (!($products->count() + $posts->count()))
  <p class="menu__search-no-results">Результаты не найдены.</p>
@endif

@if ($products->count())
  @foreach ($products as $product)
    <div class="menu__search-results-item">
      <a class="menu__search-results-image-container" href="{{ route('products.show', $product->slug) }}">
        <img class="menu__search-results-image" src="{{ asset('img/products/thumbs/' . $product->image) }}" alt="{{ $product->title }}">
      </a>

      <div class="menu__search-results-body">
        <h4 class="menu__search-results-title">{{ $product->title }}</h4>
        <div class="menu__search-results-txt">{!! $product->description !!}</div>
        <a class="menu__search-results-link button button--more" href="{{ route('products.show', $product->slug) }}">
          <i>Перейти</i> <span class="material-icons">east</span>
        </a>
      </div>
    </div>
  @endforeach
@endif


@if ($posts->count())
  @foreach ($posts as $post)
    <div class="menu__search-results-item">
      <a class="menu__search-results-image-container" href="{{ route('posts.show', $post->slug) }}">
        <img class="menu__search-results-image" src="{{ asset('img/posts/thumbs/' . $post->image) }}" alt="{{ $post->title }}">
      </a>

      <div class="menu__search-results-body">
        <h4 class="menu__search-results-title">{{ $post->title }}</h4>
        <a class="menu__search-results-link button button--more" href="{{ route('posts.show', $post->slug) }}">
          <i>Перейти</i> <span class="material-icons">east</span>
        </a>
      </div>
    </div>
  @endforeach
@endif
