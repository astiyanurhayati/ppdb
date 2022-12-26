<x-layout-app title="Data Student">
    <div class="app-content pt-0 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				<div class="inner">
					<div class="app-card-body  p-lg-0">
						<h3 class="mb-3">Data Siswa</h3>
					</div>
				</div>
			</div>
			<div class="app-card">
				<table class="table table-hover shadow-sm">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">No Registrasi</th>
							<th scope="col">NISM</th>
							<th scope="col">Nama</th>
							<th scope="col">Aksi</th>
						
							
						</tr>

                        @foreach ($students as $student )
                            
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td> {{$student->id}} </td>
                            <td> {{$student->nisn}} </td>
                            <td> {{$student->nama_lengkap}} </td>
                        </tr>
                        @endforeach
					</thead>
					<tbody>
				
					</tbody>
				</table>
			</div>
		</div>
	</div>
</x-layout-app>