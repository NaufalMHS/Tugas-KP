<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surat keluar</title>
</head>

<body>
    Form Filter BY tanggal
    <br>
    <br>
    <hr>
    <form action="<?= base_url() ?>suratkeluar/filter" method="POST" target='_blank'>

        <input type="hidden" name="nilaifilter" value="1">
        tanggal Awal <br>
        <input type="date" name="tanggalawal" required=""> <br>
        tanggal Akhir <br>
        <input type="date" name="tanggalakhir" required=""> <br>

        <br>
        <input type="submit" value="Print">


    </form>
    <br>
    <hr>
    Form Filter BY Bulan
    <br>
    <br>
    <hr>
    <form action="<?= base_url() ?>suratkeluar/filter" method="POST" target='_blank'>

        <input type="hidden" name="nilaifilter" value="2">
        PILIH Tahun <br>
        <select name="tahun1" required="">
        <?php foreach ($tahun as $row) : ?>

<option value="<?= $row->tahun ?>"><?= $row->tahun ?></option>
<?php endforeach ?>
</select>

bulan Awal <br>
<select name="bulanawal" required="">
<option value="1">January</option>
<option value="2">Februari</option>
<option value="3">Maret</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">Juni</option>
<option value="7">July</option>
<option value="8">agustus</option>
<option value="9">September</option>
<option value="10">Oktober</option>
<option value="11">September</option>
<option value="12">Desember</option>
</select><br>
bulan Akhir <br>
<select name="bulanawal" required="">
<option value="1">January</option>
<option value="2">Februari</option>
<option value="3">Maret</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">Juni</option>
<option value="7">July</option>
<option value="8">agustus</option>
<option value="9">September</option>
<option value="10">Oktober</option>
<option value="11">September</option>
<option value="12">Desember</option>
</select><br>

<br>
<input type="submit" value="Print">


</form>


<br>
<hr>
Form Filter BY Bulan
<br>
<br>
<hr>
<form action="<?= base_url() ?>suratkeluar/filter" method="POST" target='_blank'>

<input type="hidden" name="nilaifilter" value="3">
PILIH Tahun <br>
<select name="tahun2" required="">
<?php foreach ($tahun as $row) : ?>

<option value="<?= $row->tahun ?>"><?= $row->tahun ?></option>
<?php endforeach ?>
</select>



<br>
<input type="submit" value="Print">


</form>

</body>

</html> -->

<!-- Breadcrumbs-->

