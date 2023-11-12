@extends('dashboard.layouts.app')
@section('main')

<form class="main-form" action="{{ route($modelTag . '.update') }}" method="POST" data-on-submit="show-spinner" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{ $item->id }}">

  <div class="form-group">
    <label class="form-label required">Заголовок</label>

    <input class="form-input" type="text" name="title" value="{{ old('title', $item->title) }}" required />
  </div>

  <div class="form-group">
    <label class="form-label required">Рецептурность продукта</label>

    <select class="selectize-singular" name="prescription" required>
      <option value="0" @selected(!$item->prescription)>OTC</option>
      <option value="1" @selected($item->prescription)>RX</option>
    </select>
  </div>

  <div class="form-group">
    <label class="form-label">Изображение. Все изображения продуктов должны иметь одинаковую пропорцию!</label>

    <input class="form-input" type="file" name="image" accept=".png, .jpg, .jpeg" data-action="display-local-image" data-target="local-image">
    <img class="form-image" data-id="local-image" src="{{ asset('img/products/' . $item->image) }}">
  </div>

  <div class="form-group">
    <label class="form-label">Инструкция: <a href="/pdf/instructions/{{ $item->instruction }}" target="_blank">{{ $item->instruction }}</a></label>

    <input class="form-input" type="file" name="instruction" accept=".pdf">
  </div>

  <div class="form-group">
    <label class="form-label required">Нозология</label>

    <select class="selectize-multiple" name="nosology[]" multiple="multiple" required>
      @foreach ($nosology as $category)
      <option value="{{ $category->id }}"
        @foreach ($item->nosology as $itemNos)
          @selected($category->id == $itemNos->id)
        @endforeach
        >{{ $category->title }}
      </option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label class="form-label required">АТХ классификация</label>

    <select class="selectize-multiple" name="atx[]" multiple="multiple" required>
      @foreach ($atx as $category)
      <option value="{{ $category->id }}"
        @foreach ($item->atx as $itemAtx)
          @selected($category->id == $itemAtx->id)
        @endforeach
        >{{ $category->title }}
      </option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label class="form-label required">Добавить в популярные продукты?</label>

    <select class="selectize-singular" name="popular" required>
      <option value="0" @selected(!$item->popular)>Нет</option>
      <option value="1" @selected($item->popular)>Да</option>
    </select>
  </div>

  <div class="form-group">
    <label class="form-label">Ссылка на приобретение препарата</label>

    <input class="form-input" type="text" name="external_link" value="{{ old('external_link', $item->external_link) }}" />
  </div>

  <div class="form-group">
    <label class="form-label required">Описание</label>

    <textarea class="simditor-wysiwyg" name="description" required>{{ old('description', $item->description) }}</textarea>
  </div>

  <div class="form-group">
    <label class="form-label required">Состав</label>

    <textarea class="simditor-wysiwyg" name="composition" required>{{ old('composition', $item->composition) }}</textarea>
  </div>

  <div class="form-group">
    <label class="form-label required">Показания к применению</label>

    <textarea class="simditor-wysiwyg" name="indication" required>{{ old('indication', $item->indication) }}</textarea>
  </div>

  <div class="form-group">
    <label class="form-label required">Способ применения</label>

    <textarea class="simditor-wysiwyg" name="usage" required>{{ old('usage', $item->usage) }}</textarea>
  </div>

  <div class="form-actions">
    @include('dashboard.components.form.update-button')
    @include('dashboard.components.form.destroy-button')
  </div>

</form>

@include('dashboard.modals.destroy-single-item', ['itemId' => $item->id ])

@endsection
