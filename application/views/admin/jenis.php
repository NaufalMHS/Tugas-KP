<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Jenis Surat
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <td>no</td>
                                    <td>Nama Jabatan</td>
                                    <td>Singkatan Jabatan</td>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($jenis as $jns) : ?>
                                <tr>

                                    <td><?php echo $jns['id_jabatan'] ?></td>
                                    <td><?php echo $jns['nama_jabatan'] ?></td>
                                    <td><?php echo $jns['singkatan_jabatan'] ?></td>


                                </tr>

                                <?php endforeach; ?>
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->