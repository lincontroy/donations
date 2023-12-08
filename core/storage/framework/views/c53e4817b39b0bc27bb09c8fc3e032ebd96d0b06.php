<?php $__env->startSection('content'); ?>
    <section class="pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-end gy-4">
                <div class="col-lg-4 col-sm-12">
                    <form action="">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control" value="<?php echo e(request()->search); ?>"
                                placeholder="<?php echo app('translator')->get('Search by title'); ?>">
                            <button class="input-group-text bg-cmn text-white border-0">
                                <i class="las la-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-12">
                    <table class="table table--responsive--lg">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('Title'); ?></th>
                                <th><?php echo app('translator')->get('Goal'); ?></th>
                                <th><?php echo app('translator')->get('Fund Raised'); ?></th>
                                <th><?php echo app('translator')->get('Deadline'); ?></th>
                                <th><?php echo app('translator')->get('Status'); ?></th>
                                <th><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__empty_1 = true; $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $donation = $item->donation->where('status', Status::DONATION_PAID);
                                    $hasDonations = $donation->count();
                                ?>
                                <tr>
                                    <td><?php echo e(strLimit($item->title, 30)); ?></td>
                                    <td><?php echo e($general->cur_sym); ?><?php echo e(showAmount($item->goal)); ?> </td>
                                    <td>
                                        <?php echo e($general->cur_sym); ?><?php echo e(showAmount($donation->sum('donation'))); ?>

                                    </td>
                                    <td> <?php echo e(showDateTime($item->deadline, 'd-m-Y')); ?></td>
                                    <td>
                                        <?php echo $item->statusBadge; ?>
                                    </td>
                                    <td>
                                       <div>
                                        <?php if($item->deadline < now()): ?>
                                        <a href="javascript:void(0)" data-title="<?php echo e($item->title); ?>" data-goal="<?php echo e($item->goal); ?>"
                                            data-action="<?php echo e(route('user.campaign.fundrise.extended', $item->id)); ?>"
                                            class="extendBtn">
                                            <i title="<?php echo app('translator')->get('Extend request'); ?>?"
                                                class="la la-radiation-alt bg-primary text-white p-2 rounded"></i>
                                        </a>
                                    <?php endif; ?>
                                    <a
                                        href="<?php echo e(route('user.campaign.fundrise.view', ['slug' => $item->slug, 'id' => $item->id])); ?>"><i
                                            class="bg-cmn text-white p-2 rounded la la-desktop"></i></a>

                                    <?php if(@$hasDonations): ?>
                                        <a href="<?php echo e(route('user.campaign.donation.my', $item->id)); ?>"><i
                                                title="<?php echo app('translator')->get('Donors List'); ?>"
                                                class="la la-user bg-info  text-white p-2 rounded"></i></a>
                                    <?php else: ?>
                                        <i class="la la-user bg-secondary text-white p-2 rounded"></i>
                                    <?php endif; ?>
                                       </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="100%">
                                        <p class="text-center"> <?php echo e(__($emptyMessage)); ?> <i class="fa fa-laugh"></i></p>
                                    </td>
                                </tr>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>

                <?php if($campaigns->hasPages()): ?>
                    <?php echo paginateLinks($campaigns) ?>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="modal fade" tabindex="-1" role="dialog" id="extendedModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo app('translator')->get('Are you sure to extend the campaign'); ?>?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <h4 class="campaign-title"></h4>
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Extend Deadline'); ?></label>
                                <input name="deadline" type="text" data-language="en"
                                    class="datepicker-here form-control bg--white" autocomplete="off"
                                    value="<?php echo e(date('Y-m-d')); ?>" data-date-format="yyyy-mm-dd" required>
                                <small class="text-muted text--small"> <i class="la la-info-circle"></i>
                                    <?php echo app('translator')->get('Year-Month-Date'); ?></small>
                            </div>

                            <div class="form-group">
                                <label><?php echo app('translator')->get('Extend Goal'); ?> </label>
                                <div class="input-group">
                                    <input type="number" step="any" required name="goal"
                                        value="<?php echo e(old('goal')); ?>" class="form-control">
                                    <span class="input-group-text"><?php echo e(__($general->cur_text)); ?> </span>
                                </div>
                                <code class="was-goal"></code>
                            </div>
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Final Goal'); ?></label>
                                <div class="input-group">
                                    <input type="number" step="any" required name="final_goal"
                                        value="<?php echo e(old('final_goal')); ?>" class="form-control" readonly>
                                    <span class="input-group-text"><?php echo e(__($general->cur_text)); ?> </span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="cmn-btn btn-sm"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/vendor/datepicker.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/admin/js/vendor/datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/vendor/datepicker.en.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        'use strict';

        $(function() {

            $('.extendBtn').on('click', function(e) {
                e.preventDefault();
                let route = $(this).data('action');
                let title = $(this).data('title');
                let goal = parseFloat($(this).data('goal'));
                let curText = `<?php echo e($general->cur_text); ?>`;
                var modal = $('#extendedModal');
                modal.find('.modal-body .campaign-title').text(`${title}`);
                modal.find('.modal-body .was-goal').text(`<?php echo app('translator')->get('Previous Goal'); ?>:` +`${goal}` + ' '+ `${curText}`);
                modal.find('form').attr('action', route);

                $(document).on('input', '[name=goal]' , function(){
                    const currentGoal = parseFloat($(this).val());
                    var finalGoal   = goal + currentGoal;
                    $('[name=final_goal]').val(finalGoal);
                })

                modal.modal('show');
            });

            //date-validation
            $(document).on('click', 'form button[type=submit]', function(e) {
                if (new Date($('.datepicker-here').val()) == "Invalid Date") {
                    notify('error', 'Invalid extend deadline');
                    return false;
                }
            });
        })
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .datepickers-container {
            z-index: 9999999999;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\donations\core\resources\views/templates/basic/user/campaign/all_campaign.blade.php ENDPATH**/ ?>