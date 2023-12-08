<?php $__env->startSection('content'); ?>
    <section class="pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card custom--card mb-4">
                        <div class="card-body">
                        <h3><?php echo app('translator')->get('Complete Your Profile'); ?></h3>
                        <p><?php echo app('translator')->get('You must complete your profile by providing the required information'); ?>.</p>
                        </div>
                    </div>
                    <div class="login-area card custom--card">
                        <div class="card-body">
                            <form method="POST" action="<?php echo e(route('user.data.submit')); ?>" class="action-form">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo app('translator')->get('First Name'); ?></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="las la-user"></i></div>
                                                <input type="text" class="form-control form--control" name="firstname" value="<?php echo e(old('firstname')); ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo app('translator')->get('Last Name'); ?></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="las la-user"></i></div>
                                                <input type="text" class="form-control form--control" name="lastname" value="<?php echo e(old('lastname')); ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group ">
                                            <label class="form-label"><?php echo app('translator')->get('Address'); ?></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="las la-map-marked"></i></div>
                                                <input type="text" class="form-control form--control" name="address" value="<?php echo e(old('address')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group ">
                                            <label class="form-label"><?php echo app('translator')->get('State'); ?></label>
                                            <div class="input-group">
                                                <div class="input-group-text"> <i class="las la-flag"></i></div>
                                                <input type="text" class="form-control form--control" name="state" value="<?php echo e(old('state')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo app('translator')->get('Zip Code'); ?></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="las la-sort-numeric-up-alt"></i> </div>
                                                <input type="text" class="form-control form--control" name="zip" value="<?php echo e(old('zip')); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo app('translator')->get('City'); ?></label>
                                            <div class="input-group">
                                                <div class="input-group-text"> <i class="las la-city"></i></div>
                                                <input type="text" class="form-control form--control" name="city" value="<?php echo e(old('city')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn cmn-btn w-100">
                                        <?php echo app('translator')->get('Submit'); ?>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\donations\core\resources\views/templates/basic/user/user_data.blade.php ENDPATH**/ ?>