<div class="row">
    <!-- row satu  -->
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <strong>Form</strong> Filter
            </div>
            <!--id formfilter adalah nama form untuk filter-->
            <form id="formfilter">
                <div class="card-body card-block">
                    <input name="valnilai" type="hidden">
                    <div class="row form-group">
                        <div id="form-tanggal" class="col col-md-3"><label for="select"
                                class=" form-control-label">Pilih Periode By</label></div>
                        <div class="col-12 col-md-9">
                            <select name="periode" id="periode" class="form-control form-control-user"
                                title="Pilih Tahun Ajaran">
                                <option value="">-PILIH-</option>
                                <option value="tanggal">Tanggal</option>
                                <option value="bulan">Bulan</option>
                                <option value="tahun">Tahun</option>
                            </select>
                            <small class="help-block form-text"></small>
                        </div>
                    </div>

                </div>
                <div class="card-footer">

                    <!--ketika di klik tombol Proses, maka akan mengeksekusi fungsi javascript prosesPeriode() , untuk menampilkan form-->

                    <button id="btnproses" type="button" onclick="prosesPeriode()" class="btn btn-sm btn-primary"><i
                            class="fa fa-edit"></i> Proses</button>

                    <!--ketika di klik tombol Reset, maka akan mengeksekusi fungsi javascript prosesReset() , untuk menyembunyikan form-->
                    <button onclick="prosesReset()" type="button" class="btn btn-sm btn-danger"><i
                            class="fa fa-ban"></i> Reset</button>

                </div>
            </form>
        </div>
    </div>

    <!-- row kedua  -->
    <div class="col-lg-7" id="tanggalfilter">
        <div class="card">
            <div class="card-header">
                <strong>Form</strong> Filter by Tanggal
            </div>
            <form action="<?php echo base_url(); ?>suratrespon/filter" method="POST" target="_blank">
                <input type="hidden" name="nilaifilter" value="1">

                <input name="valnilai" type="hidden">
                <div class="card-body card-block">

                    <div class="row form-group">
                        <div class="col col-md-2">
                            <label for="select" class=" form-control-label">Dari tanggal</label>
                        </div>
                        <div class="col col-md-4">
                            <input name="tanggalawal" value="" type="date" class="form-control"
                                placeholder="Inputkan Jenis Bayar" id="tanggalawal" required="">
                        </div>
                        <div class="col col-md-2">
                            <label for="select" class=" form-control-label">Sampai tanggal</label>
                        </div>
                        <div class="col col-md-4">
                            <input name="tanggalakhir" value="" type="date" class="form-control"
                                placeholder="Inputkan Jenis Bayar" id="tanggalakhir" required="">
                        </div>




                        <small class="help-block form-text"></small>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print</button>

                </div>
            </form>
        </div>
    </div>

    <!-- row ketiga  -->
    <div class="col-lg-7" id="bulanfilter">
        <div class="card">
            <div class="card-header">
                <strong>Form</strong> Filter by Bulan
            </div>
            <form id="formbulan" action="<?php echo base_url(); ?>suratkeluar/filter" method="POST" target="_blank">
                <div class="card-body card-block">
                    <input type="hidden" name="nilaifilter" value="2">

                    <input name="valnilai" type="hidden">
                    <div class="row form-group">
                        <div id="form-tanggal" class="col col-md-2"><label for="select"
                                class=" form-control-label">Pilih Tahun</label></div>
                        <div class="col-12 col-md-10">
                            <select name="tahun1" id="tahun1" class="form-control form-control-user"
                                title="Pilih Tahun">
                                <option value="">-PILIH-</option>
                                <?php foreach ($tahun as $thn) : ?>
                                <option value="<?php echo $thn->tahun; ?>"><?php echo $thn->tahun; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="help-block form-text"></small>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2">
                            <label for="select" class=" form-control-label">Dari tanggal</label>
                        </div>
                        <div class="col col-md-4">
                            <select name="bulanawal" id="bulanawal" class="form-control form-control-user"
                                title="Pilih Bulan">
                                <option value="">-PILIH-</option>
                                <option value="1">JANUARI</option>
                                <option value="2">FEBRUARI</option>
                                <option value="3">MARET</option>
                                <option value="4">APRIL</option>
                                <option value="5">MEI</option>
                                <option value="6">JUNI</option>
                                <option value="7">JULI</option>
                                <option value="8">AGUSTUS</option>
                                <option value="9">SEPTEMBER</option>
                                <option value="10">OKTOBER</option>
                                <option value="11">NOVEMBER</option>
                                <option value="12">DESEMBER</option>
                            </select>
                        </div>
                        <div class="col col-md-2">
                            <label for="select" class=" form-control-label">Sampai tanggal</label>
                        </div>
                        <div class="col col-md-4">
                            <select name="bulanakhir" id="bulanakhir" class="form-control form-control-user"
                                title="Pilih Bulan">
                                <option value="">-PILIH-</option>
                                <option value="1">JANUARI</option>
                                <option value="2">FEBRUARI</option>
                                <option value="3">MARET</option>
                                <option value="4">APRIL</option>
                                <option value="5">MEI</option>
                                <option value="6">JUNI</option>
                                <option value="7">JULI</option>
                                <option value="8">AGUSTUS</option>
                                <option value="9">SEPTEMBER</option>
                                <option value="10">OKTOBER</option>
                                <option value="11">NOVEMBER</option>
                                <option value="12">DESEMBER</option>
                            </select>
                        </div>
                        <small class="help-block form-text"></small>

                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print</button>

                </div>
            </form>
        </div>
    </div>

    <!-- row keempat  -->
    <div class="col-lg-7" id="tahunfilter">
        <div class="card">
            <div class="card-header">
                <strong>Form</strong> Filter by Tahun
            </div>
            <form id="formtahun" action="<?php echo base_url(); ?>suratkeluar/filter" method="POST" target="_blank">
                <input name="valnilai" type="hidden">
                <div class="card-body card-block">

                    <input type="hidden" name="nilaifilter" value="3">

                    <div class="row form-group">
                        <div id="form-tanggal" class="col col-md-2"><label for="select"
                                class=" form-control-label">Pilih Tahun</label></div>
                        <div class="col-12 col-md-10">
                            <select name="tahun2" id="tahun2" class="form-control form-control-user"
                                title="Pilih Tahun">
                                <option value="">-PILIH-</option>
                                <?php foreach ($tahun as $thn) : ?>
                                <option value="<?php echo $thn->tahun; ?>"><?php echo $thn->tahun; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="help-block form-text"></small>
                        </div>
                    </div>





                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print</button>

                </div>
            </form>
        </div>
    </div>

</div>