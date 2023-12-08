<?php
    $content = getContent('faq.content', true);
    $faqElements = getContent('faq.element', false, null, true);
?>
<section class="pt-120 pb-120" data-background="<?php echo e(getImage($activeTemplateTrue . 'images/faq.jpg')); ?>">
    <div class="container">
        <div class="row gy-sm-5 gy-4">
            <?php $__currentLoopData = $faqElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($loop->odd): ?>
                    <div class="col-md-6">
                        <div class="faq-item">
                            <div class="faq-item__icon"><i class="fas fa-question"></i></div>
                            <div class="faq-item__content">
                                <h5 class="faq-item__title">I<?php echo e(__(@$item->data_values->question)); ?></h5>
                                <p class="faq-item__desc"><?php echo e(__(@$item->data_values->answer)); ?></p>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-md-6">
                        <div class="faq-item">
                            <div class="faq-item__icon"><i class="fas fa-question"></i></div>
                            <div class="faq-item__content">
                                <h5 class="faq-item__title">I<?php echo e(__(@$item->data_values->question)); ?></h5>
                                <p class="faq-item__desc"><?php echo e(__(@$item->data_values->answer)); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\donations\core\resources\views/templates/basic/sections/faq.blade.php ENDPATH**/ ?>