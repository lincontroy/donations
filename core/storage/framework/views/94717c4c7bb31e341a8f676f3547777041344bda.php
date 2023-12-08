<?php $__env->startSection('content'); ?>
    <div class="pt-120 pb-120">
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
                    <table class="table table--responsive--md">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('S.N.'); ?></th>
                                <th><?php echo app('translator')->get('Title'); ?></th>
                                <th><?php echo app('translator')->get('Goal'); ?></th>
                                <th><?php echo app('translator')->get('Fund Raised'); ?></th>
                                <th><?php echo app('translator')->get('Deadline'); ?> | <?php echo app('translator')->get('Created'); ?></th>
                                <th><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($campaigns->firstItem() + $loop->index); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('user.campaign.fundrise.view', ['slug' => $item->slug, 'id' => $item->id])); ?>"
                                            title="<?php echo app('translator')->get('Details'); ?>">
                                            <?php echo e(strLimit($item->title, 20)); ?>

                                        </a>
                                    </td>
                                    <td><?php echo e($general->cur_sym); ?><?php echo e(showAmount($item->goal)); ?> </td>
                                    <td><?php echo e($general->cur_sym); ?><?php echo e(showAmount($item->donation->where('status', Status::DONATION_PAID)->sum('donation'))); ?>

                                    </td>
                                    <td>
                                        <div>
                                        <?php echo e(showDateTime($item->deadline, 'd-m-Y')); ?>

                                        <span class="d-block"><?php echo e(diffForHumans($item->created_at)); ?></span>
                                    </div>
                                    </td>
                                    <td>
                                        <?php
                                            $hasDonations = $item->donation->where('status', Status::DONATION_PAID)->count();
                                        ?>

                                       <div>
                                        <?php if(request()->routeIs('user.campaign.fundrise.pending')): ?>
                                        <?php if($item->expired()): ?>
                                            <a href="<?php echo e(route('user.campaign.fundrise.edit', $item->id)); ?>">
                                                <i title="Edit" class="la la-edit bg-primary text-white p-2 rounded"></i></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(request()->routeIs('user.campaign.fundrise.rejected')): ?>
                                    <a href="javascript:void(0)" class="confirmationBtn"
                                    data-question="<?php echo app('translator')->get('Are you sure to delete the expired campaign'); ?>?"
                                                    data-action="<?php echo e(route('user.campaign.fundrise.delete', $item->id)); ?>"><i title="<?php echo app('translator')->get('Trash request'); ?>?" class="la la-trash bg-danger text-white p-2 rounded"></i></a>
                                    <?php endif; ?>

                                    <?php if(request()->routeIs('user.campaign.fundrise.pending') ||
                                            request()->routeIs('user.campaign.fundrise.rejected') ||
                                            request()->routeIs('user.campaign.fundrise.complete')): ?>
                                        <a href="<?php echo e(route('user.campaign.fundrise.view', [$item->slug, $item->id])); ?>"
                                            title="<?php echo app('translator')->get('Details'); ?>">
                                            <i class="bg-cmn text-white p-2 rounded la la-desktop"></i>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('user.campaign.fundrise.view', [$item->slug, $item->id])); ?>"
                                            title="<?php echo app('translator')->get('Details'); ?>">
                                            <i class="bg-cmn text-white p-2 rounded la la-desktop"></i>
                                        </a>
                                        <a href=" <?php echo e(route('user.campaign.donation.received', $item->id)); ?>">
                                            <?php if(@$hasDonations): ?>
                                                <i title="<?php echo app('translator')->get('Donor List'); ?>"
                                                    class="la la-user bg-info  text-white p-2 rounded"></i>
                                            <?php else: ?>
                                                <i class="la la-user bg-secondary text-white p-2 rounded"></i>
                                            <?php endif; ?>
                                        </a>

                                        <?php if($item->completed == Status::NO): ?>
                                            <a data-question="<?php echo app('translator')->get('Are you sure to campaign complete action? Because this action can\'t back again!'); ?>"
                                                data-action="<?php echo e(route('user.campaign.fundrise.make.complete', $item->id)); ?>"
                                                class="confirmationBtn">
                                                <i title="<?php echo app('translator')->get('Complete'); ?>?"
                                                    class="la la-check bg-warning text-white p-2 rounded"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if(!request()->routeIs('user.campaign.fundrise.expired')): ?>
                                            <?php if($item->stop): ?>
                                                <a data-question="<?php echo app('translator')->get('Are you sure to run this campaign?'); ?>"
                                                    data-action="<?php echo e(route('user.campaign.fundrise.stop', $item->id)); ?>"
                                                    class="confirmationBtn" data-title="<?php echo app('translator')->get('Campaign Run'); ?>">
                                                    <i title="<?php echo app('translator')->get('Run'); ?>?"
                                                        class="la la-pause-circle bg-primary text-white p-2 rounded"></i>
                                                </a>
                                            <?php else: ?>
                                                <a data-question="<?php echo app('translator')->get('Are you sure to stop this campaign?'); ?>"
                                                    data-action="<?php echo e(route('user.campaign.fundrise.stop', $item->id)); ?>"
                                                    class="confirmationBtn mt-1" data-title="<?php echo app('translator')->get('Campaign Run'); ?>">
                                                    <i title="<?php echo app('translator')->get('Stop'); ?>?"
                                                        class="la la-pause-circle bg-danger text-white p-2 rounded"></i>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                       </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="100%" class="text-center">
                                        <?php echo e(__($emptyMessage)); ?> <i class="la la-laugh"></i>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>

                    </table>
                </div>
                <?php if($campaigns->hasPages()): ?>
                    <div class="d-flex justify-content-center">
                        <?php echo e($campaigns->links()); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if (isset($component)) { $__componentOriginalc51724be1d1b72c3a09523edef6afdd790effb8b = $component; } ?>
<?php $component = App\View\Components\ConfirmationModal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('confirmation-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\ConfirmationModal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc51724be1d1b72c3a09523edef6afdd790effb8b)): ?>
<?php $component = $__componentOriginalc51724be1d1b72c3a09523edef6afdd790effb8b; ?>
<?php unset($__componentOriginalc51724be1d1b72c3a09523edef6afdd790effb8b); ?>
<?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('style'); ?>
<style>
    .btn-sm-radious{
        border-radius: 5px !important

    }

</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\donations\core\resources\views/templates/basic/user/campaign/index.blade.php ENDPATH**/ ?>