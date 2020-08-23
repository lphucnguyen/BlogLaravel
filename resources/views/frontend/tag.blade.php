@extends('layouts.frontend.app')

@section('title', $tag->tagName)

@section('content')
<main>
    <section id="content">
        <div class="container mainContent">
            <div class="leftSide">
                <p class="showTitle">Show post with tag "{{ $tag->tagName }}"</p> 
                @foreach ($posts as $post)
                <article class="article">
                    <div class="articleInfo">
                        <a href="{{ route('category', [$post->category->slug, $post->category->id]) }}" class="articleCategory"><i class="fa fa-folder-open-o"></i>{{ $post->category->categoryName }}</a>
                    </div>
                    <a href="{{ route('post', [$post->slug, $post->id]) }}" class="articleTitle">{{ $post->title }}</a>
                    <div class="articleAuthorTime">
                        <div class="articleAuthor">
                            <i class="fa fa-user"></i>
                            Admin
                        </div>
                        <div class="articleTime">
                            <i class="fa fa-clock-o"></i>
                            {{ date('M, d Y', strtotime($post->created_at)) }}
                        </div>
                    </div>
                    <div class="articleImg">
                        <img src="{{ Storage::disk('public')->url('post/' . $post->image) }}" alt="articleImg">
                    </div>
                    <p class="articleContent">
                        {{ $post->shortDescription }}
                    </p>
                    <div class="articleMore">
                        <a href="{{ route('post', [$post->slug, $post->id]) }}" class="btnArticleMore">Read More <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                    <div class="articleSocials">
                        <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('post', [$post->slug, $post->id])) }}" class="articleSocial facebook"><i class="fa fa-facebook"></i></a>
                        <a target="_blank" href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(route('post', [$post->slug, $post->id])) }}&via=TWITTER-HANDLER" class="articleSocial twitter"><i class="fa fa-twitter"></i></a>
                        <a target="_blank" href="http://pinterest.com/pin/create/button/?url={{ urlencode(route('post', [$post->slug, $post->id])) }}&description={{ urlencode($post->title) }}" class="articleSocial pinterest"><i class="fa fa-pinterest"></i></a>
                        <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('post', [$post->slug, $post->id])) }}&title={{ urlencode($post->title) }}&source=YOUR-URL" class="articleSocial linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>
                </article>
            @endforeach
            
            @include('layouts.frontend.partial.pagination')
            
            </div>
            @include('layouts.frontend.partial.rightSide')
        </div>
    </section>
</main>
@endsection