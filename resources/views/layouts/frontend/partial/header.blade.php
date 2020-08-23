<div class="scroll-to-top">
    <i class="fa fa-arrow-up"></i>
</div>
<header>
    <nav>
        <div class="container">
            <a href="{{ route("welcome") }}" class="logo">Dev.</a>
            <ul class="menu">
                @foreach ($menus as $menu)
                    <li><a href="{{ $menu->link }}">{{ $menu->title }}</a></li> 
                @endforeach
            </ul>
            <div class="toggleMenu"></div> 
        </div>   
    </nav>
</header>