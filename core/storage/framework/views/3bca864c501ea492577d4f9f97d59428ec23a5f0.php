<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive--md table-responsive">
                        <table class=" table align-items-center table--light">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('Campaign | Trx'); ?></th>
                                    <th><?php echo app('translator')->get('Donor'); ?> | <?php echo app('translator')->get('Country'); ?></th>
                                    <th><?php echo app('translator')->get('Email'); ?> | <?php echo app('translator')->get('Mobile'); ?></th>
                                    <th><?php echo app('translator')->get('Donation'); ?></th>
                                    <th><?php echo app('translator')->get('Payment Method'); ?></th>
                                    <th><?php echo app('translator')->get('Donation Date'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <a class="d-block" href="<?php echo e(route('admin.fundrise.details', $donation->campaign_id)); ?>">
                                                <?php echo e(strLimit(@$donation->campaign->title, 25)); ?>

                                            </a>
                                            <?php echo e(@$donation->deposit->trx); ?>

                                        </td>
                                        <td><span class="d-block fw-bold"><?php echo e(__($donation->fullname)); ?></span>
                                             <?php echo e($donation->country); ?></td>
                                        <td><?php echo e($donation->email); ?> <br/> <?php echo e($donation->mobile); ?></td>
                                        <td><span class="fw-bold"><?php echo e($general->cur_sym); ?><?php echo e(showAmount($donation->donation)); ?></span></td>
                                        <td><?php echo e(@$donation->deposit->gateway->alias); ?></td>
                                        <td><span class="d-block"><?php echo e(showDateTime($donation->created_at)); ?></span>
                                            <?php echo e(diffForHumans($donation->created_at)); ?></td>
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
                <?php if($donations->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo paginateLinks($donations) ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('breadcrumb-plugins'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-form','data' => ['dateSearch' => 'yes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['dateSearch' => 'yes']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
   <form>
    <div class="input-group w-auto flex-fill">
        <select class="form-control" name="anonymous">
            <option value=""><?php echo app('translator')->get('All Donation'); ?></option>
            <option value="1" <?php if(request()->anonymous==1): echo 'selected'; endif; ?>><?php echo app('translator')->get('Anonymous Donation'); ?></option>
            <option value="0" <?php if(request()->anonymous=='0'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Specified Donation'); ?></option>
        </select>
        <button class="btn btn--primary" type="submit"><i class="la la-search"></i></button>
    </div>
   </form>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\donations\core\resources\views/admin/donation/index.blade.php ENDPATH**/ ?>