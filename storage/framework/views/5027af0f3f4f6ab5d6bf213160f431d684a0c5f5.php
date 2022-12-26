<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout-app','data' => ['title' => 'detail bukti']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout-app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'detail bukti']); ?>

    <div class="app-card alert alert-dismissible shadow-sm mb-4 " style="margin-top: 50px; width:500px; margin-left:50px">
        <p>Detail Pendaftaran siswa: <?php echo e($detailUser->nama_lengkap); ?></p>
        <div>
            <div class="app-card-body p-3 p-lg-4">
                <div class="row gx-5 gy-3">
                    <div class="col-12 col-lg-9">
                       <ul>
                        <li>NISN: <?php echo e($detailUser->nisn); ?></li>
                        <li>Nama Siswa: <?php echo e($detailUser->nama_lengkap); ?></li>
                        <li>Jenis Kelamin: <?php echo e($detailUser->jk); ?></li>
                        <li>Asal Sekolah:<?php echo e($detailUser->asal_sekolah); ?></li>
                        <li>Email: <?php echo e($detailUser->email); ?></li>
                        <li>No HP:<?php echo e($detailUser->no_phone); ?></li>
                        <li>No HP Ayah:<?php echo e($detailUser->no_phone_ayah); ?></li>
                        <li>No HP Ibu:<?php echo e($detailUser->no_phone_ibu); ?></li>
                       </ul>
                    </div>
                </div>
            </div>
        </div>
       <a href="<?php echo e(route('admin.pembayaran')); ?>"> <button class="btn btn-primary" style="color:white">Kembali</button></a>
    </div>
    
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH D:\Laravel Project\pklppdb\resources\views/dashboard/admin/detail_pendaftaran.blade.php ENDPATH**/ ?>