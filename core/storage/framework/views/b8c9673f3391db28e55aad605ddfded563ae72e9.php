<?php
    $purposeElement = getContent('purpose.element', false);
?>
<!-- about section start -->
<section class="<?php if(request()->routeIs('home')): ?> pt-0 <?php else: ?> pt-120 <?php endif; ?> pb-120 about-section">
    <div class="container">
        <?php $__currentLoopData = $purposeElement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purpose): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row gy-4">
                <div class=" col-lg-6 order-lg-2 <?php echo e($loop->odd ? 'order-2 mt-lg-0' : 'order-1'); ?>">
                    <div class="<?php echo e($loop->odd ? 'section-content pl-lg-4' : 'section-content pl-lg'); ?>">
                        <h2 class="section-title my-4"><?php echo e(__($purpose->data_values->heading)); ?></h2>
                        <p class="text-justify"> <?php echo  $purpose->data_values->description ?> </p>
                    </div>
                </div>
                <div class="col-lg-6 order-1 <?php echo e($loop->odd ? ' order-lg-2' : ''); ?>">
                    <img src="<?php echo e(getImage('assets/images/frontend/purpose/' . $purpose->data_values->image)); ?>"
                        alt="<?php echo app('translator')->get('image'); ?>" class="w-100">
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\donations\core\resources\views/templates/basic/sections/purpose.blade.php ENDPATH**/ ?>