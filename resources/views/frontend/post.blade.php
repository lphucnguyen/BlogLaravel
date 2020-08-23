@extends('layouts.frontend.app')

@section('title', $post->title)

@section('content')
<main>
    <section id="content">
        <div class="container mainContent">
            <div class="leftSide">
                <article class="articlePost">
                    <h1 class="articlePostTitle">{{ $post->title }}</h1>
                    <div class="articlePostAuthorTime">
                        <div class="articlePostAuthor">
                            <i class="fa fa-user"></i>
                            Admin
                        </div>
                        <div class="articlePostTime">
                            <i class="fa fa-clock-o"></i>
                            {{ date('M d, Y', strtotime($post->created_at)) }}
                        </div>
                        <a href="{{ route('category', [$post->category->slug, $post->category->id]) }}" class="articlePostCategory">
                            <i class="fa fa-folder-open-o"></i>
                            {{ $post->category->categoryName }}
                        </a>
                    </div>
                    <div class="articlePostContent">
                        {!! $post->content !!}
                    </div>
                    <ul class="articlePostTags">

                        @foreach ($post->tag as $tag)
                            <li><a href="{{ route('tag', $tag->id) }}">{{ $tag->tagName }}</a></li>
                        @endforeach
                        
                    </ul>
                    <div class="articleSocials">
                        <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('post', [$post->slug, $post->id])) }}" class="articleSocial facebook"><i class="fa fa-facebook"></i></a>
                        <a target="_blank" href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(route('post', [$post->slug, $post->id])) }}&via=TWITTER-HANDLER" class="articleSocial twitter"><i class="fa fa-twitter"></i></a>
                        <a target="_blank" href="http://pinterest.com/pin/create/button/?url={{ urlencode(route('post', [$post->slug, $post->id])) }}&description={{ urlencode($post->title) }}" class="articleSocial pinterest"><i class="fa fa-pinterest"></i></a>
                        <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('post', [$post->slug, $post->id])) }}&title={{ urlencode($post->title) }}&source=YOUR-URL" class="articleSocial linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>
                </article>
                <div class="articleRelatedPostContain">
                    <h4 class="headTitle">Related Posts</h4>
                    <div class="articleRelatedPosts">

                        @foreach ($postsRelated as $postRelated)
                            <div class="articleRelatedPost">
                                <div class="articleRelatedPostImg">
                                    <img src="{{ Storage::disk('public')->url('post/' . $postRelated->image) }}" alt="articleRelatedPostImg">
                                </div>
                                <a href="{{ route('post', [$postRelated->slug, $postRelated->id]) }}" class="articleRelatedPostTitle">{{ $postRelated->title }}</a>
                            </div>                            
                        @endforeach
                        
                    </div>
                </div>
                <div class="articlePostCommentContain">
                    <h4 class="headTitle">Comments</h4>
                    <div class="articleComments">
                        @foreach ($post->comment as $comment)
                        <div class="articleComment">
                            <div class="articleCommentImg">
                                <img src="{{ Storage::disk('public')->url('uploads/user_1596295567.png') }}" alt="articleCommentImg">
                            </div>
                            <div class="articleCommentBody">
                                <h4 class="articleCommentName">{{ $comment->name }}</h4>
                                <h6 class="articleCommentTime">
                                    <i class="fa fa-clock-o"></i>
                                    {{ date('M d, Y', strtotime($comment->created_at)) }}
                                </h6>
                                <p class="articleCommentContent">{{ $comment->message }}</p>
                            </div>
                        </div>                            
                        @endforeach

                    </div>
                </div>
                <div class="articlePostCommentForm">
                    <h4 class="headTitle">Comments Form</h4>
                    <form method="POST" action="{{ route('comment', $post->id) }}" class="formComment">
                        @csrf

                        <input type="text" name="name" class="txtInp" placeholder="Name">
                        <input type="email" name="email" class="txtInp" placeholder="Email">
                        <textarea class="txtInp" name="message" cols="30" rows="10" placeholder="Message"></textarea>
                        <button type="submit" class="btnComment">Comment</button>
                    </form>
                </div>
            </div>
            @include('layouts.frontend.partial.rightSide')
        </div>
    </section>
</main>
@endsection