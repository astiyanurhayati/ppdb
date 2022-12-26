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

<x-layout-app title="Pembayaran PPDB">

	<div class="app-content pt-0 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				<div class="inner">
					<div class="app-card-body pt-0 p-lg-0">
						<h3 class="mb-3">Pembayaran</h3>
						
					@if (!isset($item))
						<p>Silahkan Upload Bukti Bayar Anda di Form Berikut:</p>
					@elseif($item->status == 1)
					@elseif($item->status == 2)
					<p>Isi Ulang Form</p>
					@else
					@endif
					
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="container-xl">

		@if (!isset($item))

		<p>1</p>
		<div class="app-card shadow-sm mb-4 px-10">
			<form action="{{route('pembayaran.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="three file">
					<div class="mb-3" style="width: 30%">
						<label for="namabank" class="form-label">Nama Bank</label>
						<select id="namabank" name="nama_bank"
							class="form-control {{ $errors->has('nama_bank') ? ' is-invalid' : '' }} select"
							onchange="bankTampil()">
							<option disabled selected> -- Pilih Bank -- </option>
							<option value="namabank_lainnya"><b>LAINNYA</b></option>
							@foreach ($data as $item )
							<option value="{{$item['name']}}">{{$item['name']}}</option>
							@endforeach

						</select>

					</div>


					<div class="mb-3" style="width: 30%">
						<label for="pemilik_bank" class="form-label">Nama Pemilik Rekening</label>
						<input type="text" name="pemilik_bank" class="form-control {{ $errors->has('pemilik_bank') ? ' is-invalid' : '' }}" id="pemilik_bank">
						@if ($errors->has('nama_bank'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('nama_bank') }}</strong>
						</span>
						@endif
					</div>

					<div class="mb-3" style="width: 30%">
						<label for="rupiah" class="form-label">Nominal</label>
						<input type="text" name="nominal" class="form-control {{ $errors->has('nominal') ? ' is-invalid' : '' }}" id="rupiah">
						@if ($errors->has('nama_bank'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('nominal') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="mb-3 file" style="width: 50%" id="nama_bank_lainnya">
					<label for="nama_bank_lainnya" class="form-label">Nama Bank atau Dompet Digital</label>
					<input type="text" name="nama_bank_lainnya" class="form-control {{ $errors->has('nama_bank_lainnya') ? ' is-invalid' : '' }}"
						placeholder="Masukan Nama Bank Atau Dompet Digital">

						@if ($errors->has('nama_bank_lainnya'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('nama_bank_lainnya') }}</strong>
						</span>
						@endif
				</div>


				<div class="input-group mb-3 w-75 file">
					<input type="file" class="form-control  {{ $errors->has('bukti_pembayaran') ? ' is-invalid' : '' }}" name="bukti_pembayaran" id="image" accept="image/*">
					<label class="input-group-text" for="image"\>Bukti Pembayaran</label>
					@if ($errors->has('bukti_pembayaran'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('bukti_pembayaran') }}</strong>
						</span>
						@endif
				</div>

				<button type="submit" class="btn btn-primary file mb-5" style="color: white">Upload Bukti
					Pembayaran</button>
			</form>
		</div>

		@elseif($item->status == 1)
		<div class="alert alert-success  w-75" style="margin-left: 20px">Terimaskasih, Pembayaran Sudah Terferivikasi,
			harap tunggu info selanjutnya</div>

		@elseif($item->status == 2)
		<div class="alert alert-danger mb-5 w-75" style="margin-left: 20px">Pembayaran di Ditolak,Isi Ulang coba</div>
		<div class="app-card shadow-sm mb-4 px-10">
		</div>
		<div class="app-card shadow-sm mb-4 px-10">
			<form action="{{route('pembayaran.update')}}" method="POST" enctype="multipart/form-item">
				@csrf
				@method('PATCH')
				<div class="three file">
					<div class="mb-3" style="width: 30%">
						<label for="namabank" class="form-label">Nama Bank</label>
						<select id="namabank" name="nama_bank" class="form-control select {{ $errors->has('nama_bank') ? ' is-invalid' : '' }}" onchange="bankTampil()">
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
						<input type="text" name="pemilik_bank" class="form-control {{ $errors->has('nama_bank') ? ' is-invalid' : '' }}" id="pemilik_bank" >
						@if ($errors->has('bukti_pembayaran'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('pemilik_bank') }}</strong>
						</span>
						@endif
					</div>

					<div class="mb-3" style="width: 30%">
						<label for="rupiah" class="form-label">Nominal</label>
						<input type="text" name="nominal" class="form-control {{ $errors->has('nominal') ? ' is-invalid' : '' }}" id="rupiah">
						@if ($errors->has('bukti_pembayaran'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('nominal') }}</strong>
						</span>
						@endif
				
					</div>
				</div>

				<div class="mb-3 file" style="width: 50%" id="nama_bank_lainnya">
					<label for="nama_bank_lainnya" class="form-label">Nama Bank atau Dompet Digital</label>
					<input type="text" name="nama_bank_lainnya" class="form-control {{ $errors->has('nama_bank_lainnya') ? ' is-invalid' : '' }}"
						placeholder="Masukan Nama Bank Atau Dompet Digital">
						@if ($errors->has('bukti_pembayaran'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('nama_bank_lainnya') }}</strong>
						</span>
						@endif
				</div>


				<div class="input-group mb-3 w-75 file">
					<input type="file" class="form-control" name="bukti_pembayaran" id="inputGroupFile02" accept="image/*">
					<label class="input-group-text {{ $errors->has('nama_bank') ? ' is-invalid' : '' }}" for="inputGroupFile02 ">Bukti Pembayaran</label>
					@if ($errors->has('bukti_pembayaran'))
					<span class="invalid-feedback">
						<strong>{{ $errors->first('bukti_pembayaran') }}</strong>
					</span>
					@endif
					
				</div>

				<button type="submit" class="btn btn-primary file mb-5" style="color: white">Upload Bukti
					Pembayaran</button>
			</form>
		</div>

		@elseif($item->status == 0)
		<div class="alert alert-warning w-75" style="margin-left: 20px">Masi Pending, Tunggu Admin Verifkasi dulu ya
		</div>
		@endif

	</div>
	<div style="margin-top: 50px">
		<hr>
	</div>


	{{-- js untuk select lainnya --}}
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

	


</x-layout-app>


{{-- @if(Session::get('success'))
<div class="alert alert-success">
	{{session('success')}}
</div>
@endif --}}