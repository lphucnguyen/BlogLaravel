<div class="rightSide">
    <div class="searchContain">
        <h4 class="headTitle">Search for</h4>
        <div class="divide"></div>
        <form method="GET" action="{{ route('search') }}">

            <input type="text" class="searchKey" name="search" placeholder="Search...">
            <button type="submit" class="btnSearch">Search</button>
        </form>
    </div>
    <div class="followEmail">
        <h4 class="headTitle">Follow by Email</h4>
        <div class="divide"></div>
        @if (session()->has('subscribe'))
            <p style="margin-top: 10px">You are have subscribed!!!</p>
        @else
        <form method="POST" action="{{ route('subscriber') }}">
            @csrf

            <input type="text" class="subscribeEmail" name="email" placeholder="Email...">
            <button type="submit" class="btnSubscribe">Subscribe</button>
        </form>
        @endif
    </div>
    <div class="categoryContain">
        <h4 class="headTitle">Category</h4>
        <div class="divide"></div>
        <ul class="categoryMenu">

            @foreach ($categories as $category)
                <li><a href="{{ route('category', [$category->slug, $category->id]) }}">{{ $category->categoryName }}</a></li>
            @endforeach

        </ul>
    </div>
    <div class="popularPost">
        <h4 class="headTitle">Popular Post</h4>
        <div class="divide"></div>

        @foreach ($postsPopular as $postPopular)
        <div class="post">
            <div class="imgPost">
                <img src="{{ Storage::disk('public')->url('post/' . $postPopular->image) }}" alt="popularPost">
            </div>
            <a href="{{ route('post', [$postPopular->slug, $postPopular->id]) }}" class="titlePost">{{ $postPopular->title }}</a>
        </div>                        
        @endforeach

    </div>
</div>