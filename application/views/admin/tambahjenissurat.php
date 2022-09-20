<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Halaman Tambah Jenis Surat
        </div>



        <div class="card-body md-3">
            <form method="post" action="<?= base_url('jenissurat/proses_masuk'); ?>" enctype="multipart/form-data">

                <div class="form-group row">
                    <label for="nama_jabatan" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control " name="nama_jabatan" required="">
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="singkatan_jabatan" class="col-sm-2 col-form-label">Singkatan</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control " name="singkatan_jabatan" required="">
                    </div>
                </div>

                <div class=" form-group row">
                    <label for="asal_surat" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-5">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="reset" class="btn btn-danger"
                            onclick="Swal.fire({title : 'Data berhasil di reset', timer : 5000})">Reset</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
    <!-- /.container-fluid -->

</div>