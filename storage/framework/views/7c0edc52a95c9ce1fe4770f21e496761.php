<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
      <div class="col">
    </div>
      <div class="col">

        <div class="card"  >
            <img src="<?php echo e(URL::asset($post->photo)); ?>" class="card-img-top" alt="<?php echo e($post->photo); ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo e($post->title); ?></h5>
              <p class="card-text"> <?php echo e($post->content); ?></p>
            <p> Created at:   <?php echo e($post->created_at->diffForhumans()); ?></p>
            <p>  Updated at:    <?php echo e($post->updated_at->diffForhumans()); ?></p>


              <a class="btn btn-success" href="<?php echo e(route('posts')); ?>"> all posts</a>
            </div>
          </div>

      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ahmed\blog\resources\views/posts/show.blade.php ENDPATH**/ ?>