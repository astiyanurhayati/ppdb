<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout-app','data' => ['title' => 'Admin Pembayaran PPDB']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout-app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Admin Pembayaran PPDB']); ?>
	<div class="app-content pt-0 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				<div class="inner">
					<div class="app-card-body  p-lg-0">
						<h3 class="mb-3">Kelola Pembayaran Students</h3>
					</div>
				</div>
			</div>
			<div class="app-card">
				<table class="table table-hover shadow-sm">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">No Registrasi</th>

							<th scope="col">Nama</th>
							<th scope="col">Bukti Pembayaran</th>
							<th scope="col">Detail Pendaftaran</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<th scope="row"><?php echo e($loop->iteration); ?></th>
							<td><?php echo e($student->user->id); ?></td>
							<td><?php echo e($student->user->nama_lengkap); ?></td>
							<td>
								<a href="/pembayaran/admin/detailpembayaran/<?php echo e($student->user_id); ?>"><button class="btn btn-primary" style="color: white">Detail</button></a>
							</td>
							<td><a href="/pembayaran/admin/detailpendafaran/<?php echo e($student->user_id); ?>"><button
										class="btn btn-primary " style="color: white">Detail</button></a></td>
							<td>

								<?php if($student['status'] == 1): ?>
								<p style="color: green">Di Terima</p>

								<?php elseif($student['status'] == 2): ?>
								<p style="color: red">Di Ditolak</p>
								<?php else: ?>
								<div class="d-flex gap-2">
									<form action="<?php echo e(route('validasi.detail.pendaftaran', $student->user_id)); ?>"
										method="POST">
										<?php echo csrf_field(); ?>
										<?php echo method_field('PATCH'); ?>
										<button type="submit" class="btn btn-primary" style="color: white; background:rgb(24, 175, 24)"> Validasi </button>
									</form>

									<form action="<?php echo e(route('tolak.detail.pendaftaran', $student->user_id)); ?>"
										method="POST">
										<?php echo csrf_field(); ?>
										<?php echo method_field('PATCH'); ?>
										<button type="submit" class="btn btn-danger" style="color: white"> Tolak </button>
									</form>
								</div>

								<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH D:\Laravel Project\pklppdb\resources\views/dashboard/admin/admin_pembayaran.blade.php ENDPATH**/ ?>