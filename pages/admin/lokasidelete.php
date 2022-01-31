<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $database = new Database();
    $db = $database->getConnection();

    $deleteSql = "DELETE FROM lokasi WHERE id = ?";
    $stmt = $db->prepare($deleteSql);
    $stmt->bindParam(1, $_GET['id']);
    if ($stmt->execute()) {
        $_SESSION['hasil'] = true;
        $_SESSION['pesan'] = "Berhasil di Hapus";
    } else {
        $_SESSION['hasil'] = false;
        $_SESSION['pesan'] = "Gagal di Hapus";
    }
}
echo "<meta http-equiv='refresh' content='0;url=?page=lokasiread'>";
