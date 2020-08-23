<div class="rightSide">
    <div class="searchContain">
        <h4 class="headTitle">Search for</h4>
        <div class="divide"></div>
        <form method="GET" action="<?php echo e(route('search')); ?>">

            <input type="text" class="searchKey" name="search" placeholder="Search...">
            <button type="submit" class="btnSearch">Search</button>
        </form>
    </div>
    <div class="followEmail">
        <h4 class="headTitle">Follow by Email</h4>
        <div class="divide"></div>
        <?php if(session()->has('subscribe')): ?>
            <p style="margin-top: 10px">You are have subscribed!!!</p>
        <?php else: ?>
        <form method="POST" action="<?php echo e(route('subscriber')); ?>">
            <?php echo csrf_field(); ?>

            <input type="text" class="subscribeEmail" name="email" placeholder="Email...">
            <button type="submit" class="btnSubscribe">Subscribe</button>
        </form>
        <?php endif; ?>
    </div>
    <div class="categoryContain">
        <h4 class="headTitle">Category</h4>
        <div class="divide"></div>
        <ul class="categoryMenu">

            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('category', [$category->slug, $category->id])); ?>"><?php echo e($category->categoryName); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>
    </div>
    <div class="popularPost">
        <h4 class="headTitle">Popular Post</h4>
        <div class="divide"></div>

        <?php $__currentLoopData = $postsPopular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postPopular): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="post">
            <div class="imgPost">
                <img src="<?php echo e(Storage::disk('public')->url('post/' . $postPopular->image)); ?>" alt="popularPost">
            </div>
            <a href="<?php echo e(route('post', [$postPopular->slug, $postPopular->id])); ?>" class="titlePost"><?php echo e($postPopular->title); ?></a>
        </div>                        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div><?php /**PATH C:\xampp\htdocs\blog-laravel\resources\views/layouts/frontend/partial/rightSide.blade.php ENDPATH**/ ?>