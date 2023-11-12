@extends('dashboard.layouts.app')
@section('main')

<form class="main-form" action="{{ route($modelTag . '.update') }}" method="POST" data-on-submit="show-spinner" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{ $item->id }}">

  <div class="form-group">
    <label class="form-label required">Продукт</label>

    <select class="selectize-singular" name="product_id" required>
      @foreach ($products as $product)
        <option value="{{ $product->id }}" @selected($product->id == $item->product_id)>{{ $product->title }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label class="form-label">Изображение. Необходимый размер 370x208 пикселей (c прозрачным фоном)!</label>

    <input class="form-input" type="file" name="image" accept=".png, .jpg, .jpeg" data-action="display-local-image" data-target="local-image">
    <img class="form-image" data-id="local-image" src="{{ asset('img/top-products/' . $item->image) }}">
  </div>

  <div class="form-actions">
    @include('dashboard.components.form.update-button')
  </div>

</form>

@endsection
