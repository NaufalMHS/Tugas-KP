<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Halaman Tambah Data Keluar
        </div>



        <div class="card-body md-3">
            <form method="post" action="<?= base_url('suratkeluar/proses_keluar_now'); ?>"
                enctype="multipart/form-data">
                <!-- 
        <div class="form-group row">
            <label for="tanggal_surat_keluar" class="col-sm-2 col-form-label">Tanggal Surat </label>
            <div class="col-sm-5">
                <input type="text" class="form-control datepicker" name="tanggal_surat_keluar" required="">
            </div>
        </div> -->
                <div class=" form-group row">
                    <label for="jenis_surat_keluar" class="col-sm-2 col-form-label">Jenis Surat</label>
                    <select name="id_jabatan" class=" col-sm-5" required="">
                        <?php foreach ($jenis as $jns) : ?>
                        <option value="<?php echo $jns->singkatan_jabatan ?>"><?php echo $jns->nama_jabatan ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class=" form-group row">
                    <label for="perihal_surat_keluar" class="col-sm-2 col-form-label">Perihal Surat</label>
                    <select name="perihal_surat_keluar" class=" col-sm-5" required="">
                        <?php foreach ($perihal as $phl) : ?>
                        <option value="<?php echo $phl->singkatan_perihal ?>"><?php echo $phl->perihal_surat ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <!-- <div class=" form-group row">
            <label for="perihal_surat_keluar" class="col-sm-2 col-form-label">Perihal Surat</label>
            <div class="col-sm-5">
                <input type="text" class="form-control " name="perihal_surat_keluar" required="">
            </div>
        </div> -->

                <div class=" form-group row">
                    <label for="tujuan_surat_keluar" class="col-sm-2 col-form-label">Tujuan Surat </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control " name="tujuan_surat_keluar" required="">
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