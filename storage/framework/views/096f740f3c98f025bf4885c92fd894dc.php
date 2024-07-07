<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">All Posts  </h1>
        <a class="btn btn-success" href="<?php echo e(route('post.create')); ?>"> create post</a>
        <a class="btn btn-danger" href="<?php echo e(route('posts.trashed')); ?>"> Trash <i class="fas fa-trash"></i></a>
           </div>
      </div>
    </div>
    <div class="row">


        <?php if($post->count() > 0 ): ?>
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col"> Date</th>
                    <th scope="col">User</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                    ?>
                    <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($i++); ?></th>
                        <td><?php echo e($item->title); ?></td>
                        <td><?php echo e($item->created_at->diffForhumans()); ?></td>
                        <td><?php echo e($item->user->name); ?></td>
                        <td>
                        <img src="<?php echo e(URL::asset($item->photo)); ?>" alt="<?php echo e($item->photo); ?>"
                       
                        class="img-tumbnail" width="100" height="100">
                        </td>
                        <td>
                            <a  class="text-success" href="<?php echo e(route('post.show',['slug'=> $item->slug])); ?>"> <i class="fas  fa-2x fa-eye"></i> </a>
                            <?php if($item->user_id == Auth::id()): ?>
                            &nbsp;&nbsp;

                            <a href="<?php echo e(route('post.edit',['id'=> $item->id])); ?>"> <i class="fas fa-2x fa-edit"></i>  </a>&nbsp;&nbsp;
                            <a class="text-danger" href="<?php echo e(route('post.destroy',['id'=> $item->id])); ?>"> <i class="fas  fa-2x fa-trash-alt"></i> </a>
                            <?php endif; ?>

                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
              </table>


          </div>
        <?php else: ?>
        <div class="col">
            <div class="alert alert-danger" role="alert">
                Not posts
              </div>
        </div>

        <?php endif; ?>


    </div>
  </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ahmed\blog\resources\views/posts/index.blade.php ENDPATH**/ ?>