<div>
    <article class="article_container">
        <img src="{{ asset('storage/' . $imagePath) }}" alt="{{ $imageAlternative }}" class="article_image" />

        <div class="by_line">
            <address class="article_author">
                <span style="font-style: normal;">By</span>
                <a rel="author" href="#" class="link" style="color: #487beb;">
                    {{ $authorNickname }}
                </a>
            </address>
            created at
            <time datetime="{{ $articleCreatedAt }}">
                <span class="date">{{ get_only_date($articleCreatedAt) }}</span>
            </time>
        </div>

        <a href="{{ route('default.article', ['article' => $id]) }}" class="link">
            <h2 class="article_title header">{{ $title }}</h2>
        </a>

        <div class="article_body">
            <p>
                {{ $excerpt }}
            </p>
        </div>

    </article>
</div>