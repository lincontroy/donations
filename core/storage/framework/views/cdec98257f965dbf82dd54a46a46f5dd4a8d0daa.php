<?php $__env->startSection('content'); ?>
    <section class="pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 p-lg-5 p-md-4 p-3 card custom--shadow">
                    <div class="login-area">
                        <form action="<?php echo e(route('user.campaign.fundrise.store')); ?>" class="action-form" method="POST"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('Select Category'); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                                            <select name="category_id" class="form-control form--control" required>
                                                <option value="" disabled selected><?php echo app('translator')->get('Select One'); ?></option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>" <?php if(old('category_id') == $category->id): echo 'selected'; endif; ?>>
                                                        <?php echo e(__($category->name)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('Goal Amount'); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><?php echo e($general->cur_sym); ?></span>
                                            <input type="number" step="any" name="goal" value="<?php echo e(old('goal')); ?>"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Title'); ?></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                    <input type="text" name="title" value="<?php echo e(old('title')); ?>" class="form-control"
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><?php echo app('translator')->get('Deadline'); ?></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    <input name="deadline" type="text" data-language="en"
                                        class="datepicker-here form-control" data-position='bottom left' autocomplete="off"
                                        value="<?php echo e(old('deadline')); ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Description'); ?><span class="text-danger">*</span></label>
                                <textarea class="form-control nicEdit" name="description" rows="8"><?php echo e(old('description')); ?></textarea>
                                <small><?php echo app('translator')->get('It can be long text and describe why the campaign was created'); ?>.</small>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('Image'); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-images"></i></span>
                                            <input type="file" name="image" id="inputAttachments" class="form-control"
                                                accept="image/*" required />
                                        </div>
                                    </div><!-- form-group end -->
                                </div>

                                <div class="document-file">
                                    <div class="document-file__input">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Images and Documents(.pdf)'); ?></label>
                                            <input type="file" name="attachments[]" id="inputAttachments"
                                                class="form-control mb-2" accept=".jpg, .jpeg, .png, .pdf" required />

                                        </div><!-- form-group end -->
                                    </div>
                                    <button type="button" class="btn cmn-btn add-new">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <div id="fileUploadsContainer"></div>
                                    <small class="text-muted mb-2">
                                        <?php echo app('translator')->get('Allowed Extensions: .jpg, .jpeg, .png, .pdf'); ?>
                                    </small>
                                </div>
                            </div>
                            <button type="submit" class="btn cmn-btn w-100" type="submit"><?php echo app('translator')->get('Submit'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/vendor/datepicker.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/admin/js/nicEdit.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/vendor/datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/vendor/datepicker.en.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        'use strict';

        $(".add-new").on('click', function() {
            $("#fileUploadsContainer").append(` <div class="input-group mb-2">
                <input type="file" name="attachments[]" id="inputAttachments" class="form-control" accept=".jpg, .jpeg, .png, .pdf" required/>
                        <button type="button" class="input-group-text btn--danger remove-btn"><i class="las la-times"></i></button>
                    </div>
                `);
        })

        $(document).on('click', '.remove-btn', function() {
            $(this).closest('.input-group').remove();
        });


        //nicEdit
        $(".nicEdit").each(function(index) {
            $(this).attr("id", "nicEditor" + index);
            new nicEditor({
                fullPanel: true
            }).panelInstance('nicEditor' + index, {
                hasPanel: true
            });
        });

        (function($) {
            $(document).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain', function() {
                $('.nicEdit-main').focus();
            });
        })(jQuery);

        //date-validation

        $('.datepicker-here').on('keyup keypress keydown input',function(){
            return false;
        });
        $('.datepicker-here').datepicker({
            minDate:new Date()
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\donations\core\resources\views/templates/basic/user/campaign/form.blade.php ENDPATH**/ ?>