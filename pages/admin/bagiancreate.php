<?php
$database = new Database();
$db = $database->getConnection();
if (isset($_POST['button_create'])) {


    $insertSql = "INSERT INTO bagian (nama_bagian,karyawan_id,lokasi_id) VALUES (?,?,?)";
    $stmt = $db->prepare($insertSql);
    $stmt->bindParam(1, $_POST['nama_bagian']);
    $stmt->bindParam(2, $_POST['karyawan_id']);
    $stmt->bindParam(3, $_POST['lokasi_id']);
    if ($stmt->execute()) {
        $_SESSION['hasil'] = true;
        $_SESSION['pesan'] = "Berhasil Menambah Data Jabatan";
    } else {
        $_SESSION['hasil'] = false;
        $_SESSION['pesan'] = "Gagal Menambah Data Jabatan";
    }
    echo "<meta http-equiv='refresh' content='0;url=?page=bagianread'>";
}
?>
<?php include_once "partials/cssdatatables.php" ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Data Bagian</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=bagianread">Bagian</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Bagian</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="nama_bagian">Nama Bagian</label>
                    <input type="text" class="form-control" name="nama_bagian">
                </div>
                <div class="form-group">
                    <label for="karyawan_id">Kepala Bagian</label>
                    <select name="karyawan_id" class="form-control">
                        <option value="">-- Pilih Kepala Bagian --</option>
                        <?php
                        $selectSQL = "SELECT * FROM karyawan";
                        $stmt_karyawan = $db->prepare($selectSQL);
                        $stmt_karyawan->execute();
                        while ($row_karyawan = $stmt_karyawan->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=\"" . $row_karyawan["id"] . "\">" . $row_karyawan["nama_lengkap"] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="lokasi_id">Lokasi</label>
                    <select name="lokasi_id" class="form-control">
                        <option value="">-- Pilih Lokasi --</option>
                        <?php
                        $selectSQL = "SELECT * FROM lokasi";
                        $stmt_lokasi = $db->prepare($selectSQL);
                        $stmt_lokasi->execute();
                        while ($row_lokasi = $stmt_lokasi->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=\"" . $row_lokasi["id"] . "\">" . $row_lokasi["nama_lokasi"] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <a href="?page=bagianread" class="btn btn-danger btn-sm float-right"><i class="fa fa-times"></i> Batal</a>
                <button type="submit" name="button_create" class="btn btn-success btn-sm float-right mr-1"><i class="fa fa-save"></i> Simpan</button>
            </form>
        </div>
    </div>
</section>
<!-- /.content -->

<?php include "partials/scripts.php" ?>
<?php include "partials/scripstdatatables.php" ?>
<script>
    $(function() {
        $('#mytable').DataTable()
    });
</script>