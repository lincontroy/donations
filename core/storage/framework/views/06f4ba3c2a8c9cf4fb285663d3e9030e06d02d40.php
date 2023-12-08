<?php $__env->startSection('panel'); ?>
    <div class="page-wrapper">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/jquery.validate.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue . '/js/bootstrap-fileinput.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make($activeTemplate . 'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\donations\core\resources\views/templates/basic/layouts/master.blade.php ENDPATH**/ ?>