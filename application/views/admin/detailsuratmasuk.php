<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Detail Surat Masuk</h5>
        <div class="card-body">
            <?php foreach ($detail_surat_masuk as $dsm) : ?>
            <div class="row align-items-center">
                <div class="col-md-4 col-sm-12">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <img src="<?= base_url() . './assets/img/file.png' ?>" class="rounded mx-auto d-block mb-3"
                                height="100">
                            <p class="text-center"><?= $dsm->file ?></p>
                        </div>
                        <div class="col-12 d-flex justify-content-center mb-4">
                            <a class="btn btn-sm btn-outline-primary mx-2"
                                href="<?= base_url('force_download') . './uploads/' . $dsm->file ?>">Unduh</a>
                            <a class="btn btn-sm btn-outline-primary"
                                href="<?= base_url() . './uploads/' . $dsm->file ?>" target="_blank">Lihat</a>
                        </div>
                    </div>

                </div>
                <div class="col-md-8 col-sm-12">
                    <table class="table">
                        <tr>
                            <td>Nomor Surat</td>
                            <td><strong><?= $dsm->no_surat_masuk ?></strong></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td><strong><?= $dsm->jenis_surat_masuk ?></strong></td>
                        </tr>
                        <tr>
                            <td>Perihal Surat</td>
                            <td><strong><?= $dsm->perihal_surat_masuk ?></strong></td>
                        </tr>
                        <tr>
                            <td>Tanggal Surat</td>
                            <td><strong><?= $dsm->tanggal_surat_masuk ?></strong></td>
                        </tr>
                        <tr>
                            <td>Sifat Surat</td>
                            <td><strong><?= $dsm->sifat_surat_masuk ?></strong></td>
                        </tr>
                        <tr>
                            <td>Asal Surat</td>
                            <td><strong><?= $dsm->asal_surat_masuk ?></strong></td>
                        </tr>


                    </table>
                    <a href=" <?php echo base_url('suratmasuk'); ?>"
                        class="btn btn-primary btn-sm float-right">Kembali</a>

                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>