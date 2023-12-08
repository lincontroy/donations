<?php $__env->startSection('content'); ?>
    <section class="pt-120 pb-120">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="verification-code-wrapper custom--card">
                    <div class="verification-area login-area">
                        <form action="<?php echo e(route('user.verify.email')); ?>" method="POST" class="submit-form">
                            <?php echo csrf_field(); ?>
                            <p class="verification-text"><?php echo app('translator')->get('A 6 digit verification code sent to your email address'); ?>: <?php echo e(showEmailAddress(auth()->user()->email)); ?></p>

                            <?php echo $__env->make($activeTemplate . 'partials.verification_code', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="mb-3">
                                <button type="submit" class="btn cmn-btn w-100"><?php echo app('translator')->get('Submit'); ?></button>
                            </div>

                            <div class="mb-3">
                                <p>
                                    <?php echo app('translator')->get('If you don\'t get any code'); ?>, <a href="<?php echo e(route('user.send.verify.code', 'email')); ?>"> <?php echo app('translator')->get('Try again'); ?></a>
                                </p>

                                <?php if($errors->has('resend')): ?>
                                    <small class="text-danger d-block"><?php echo e($errors->first('resend')); ?></small>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\donations\core\resources\views/templates/basic/user/auth/authorization/email.blade.php ENDPATH**/ ?>