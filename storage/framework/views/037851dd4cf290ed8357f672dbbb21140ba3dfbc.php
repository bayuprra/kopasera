

<?php $__env->startSection('content'); ?>
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Login v1 -->
                        <div class="card mb-0 test">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="brand-logo">
                                    <img class="imagelogo" src="<?php echo e(url('img/background/logo.svg')); ?>">
                                </a>

                                <?php if(session()->has('success')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Berhasil</strong> <?php echo e(session('success')); ?>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <?php if(session()->has('error')): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Gagal</strong> <?php echo e(session('error')); ?>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>

                                <form class="auth-login-form mt-4" action="/login" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="login-username" class="form-label">
                                            <h2 class="brand-text text-primary ml-auto">SIGN IN</h2>
                                        </label>
                                        <input type="text" class="line form-control" id="login-username" name="username"
                                            placeholder="Username ID" aria-describedby="login-username" tabindex="1"
                                            autofocus required autocomplete="username" />

                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">

                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="line form-control form-control-merge"
                                                id="login-password" required autocomplete="current-password" name="password"
                                                tabindex="2" placeholder="Password" aria-describedby="login-password" />
                                            <div class="input-group-append">
                                                <span class="eye input-group-text cursor-pointer logo"><i
                                                        data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                    </div>

                            </div>

                            <button class="btn btn-primary btn-block mb-2" tabindex="4" type="submit">Sign
                                in</button>
                            </form>
                        </div>
                    </div>
                    <!-- /Login v1 -->
                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- END: Content-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\app\kopasera\resources\views/layout/login2.blade.php ENDPATH**/ ?>