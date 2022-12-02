<div>
    <article class="article_container">
        <img src="{{ asset($imagePath) }}" alt="{{ $imageAlternative }}" class="article_image" />

        <div class="by_line">
            <address class="article_author">
                <span style="font-style: normal;">By</span>
                <a rel="author" href="#" class="link" style="color: #487beb;">
                    {{ $authorID }}
                </a>
            </address>
            created at
            <time datetime="{{ $articleCreatedAt }}">
                <span class="date">{{ get_only_date($articleCreatedAt) }}</span>
            </time>
        </div>

        <h2 class="article_title header">{{ $title }}</h2>

        <div class="article_body">
            <p>
                {{ $excerpt }}
            </p>
            <div class="read_container">
                <a rel="bookmark" class="link read_more" href="{{ route('default.article', ['article' => $id]) }}">Read more</a>
            </div>
        </div>

    </article>
</div>