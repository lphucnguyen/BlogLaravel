

<?php $__env->startSection('title', $category->categoryName); ?>

<?php $__env->startSection('content'); ?>
<main>
    <section id="content">
        <div class="container mainContent">
            <div class="leftSide">
                <p class="showTitle">Show post with category "<?php echo e($category->categoryName); ?>"</p> 
                <?php $__currentLoopData = $posts[0]->post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="article">
                    <div class="articleInfo">
                        <a href="<?php echo e(route('category', $post->category->slug)); ?>" class="articleCategory"><i class="fa fa-folder-open-o"></i><?php echo e($post->category->categoryName); ?></a>
                    </div>
                    <a href="<?php echo e(route('post', $post->slug)); ?>" class="articleTitle"><?php echo e($post->title); ?></a>
                    <div class="articleAuthorTime">
                        <div class="articleAuthor">
                            <i class="fa fa-user"></i>
                            Admin
                        </div>
                        <div class="articleTime">
                            <i class="fa fa-clock-o"></i>
                            <?php echo e(date('M, d Y', strtotime($post->created_at))); ?>

                        </div>
                    </div>
                    <div class="articleImg">
                        <img src="<?php echo e(Storage::disk('public')->url('post/' . $post->image)); ?>" alt="articleImg">
                    </div>
                    <p class="articleContent">
                        <?php echo e($post->shortDescription); ?>

                    </p>
                    <div class="articleMore">
                        <a href="<?php echo e(route('post', $post->slug)); ?>" class="btnArticleMore">Read More <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                    <div class="articleSocials">
                        <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(route('post', $post->slug))); ?>" class="articleSocial facebook"><i class="fa fa-facebook"></i></a>
                        <a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo e(urlencode($post->title)); ?>&url=<?php echo e(urlencode(route('post', $post->slug))); ?>&via=TWITTER-HANDLER" class="articleSocial twitter"><i class="fa fa-twitter"></i></a>
                        <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo e(urlencode(route('post', $post->slug))); ?>&description=<?php echo e(urlencode($post->title)); ?>" class="articleSocial pinterest"><i class="fa fa-pinterest"></i></a>
                        <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(urlencode(route('post', $post->slug))); ?>&title=<?php echo e(urlencode($post->title)); ?>&source=YOUR-URL" class="articleSocial linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <?php echo $__env->make('layouts.frontend.partial.pagination', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            </div>
            <?php echo $__env->make('layouts.frontend.partial.rightSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </section>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog-laravel\resources\views\frontend\category.blade.php ENDPATH**/ ?>