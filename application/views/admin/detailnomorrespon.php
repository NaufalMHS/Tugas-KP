<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Nomor Surat Respon
        </div>



        <div class="card-body md-3">
            <form method="post" action="<?= base_url('suratrespon/proses_respon_now/update'); ?>"
                enctype="multipart/form-data">
                <?php foreach ($nomor_surat_respon as $dt) : ?>
                <input type="hidden" name="nomor_surat_respon" value="<?= $id ?>">
                <div class="form-group row">
                    <label for="no_surat_respon" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-5">

                        <input type="text" class="form-control" name="no_surat_respon"
                            value="<?= str_replace("-", "/", $dt->nomor_surat_respon) ?>" required="">
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="userfile" class="col-sm-2 col-form-label">Upload Surat</label>
                    <div class="form-group">
                        <input type="file" name="userfile" class="form-control" size="20" required=""
                            accept=".pdf, .docx, .doc">
                    </div>
                </div>
                <br>
                <div class=" form-group row">
                    <label for="asal_surat" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-5">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="reset" class="btn btn-danger"
                            onclick="Swal.fire({title : 'Data berhasil di reset', timer : 5000})">Reset</button>
                    </div>
                </div>
                <?php endforeach ?>
            </form>

        </div>
    </div>
    <!-- /.container-fluid -->

</div>