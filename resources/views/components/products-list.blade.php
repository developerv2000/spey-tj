@props(['products'])

<div class="products-list-container">
  <div {{ $attributes->merge(['class' => 'products-list']) }}>
    @foreach ($products as $product)
      <x-product-card :product="$product"/>
    @endforeach
</div>

  {{ $products->links('layouts.pagination') }}
</div>
