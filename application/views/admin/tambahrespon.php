<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Halaman Tambah Data Respon
        </div>



        <div class="card-body md-3">
            <form method="post" action="<?= base_url('suratrespon/proses_respon_now'); ?>"
                enctype="multipart/form-data">

                <?php foreach ($detail_surat_respon as $dsm) : ?>
                <input type="hidden" name="id_surat_masuk" value="<?= $id ?>">
                <div class="form-group row">
                    <label for="nomor_surat_respon" class="col-sm-2 col-form-label">No Surat Respon</label>
                    <div class="col-sm-5">
                        <input id="disabledInput" type="text" class="form-control" name="nomor_surat_responden"
                            required="" value="<?= $dsm->no_surat_masuk ?>" disabled>
                    </div>
                </div>

                <?php endforeach; ?>
                <div class=" form-group row">
                    <label for="jenis_surat_respon" class="col-sm-2 col-form-label">Jenis Surat</label>
                    <select name="id_jabatan" class=" col-sm-5" required="">
                        <?php foreach ($jenis as $jns) : ?>
                        <option value="<?php echo $jns->singkatan_jabatan ?>"><?php echo $jns->nama_jabatan ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class=" form-group row">
                    <label for="perihal_surat_keluar" class="col-sm-2 col-form-label">Perihal Surat</label>
                    <select name="perihal_surat_respon" class=" col-sm-5" required="">
                        <?php foreach ($perihal as $phl) : ?>
                        <option value="<?php echo $phl->singkatan_perihal ?>"><?php echo $phl->perihal_surat ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class=" form-group row">
                    <label for="tujuan_surat_respon" class="col-sm-2 col-form-label">Tujuan Surat </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control " name="tujuan_surat_respon" required="">
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