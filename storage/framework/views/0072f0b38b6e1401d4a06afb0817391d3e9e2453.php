<style>
	.three {
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
		padding-top: 20px;
	}

	.file {
		margin-left: 4%;
		margin-right: 4%;
	}
</style>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout-app','data' => ['title' => 'Pembayaran PPDB']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout-app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Pembayaran PPDB']); ?>

	<div class="app-content pt-0 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				<div class="inner">
					<div class="app-card-body pt-0 p-lg-0">
						<h3 class="mb-3">Pembayaran</h3>
						
					<?php if(!isset($item)): ?>
						<p>Silahkan Upload Bukti Bayar Anda di Form Berikut:</p>
					<?php elseif($item->status == 1): ?>
					<?php elseif($item->status == 2): ?>
					<p>Isi Ulang Form</p>
					<?php else: ?>
					<?php endif; ?>
					
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="container-xl">

		<?php if(!isset($item)): ?>

		<p>1</p>
		<div class="app-card shadow-sm mb-4 px-10">
			<form action="<?php echo e(route('pembayaran.store')); ?>" method="POST" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>
				<div class="three file">
					<div class="mb-3" style="width: 30%">
						<label for="namabank" class="form-label">Nama Bank</label>
						<select id="namabank" name="nama_bank"
							class="form-control <?php echo e($errors->has('nama_bank') ? ' is-invalid' : ''); ?> select"
							onchange="bankTampil()">
							<option disabled selected> -- Pilih Bank -- </option>
							<option value="namabank_lainnya"><b>LAINNYA</b></option>
							<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($item['name']); ?>"><?php echo e($item['name']); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</select>

					</div>


					<div class="mb-3" style="width: 30%">
						<label for="pemilik_bank" class="form-label">Nama Pemilik Rekening</label>
						<input type="text" name="pemilik_bank" class="form-control <?php echo e($errors->has('pemilik_bank') ? ' is-invalid' : ''); ?>" id="pemilik_bank">
						<?php if($errors->has('nama_bank')): ?>
						<span class="invalid-feedback">
							<strong><?php echo e($errors->first('nama_bank')); ?></strong>
						</span>
						<?php endif; ?>
					</div>

					<div class="mb-3" style="width: 30%">
						<label for="rupiah" class="form-label">Nominal</label>
						<input type="text" name="nominal" class="form-control <?php echo e($errors->has('nominal') ? ' is-invalid' : ''); ?>" id="rupiah">
						<?php if($errors->has('nama_bank')): ?>
						<span class="invalid-feedback">
							<strong><?php echo e($errors->first('nominal')); ?></strong>
						</span>
						<?php endif; ?>
					</div>
				</div>

				<div class="mb-3 file" style="width: 50%" id="nama_bank_lainnya">
					<label for="nama_bank_lainnya" class="form-label">Nama Bank atau Dompet Digital</label>
					<input type="text" name="nama_bank_lainnya" class="form-control <?php echo e($errors->has('nama_bank_lainnya') ? ' is-invalid' : ''); ?>"
						placeholder="Masukan Nama Bank Atau Dompet Digital">

						<?php if($errors->has('nama_bank_lainnya')): ?>
						<span class="invalid-feedback">
							<strong><?php echo e($errors->first('nama_bank_lainnya')); ?></strong>
						</span>
						<?php endif; ?>
				</div>


				<div class="input-group mb-3 w-75 file">
					<input type="file" class="form-control  <?php echo e($errors->has('bukti_pembayaran') ? ' is-invalid' : ''); ?>" name="bukti_pembayaran" id="image" accept="image/*">
					<label class="input-group-text" for="image"\>Bukti Pembayaran</label>
					<?php if($errors->has('bukti_pembayaran')): ?>
						<span class="invalid-feedback">
							<strong><?php echo e($errors->first('bukti_pembayaran')); ?></strong>
						</span>
						<?php endif; ?>
				</div>

				<button type="submit" class="btn btn-primary file mb-5" style="color: white">Upload Bukti
					Pembayaran</button>
			</form>
		</div>

		<?php elseif($item->status == 1): ?>
		<div class="alert alert-success  w-75" style="margin-left: 20px">Terimaskasih, Pembayaran Sudah Terferivikasi,
			harap tunggu info selanjutnya</div>

		<?php elseif($item->status == 2): ?>
		<div class="alert alert-danger mb-5 w-75" style="margin-left: 20px">Pembayaran di Ditolak,Isi Ulang coba</div>
		<div class="app-card shadow-sm mb-4 px-10">
		</div>
		<div class="app-card shadow-sm mb-4 px-10">
			<form action="<?php echo e(route('pembayaran.update')); ?>" method="POST" enctype="multipart/form-item">
				<?php echo csrf_field(); ?>
				<?php echo method_field('PATCH'); ?>
				<div class="three file">
					<div class="mb-3" style="width: 30%">
						<label for="namabank" class="form-label">Nama Bank</label>
						<select id="namabank" name="nama_bank" class="form-control select <?php echo e($errors->has('nama_bank') ? ' is-invalid' : ''); ?>" onchange="bankTampil()">
							<option disabled selected> -- Pilih Bank -- </option>
							<option value="namabank_lainnya"><b>LAINNYA</b></option>
							<option value="Bank BCA">Bank BCA</option>
							<option value="Bank Mandiri">Bank Mandiri</option>
							<option value="Bank BNI">Bank BNI</option>
							<option value="Bank BRI">Bank BRI</option>
							<option value="Bank CIMB Niaga">Bank CIMB Niaga</option>
							<option value="Bank CIMB Niaga Syariah">Bank CIMB Niaga Syariah</option>
							<option value="Bank Muamalat">Bank Muamalat</option>
							<option value="JENIUS">JENIUS</option>
							<option value="Bank Tabungan Negara (BTN)">Bank Tabungan Negara (BTN)</option>
						</select>
					</div>


					<div class="mb-3" style="width: 30%">
						<label for="pemilik_bank" class="form-label">Nama Pemilik Rekening</label>
						<input type="text" name="pemilik_bank" class="form-control <?php echo e($errors->has('nama_bank') ? ' is-invalid' : ''); ?>" id="pemilik_bank" >
						<?php if($errors->has('bukti_pembayaran')): ?>
						<span class="invalid-feedback">
							<strong><?php echo e($errors->first('pemilik_bank')); ?></strong>
						</span>
						<?php endif; ?>
					</div>

					<div class="mb-3" style="width: 30%">
						<label for="rupiah" class="form-label">Nominal</label>
						<input type="text" name="nominal" class="form-control <?php echo e($errors->has('nominal') ? ' is-invalid' : ''); ?>" id="rupiah">
						<?php if($errors->has('bukti_pembayaran')): ?>
						<span class="invalid-feedback">
							<strong><?php echo e($errors->first('nominal')); ?></strong>
						</span>
						<?php endif; ?>
				
					</div>
				</div>

				<div class="mb-3 file" style="width: 50%" id="nama_bank_lainnya">
					<label for="nama_bank_lainnya" class="form-label">Nama Bank atau Dompet Digital</label>
					<input type="text" name="nama_bank_lainnya" class="form-control <?php echo e($errors->has('nama_bank_lainnya') ? ' is-invalid' : ''); ?>"
						placeholder="Masukan Nama Bank Atau Dompet Digital">
						<?php if($errors->has('bukti_pembayaran')): ?>
						<span class="invalid-feedback">
							<strong><?php echo e($errors->first('nama_bank_lainnya')); ?></strong>
						</span>
						<?php endif; ?>
				</div>


				<div class="input-group mb-3 w-75 file">
					<input type="file" class="form-control" name="bukti_pembayaran" id="inputGroupFile02" accept="image/*">
					<label class="input-group-text <?php echo e($errors->has('nama_bank') ? ' is-invalid' : ''); ?>" for="inputGroupFile02 ">Bukti Pembayaran</label>
					<?php if($errors->has('bukti_pembayaran')): ?>
					<span class="invalid-feedback">
						<strong><?php echo e($errors->first('bukti_pembayaran')); ?></strong>
					</span>
					<?php endif; ?>
					
				</div>

				<button type="submit" class="btn btn-primary file mb-5" style="color: white">Upload Bukti
					Pembayaran</button>
			</form>
		</div>

		<?php elseif($item->status == 0): ?>
		<div class="alert alert-warning w-75" style="margin-left: 20px">Masi Pending, Tunggu Admin Verifkasi dulu ya
		</div>
		<?php endif; ?>

	</div>
	<div style="margin-top: 50px">
		<hr>
	</div>


	
	<script>
		function bankTampil() {
            var bank = document.getElementById("namabank").value;
            var bankLainnya = document.getElementById("nama_bank_lainnya");
            if (bank == "namabank_lainnya") {
                bankLainnya.style.display = "";
            }else {
                bankLainnya.style.display = "none";
            }
        } 
		let rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            let number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
	</script>

	


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>


<?php /**PATH D:\Laravel Project\pklppdb\resources\views/dashboard/pembayaran.blade.php ENDPATH**/ ?>