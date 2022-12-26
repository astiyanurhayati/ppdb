<x-layout-app title="Admin Pembayaran PPDB">
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
						@foreach ($students as $student )
						<tr>
							<th scope="row">{{$loop->iteration}}</th>
							<td>{{$student->user->id}}</td>
							<td>{{$student->user->nama_lengkap}}</td>
							<td>
								<a href="/pembayaran/admin/detailpembayaran/{{$student->user_id}}"><button class="btn btn-primary" style="color: white">Detail</button></a>
							</td>
							<td><a href="/pembayaran/admin/detailpendafaran/{{$student->user_id}}"><button
										class="btn btn-primary " style="color: white">Detail</button></a></td>
							<td>

								@if($student['status'] == 1)
								<p style="color: green">Di Terima</p>

								@elseif($student['status'] == 2)
								<p style="color: red">Di Ditolak</p>
								@else
								<div class="d-flex gap-2">
									<form action="{{ route('validasi.detail.pendaftaran', $student->user_id) }}"
										method="POST">
										@csrf
										@method('PATCH')
										<button type="submit" class="btn btn-primary" style="color: white; background:rgb(24, 175, 24)"> Validasi </button>
									</form>

									<form action="{{ route('tolak.detail.pendaftaran', $student->user_id) }}"
										method="POST">
										@csrf
										@method('PATCH')
										<button type="submit" class="btn btn-danger" style="color: white"> Tolak </button>
									</form>
								</div>

								@endif
								@endforeach
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</x-layout-app>