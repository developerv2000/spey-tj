@extends('dashboard.layouts.app')
@section('main')

<form class="main-form" action="{{ route($modelTag . '.store') }}" method="POST" data-on-submit="show-spinner" enctype="multipart/form-data">
  @csrf

  <div class="form-group">
    <label class="form-label required">Заголовок</label>

    <input class="form-input" type="text" name="title" value="{{ old('title') }}" required />
  </div>

  <div class="form-group">
    <label class="form-label required">Изображение. Все изображение категорий должны иметь одинаковые пропорции!</label>

    <input class="form-input" type="file" name="image" accept=".png, .jpg, .jpeg" data-action="display-local-image" data-target="local-image" required>
    <img class="form-image" data-id="local-image" src="{{ asset('img/dashboard/default-image.png') }}">
  </div>

  <div class="form-group">
    <label class="form-label required">Отображать в разделе Наука и развитие?</label>

    <select class="selectize-singular" name="scientific" required>
      <option value="0">Нет</option>
      <option value="1" selected>Да</option>
    </select>
  </div>

  <div class="form-group">
    <label class="form-label required">Отображать в разделе Это интересно?</label>

    <select class="selectize-singular" name="interesting" required>
      <option value="0">Нет</option>
      <option value="1" selected>Да</option>
    </select>
  </div>

  <div class="form-actions">
    @include('dashboard.components.form.store-button')
  </div>

</form>

@endsection
