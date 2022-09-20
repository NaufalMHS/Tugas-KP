<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Halaman Tambah Data Masuk
        </div>



        <div class="card-body md-3">
            <form method="post" action="<?= base_url('suratmasuk/proses_masuk'); ?>" enctype="multipart/form-data">

                <div class="form-group row">
                    <label for="no_surat_masuk" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="no_surat_masuk" required="">
                    </div>
                </div>

                <div class=" form-group row">
                    <label for="jenis_surat_masuk" class="col-sm-2 col-form-label">Jenis Surat</label>
                    <select name="id_jabatan" class=" col-sm-5" required="">
                        <?php foreach ($jenis as $jns) : ?>
                        <option value="<?php echo $jns->nama_jabatan ?>"><?php echo $jns->nama_jabatan ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class=" form-group row">
                    <label for="perihal_surat_masuk" class="col-sm-2 col-form-label">Perihal Surat</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control " name="perihal_surat_masuk" required="">
                    </div>
                </div>

                <div class=" form-group row">
                    <label for="tanggal_surat_masuk" class="col-sm-2 col-form-label">Tanggal Surat Masuk </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control datepicker" name="tanggal_surat_masuk" required="">
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="sifat_surat_masuk" class="col-sm-2 col-form-label">Sifat</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control " name="sifat_surat_masuk" required="">
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="asal_surat_masuk" class="col-sm-2 col-form-label">Asal Surat</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="asal_surat_masuk" required="">
                    </div>
                </div>
                <div class="form-group row">
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

            </form>

        </div>
    </div>
    <!-- /.container-fluid -->

</div>