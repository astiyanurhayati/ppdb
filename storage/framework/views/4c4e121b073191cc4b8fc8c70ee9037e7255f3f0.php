<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout-app','data' => ['title' => 'Dashboard - PPDB']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout-app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Dashboard - PPDB']); ?>
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<?php if(Auth::user()->role == "user"): ?>
				<h1 class="app-page-title">Student Dashboard</h1>
			<?php elseif(Auth::user()->role == "admin"): ?>
				<h1 class="app-page-title">Admin Dashbaord</h1>
			<?php endif; ?>

			<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				<div class="inner">
					<div class="app-card-body p-3 p-lg-4">
						<h3 class="mb-3">Hi <?php echo e(Auth::user()->nama_lengkap); ?>!</h3>
						<div class="row gx-5 gy-3">
							<div class="col-12 col-lg-9">
								<div>Selamat Datang!</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php if(Auth::user()->role == "user"): ?>
				<?php if(Session::get('success')): ?>
				<div class="alert alert-success">
					<?php echo e(session('success')); ?>

				</div>
				<?php endif; ?>
			
			<?php endif; ?>

		
		</div>
	</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH D:\Laravel Project\pklppdb\resources\views/dashboard/index.blade.php ENDPATH**/ ?>