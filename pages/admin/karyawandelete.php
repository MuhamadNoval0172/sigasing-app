<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $pengguna_id = $_GET['pengguna_id'];

    $database = new Database();
    $db = $database->getConnection();

    $deleteSql = "DELETE FROM karyawan WHERE id = ?";
    $stmt = $db->prepare($deleteSql);
    $stmt->bindParam(1, $_GET['id']);

    if ($stmt->execute()) {

        $deletePengguna = "DELETE FROM pengguna WHERE id = ?";
        $stmt = $db->prepare($deletePengguna);
        $stmt->bindParam(1, $_GET['pengguna_id']);

        if ($stmt->execute()) {
            $_SESSION['hasil'] = true;
            $_SESSION['pesan'] = "Berhasil simpan data";
        } else {
            $_SESSION['hasil'] = false;
            $_SESSION['pesan'] = "Gagal simpan data";
        }
    }
    echo "<meta http-equiv='refresh' content='0;url=?page=karyawanread'>";
}
