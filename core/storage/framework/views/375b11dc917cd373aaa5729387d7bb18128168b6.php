<?php $__env->startSection('content'); ?>
    <section class="pt-150 pb-150">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4">
                            <div class="sidebar">
                                <div class="widget search--widget">
                                    <form class="search-form" method="GET" action="<?php echo e(route('success.story.archive')); ?>">
                                        <input type="text" name="search" id="search__field"
                                            value="<?php echo e(request()->search); ?>" placeholder="<?php echo app('translator')->get('Search by title'); ?>..."
                                            class="form-control">
                                        <button type="submit" class="search-btn"><i class="las la-search"></i></button>
                                    </form>
                                </div><!-- widget end -->
                                <div class="widget">
                                    <div class="widget-title">
                                        <h5 class=""><?php echo app('translator')->get('Categories'); ?></h5>
                                    </div>
                                    <ul class="categories__list mt-2">
                                        <li class="categories__item">
                                            <a href="<?php echo e(route('success.story.archive')); ?>"><?php echo app('translator')->get('All'); ?></a>
                                        </li>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="categories__item <?php if($category->name == request()->category_id): ?> active <?php endif; ?>">
                                                <a href="<?php echo e(route('success.story.archive', ['slug' => $category->slug])); ?>"
                                                    <?php if($category->slug == request()->slug): ?> class="active" <?php endif; ?>><?php echo e(__($category->name)); ?></a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div><!-- widget end -->
                                <div class="widget">
                                    <div class="widget-title">
                                        <h5 class=""><?php echo app('translator')->get('Archive'); ?></h5>
                                    </div>
                                    <ul class="archive__list mt-2">
                                        <?php $__currentLoopData = $archives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $archive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="archive__item"><a
                                                    <?php if($archive->yonth == request()->month && $archive->year == request()->year): ?> class="active" <?php endif; ?>
                                                    href="<?php echo e(route('success.story.archive', ['month' => $archive->month, 'year' => $archive->year])); ?>">
                                                    <?php echo e(__($archive->month)); ?> <?php echo e(__($archive->year)); ?></a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div><!-- widget end -->

                            </div><!-- sidebar end -->
                        </div>
                        <div class="col-xl-9 col-lg-8">
                            <div class="row gy-4 justify-content-center">
                                <?php $__empty_1 = true; $__currentLoopData = $stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                        <?php echo $__env->make($activeTemplate . 'partials.story', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="col-md-12 mb-30">
                                        <div class="empty-story">
                                            <h1><?php echo e(__($emptyMessage)); ?></h1>
                                            <p><?php echo app('translator')->get('Sorry, we couldn\'t find the data you were looking for'); ?>.</p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div><!-- row end -->

                            <?php if($stories->hasPages()): ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-footer py-4">
                                            <?php echo paginateLinks($stories) ?>
                                        </div>
                                    </div>
                                </div><!-- row end -->
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .empty-story {
            width: 80%;
            margin: auto;
            text-align: center;
        }

        .empty-story h1 {
            font-size: 36px;
            color: #333;
        }

        .empty-story p {
            font-size: 24px;
            color: #666;
            margin-top: 20px;
        }

        .sidebar .widget+.widget {
            margin-top: unset !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\donations\core\resources\views/templates/basic/success_story/index.blade.php ENDPATH**/ ?>