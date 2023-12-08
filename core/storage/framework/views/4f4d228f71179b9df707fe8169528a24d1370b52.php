    <?php
        $content   = getContent('cta.content',true);
    ?>
    

    <?php $__env->startSection('content'); ?>
        <!-- volunteer section start -->
        <section class="pt-150 pb-150">
            <div class="container-fluid custom-container">
                <div class="filter_in_btn d-xl-none mb-4 d-flex justify-content-end">
                    <a href="javascript:void(0)"><i class="las la-filter"></i></a>
                </div>
                <div class="row gy-4 ">
                    <div class="col-xl-3">
                        <aside class="category-sidebar">
                            <div class="widget d-xl-none filter-top">
                                <div class="d-flex justify-content-between">
                                    <h5 class="title border-0 pb-0 mb-0"><?php echo app('translator')->get('Filter'); ?></h5>
                                    <div class="close-sidebar"><i class="las la-times"></i></div>
                                </div>
                            </div>
                            <div class="widget p-0">
                                <div class="widget-title">
                                    <h5><?php echo app('translator')->get('Search By Volunteer Name'); ?></h5>
                                </div>
                                <div class="widget-body">
                                    <div>
                                        <label for="search"><?php echo app('translator')->get('Volunteer Name'); ?> :</label>
                                        <div class="input-group">
                                            <input type="search" name="search" id="search" class="form-control">
                                            <button type="button" class="input-group-text" id="name-search">
                                                <i class="la la-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget p-0">
                                <div class="widget-title">
                                    <h5><?php echo app('translator')->get('Filter By Country'); ?></h5>
                                </div>
                                <div class="widget-body">
                                    <div class="filter-color-area d-flex flex-wrap">
                                        <div class="row w-100">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo app('translator')->get('Country Name'); ?></label>
                                                    <select name="country_code" class="form-control w-100">
                                                        <option value="" selected disabled><?php echo app('translator')->get('Select one'); ?></option>
                                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($key); ?>">
                                                                <?php echo e(__($country->country)); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget p-0">
                                <div class="widget-body">
                                    <div class="filter-color-area d-flex flex-wrap">
                                        <div class="row w-100">
                                            <div class="col-md-12">
                                                <a href="<?php echo e(route('volunteer.form')); ?>" class="cmn-btn w-100 text-center"><?php echo e(__($content->data_values->button_title)); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>

                    <div class="col-xl-9">
                        <?php echo $__env->make($activeTemplate . 'partials.volunteer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- volunteer section end -->
    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('script'); ?>
        <script>
            'use strict'

            let data = {};
            data.search = null;
            data.country_code = null;

            //Search by name
            $('#name-search').on('click', function() {
                data.search = $("input[name='search']").val();
                filterVolunteer();
            })
            $("select[name='country_code']").on('change', function() {
                data.country_code = $(this).find(":selected").val();
                filterVolunteer();
            })

            function filterVolunteer() {
                $.ajax({
                    url: "<?php echo e(route('volunteer.filter')); ?>",
                    method: 'GET',
                    data: data,
                    success: function(response) {
                        if(response.success){
                            $('.main-view').html(response.html)
                        }
                    },
                });
            }

        </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\donations\core\resources\views/templates/basic/volunteer/index.blade.php ENDPATH**/ ?>