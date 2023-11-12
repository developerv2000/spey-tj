@props(['product'])

<a class="product-card" href="{{ route('products.show', $product->slug) }}">
  <img src="{{ asset('img/products/thumbs/' . $product->image) }}" alt="{{ $product->title}}">

  <div class="product-card__overlay">
    <div class="product-card__header">
      <div class="product-card__prescription">{{ $product->prescription ? 'RX' : 'OTC' }}</div>
      <h4 class="product-card__title">{{ $product->title }}</h4>
    </div>

    <p class="product-card__desc">{{ App\Support\Helper::cleanText($product->description) }}</p>
  </div>
</a>
