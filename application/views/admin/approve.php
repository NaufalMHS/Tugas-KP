<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Surat Keluar
        </div>



        <div class="card-body md-3">
            <form>

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
                                    placeholder="end date">
                            </td>
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
                                    <td>tanggal surat keluar</td>
                                    <td>nomor surat</td>
                                    <td>Jabatan</td>
                                    <td>perihal surat</td>
                                    <td>Tujuan surat</td>
                                    <td calspan="2">Setting</td>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($is_approve as $srtklr) : ?>
                                <tr>

                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $srtklr['tanggal_surat_keluar'] ?></td>
                                    <td><?php echo str_replace("-", "/", $srtklr['nomor_surat_keluar']) ?></td>
                                    <td><?php echo $srtklr['nama_jabatan'] ?></td>
                                    <td><?php echo $srtklr['perihal_surat'] ?></td>
                                    <td><?php echo $srtklr['tujuan_surat_keluar'] ?></td>

                                    <td>

                                        <a href="../suratkeluar/detail/<?php echo $srtklr['id_surat_keluar'] ?>"
                                            class="badge badge-primary">Detail</a>
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