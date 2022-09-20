<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Laporan Masuk</title>
</head>

<body onload="window.print()">
    <div>

        <div id="content-wrapper" style="margin-top:50px">

            <div class="container-fluid">


                <!-- DataTables Example -->
                <div class="card mb-3" id="cardbayar">
                    <div class="card-header">
                        <center>
                            <b>
                                <h3><?php echo $title ?> <br></h3>
                                <h4><?php echo $subtitle ?> <br></h4>
                            </b>
                        </center>
                    </div>
                    <div class="card-body card-block">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td>no</td>
                                            <th>tanggal surat masuk</th>
                                            <th>nomor surat</th>
                                            <th>Jenis surat</th>
                                            <th>Jabatan</th>
                                            <th>perihal surat</th>
                                            <th>Tujuan surat</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>no</th>
                                            <th>tanggal surat masuk</th>
                                            <th>nomor surat</th>
                                            <th>Jenis surat</th>
                                            <th>perihal surat</th>
                                            <th>Tujuan surat</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        $no = 1;
                                        foreach ($datafilter as $dt) : ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $dt->tanggal_surat_masuk; ?></td>
                                            <td><?php echo $dt->no_surat_masuk; ?></td>
                                            <td><?php echo $dt->jenis_surat_masuk ?></td>
                                            <td><?php echo $dt->perihal_surat_masuk ?></td>
                                            <td><?php echo $dt->asal_surat_masuk ?></td>
                                            <td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

</html>