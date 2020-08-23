<section id="slider">
    <div class="container">
        <div class="sliderContain">
            <div class="btnSlider prev"><i class="fa fa-chevron-left"></i></div>
            <div class="btnSlider next"><i class="fa fa-chevron-right"></i></div>
            <div class="sliders">
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="slider">
                    <div class="imgSlider">
                        <img src="<?php echo e(Storage::disk('public')->url('slider/' . $slider->image)); ?>" alt="slider">
                    </div>
                    <div class="sliderContent">
                        <div class="sliderInfo">
                            <a href="<?php echo e($slider->link); ?>" class="sliderCategory">New</a>
                        </div>
                        <a href="<?php echo e($slider->link); ?>" class="sliderTitle"><?php echo e($slider->title); ?></a>
                        <div class="sliderTime"><i class="fa fa-clock-o"></i><?php echo e(date('M, j Y', strtotime($slider->updated_at))); ?></div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section><?php /**PATH C:\xampp\htdocs\blog-laravel\resources\views/layouts/frontend/partial/slider.blade.php ENDPATH**/ ?>