<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout-app','data' => ['title' => 'Edit Foto - PPDB']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout-app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Edit Foto - PPDB']); ?>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <h1 class="app-page-title">My Account</h1>
            <div class="row gy-4">
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                            
                                <div class="col-auto">
                                    <h4 class="app-card-title">Profile</h4>
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label mb-2"><strong>Photo</strong></div>
                                        <div class="item-data">
                                            <?php if(is_null(Auth::user()->image_profile)): ?>
                                            <img src ="<?php echo e(asset('assets/img/profile.png')); ?>" alt=""
                                            width = "100">
                                              <?php else: ?>
                                              <img src="<?php echo e(asset('assets/img/'.Auth::user()->image_profile)); ?>" alt=""
                                              width="100">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!--//col-->
                                    <div class="col text-end">
                                        <a class="btn-sm app-btn-secondary" href="<?php echo e(route('profile.edit')); ?>">Change</a>
                                    </div>
                                    <!--//col-->
                                </div>
                                <!--//row-->
                            </div>
                            <!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Name</strong></div>
                                        <div class="item-data"><?php echo e($user->nama_lengkap); ?></div>
                                    </div>

                                </div>
                                <!--//row-->
                            </div>
                            <!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Email</strong></div>
                                        <div class="item-data"><?php echo e($user->email); ?></div>
                                    </div>

                                    <!--//row-->
                                </div>
                            
                            </div>


                        </div>
                        <!--//app-card-->
                    </div>

                </div>
                <!--//row-->

            </div>
            <!--//container-fluid-->
        </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH D:\Laravel Project\pklppdb\resources\views/dashboard/account/index.blade.php ENDPATH**/ ?>