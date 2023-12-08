<?php $__env->startSection('panel'); ?>
    <div class="row gy-4 align-items-start">
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="campaing-img">
                        <img src="<?php echo e(getImage(getFilePath('campaign') . '/' . $campaign->image, getFileSize('campaign'))); ?>">
                    </div>
                    <ul class="list-group list-grou-flush">
                        <li class="list-group-item d-flex    border-b justify-content-between">
                            <span class="text--muted"><?php echo app('translator')->get('Title'); ?></span>
                            <span><?php echo e(__($campaign->title)); ?></span>
                        </li>
                        <li class="list-group-item d-flex   border-b justify-content-between">
                            <span class="text--muted "><?php echo app('translator')->get('Category'); ?></span>
                            <span><?php echo e(__($campaign->category->name)); ?></span>
                        </li>
                        <li class="list-group-item d-flex   border-b justify-content-between">
                            <span class="text--muted "><?php echo app('translator')->get('Deadline'); ?></span>
                            <span><?php echo e(showDateTime($campaign->deadline)); ?></span>
                        </li>
                        <li class="list-group-item d-flex   border-b justify-content-between">
                            <span class="text--muted "><?php echo app('translator')->get('User'); ?></span>
                            <span><?php echo e(__($campaign->user->fullname)); ?></span>
                        </li>
                        <li class="list-group-item d-flex  border-b justify-content-between">
                            <span class="text--muted "><?php echo app('translator')->get('Status'); ?></span>
                            <div class=""><?php echo $campaign->statusBadge; ?></div>
                        </li>
                        <li class="list-group-item d-flex  border-b justify-content-between">
                            <span class="text--muted "><?php echo app('translator')->get('Campaign Featured'); ?></span>
                            <div>
                                <?php if($campaign->featured): ?>
                                    <span class="badge badge--successs"><?php echo app('translator')->get('Yes'); ?></span>
                                    <?php else: ?>
                                    <span class="badge badge--danger"><?php echo app('translator')->get('No'); ?></span>
                                <?php endif; ?>
                            </div>
                        </li>
                    </ul>
                    <div class="mt-3">
                        <?php if($campaign->status==Status::PENDING): ?>
                        <button type="button" class="btn btn-sm btn-outline--success  confirmationBtn"
                        data-action="<?php echo e(route('admin.fundrise.approve.reject', ['status' => Status::CAMPAIGN_APPROVED, 'id' => $campaign->id])); ?>"
                        data-question="<?php echo app('translator')->get('Are you sure to approve this campaign'); ?>?">
                        <i class="la la-check"></i><?php echo app('translator')->get('Approve'); ?>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline--danger confirmationBtn"
                            data-action="<?php echo e(route('admin.fundrise.approve.reject', ['status' => Status::REJECTED, 'id' => $campaign->id])); ?>"
                            data-question="<?php echo app('translator')->get('Are you sure to reject this campaign'); ?>?">
                            <i class="la la-times"></i><?php echo app('translator')->get('Reject'); ?>
                        </button>
                        <?php endif; ?>
                        <?php if($campaign->status ==Status::CAMPAIGN_APPROVED): ?>
                            <?php if(!$campaign->featured): ?>
                                <button type="button" class="btn btn-sm btn-outline--dark confirmationBtn"
                                data-action="<?php echo e(route('admin.fundrise.make.featured',$campaign->id)); ?>"
                                data-question="<?php echo app('translator')->get('Are you sure to fetured this campaign'); ?>?">
                                <i class="las la-arrow-alt-circle-right"></i><?php echo app('translator')->get('Feature It'); ?>
                            </button>
                            <?php else: ?>
                        <button type="button" class="btn btn-sm btn-outline--warning confirmationBtn"
                            data-action="<?php echo e(route('admin.fundrise.make.featured',$campaign->id)); ?>"
                            data-question="<?php echo app('translator')->get('Are you sure to un-fetured this campaign'); ?>?">
                            <i class="las la-arrow-alt-circle-left"></i><?php echo app('translator')->get('Unfeature It'); ?>
                        </button>
                        <?php endif; ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header">
                   <h5> <?php echo app('translator')->get('Donation Details'); ?></h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-grou-flush">
                        <li class="list-group-item d-flex    border-b justify-content-between">
                            <span class="text--muted"><?php echo app('translator')->get('Goal Amount'); ?></span>
                            <span><?php echo e(showAmount($campaign->goal)); ?> <?php echo e(__($general->cur_text)); ?></span>
                        </li>
                        <li class="list-group-item d-flex    border-b justify-content-between">
                            <span class="text--muted"><?php echo app('translator')->get('Already Collected Amont'); ?></span>
                            <span><?php echo e(showAmount($donate)); ?> <?php echo e(__($general->cur_text)); ?></span>
                        </li>
                        <li class="list-group-item d-flex    border-b justify-content-between">
                            <span class="text--muted"><?php echo app('translator')->get('Total Donar'); ?></span>
                            <span><?php echo e($campaign->donation_count); ?></span>
                        </li>
                        <li class="list-group-item d-flex    border-b justify-content-between">
                            <span class="text--muted"><?php echo app('translator')->get('Donation Complte'); ?></span>
                            <span> <?php echo e(getAmount($percent)); ?>%</span>
                        </li>
                        <li class="list-group-item d-flex   border-b justify-content-between">
                            <span class="text--muted "><?php echo app('translator')->get('Donation Progress'); ?></span>
                            <div class="w-50">
                                <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar" style="width: <?php echo e(getAmount($percent)); ?>%"><?php echo e(getAmount($percent)); ?>%</div>
                                  </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="list-group list-grou-flush">
                        <h6 class="mt-3"><?php echo app('translator')->get('Latest Donar'); ?></h6>
                        <?php $__empty_1 = true; $__currentLoopData = $campaign->donation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li class="list-group-item d-flex    border-b justify-content-between">
                            <span class="text--muted"><?php echo e($item->fullname); ?></span>
                            <span> <?php echo e(getAmount($item->donation)); ?> <?php echo e(__($general->cur_text)); ?></span>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <h5 class="text-muted"><?php echo app('translator')->get('No donar yet'); ?></h5>
                        <?php endif; ?>
                        <a href="<?php echo e(route('admin.donation.campaign.wise', $campaign->id)); ?>" class="text--primary"><?php echo app('translator')->get('View all'); ?></a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header">
                   <h5> <?php echo app('translator')->get('Relevent Image'); ?></h5>
                </div>
                <div class="card-body d-flex gap-2 flex-wrap">
                    <?php $__currentLoopData = $campaign->proof_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(explode('.', $images)[1] != 'pdf'): ?>
                    <div class="gallery-card">
                        <a href="<?php echo e(asset(getFilePath('proof') . '/' . $images)); ?>" class="view-btn"
                            data-rel="lightcase:myCollection"><i class="las la-plus"></i></a>
                        <div class="gallery-card__thumb">
                            <img src="<?php echo e(asset(getFilePath('proof') . '/' . $images)); ?>" class="w-100">
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header">
                   <h5> <?php echo app('translator')->get('Relevent Document'); ?></h5>
                </div>
                <div class="card-body">
                    <?php $__currentLoopData = $campaign->proof_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pdfFiles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(explode('.', $pdfFiles)[1] == 'pdf'): ?>
                            <iframe class="iframe" src="<?php echo e(asset(getFilePath('proof') . '/' . $pdfFiles)); ?>" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope picture-in-picture" allowfullscreen></iframe>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                   <h5> <?php echo app('translator')->get('Description'); ?></h5>
                </div>
                <div class="card-body">
                    <?php echo $campaign->description ?>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                   <h5> <?php echo app('translator')->get('Comment'); ?></h5>
                </div>
                <div class="card-body">
                    <?php if($campaign->comments->count()): ?>
                        <div class="table-responsive--md table-responsive">
                            <table class=" table align-items-center table--light">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('Fullname'); ?> | <?php echo app('translator')->get('Email'); ?></th>
                                        <th><?php echo app('translator')->get('Comment'); ?></th>
                                        <th><?php echo app('translator')->get('Created At'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $campaign->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <span class="fw-bold"><?php echo e(__($comment->fullname)); ?></span>
                                                <span class="d-block"><?php echo e($comment->email); ?></span>
                                            </td>
                                            <td><?php echo e(strLimit($comment->comment, 30)); ?></td>
                                            <td>
                                                <?php echo e(showDateTime($comment->created_at)); ?>

                                                <span class="d-block"><?php echo e(diffForHumans($comment->created_at)); ?></span>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php if($campaign->comments->count() > 1): ?>
                                <div class="d-flex justify-content-end">
                                    <a href="<?php echo e(route('admin.fundrise.comments')); ?>?campaign_id=<?php echo e($campaign->id); ?>"
                                        class="btn btn--primary me-md-2" type="button"><i
                                            class="las la-comment-dots"></i> <?php echo app('translator')->get('See All'); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-center border-1"> <?php echo app('translator')->get('No comment yet'); ?></p>
                    <?php endif; ?>
                </div>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.back','data' => ['route' => ''.e(route('admin.fundrise.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => ''.e(route('admin.fundrise.index')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/vendor/lightcase.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/vendor/animate.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/admin/js/vendor/lightcase.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        'use strict';

        $('a[data-rel^=lightcase]').lightcase();



        $('.approve').click(function() {
            $('#approveModal').attr('action', $(this).data('action'));
            $('#approveModal').modal('show');
        });

        $('.reject').click(function() {
            $('#rejectModal').attr('action', $(this).data('action'));
            $('#rejectModal').modal('show');
        });

    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
<style>
    .campaing-img {
        text-align: center;
    }
    .campaing-img img {
        width: 100px;
        height: 100px;
        border-radius: 500%;
        object-fit: cover;
    }
    .iframe {
        width: 100%;
        max-height: 350px;
    }
    .list-group-item{
        border:0;
    }
    .border-b{
        border-bottom: 1px solid rgba(0,0,0,.125);
    }

    .gallery-card{
        max-width: 180px;
        margin-bottom: 10px;
        border: 3px solid #ddd;
        border-radius: 5px;
    }
    .gallery-card__thumb img {
        object-fit: cover;
        object-position: center;
    }
    iframe.iframe {
    min-height: 300px;
}


</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\donations\core\resources\views/admin/campaign/details.blade.php ENDPATH**/ ?>