<!DOCTYPE html>
<html><head>
    <title></title>
</head><body>
    <h3 style="text-align:center">DAFTAR SURAT KELUAR</h3>
    <table>
        <tr>
        <th>no</td>
                            <th>tanggal surat keluar</th>
                            <th>nomor surat</td>
                            <th>Jenis surat</td>
                            <th>Jabatan</td>
                            <th>perihal surat</td>
                            <th>Tujuan surat</td>
        </tr>
      
                        <?php
                        $no =1;
                        foreach ($suratkeluar as $srtklr) : ?>
                        <tr>

                            <td><?php echo $no ++ ?></td>
                            <td><?php echo $srtklr['tanggal_surat_keluar'] ?></td>
                            <td><?php echo str_replace("-", "/", $srtklr['nomor_surat_keluar']) ?></td>
                            <td><?php echo $srtklr['jenis_surat_keluar'] ?></td>
                            <td><?php echo $srtklr['jabatan_surat_keluar'] ?></td>
                            <td><?php echo $srtklr['perihal_surat_keluar'] ?></td>
                            <td><?php echo $srtklr['tujuan_surat_keluar'] ?></td>
                          
                        </tr>

                        <?php endforeach; ?>
                  

                </table>

</body></html>