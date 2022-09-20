<!DOCTYPE html>
<html><head>
    <title></title>
</head><body>
    <h3 style="text-align:center">DAFTAR SURAT MASUK</h3>
    <table>
        <tr>
            <td>no</td>
            <th>tanggal masuk</th>
            <th>no surat</th>
            <th>jenis surat</th>
            <th>perihal surat</th>
            <th>sifat surat</th>
        </tr>
        <?php
        $no=1;
        foreach ($suratmasuk as $srtmsk) : ?>
            <tr>

                <td><?php echo $no ++ ?></td>
                <td><?php echo $srtmsk['tanggal_surat_masuk'] ?></td>
                <td><?php echo $srtmsk['no_surat_masuk'] ?></td>
                <td><?php echo $srtmsk['jenis_surat_masuk'] ?></td>
                <td><?php echo $srtmsk['perihal_surat_masuk'] ?></td>
                <td><?php echo $srtmsk['sifat_surat_masuk'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body></html>