<?php $__env->startSection('content'); ?>
    <section class="pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="event-details-wrapper">
                        <div class="event-details-thumb">
                            <img src="<?php echo e(getImage(getFilePath('campaign') . '/' . $campaign->image, getFileSize('campaign'))); ?>"
                                alt="<?php echo app('translator')->get('image'); ?>">
                        </div>
                    </div>
                    <div class="event-details-area mt-50">
                        <ul class="nav nav-tabs nav-tabs--style" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description"
                                    role="tab" aria-controls="description" aria-selected="true"><?php echo app('translator')->get('Description'); ?></a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="gallery-tab" data-bs-toggle="tab" href="#gallery" role="tab"
                                    aria-controls="gallery" aria-selected="false"><?php echo app('translator')->get('Proof Image'); ?></a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="video-tab" data-bs-toggle="tab" href="#pdf" role="tab"
                                    aria-controls="pdf" aria-selected="false"><?php echo app('translator')->get('Proof Document'); ?></a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="review-tab" data-bs-toggle="tab" href="#review" role="tab"
                                    aria-controls="review" aria-selected="false"><?php echo app('translator')->get('Comment'); ?></a>
                            </li>
                        </ul>
                        <div class="tab-content mt-4" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <p class="text-justify"> <?php echo $campaign->description ?></p>
                            </div><!-- tab-pane end -->
                            <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                                <div class="row gy-4">
                                    <?php $__currentLoopData = $campaign->proof_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(explode('.', $images)[1] != 'pdf'): ?>
                                            <div class="col-lg-4 col-sm-6 mb-30">
                                                <div class="gallery-card">
                                                    <a href="<?php echo e(asset(getFilePath('proof') . '/' . $images)); ?>"
                                                        class="view-btn" data-rel="lightcase:myCollection"><i
                                                            class="las la-plus"></i></a>
                                                    <div class="gallery-card__thumb">
                                                        <img src="<?php echo e(asset(getFilePath('proof') . '/' . $images)); ?>"
                                                            alt="<?php echo app('translator')->get('image'); ?>">
                                                    </div>
                                                </div><!-- gallery-card end -->
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div><!-- tab-pane end -->
                            <div class="tab-pane fade" id="pdf" role="tabpanel" aria-labelledby="pdf-tab">
                                <?php $__currentLoopData = $campaign->proof_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pdfFiles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(explode('.', $pdfFiles)[1] == 'pdf'): ?>
                                        <iframe class="iframe" src="<?php echo e(asset(getFilePath('proof') . '/' . $pdfFiles)); ?>" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div><!-- tab-pane end -->
                            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                <ul class="review-list mb-50">
                                    <?php $__empty_1 = true; $__currentLoopData = $campaign->comments->where('status',Status::PUBLISHED); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <li class="single-review">
                                            <div class="thumb"><i class="fa fa-user comment-user"></i></div>
                                            <div class="content">
                                                <h6 class="name mb-1"><?php echo e(__($comment->fullname)); ?></h6>
                                                <span class="date"><?php echo e(diffforhumans($comment->created_at)); ?></span>
                                                <p class="mt-2 text-justify"><?php echo e(__($comment->comment)); ?></p>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <p class="text-center border py-3"><?php echo app('translator')->get('No review yet!'); ?></p>
                                    <?php endif; ?>
                                </ul>
                            </div><!-- tab-pane end -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-lg-0">
                    <div class="donation-sidebar custom--shadow">
                        <div class="donation-widget">
                            <h3><?php echo e(strLimit($campaign->title, 20)); ?></h3>
                            <p> <?php  echo strLimit(strip_tags($campaign->description), 120); ?> </p>
                            <hr>
                            <div class="row mt-2 justify-content-between">
                                <div class="col-sm-6 text-center">
                                    <b><?php echo e($general->cur_sym); ?><?php echo e(showAmount($campaign->donation->where('status', Status::DONATION_PAID)->sum('donation'))); ?></b>
                                    <br> <?php echo app('translator')->get('Donated'); ?>
                                </div>
                                <div class="col-sm-6 text-center">
                                    <?php echo app('translator')->get('Goal Amount'); ?> <br> <b><?php echo e($general->cur_sym); ?><?php echo e(showAmount($campaign->goal)); ?></b>
                                </div>
                            </div>
                            <div class="row mt-50 mb-none-30">
                                <div class="col-6 donate-item text-center mb-30">
                                    <h4 class="amount"><?php echo e($campaign->donation->where('status', Status::DONATION_PAID)->count()); ?>

                                    </h4>
                                    <p><?php echo app('translator')->get('Donors'); ?></p>
                                </div>
                                <div class="col-6 donate-item text-center mb-30">
                                    <h4 class="amount">
                                        <?php echo e($general->cur_sym); ?><?php echo e(showAmount($campaign->donation->where('status', Status::DONATION_PAID)->sum('donation'))); ?>

                                    </h4>
                                    <p><?php echo app('translator')->get('Donated'); ?></p>
                                </div>
                            </div>
                        </div><!-- donation-widget end -->

                        <div class="donation-widget">
                            <h3><?php echo app('translator')->get('Event Share'); ?></h3>
                            <div class="link-copy copy mt-3">
                                    <input type="text" id="urlCopyId"
                                        value="<?php echo e(route('campaign.details', ['slug' => $campaign->slug, 'id' => $campaign->id])); ?>"
                                        class="form-control">
                                    <button type="button" class="copyText"><?php echo app('translator')->get('Copy'); ?></button>
                            </div>
                            <ul class="social-links mt-4">
                                <li class="facebook"><a target="_blank"
                                        href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li class="twitter"><a target="_blank"
                                        href="https://twitter.com/intent/tweet?text=Post and Share &amp;url=<?php echo e(urlencode(url()->current())); ?>"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li class="linkedin"><a target="_blank"
                                        href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo e(urlencode(url()->current())); ?>"><i
                                            class="fab fa-linkedin-in"></i></a></li>
                                <li class="whatsapp"> <a
                                        href="https://api.whatsapp.com/send?text=<?php echo e(urlencode(url()->current())); ?>"><i
                                            class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div><!-- donation-widget end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- event details section end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .iframe {
            width: 100%;
            height: 800px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        'use strict';
        //copy-url
        $('.copyText').on('click', function() {
            var copyText = document.getElementById("urlCopyId");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            notify('success', 'URL copied successfully');
        })
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\donations\core\resources\views/templates/basic/user/campaign/details.blade.php ENDPATH**/ ?>