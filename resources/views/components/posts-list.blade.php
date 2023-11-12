@props(['posts', 'paginate' => false])

<div class="posts-list-container">
  <div {{ $attributes->merge(['class' => 'posts-list']) }}>
    @foreach ($posts as $post)
      <x-post-card :post="$post"/>
    @endforeach
  </div>

  @unless ($posts->count())
    <p>Посты находятся в стадии редактирования...</p>
  @endunless

  @if($paginate)
    {{ $posts->links('layouts.pagination') }}
  @endif
</div>
