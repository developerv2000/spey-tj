@props(['videos', 'pagination' => true])

<div class="videos-list-container">
  <div {{ $attributes->merge(['class' => 'videos-list']) }}>
    @foreach ($videos as $video)
      <x-video-card :video="$video"/>
    @endforeach
  </div>

  @if ($pagination)
    {{ $videos->links('layouts.pagination') }}
  @endunless
</div>
