<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Surat Respon
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


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <td>no</td>
                                    <td>nomor surat masuk</td>
                                    <td>nomor surat respon</td>
                                    <td>tanggal surat respon</td>
                                    <td>Jabatan</td>
                                    <td>perihal surat</td>


                                    <td calspan="1">Setting</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($surat_respon as $srtrsp) : ?>
                                <tr>
                                    <td><?php echo $srtrsp['id_surat_respon'] ?></td>
                                    <td><?php echo $srtrsp['no_surat_masuk'] ?></td>
                                    <td><?php echo $srtrsp['nomor_surat_respon'] ?></td>
                                    <td><?php echo $srtrsp['tanggal_surat_respon'] ?></td>
                                    <td><?php echo $srtrsp['nama_jabatan'] ?></td>

                                    <td><?php echo $srtrsp['perihal_surat'] ?></td>

                                    <td>
                                        <a href="suratrespon/detail/<?php echo $srtrsp['id_surat_respon'] ?>"
                                            class="badge badge-primary">Detail</a>

                                        <?php if ($srtrsp['is_upload'] != 1) { ?>
                                        <a href="suratrespon/detailnomorrespon/<?php echo str_replace("/", "-", $srtrsp['nomor_surat_respon']) ?>"
                                            class="badge badge-success">Upload</a>
                                        <?php } ?>
                                    </td>
                                </tr>

                                <?php endforeach; ?>
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->