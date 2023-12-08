<?php $__env->startSection('content'); ?>
    <?php
        $policyPages = getContent('policy_pages.element', false, null, true);
        $register = getContent('register.content', true);
    ?>
    <section class="pt-90 pb-120">
        <div class="container">
            <div class="row g-0 justify-content-center">
                <div class="col-md-6 pr-0 pl-0">
                    <div class="content-area bg_img"
                        data-background="<?php echo e(getImage('assets/images/frontend/register/' . @$register->data_values->image, '1024x720')); ?>">
                    </div>
                </div>

                <div class="col-lg-6 p-sm-0">
                    <div class="p-sm-5 p-4 custom--shadow">
                        <form action="<?php echo e(route('user.register')); ?>" method="POST" class="verify-gcaptcha action-form">
                            <?php echo csrf_field(); ?>
                            <div class="login-area text-center pb-2">
                                <h2 class="title"><?php echo e(__(@$register->data_values->heading)); ?></h2>
                                <p><?php echo e(__(@$register->data_values->subheading)); ?></p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Username'); ?></label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-text"><i class="las la-user"></i></div>
                                            <input type="text" class="form-control checkUser" name="username"
                                                value="<?php echo e(old('username')); ?>" required>
                                        </div>
                                        <small class="text-danger usernameExist"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('E-Mail'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="las la-envelope"></i></div>
                                            <input type="email" class="form-control checkUser" name="email"
                                                value="<?php echo e(old('email')); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Country'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="las la-globe"></i></div>
                                            <select name="country" class="form-control" required>
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option data-mobile_code="<?php echo e($country->dial_code); ?>" value="<?php echo e($country->country); ?>" data-code="<?php echo e($key); ?>">
                                                        <?php echo e(__($country->country)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Mobile'); ?></label>
                                        <div class="input-group ">
                                            <span class="input-group-text mobile-code">

                                            </span>
                                            <input type="hidden" name="mobile_code">
                                            <input type="hidden" name="country_code">
                                            <input type="number" name="mobile" value="<?php echo e(old('mobile')); ?>"
                                                class="form-control checkUser" required>
                                        </div>
                                        <small class="text-danger mobileExist"></small>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group ">
                                    <label class="form-label"><?php echo app('translator')->get('Password'); ?></label>
                                        <div class="input-group overflow-visible">
                                            <span class="input-group-text"><i class="las la-key"></i></span>
                                            <input type="password" class="form-control" name="password" required>
                                            <?php if($general->secure_password): ?>
                                                <div class="input-popup">
                                                    <p class="error lower"><?php echo app('translator')->get('1 small letter minimum'); ?></p>
                                                    <p class="error capital"><?php echo app('translator')->get('1 capital letter minimum'); ?></p>
                                                    <p class="error number"><?php echo app('translator')->get('1 number minimum'); ?></p>
                                                    <p class="error special"><?php echo app('translator')->get('1 special character minimum'); ?></p>
                                                    <p class="error minimum"><?php echo app('translator')->get('6 character password'); ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Confirm Password'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="las la-key"></i></div>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <?php if (isset($component)) { $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243 = $component; } ?>
<?php $component = App\View\Components\Captcha::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('captcha'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Captcha::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243)): ?>
<?php $component = $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243; ?>
<?php unset($__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243); ?>
<?php endif; ?>

                            </div>
                            <?php if($general->agree): ?>
                            <div class="d-flex align-items-center justify-content-start flex-wrap text-start">
                                <div class="form-group">
                                    <input type="checkbox" name="agree" id="agree" <?php if(old('agree')): echo 'checked'; endif; ?>
                                    required>
                                <label for="agree"><?php echo app('translator')->get('I agree with'); ?> </label>
                                    <?php $__currentLoopData = $policyPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a
                                        href="<?php echo e(route('policy.pages', [slug($policy->data_values->title), $policy->id])); ?>"><?php echo e(__($policy->data_values->title)); ?></a>
                                    <?php if(!$loop->last): ?>
                                        ,
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <?php endif; ?>
                            <div class="form-group text-center">
                                <button type="submit" class="btn cmn-btn w-100 shadow-none"><?php echo app('translator')->get('Register'); ?></button>
                            </div>
                            <p class="text-center"><?php echo app('translator')->get('Already have an account'); ?>?<a
                                    href="<?php echo e(route('user.login')); ?>">&nbsp; <?php echo app('translator')->get('Login'); ?></a> </p>
                        </form>
                        <?php
                            $credentials = $general->socialite_credentials;
                        ?>
                        <?php if(
                            $credentials->google->status == Status::ENABLE ||
                                $credentials->facebook->status == Status::ENABLE ||
                                $credentials->linkedin->status == Status::ENABLE): ?>

                        <div class="registration-socails__content text-center">
                            <p class="registration-socails__desc mb-0 mt-0"> <?php echo app('translator')->get('Or Login with'); ?> </p>
                        </div>

                            <div class="d-flex flex-wrap gap-3">
                                <?php if($credentials->facebook->status == Status::ENABLE): ?>
                                    <a href="<?php echo e(route('user.social.login', 'facebook')); ?>"
                                        class="btn btn-outline-facebook btn-sm flex-grow-1">
                                        <span class="me-1"><i class="fab fa-facebook-f"></i></span> <?php echo app('translator')->get('Facebook'); ?>
                                    </a>
                                <?php endif; ?>
                                <?php if($credentials->google->status == Status::ENABLE): ?>
                                    <a href="<?php echo e(route('user.social.login', 'google')); ?>"
                                        class="btn btn-outline-google btn-sm flex-grow-1">
                                        <span class="me-1"><i class="lab la-google-plus-g"></i></span> <?php echo app('translator')->get('Google'); ?>
                                    </a>
                                <?php endif; ?>
                                <?php if($credentials->linkedin->status == Status::ENABLE): ?>
                                    <a href="<?php echo e(route('user.social.login', 'linkedin')); ?>"
                                        class="btn btn-outline-linkedin btn-sm flex-grow-1">
                                        <span class="me-1"><i class="lab la-linkedin-in"></i></span> <?php echo app('translator')->get('Linkedin'); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="existModalCenter" tabindex="-1" role="dialog" aria-labelledby="existModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="existModalLongTitle"><?php echo app('translator')->get('You are with us'); ?></h5>
                        <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="las la-times"></i>
                        </span>
                    </div>
                    <div class="modal-body">
                        <h6 class="text-center pb-3"><?php echo app('translator')->get('You already have an account please Login'); ?>.</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm btn-lg"
                            data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <a href="<?php echo e(route('user.login')); ?>" class="btn cmn-btn btn-sm"><?php echo app('translator')->get('Login'); ?></a>
                    </div>
                </div>
            </div>
        </div>

    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
    <style>
        .country-code select:focus {
            border: none;
            outline: none;
        }

        .content-area {
            z-index: -1;
            height: 100%;
        }

        .btn-outline-linkedin {
            border-color: #0077B5;
            background-color: transparent;
            color: #0077B5;
        }

        .btn-outline-linkedin:hover {
            border-color: #0077B5;
            color: #fff !important;
            background-color: #0077B5;
        }

        .btn-outline-facebook {
            border-color: #395498;
            background-color: transparent;
            color: #395498;
        }

        .btn-outline-facebook:hover {
            border-color: #395498;
            color: #fff !important;
            background-color: #395498;
        }

        .btn-outline-google {
            border-color: #D64937;
            background-color: transparent;
            color: #D64937;
        }

        .btn-outline-google:hover {
            border-color: #D64937;
            color: #fff !important;
            background-color: #D64937;
        }

    </style>
<?php $__env->stopPush(); ?>
<?php if($general->secure_password): ?>
    <?php $__env->startPush('script-lib'); ?>
        <script src="<?php echo e(asset('assets/global/js/secure_password.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php $__env->startPush('script'); ?>
    <script>
        "use strict";
        (function($) {

            <?php if($mobileCode): ?>
                $(`option[data-code=<?php echo e($mobileCode); ?>]`).attr('selected', '');
            <?php endif; ?>

            $('select[name=country]').change(function() {
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));

            $('.checkUser').on('focusout', function(e) {
                var url = '<?php echo e(route('user.checkUser')); ?>';
                var value = $(this).val();
                var token = '<?php echo e(csrf_token()); ?>';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {
                        mobile: mobile,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'email') {
                    var data = {
                        email: value,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'username') {
                    var data = {
                        username: value,
                        _token: token
                    }
                }
                $.post(url, data, function(response) {
                    if (response.data != false && response.type == 'email') {
                        $('#existModalCenter').modal('show');
                    } else if (response.data != false) {
                        $(`.${response.type}Exist`).text(`${response.type} already exist`);
                    } else {
                        $(`.${response.type}Exist`).text('');
                    }
                });

                $("#agree").closest("label").removeClass('required');
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\donations\core\resources\views/templates/basic/user/auth/register.blade.php ENDPATH**/ ?>