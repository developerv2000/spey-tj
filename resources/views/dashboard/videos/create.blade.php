@extends('dashboard.layouts.app')
@section('main')

<form class="main-form" action="{{ route($modelTag . '.store') }}" method="POST" data-on-submit="show-spinner" enctype="multipart/form-data">
  @csrf

  <div class="form-group">
    <label class="form-label required">Заголовок</label>

    <input class="form-input" type="text" name="title" value="{{ old('title') }}" required />
  </div>

  <div class="form-group">
    <label class="form-label required">Видео. Поддерживаемые форматы mp4, webm, ogg</label>

    <input class="form-input" type="file" name="filename" accept=".mp4, .webm, .ogg" required>
  </div>

  <div class="form-actions">
    @include('dashboard.components.form.store-button')
  </div>

</form>

@endsection
