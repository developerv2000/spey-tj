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
    <label class="form-label">Изображение</label>

    <input class="form-input" type="file" name="image" accept=".png, .jpg, .jpeg" data-action="display-local-image" data-target="local-image">
    <img class="form-image" data-id="local-image" src="{{ asset('img/posts/' . $item->image) }}">
  </div>

  <div class="form-group">
    <label class="form-label">PDF: <a href="/pdf/posts/{{ $item->pdf }}" target="_blank">{{ $item->pdf }}</a></label>

    <input class="form-input" type="file" name="pdf" accept=".pdf">
  </div>

  <div class="form-group">
    <label class="form-label required">Категории</label>

    <select class="selectize-multiple" name="categories[]" multiple="multiple" required>
      @foreach ($categories as $category)
      <option value="{{ $category->id }}"
        @foreach ($item->categories as $itemCat)
          @selected($category->id == $itemCat->id)
        @endforeach
        >{{ $category->title }}
      </option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label class="form-label required">Текст</label>

    <textarea class="simditor-wysiwyg--imaged" name="body" required>{{ old('body', $item->body) }}</textarea>
  </div>

  <div class="form-group">
    <label class="form-label required">Отображать в разделе Наука и развитие?</label>

    <select class="selectize-singular" name="scientific" required>
      <option value="0" @selected(!$item->scientific)>Нет</option>
      <option value="1" @selected($item->scientific)>Да</option>
    </select>
  </div>

  <div class="form-group">
    <label class="form-label required">Отображать в разделе Это интересно?</label>

    <select class="selectize-singular" name="interesting" required>
      <option value="0" @selected(!$item->interesting)>Нет</option>
      <option value="1" @selected($item->interesting)>Да</option>
    </select>
  </div>

  <div class="form-actions">
    @include('dashboard.components.form.update-button')
    @include('dashboard.components.form.destroy-button')
  </div>

</form>

@include('dashboard.modals.destroy-single-item', ['itemId' => $item->id ])

@endsection
