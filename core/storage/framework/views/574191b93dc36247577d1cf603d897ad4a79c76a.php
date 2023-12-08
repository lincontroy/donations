<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('Name'); ?></th>
                                    <th><?php echo app('translator')->get('Status'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <div class="user thumb">
                                                <div class="thumb w-100">
                                                    <img src="<?php echo e(getImage(getFilePath('category').'/'. $category->image,getFileSize('category'))); ?>">
                                                    <span> <?php echo e($category->name); ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td> <?php echo $category->statusBadge ?> </td>
                                        <td>
                                            <div class="button--group">
                                            <?php $category->image_with_path = getImage(getFilePath('category').'/'.$category->image ,getFileSize('category')); ?>
                                            <button type="button" class="btn btn-sm btn-outline--primary editBtn cuModalBtn" data-resource="<?php echo e($category); ?>"    data-modal_title="<?php echo app('translator')->get('Edit Category'); ?>" data-has_status="1">
                                                <i class="la la-pencil"></i><?php echo app('translator')->get('Edit'); ?>
                                            </button>
                                            <?php if($category->status == Status::DISABLE): ?>
                                                <button type="button"
                                                        class="btn btn-sm btn-outline--success ms-1 confirmationBtn"
                                                        data-action="<?php echo e(route('admin.category.status', $category->id)); ?>"
                                                        data-question="<?php echo app('translator')->get('Are you sure to enable this category'); ?>?">
                                                    <i class="la la-eye"></i> <?php echo app('translator')->get('Enabled'); ?>
                                                </button>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-sm btn-outline--danger confirmationBtn"
                                                data-action="<?php echo e(route('admin.category.status', $category->id)); ?>"
                                                data-question="<?php echo app('translator')->get('Are you sure to disable this category'); ?>?">
                                                        <i class="la la-eye-slash"></i> <?php echo app('translator')->get('Disabled'); ?>
                                                </button>
                                            <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if($categories->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo paginateLinks($categories) ?>
                    </div>
                <?php endif; ?>
            </div><!-- card end -->
        </div>
    </div>

    <!--Cu Modal -->
    <div id="cuModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="<?php echo e(route('admin.category.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label><?php echo app('translator')->get('Name'); ?></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label><?php echo app('translator')->get('Image'); ?></label>
                            <div class="image-upload">
                                <div class="thumb">
                                    <div class="avatar-preview">
                                        <div class="profilePicPreview" style="background-image: url(<?php echo e(getImage(getFilePath('category'),getFileSize('category'))); ?>)">
                                            <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                    <div class="avatar-edit">
                                        <input type="file" class="profilePicUpload d-none" name="image" id="profilePicUpload1" accept=".png, .jpg, .jpeg" required>
                                        <label for="profilePicUpload1" class="bg--success mt-2"><?php echo app('translator')->get('Upload Image'); ?></label>
                                        <small class="mt-1"><?php echo app('translator')->get('Supported files'); ?>: <b><?php echo app('translator')->get('png'); ?>,<?php echo app('translator')->get('jpg'); ?>,<?php echo app('translator')->get('jpeg'); ?>.</b> <?php echo app('translator')->get('Image will be resized into'); ?> <?php echo e(getFileSize('category')); ?> </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn--primary h-45 w-100"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
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

<button type="button" class="btn btn-sm btn-outline--primary cuModalBtn" data-image_path="<?php echo e(getImage(getFilePath('category'),getFileSize('category'))); ?>" data-modal_title="<?php echo app('translator')->get('Add New Category'); ?>">
    <i class="las la-plus"></i><?php echo app('translator')->get('Add New'); ?>
</button>
<?php $__env->stopPush(); ?>




<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\donations\core\resources\views/admin/category/index.blade.php ENDPATH**/ ?>