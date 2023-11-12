@props(['post'])

<a class="post-card" href="{{ route('posts.show', $post->slug) }}">
  <div class="post-card__img-container">
    <img class="post-card__image" src="{{ asset('img/posts/thumbs/' . $post->image) }}" alt="{{ $post->title }}">
    <span class="post-card__date">{{ Carbon\Carbon::create($post->created_at)->locale('ru')->isoFormat('DD.MM.YYYY') }}</span>
  </div>

  <div class="post-card__body">
    <h3 class="post-card__title">{{ $post->title }}</h3>
  </div>
</a>
