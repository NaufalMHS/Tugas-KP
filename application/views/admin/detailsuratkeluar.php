<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Detail Surat Keluar</h5>
        <div class="card-body">
            <?php foreach ($detail_surat_keluar as $dsk) : ?>
            <div class="row align-items-center">
                <div class="col-md-4 col-sm-12">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <img src="<?= base_url() . './assets/img/file.png' ?>" class="rounded mx-auto d-block mb-3"
                                height="100">
                            <p class="text-center"><?= $dsk->file ?></p>
                        </div>
                        <div class="col-12 d-flex justify-content-center mb-4">
                            <a class="btn btn-sm btn-outline-primary mx-2"
                                href="<?= base_url('force_download') . './uploads/' . $dsk->file ?>">Unduh</a>
                            <a class="btn btn-sm btn-outline-primary"
                                href="<?= base_url() . './uploads/' . $dsk->file ?>" target="_blank">Lihat</a>
                        </div>
                    </div>

                </div>
                <div class="col-md-8 col-sm-12">
                    <table class="table">

                        <tr>
                            <td>Nomor Surat</td>
                            <td><strong><?= $dsk->nomor_surat_keluar ?></strong></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td><strong><?= $dsk->nama_jabatan ?></strong></td>
                        </tr>
                        <tr>
                            <td>Perihal Surat</td>
                            <td><strong><?= $dsk->perihal_surat ?></strong></td>
                        </tr>
                        <tr>
                            <td>Tanggal Surat</td>
                            <td><strong><?= $dsk->tanggal_surat_keluar ?></strong></td>
                        </tr>

                        <tr>
                            <td>Tujuan Surat</td>
                            <td><strong><?= $dsk->tujuan_surat_keluar ?></strong></td>
                        </tr>
                        <?php if ($dsk->approve != 'tolak') { ?>
                        <?php if ($dsk->approve != 'menunggu') { ?>
                        <tr>
                            <td>Status Surat</td>
                            <td><strong class="text-white bg-success"><?= $dsk->approve ?></strong></td>
                        </tr>
                        <?php } ?><?php } ?>
                        <?php if ($dsk->approve != 'menunggu') { ?>
                        <?php if ($dsk->approve != 'approve') { ?>
                        <tr>
                            <td>Status Surat</td>
                            <td><strong class="text-white bg-warning"><?= $dsk->approve ?></strong></td>
                        </tr>
                        <?php } ?><?php } ?>
                        <?php if ($dsk->approve != 'approve') { ?>
                        <?php if ($dsk->approve != 'tolak') { ?>
                        <tr>
                            <td>Status Surat</td>
                            <td><strong class="text-white bg-danger"><?= $dsk->approve ?></strong></td>
                        </tr>
                        <?php } ?> <?php } ?>
                    </table>

                    <a href=" <?php echo base_url('suratkeluar'); ?>"
                        class="btn btn-primary btn-sm float-right">Kembali</a>
                    <?php if ($dsk->approve != 'approve') { ?>
                    <?php if ($dsk->approve != 'tolak') { ?>
                    <a href=" <?php echo base_url('suratkeluar/setuju/' . $id); ?>"
                        class="btn btn-primary btn-sm float-left mx-2">Approve</a>

                    <a href=" <?php echo base_url('suratkeluar/tolak/' . $id); ?>"
                        class="btn btn-primary btn-sm float-sm-left">Reject</a>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>