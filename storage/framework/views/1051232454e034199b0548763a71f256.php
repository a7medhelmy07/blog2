<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">Create Post</h1>
            <a class="btn btn-success" href="<?php echo e(route('posts')); ?>"> all posts</a>
           </div>
      </div>

    </div>
        <div class="row">

            <?php if(count($errors) > 0): ?>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <?php echo e($item); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php endif; ?>



      <div class="col">
      <form action="<?php echo e(route('post.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
            <div class="form-group">
              <label for="exampleFormControlInput1">Title  </label>
              <input type="text" name="title" class="form-control"   >
            </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea1">content  </label>
              <textarea class="form-control"  name="content"   rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Photo  </label>
                <input type="file"  name="photo" class="form-control"   >
              </div>

            <div class="form-group">

                <button class="btn btn-danger" type="submit">save</button>
            </div>

          </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ahmed\blog\resources\views/posts/create.blade.php ENDPATH**/ ?>