

<?php $__env->startSection('title', $post->title); ?>

<?php $__env->startSection('content'); ?>
<main>
    <section id="content">
        <div class="container mainContent">
            <div class="leftSide">
                <article class="articlePost">
                    <h1 class="articlePostTitle"><?php echo e($post->title); ?></h1>
                    <div class="articlePostAuthorTime">
                        <div class="articlePostAuthor">
                            <i class="fa fa-user"></i>
                            Admin
                        </div>
                        <div class="articlePostTime">
                            <i class="fa fa-clock-o"></i>
                            <?php echo e(date('M d, Y', strtotime($post->created_at))); ?>

                        </div>
                        <a href="<?php echo e(route('category', $post->category->slug)); ?>" class="articlePostCategory">
                            <i class="fa fa-folder-open-o"></i>
                            <?php echo e($post->category->categoryName); ?>

                        </a>
                    </div>
                    <div class="articlePostContent">
                        <?php echo $post->content; ?>

                    </div>
                    <ul class="articlePostTags">

                        <?php $__currentLoopData = $post->tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('tag', $tag->id)); ?>"><?php echo e($tag->tagName); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </ul>
                    <div class="articleSocials">
                        <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(route('post', $post->slug))); ?>" class="articleSocial facebook"><i class="fa fa-facebook"></i></a>
                        <a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo e(urlencode($post->title)); ?>&url=<?php echo e(urlencode(route('post', $post->slug))); ?>&via=TWITTER-HANDLER" class="articleSocial twitter"><i class="fa fa-twitter"></i></a>
                        <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo e(urlencode(route('post', $post->slug))); ?>&description=<?php echo e(urlencode($post->title)); ?>" class="articleSocial pinterest"><i class="fa fa-pinterest"></i></a>
                        <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(urlencode(route('post', $post->slug))); ?>&title=<?php echo e(urlencode($post->title)); ?>&source=YOUR-URL" class="articleSocial linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>
                </article>
                <div class="articleRelatedPostContain">
                    <h4 class="headTitle">Related Posts</h4>
                    <div class="articleRelatedPosts">

                        <?php $__currentLoopData = $postsRelated; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postRelated): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="articleRelatedPost">
                                <div class="articleRelatedPostImg">
                                    <img src="<?php echo e(Storage::disk('public')->url('post/' . $postRelated->image)); ?>" alt="articleRelatedPostImg">
                                </div>
                                <a href="<?php echo e(route('post', $postRelated->slug)); ?>" class="articleRelatedPostTitle"><?php echo e($postRelated->title); ?></a>
                            </div>                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                </div>
                <div class="articlePostCommentContain">
                    <h4 class="headTitle">Comments</h4>
                    <div class="articleComments">
                        <?php $__currentLoopData = $post->comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="articleComment">
                            <div class="articleCommentImg">
                                <img src="<?php echo e(Storage::disk('public')->url('uploads/user_1596295567.png')); ?>" alt="articleCommentImg">
                            </div>
                            <div class="articleCommentBody">
                                <h4 class="articleCommentName"><?php echo e($comment->name); ?></h4>
                                <h6 class="articleCommentTime">
                                    <i class="fa fa-clock-o"></i>
                                    <?php echo e(date('M d, Y', strtotime($comment->created_at))); ?>

                                </h6>
                                <p class="articleCommentContent"><?php echo e($comment->message); ?></p>
                            </div>
                        </div>                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
                <div class="articlePostCommentForm">
                    <h4 class="headTitle">Comments Form</h4>
                    <form method="POST" action="<?php echo e(route('comment', $post->id)); ?>" class="formComment">
                        <?php echo csrf_field(); ?>

                        <input type="text" name="name" class="txtInp" placeholder="Name">
                        <input type="email" name="email" class="txtInp" placeholder="Email">
                        <textarea class="txtInp" name="message" cols="30" rows="10" placeholder="Message"></textarea>
                        <button type="submit" class="btnComment">Comment</button>
                    </form>
                </div>
            </div>
            <?php echo $__env->make('layouts.frontend.partial.rightSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </section>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog-laravel\resources\views\frontend\post.blade.php ENDPATH**/ ?>