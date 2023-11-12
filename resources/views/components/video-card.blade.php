@props(['video'])

<div class="video-card">
  <video class="plyr" height="220" src="{{ asset('videos/' . $video->filename) }}" playsinline controls></video>

  <div class="video-card__body">
    <h3 class="video-card__title">{{ $video->title }}</h3>
    <span class="video-card__date">{{ Carbon\Carbon::create($video->created_at)->locale('ru')->isoFormat('DD.MM.YYYY') }}</span>
  </div>
</div>
