@extends('layouts.frontend.app')

@section('title', 'Homepage')

@section('content')
<main>
    @include('layouts.frontend.partial.slider')
    <section id="content">
        <div class="container mainContent">
            @include('layouts.frontend.partial.leftSide')
            @include('layouts.frontend.partial.rightSide')
        </div>
    </section>
</main>
@endsection