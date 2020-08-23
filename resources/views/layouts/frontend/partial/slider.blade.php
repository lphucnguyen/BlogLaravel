<section id="slider">
    <div class="container">
        <div class="sliderContain">
            <div class="btnSlider prev"><i class="fa fa-chevron-left"></i></div>
            <div class="btnSlider next"><i class="fa fa-chevron-right"></i></div>
            <div class="sliders">
                @foreach ($sliders as $slider)
                <div class="slider">
                    <div class="imgSlider">
                        <img src="{{ Storage::disk('public')->url('slider/' . $slider->image) }}" alt="slider">
                    </div>
                    <div class="sliderContent">
                        <div class="sliderInfo">
                            <a href="{{ $slider->link }}" class="sliderCategory">New</a>
                        </div>
                        <a href="{{ $slider->link }}" class="sliderTitle">{{ $slider->title }}</a>
                        <div class="sliderTime"><i class="fa fa-clock-o"></i>{{ date('M, j Y', strtotime($slider->updated_at)) }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>