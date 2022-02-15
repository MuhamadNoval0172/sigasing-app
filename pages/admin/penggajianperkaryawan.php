<?php include_once "partials/cssdatatables.php" ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Rekapitulasi Penggajian Sebulan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="?page=home">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="?page=penggajianrekap">Rekap Gaji</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="?page=penggajianbulanan">2020</a>
                    </li>
                    <li class="breadcrumb-item active">11</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Rekap Gaji Bulan 2020/11</h3>
            <a href="export/penggajianrekapbulanan-pdf-perkaryawan.php" class="btn btn-success btn-sm float-right">
                <i class="fa fa-file-export"></i> Export</a>
        </div>
        <div class="card-body">
            <table id="mytable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Gaji Pokok</th>
                        <th>Tunjangan</th>
                        <th>Uang Makan</th>
                        <th>Total</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Gaji Pokok</th>
                        <th>Tunjangan</th>
                        <th>Uang Makan</th>
                        <th>Total</th>
                        <th>Opsi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $database = new Database();
                    $db = $database->getConnection();

                    $selectSql = "SELECT bulan, karyawan.id, karyawan.nik, karyawan.nama_lengkap,
                        p.gapok,
                        p.tunjangan,
                        p.uang_makan,
                        p.gapok + p.tunjangan + p.uang_makan total
                        FROM penggajian p
                        JOIN karyawan ON p.karyawan_id = karyawan.id
                        where bulan = '11'
                        ";
                    $stmt = $db->prepare($selectSql);
                    $stmt->execute();
                    $no = 1;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['nik'] ?></td>
                            <td><?php echo $row['nama_lengkap'] ?></td>
                            <td style="text-align: right;"><?php echo number_format($row['gapok']) ?></td>
                            <td style="text-align: right;"><?php echo number_format($row['tunjangan']) ?></td>
                            <td style="text-align: right;"><?php echo number_format($row['uang_makan']) ?></td>
                            <td style="text-align: right;"><?php echo number_format($row['total']) ?></td>

                            <td>
                                <a href="?page=penggajianrekaptahun&tahun=<?php echo $row['tahun'] ?>" class="btn btn-info btn-sm mr-1"><i class="fa fa-info"></i> Rincian</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.content -->
<?php include "partials/scripts.php" ?>
<?php include "partials/scripstdatatables.php" ?>
<script>
    $(function() {
        $('#mytable').DataTable()
    });
</script>