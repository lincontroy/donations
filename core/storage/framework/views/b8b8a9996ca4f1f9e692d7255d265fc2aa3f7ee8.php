<?php
    $kycInstruction = getContent('kyc_instruction.content', true);
?>

<?php $__env->startSection('content'); ?>
    <!-- dashboard section start -->
    <section class="pt-120 pb-120">
        <div class="container">
            <div class="row gy-4">
                <?php if($user->kv == 0): ?>
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading"><?php echo app('translator')->get('KYC Verification required'); ?></h4>
                        <hr>
                        <p class="mb-0"><?php echo e(__($kycInstruction->data_values->verification_instruction)); ?> <a
                                class="text--base" href="<?php echo e(route('user.kyc.form')); ?>"><?php echo app('translator')->get('Click Here to Verify'); ?></a></p>
                    </div>
                <?php elseif($user->kv == 2): ?>
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading"><?php echo app('translator')->get('KYC Verification pending'); ?></h4>
                        <hr>
                        <p class="mb-0"><?php echo e(__($kycInstruction->data_values->pending_instruction)); ?> <a class="text--base"
                                href="<?php echo e(route('user.kyc.data')); ?>"><?php echo app('translator')->get('See KYC Data'); ?></a></p>
                    </div>
                <?php endif; ?>

                <?php if($campaign['expired'] > 0): ?>
                    <div class="offset-lg-8 col-lg-4 col-md-12">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <a class="text-danger" href="<?php echo e(route('user.campaign.fundrise.expired')); ?>" class="text-primary">
                                <?php echo app('translator')->get('Campaign Expired'); ?> (<strong><?php echo e($campaign['expired']); ?></strong>)
                            </a>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="col-lg-3 col-sm-6 mb-30">
                    <div class="d-widget bg-one">
                        <div class="d-widget__icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div class="d-widget__content">
                            <h2 class="d-widget__number text-white"><?php echo e($campaign['allCampaign']); ?></h2>
                            <span class="text-white"><?php echo app('translator')->get('Total Campaign'); ?></span>
                        </div>
                        <a href="<?php echo e(route('user.campaign.fundrise.all')); ?>" class="view-btn"><?php echo app('translator')->get('View all'); ?></a>

                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-30">
                    <div class="d-widget bg-four">
                        <div class="d-widget__icon">
                            <i class="fas fa-spinner"></i>
                        </div>
                        <div class="d-widget__content">
                            <h2 class="d-widget__number text-white"><?php echo e($campaign['pending']); ?></h2>
                            <span class="text-white"><?php echo app('translator')->get('Pending Campaign'); ?></span>
                        </div>
                        <a href="<?php echo e(route('user.campaign.fundrise.pending')); ?>" class="view-btn"><?php echo app('translator')->get('View all'); ?></a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 mb-30">
                    <div class="d-widget bg-five">
                        <div class="d-widget__icon">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <div class="d-widget__content">
                            <h2 class="d-widget__number text-white"><?php echo e($campaign['completed']); ?></h2>
                            <span class="text-white"><?php echo app('translator')->get('Campaign Completed'); ?></span>
                        </div>
                        <a href="<?php echo e(route('user.campaign.fundrise.complete')); ?>" class="view-btn"><?php echo app('translator')->get('View all'); ?></a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 mb-30">
                    <div class="d-widget bg-danger">
                        <div class="d-widget__icon">
                            <i class="fa fa-times"></i>
                        </div>
                        <div class="d-widget__content">
                            <h2 class="d-widget__number text-white"><?php echo e($campaign['rejectLog']); ?></h2>
                            <span class="text-white"><?php echo app('translator')->get('Campaign Rejected'); ?></span>
                        </div>
                        <a href="<?php echo e(route('user.campaign.fundrise.rejected')); ?>" class="view-btn"><?php echo app('translator')->get('View all'); ?></a>
                    </div><!-- d-widget end -->
                </div>

                <div class="col-lg-3 col-sm-6 mb-30">
                    <div class="d-widget bg-two">
                        <div class="d-widget__icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <div class="d-widget__content">
                            <h2 class="d-widget__number text-white">
                                <?php echo e($general->cur_sym); ?><?php echo e(showAmount($campaign['received_donation'])); ?></h2>
                            <span class="text-white"><?php echo app('translator')->get('Total Received Donation'); ?></span>
                        </div>
                        <a href="<?php echo e(route('user.campaign.donation.received')); ?>" class="view-btn"><?php echo app('translator')->get('View all'); ?></a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 mb-30">
                    <div class="d-widget bg-three">
                        <div class="d-widget__icon">
                            <i class="fas fa-donate"></i>
                        </div>
                        <div class="d-widget__content">
                            <h2 class="d-widget__number text-white"><?php echo e($general->cur_sym); ?><?php echo e(showAmount($campaign['my_donation'])); ?></h2>
                            <span class="text-white"><?php echo app('translator')->get('My Donation'); ?></span>
                        </div>
                        <a href="<?php echo e(route('user.campaign.donation.my')); ?>" class="view-btn"><?php echo app('translator')->get('View all'); ?></a>
                    </div>
                </div>




                <div class="col-lg-3 col-sm-6 mb-30">
                    <div class="d-widget bg-seven">
                        <div class="d-widget__icon">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class="d-widget__content">
                            <h2 class="d-widget__number text-white">
                                <?php echo e($general->cur_sym); ?><?php echo e(showAmount($campaign['withdraw'])); ?></h2>
                            <span class="text-white"><?php echo app('translator')->get('Total Withdraw'); ?></span>
                        </div>
                        <a href="<?php echo e(route('user.withdraw.history')); ?>" class="view-btn"><?php echo app('translator')->get('View all'); ?></a>
                    </div><!-- d-widget end -->
                </div>

                <div class="col-lg-3 col-sm-6 mb-30">
                    <div class="d-widget bg-primary">
                        <div class="d-widget__icon">
                            <i class="las la-dollar-sign"></i>
                        </div>
                        <div class="d-widget__content">
                            <h2 class="d-widget__number text-white">
                                <?php echo e($general->cur_sym); ?><?php echo e(showAmount($campaign['currentBalance'])); ?></h2>
                            <span class="text-white"><?php echo app('translator')->get('Current Balance'); ?></span>
                        </div>

                    </div><!-- d-widget end -->
                </div>

                <div class="col-md-6 mb-30">
                    <div class="card custom--shadow">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo app('translator')->get('Monthly Donation Report'); ?></h5>
                            <div id="apex-line"> </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-30">
                    <div class="card custom--shadow">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo app('translator')->get('Monthly Withdraw Report'); ?></h5>
                            <div id="apex-line-withdraw"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- dashboard section end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/apexchart.js')); ?>" charset="utf-8"></script>
    <script>
        'use strict';

        //apex-line chart:  Donation
        var options = {
            series: [{
                data: <?php echo json_encode($donations['perDayAmount'], 15, 512) ?>
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '15%',
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: <?php echo json_encode($donations['perDay'], 15, 512) ?>
            }
        };

        //apex-line chart: Withdraw
        var withdraw = {
            series: [{
                data: <?php echo json_encode($withdraws['perDayAmount'], 15, 512) ?>
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '10%',
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: <?php echo json_encode($withdraws['perDay'], 15, 512) ?>
            }
        };

        var chart = new ApexCharts(document.querySelector("#apex-line"), options);
        var chart2 = new ApexCharts(document.querySelector("#apex-line-withdraw"), withdraw);

        chart.render();
        chart2.render();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\donations\core\resources\views/templates/basic/user/dashboard.blade.php ENDPATH**/ ?>