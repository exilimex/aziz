<div class="blog-post">

    <h2 class="blog-post-title">

        <a href="/registration/{{ $contents->id }}">

        {{ $contents->title }}

        </a>
    </h2>
    <p class="blog-post-meta">

    {{ $contents->created_at->toFormattedDateString()  }}

    </p>

    {{ $contents->body }}
</div>
<!-- /.blog-post -->