<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Surat Masuk
        </div>



        <div class="card-body md-3">
            <form method="POST">

                <div class="float-left col-12">
                    <table>
                        <tr>
                            <H8>Filter</H8>
                            <td><input type="date " class="form-control datepicker" name="startdate"
                                    placeholder="Start Date"></td>
                            <td>
                                <H8>-</H8>
                            </td>
                            <td><input type="date " class="form-control datepicker" name="enddate"
                                    placeholder="end date"></td>
                            <td><button type="submit" name="filter" class="btn btn-primary">filter</button></td>
                        </tr>
                        </tr>
                    </table>

                </div>
            </form>
            <div class="row">


                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <td>no</td>
                                    <td>tanggal masuk</td>
                                    <td>no surat</td>
                                    <td>jenis surat</td>
                                    <td>perihal surat</td>
                                    <td>sifat surat</td>
                                    <td calspan="2">Setting</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                // if (isset($_POST['submit'])) {
                                // }
                                foreach ($surat_masuk as $srtmsk) : ?>
                                <tr>

                                    <td><?php echo $no++ ?></td>

                                    <td><?php echo $srtmsk['tanggal_surat_masuk'] ?></td>
                                    <td><?php echo $srtmsk['no_surat_masuk'] ?></td>
                                    <td><?php echo $srtmsk['jenis_surat_masuk'] ?></td>
                                    <td><?php echo $srtmsk['perihal_surat_masuk'] ?></td>
                                    <td><?php echo $srtmsk['sifat_surat_masuk'] ?></td>
                                    <td>

                                        <a href="suratmasuk/detail/<?php echo $srtmsk['id_surat_masuk'] ?>"
                                            class="badge badge-primary">Detail</a>
                                        <?php if ($srtmsk['is_respon'] != 1) { ?>
                                        <a href="suratrespon/tambahrespon/<?php echo $srtmsk['id_surat_masuk'] ?>"
                                            class="badge badge-primary">respon</a>
                                        <?php } ?>
                                    </td>
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