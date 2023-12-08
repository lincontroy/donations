<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive--md table-responsive">
                        <table class=" table align-items-center table--light">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('Campaign'); ?></th>
                                    <th><?php echo app('translator')->get('Category'); ?></th>
                                    <th><?php echo app('translator')->get('User'); ?></th>
                                    <th><?php echo app('translator')->get('Goal'); ?></th>
                                    <th><?php echo app('translator')->get('Deadline'); ?></th>
                                    <th><?php echo app('translator')->get('Status'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <div class="user thumb">
                                                <div class="thumb w-100">
                                                    <img src="<?php echo e(getImage(getFilePath('campaign') . '/' . $campaign->image, getFileSize('campaign'))); ?>">
                                                    <span> <?php echo e(strLimit($campaign->title, 25)); ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo e(@$campaign->category->name); ?>

                                        </td>
                                        <td>
                                            <span class="d-block"> <?php echo e(@$campaign->user->fullname); ?></span>
                                            <a class="text--small" href="<?php echo e(appendQuery('search', @$campaign->user->username)); ?>"><span>@</span><?php echo e(@$campaign->user->username); ?></a>
                                        </td>
                                        <td> <?php echo e($general->cur_sym); ?><?php echo e(showAmount($campaign->goal)); ?> </td>
                                        <td>
                                            <?php echo e(showDateTime($campaign->deadline, 'd-m-Y')); ?>

                                            <span class="text--small d-block"><?php echo e(diffForHumans($campaign->deadline)); ?></span>
                                        </td>
                                        <td> <?php echo $campaign->statusBadge;?> </td>
                                        <td>
                                            <div class="button--group">
                                                <a href="<?php echo e(route('admin.fundrise.details',$campaign->id)); ?>"
                                                    class="btn btn-sm btn-outline--primary ms-1 mb-2">
                                                    <i class="las la-desktop"></i><?php echo app('translator')->get('Details'); ?>
                                                </a>
                                                <?php if(request()->routeIs('admin.fundrise.rejected')): ?>
                                                    <button type="button" class="btn btn-sm btn-outline--danger ms-1 mb-2 confirmationBtn" data-action="<?php echo e(route('admin.fundrise.delete', $campaign->id)); ?>" data-question="<?php echo app('translator')->get('Are you sure to delete this campaign?'); ?>">
                                                        <i class="la la-trash"></i><?php echo app('translator')->get('Delete'); ?>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="100%" class="text-muted text-center"><?php echo e(__($emptyMessage)); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <?php if($campaigns->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo paginateLinks($campaigns) ?>
                    </div>
                <?php endif; ?>
            </div>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-form','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\donations\core\resources\views/admin/campaign/index.blade.php ENDPATH**/ ?>