<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Registrasi</title>
    <!-- css untuk select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- jika menggunakan bootstrap4 gunakan css ini  -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <!-- cdn bootstrap4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link id="theme-style" rel="stylesheet" href="<?php echo e(asset('assets/css/portal.css')); ?>">
</head>

<body style="background:#3498dbcd">
    <div class="title text-center mt-5 mb-5">
        <h2  style="color: white">Form Pendaftaran PPDB </h2>
        <h5  style="color: white">SMK Wikrama Bogor TP. 2023-2024</h5>
    </div>
    <div class="container-xl mb-5" style="justify-content: center;
        display: flex;">
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form class="settings-form px-5" action="<?php echo e(route('student.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3 d-flex justify-content-around nisn-jk" style="gap: 10px">

                            <div>
                                <label for="setting-input-3"><b>NISN</b></label>
                                <input name="nisn" type="number" class="form-control  <?php echo e($errors->has('nisn') ? ' is-invalid' : ''); ?>" style="width: 285px" id="setting-input-1"  placeholder="Masukan NISN">
                                <?php if($errors->has('nisn')): ?>
                                <span class="invalid-feedback">
                                    <?php echo e($errors->first('nisn')); ?>

                                </span>
                                 <?php endif; ?> 
                            </div>

                            <div>
                                <label for="setting-input-3"><b>Jenis Kelamin</b></label>
                                <select name="jk" class="form-select  <?php echo e($errors->has('nisn') ? ' is-invalid' : ''); ?>" id="setting-input-3" style="width: 285px">
                                    <option selected disabled>--Jenis Kelamin --</option>
                                    <option value="pria">Laki-laki</option>
                                    <option value="wanita">Perempuan</option>
                                </select>
                            </div>

                        </div>

                        <div class="mb-3">
                            <label for=""><b>Nama Lengkap</b></label>
                            <input name="nama_lengkap" type="text" class="form-control <?php echo e($errors->has('nama_lengkap') ? ' is-invalid' : ''); ?>" id="setting-input-1" placeholder="Masukan Nama Lengkap">
                            <?php if($errors->has('nama_lengkap')): ?>
                            <span class="invalid-feedback">
                                <?php echo e($errors->first('nama_lengkap')); ?>

                            </span>
                            <?php endif; ?> 
                        </div>
                           

                        <div class="mb-3">
                            <label for=""><b>Asal Sekolah</b></label>
                            <select class="form-select <?php echo e($errors->has('asal_sekolah') ? ' is-invalid' : ''); ?>" id="sekolah" name="asal_sekolah"
                                onchange="tampilakanSekolahInput()">
                                <option disabled selected> -- Pilih Asal Sekolah -- </option>
                                <option value="sekolah_lainnya">LAINNYA</option>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sekolah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($sekolah['nama_sekolah']); ?>"><?php echo e($sekolah['nama_sekolah']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="mb-3" id="sekolah_lainnya" style="display: none;">
                            <label for="setting-input-2" class="form-label">Nama Sekolah Lainnya </label>
                            <input type="text" name="asal_sekolah_lainnya" class="form-control <?php echo e($errors->has('asal_sekolah_lainnya') ? ' is-invalid' : ''); ?>" id="setting-input-2" placeholder="Nama Sekolah">
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Email </label>
                            <input name="email" type="email" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" id="setting-input-2" placeholder="Masukan Email Aktif">
                            <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback">
                                <?php echo e($errors->first('email')); ?>

                            </span>
                             <?php endif; ?> 
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Nomor Handphone</label>
                            <input name="no_phone" type="number" class="form-control <?php echo e($errors->has('no_phone') ? ' is-invalid' : ''); ?>" id="setting-input-3" placeholder="Contoh: 08---">
                            <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback">
                                <?php echo e($errors->first('email')); ?>

                            </span>
                             <?php endif; ?> 
                        </div>

                        <div class="mb-3 d-flex justify-content-around" style="gap:10px">
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">NO Handphone Ayah </label>
                                <input name="no_phone_ayah" type="number" class="form-control <?php echo e($errors->has('no_phone_ayah') ? ' is-invalid' : ''); ?>" id="setting-input-2" style="width: 285px" placeholder="Contoh: 08---" >
                                <?php if($errors->has('no_phone_ayah')): ?>
                                <span class="invalid-feedback">
                                    <?php echo e($errors->first('no_phone_ayah')); ?>

                                </span>
                                 <?php endif; ?> 
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-3" class="form-label">Nomor Handphone Ibu</label>
                                <input name="no_phone_ibu" type="number" class="form-control <?php echo e($errors->has('no_phone_ayah') ? ' is-invalid' : ''); ?>" style="width: 285px"  id="setting-input-3" placeholder="Contoh: 08-----">
                                <?php if($errors->has('no_phone_ibu')): ?>
                                <span class="invalid-feedback">
                                    <?php echo e($errors->first('no_phone_ibu')); ?>

                                </span>
                                 <?php endif; ?> 
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" style="color: white">Registrasi</button>

                    </form>
                </div>


            </div>

        </div>


    </div>
    <!-- wajib jquery  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <!-- js untuk select2  -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
                $("#sekolah").select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select"
                });
    
            });
    </script>


    
    <script>
        function tampilakanSekolahInput() {
            var sekolah = document.getElementById("sekolah").value;
            var sekolahLainnya = document.getElementById("sekolah_lainnya");
            if (sekolah == "sekolah_lainnya") {
                sekolahLainnya.style.display = "";
            }else {
                sekolahLainnya.style.display = "none";
            }
        } 
    </script>



</body>

</html><?php /**PATH D:\Laravel Project\pklppdb\resources\views/form/form.blade.php ENDPATH**/ ?>