<x-layout-app title="detail bukti">

    <div class="app-card alert alert-dismissible shadow-sm mb-4 " style="margin-top: 50px; width:500px; margin-left:50px">
        <p>Detail Pendaftaran siswa: {{$detailUser->nama_lengkap}}</p>
        <div>
            <div class="app-card-body p-3 p-lg-4">
                <div class="row gx-5 gy-3">
                    <div class="col-12 col-lg-9">
                       <ul>
                        <li>NISN: {{$detailUser->nisn}}</li>
                        <li>Nama Siswa: {{$detailUser->nama_lengkap}}</li>
                        <li>Jenis Kelamin: {{$detailUser->jk}}</li>
                        <li>Asal Sekolah:{{$detailUser->asal_sekolah}}</li>
                        <li>Email: {{$detailUser->email}}</li>
                        <li>No HP:{{$detailUser->no_phone}}</li>
                        <li>No HP Ayah:{{$detailUser->no_phone_ayah}}</li>
                        <li>No HP Ibu:{{$detailUser->no_phone_ibu}}</li>
                       </ul>
                    </div>
                </div>
            </div>
        </div>
       <a href="{{route('admin.pembayaran')}}"> <button class="btn btn-primary" style="color:white">Kembali</button></a>
    </div>
    
</x-layout-app>