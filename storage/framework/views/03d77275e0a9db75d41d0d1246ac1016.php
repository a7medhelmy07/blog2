<?php $__env->startSection('content'); ?>

<?php
    $genderArray = ['Male','Female'];
?>


<div class="container" style="padding-top: 3%">

    <?php if(count($errors)>0): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="alert alert-danger" role="alert">
        <?php echo e($item); ?>

      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php endif; ?>


 <form  action="<?php echo e(route('profile.update')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="form-group">
        <label for="exampleFormControlInput1"> Name </label>
      <input type="text" name="name" class="form-control"  value="<?php echo e($user->name); ?>">
      </div>


        <div class="form-group">
            <label for="exampleFormControlInput1"> Gender </label>
          <select class="form-control" name="gender" >
              <?php $__currentLoopData = $genderArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($item); ?>" <?php echo e(($user->profile->gender == $item) ? 'selected':''); ?>><?php echo e($item); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Bio  </label>
          <textarea class="form-control" name="bio" rows="3">
            <?php echo $user->profile->bio; ?>

          </textarea>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">age </label>
          <input class="form-control" type="number" name="age" <?php echo $user->profile->age; ?>></input>
        </div>


        <div class="form-group">
            <label for="exampleFormControlInput1"> password </label>
          <input type="password" name="password" class="form-control" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1"> confirm password </label>
          <input type="password" name="c_passowrd" class="form-control"  >
          </div>

        <div class="form-group">
         <button class="btn btn-success" type="submit"> update</button>
 </div>

    </form>
</div>







<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ahmed\blog\resources\views/users/profile.blade.php ENDPATH**/ ?>